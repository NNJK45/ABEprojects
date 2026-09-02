# Phase 7 — Préparation à la production

## Mise à niveau et sécurité

Le projet utilise Laravel 12.69.1 sur PHP 8.2. Les dépendances directes et transitives ont été recalculées, notamment Sanctum 4, Guzzle 7.15 et PHPUnit 11. Après mise à niveau, `composer audit --locked` et `npm audit --omit=dev` ne doivent signaler aucun avis.

Les réponses HTTP ajoutent `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy` et `Permissions-Policy`. HSTS est envoyé uniquement en production sur une requête HTTPS. L'endpoint `GET /health` vérifie la disponibilité de la connexion à la base sans exposer de donnée interne.

## Préparation du serveur

Prévoir PHP 8.2 ou supérieur avec les extensions requises, Composer 2, Node.js 22 pour le build, un serveur HTTP dont la racine pointe vers `public/`, une base MySQL/MariaDB et un certificat TLS valide.

Créer `.env` à partir de `.env.production.example`, puis renseigner de vrais secrets. Exigences impératives :

- `APP_ENV=production` ;
- `APP_DEBUG=false` ;
- une clé générée avec `php artisan key:generate` ;
- une URL HTTPS exacte ;
- `SESSION_SECURE_COOKIE=true` ;
- des identifiants de base et SMTP propres à la production.

## Déploiement

```bash
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
npm ci
npm run build
php artisan migrate --force
php artisan optimize
php artisan storage:link
```

Le processus PHP doit pouvoir écrire dans `storage/` et `bootstrap/cache/`. Après déploiement, vérifier `/health`, `/abe`, `/admin/login`, les logs et l'envoi du formulaire de contact.

## Sauvegarde et retour arrière

Avant toute migration de production :

1. sauvegarder la base avec l'outil natif du moteur utilisé ;
2. conserver l'artefact ou le commit actuellement déployé ;
3. activer le mode maintenance si la migration n'est pas compatible avec l'ancien code ;
4. déployer et contrôler `/health` ;
5. en cas d'échec, restaurer le code précédent puis la sauvegarde de base.

Ne pas utiliser automatiquement `migrate:rollback` comme stratégie unique : certaines migrations destructives peuvent nécessiter une restauration de sauvegarde. Tester la restauration sur un environnement hors production.

## Supervision minimale

- appeler `/health` régulièrement depuis une sonde externe ;
- alerter sur les réponses 5xx et l'indisponibilité de la base ;
- centraliser ou sauvegarder les logs quotidiens ;
- surveiller l'espace disque et la réussite des sauvegardes ;
- exécuter les audits de dépendances à chaque mise à jour.
