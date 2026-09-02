# Modèle de données — Phase 2

Date du contrôle : 2 septembre 2026  
Branche : `refactor/domain-model`

## Objectif

Cette phase aligne le schéma SQL, les modèles Eloquent, les factories, les seeders et les accès métier déjà exposés. La migration corrective est additive et réversible afin de préserver une éventuelle base historique.

## Modèle canonique

### User

- Table active : `users`
- Relation : un utilisateur possède plusieurs messages.
- Clé étrangère de `messages` : `user_id`.

L'ancienne table vide `user` est renommée `legacy_users`. Elle n'est pas supprimée afin de préserver d'éventuelles données historiques jusqu'à validation explicite.

### Programme

- Champs : `nom`, `description`.
- Relation : un programme possède plusieurs événements.

La relation `Programme -> images` a été retirée, car aucune colonne `programme_id` n'existe dans la table `images` et aucun flux applicatif ne l'utilise.

### Evenement

- Champs : `programme_id`, `titre`, `description`, `lieu`, `date`, `annee_event`, `image`.
- Relations : appartient éventuellement à un programme; possède des commentaires et des images.
- Casts : `date` en date Carbon et `annee_event` en entier.

La colonne historique `année-event` est renommée `annee_event`. La migration inverse restaure l'ancien nom si un rollback est nécessaire.

### Actualite

- Champs : `titre`, `contenu`, `date_publication`, `image`.
- Relation : une actualité possède plusieurs images.
- Cast : `date_publication` en date Carbon.

Le champ `image` est désormais autorisé en assignation de masse, conformément à la migration, à la factory, au contrôleur et aux vues.

### Image

- Champs : `url`, `evenement_id`, `actualite_id`.
- Une image appartient soit à un événement, soit à une actualité.
- Les validations empêchent les deux propriétaires simultanés et les images sans propriétaire dans les flux HTTP existants.

### Commentaire

- Champs : `evenement_id`, `contenu`.
- Relation : appartient à un événement.

Les anciens champs déclarés uniquement dans `$fillable` (`titre` et `image`) ont été retirés.

### Message

- Champs : `user_id`, `contenu`.
- Relation : appartient à un utilisateur par `user()`.

Le modèle utilisait auparavant `utilisateur_id`, alors que la migration et le contrôleur utilisent `user_id`.

## Données de développement

Le seeder produit maintenant des volumes déterministes :

| Entité | Quantité |
|---|---:|
| Programmes | 3 |
| Événements | 10 |
| Actualités | 10 |
| Commentaires | 10 |
| Images | 10 |

Cinq images sont liées à des événements et cinq à des actualités. Aucune image seedée n'est orpheline ou liée aux deux types de contenu. Les événements réutilisent les trois programmes existants au lieu de créer implicitement un nouveau programme par factory imbriquée.

## Correction métier

`EvenementController::show()` recherche maintenant un `Evenement`. Il recherchait auparavant un `Programme`, ce qui pouvait produire une page apparemment valide avec des propriétés inexistantes ou provenant de la mauvaise entité.

## Validation

- migration depuis une base vide : réussie ;
- rollback puis réapplication de la migration corrective : réussis ;
- seeding : réussi ;
- pages `/abe/programme/1` et `/abe/event/1` : HTTP 200 ;
- tests de schéma, relations, casts, seeders et détail événement : ajoutés ;
- tests exécutés sur SQLite en mémoire afin de ne pas modifier la base locale du développeur.

## Décisions reportées

- déterminer si `annee_event` doit être conservé ou dérivé automatiquement de `date` ;
- décider après inspection d'une éventuelle base client si `legacy_users` peut être supprimée ;
- décider si les messages de contact doivent pouvoir être envoyés sans compte utilisateur ;
- remplacer les validations inline par des Form Requests pendant la phase d'architecture ;
- définir les statuts de publication et les slugs après validation du besoin client.

