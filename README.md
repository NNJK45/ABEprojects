# ABE Plateforme

Plateforme web de l'Académie du Bien-Être (ABE). Le projet contient un site public présentant les programmes, événements, actualités et activités de l'association, ainsi qu'une base d'interface d'administration.

> État du projet : reprise technique en cours. Le site public est consultable, mais certaines fonctions métier et la sécurité du back-office restent à finaliser. Voir [`docs/phase-1-audit.md`](docs/phase-1-audit.md).

## Stack technique

- PHP 8.1 ou supérieur (PHP 8.2 validé)
- Composer 2
- Laravel 10
- SQLite avec l'extension PHP `pdo_sqlite`
- Node.js 18 ou supérieur (Node.js 22 validé)
- npm 9 ou supérieur
- Vite 5

## Installation locale

Cloner le dépôt puis se placer dans son dossier :

```bash
git clone https://github.com/NNJK45/ABEprojects.git
cd ABEprojects
```

Installer les dépendances :

```bash
composer install
npm ci
```

Créer la configuration locale :

### Windows PowerShell

```powershell
Copy-Item .env.example .env
New-Item -ItemType File -Path database/database.sqlite -Force
php artisan key:generate
php artisan migrate:fresh --seed
```

### Linux ou macOS

```bash
cp .env.example .env
touch database/database.sqlite
php artisan key:generate
php artisan migrate:fresh --seed
```

Le fichier `.env` et la base SQLite locale sont ignorés par Git. Ne jamais y enregistrer de secret destiné au dépôt.

## Démarrage

Ouvrir deux terminaux dans le dossier du projet.

Terminal 1 — Laravel :

```bash
php artisan serve
```

Terminal 2 — Vite :

```bash
npm run dev
```

Le site public est disponible sur [http://127.0.0.1:8000/abe](http://127.0.0.1:8000/abe) et l'interface d'administration actuelle sur [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin).

La racine `/` n'est pas encore reliée au site et retourne volontairement une réponse 404 dans l'état actuel.

## Commandes de contrôle

```bash
# Lister les routes
php artisan route:list --except-vendor

# Exécuter les tests
php artisan test

# Vérifier le style PHP sans modifier les fichiers
vendor/bin/pint --test

# Construire les ressources de production
npm run build

# Contrôler les dépendances connues comme vulnérables
composer audit
npm audit
```

Le build Vite et la suite de tests actuelle passent. La couverture reste minimale et devra être étendue avec les fonctionnalités métier.

## Base de données

Le développement local utilise SQLite. Laravel calcule automatiquement le chemin absolu vers `database/database.sqlite`, ce qui rend la configuration portable entre Windows, Linux et macOS.

Pour repartir d'une base propre :

```bash
php artisan migrate:fresh --seed
```

La base locale ne doit jamais être commitée. Les changements de structure doivent toujours être décrits par des migrations Laravel.

## Organisation du code

- `app/Http/Controllers` : contrôleurs HTTP
- `app/Models` : modèles Eloquent
- `database/migrations` : structure de la base
- `database/seeders` : données locales de démonstration
- `resources/views/user` : vues du site public
- `resources/views/admin` : vues et template d'administration
- `routes/web.php` : routes publiques et administratives
- `tests` : tests automatisés

## Contribution et Git

Les conventions de branches, commits et pull requests sont documentées dans [`CONTRIBUTING.md`](CONTRIBUTING.md).

Travail de reprise en cours sur la branche :

```text
chore/technical-recovery
```

## Problèmes connus

Le rapport de remise en état, les routes vérifiées et les dettes détectées sont consignés dans [`docs/phase-1-audit.md`](docs/phase-1-audit.md). Les dépendances verrouillées datent de 2024 et présentent plusieurs avis de sécurité : leur mise à niveau contrôlée est obligatoire avant une mise en production.
