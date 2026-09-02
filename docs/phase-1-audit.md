# Audit technique — Phase 1

Date du contrôle : 2 septembre 2026  
Branche : `chore/technical-recovery`

## Environnement validé

- PHP 8.2.12
- Composer 2.8.11
- Node.js 22.18.0
- npm 10.9.3
- SQLite via `pdo_sqlite`
- Laravel 10.48.14
- Vite 5.3.2

Les dépendances PHP et JavaScript s'installent depuis les fichiers de verrouillage. La base peut être reconstruite avec `php artisan migrate:fresh --seed`. Le build `npm run build` réussit et les serveurs Laravel et Vite démarrent localement.

Composer signale une résolution de classe ambiguë entre `App\Providers\AppServiceProvider` du projet et une classe interne du paquet Laravel Pint. L'application utilise bien la classe du projet, mais ce warning devra disparaître lors de la mise à jour des dépendances.

## Vérification HTTP

| Route | Statut | Observation |
|---|---:|---|
| `/` | 404 | Aucune route racine |
| `/abe` | 200 | Accueil public |
| `/abe/about` | 200 | Page de présentation |
| `/abe/contact` | 200 | Page de contact |
| `/abe/gallery` | 200 | Galerie |
| `/abe/programme` | 200 | Liste des programmes |
| `/abe/programme/1` | 200 | Détail disponible avec les données seedées |
| `/abe/event` | 200 | Liste des événements |
| `/abe/event/1` | 200 | Répond, mais le contrôleur charge actuellement un Programme au lieu d'un Evenement |
| `/abe/actualite` | 200 | Liste des actualités |
| `/abe/newsDetail` | 200 | Page statique, non reliée à une actualité |
| `/admin` | 200 | Template accessible sans authentification |
| `/api/user` | 500 | `Route [login] not defined` pour une requête non authentifiée |
| Vite `/@vite/client` | 200 | Serveur de développement opérationnel |

## Tests et contrôles

- Syntaxe PHP : 74 fichiers valides.
- Test unitaire Laravel d'exemple : réussi.
- Test fonctionnel d'accueil : réussi sur `/abe` après correction du test Laravel d'exemple.
- Build Vite de production : réussi.
- Migrations et seeding sur une base vide : réussis.

Les deux tests présents restent très élémentaires et ne couvrent encore aucune règle métier.

## Anomalies fonctionnelles prioritaires

1. Ajouter une décision explicite pour `/` : redirection vers `/abe` ou accueil directement à la racine.
2. Corriger `EvenementController::show()`, qui recherche un `Programme` au lieu d'un `Evenement`.
3. Mettre en place l'authentification avant d'exposer le back-office.
4. Faire répondre `/api/user` par 401 JSON au lieu d'une erreur 500 lorsqu'aucun utilisateur n'est authentifié.
5. Relier le détail d'une actualité à une route et à un enregistrement réel.
6. Créer les routes et vues CRUD référencées par les contrôleurs existants.
7. Harmoniser les modèles avec les migrations : `user_id`/`utilisateur_id`, `actualite_id`, champs d'images et `année-event`/`année_event`.
8. Supprimer ou justifier la table `user`, distincte de la table Laravel `users`.
9. Compléter ou supprimer la migration vide `add_commentaires_count_and_vue_to_actualites_table`.

## Sécurité des dépendances

Les versions ont été installées conformément aux fichiers de verrouillage historiques afin de reproduire l'état du projet. Elles ne sont pas aptes à une mise en production sans mise à niveau.

### JavaScript

`npm audit` détecte 9 paquets vulnérables : 1 critique, 6 élevés et 2 modérés. Les paquets concernés sont `axios`, `esbuild`, `follow-redirects`, `form-data`, `nanoid`, `picomatch`, `postcss`, `rollup` et `vite`.

### PHP

`composer audit` signale des avis concernant notamment Laravel, Guzzle, Symfony, Carbon, PHPUnit et PsySH. Plusieurs avis sont classés élevés. Une mise à jour contrôlée des dépendances PHP et JavaScript doit constituer un lot séparé, suivi de tests de régression.

## Conclusion de la phase

L'environnement local est reproductible et l'application peut être démarrée. Les problèmes observés ne bloquent plus l'installation, mais ils bloquent encore une mise en production. Ils seront traités dans les phases consacrées au modèle de données, à l'architecture, à l'authentification et aux fonctionnalités métier.
