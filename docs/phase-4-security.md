# Authentification et sécurité — Phase 4

Date du contrôle : 2 septembre 2026  
Branche : `feat/admin-authentication`

## Accès administrateur

Toutes les routes sous `/admin`, sauf la page de connexion, utilisent les middlewares `auth` et `admin.access`. Un visiteur est redirigé vers `/admin/login`. Un utilisateur authentifié sans rôle autorisé reçoit une réponse 403.

Le flux fournit :

- connexion par e-mail et mot de passe ;
- option « rester connecté » ;
- régénération de session après connexion ;
- déconnexion par requête POST protégée par CSRF ;
- invalidation de session et régénération du jeton CSRF ;
- changement de mot de passe avec vérification du mot de passe actuel ;
- limitation à cinq tentatives de connexion par combinaison e-mail/adresse IP.

## Création du premier administrateur

Aucun identifiant ou mot de passe par défaut n'est enregistré dans le dépôt. Utiliser :

```bash
php artisan abe:create-admin admin@example.com --name="Administrateur ABE"
```

Le mot de passe est demandé de manière masquée et doit contenir au moins huit caractères. La commande peut aussi promouvoir un utilisateur existant en administrateur.

## Rôles

Les rôles sont représentés par l'enum `App\Enums\UserRole` et stockés dans `users.role`.

| Rôle | Accès au back-office | Gestion du contenu | Gestion des utilisateurs |
|---|---:|---:|---:|
| `admin` | Oui | Oui | Oui |
| `editor` | Oui | Oui | Non |

La migration donne le rôle `editor` aux utilisateurs existants afin de conserver leur accès éditorial. La création d'un administrateur nécessite la commande dédiée ou une action autorisée d'un administrateur.

## Policies

`ContentPolicy` protège les programmes, événements, actualités, images, commentaires et messages. `UserPolicy` réserve la gestion globale des utilisateurs aux administrateurs, tout en permettant à un utilisateur de consulter ou modifier son propre compte selon les futures routes de profil.

Les six Form Requests métier interrogent ces policies. Une mutation anonyme ou non autorisée est donc refusée avant l'exécution du contrôleur.

## Interface

Le faux utilisateur du template a été supprimé. L'en-tête affiche le nom, l'e-mail et le rôle de l'utilisateur connecté. Le tableau de bord affiche les volumes réels de programmes, événements et actualités.

## Tests de sécurité

La suite couvre :

- redirection d'un visiteur vers la connexion ;
- connexion et déconnexion ;
- rejet des identifiants incorrects ;
- limitation des tentatives ;
- accès des rôles ;
- permissions des policies ;
- changement de mot de passe valide et invalide ;
- création interactive d'un administrateur sans secret codé en dur.

## Travaux reportés

- récupération de mot de passe par e-mail, après configuration du fournisseur SMTP ;
- gestion des comptes depuis le back-office ;
- journal d'audit des actions sensibles ;
- authentification à deux facteurs si le client la demande ;
- cookies sécurisés et paramètres de proxy à valider dans l'environnement de production ;
- mise à jour des dépendances signalées par `composer audit` et `npm audit` avant déploiement.

