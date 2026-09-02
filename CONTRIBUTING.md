# Guide de contribution

## Branches

- `main` contient uniquement une version stable et validée.
- `develop` pourra servir de branche d'intégration si plusieurs développeurs travaillent simultanément.
- `feature/<sujet>` sert aux nouvelles fonctionnalités.
- `fix/<sujet>` sert aux corrections.
- `chore/<sujet>` sert à la maintenance, la documentation et l'outillage.
- `hotfix/<sujet>` est réservé aux incidents de production.

Utiliser des noms courts en minuscules, séparés par des tirets, par exemple `feature/admin-events`.

## Commits

Les commits suivent une convention inspirée de Conventional Commits :

```text
feat: ajouter la gestion des événements
fix: corriger le détail d'un événement
docs: documenter l'installation locale
test: couvrir la création d'une actualité
refactor: extraire la validation des programmes
chore: mettre à jour les dépendances
```

Un commit doit rester cohérent, testable et limité à un seul objectif.

## Pull requests

Toute modification destinée à `main` passe par une pull request comprenant :

- le besoin traité ;
- les changements importants ;
- la procédure de vérification ;
- les captures d'écran pour une modification visuelle ;
- les migrations ou impacts de déploiement ;
- les risques et travaux reportés.

Avant de demander une revue :

```bash
php artisan test
vendor/bin/pint --test
npm run build
composer audit
npm audit
```

Les tests ou audits en échec doivent être expliqués dans la pull request. Une anomalie connue ne doit pas être masquée.

## Règles de code

- Respecter PSR-12 et le style appliqué par Laravel Pint.
- Utiliser des noms techniques sans accents ni tirets pour les colonnes de base de données.
- Valider les entrées dans des Form Requests dès que le module est stabilisé.
- Protéger les routes administratives par authentification et autorisation.
- Ne jamais commiter `.env`, une base locale, des secrets ou des identifiants.
- Accompagner les corrections métier d'un test de régression.
- Mettre à jour le README lorsqu'une commande d'installation ou d'exploitation change.

