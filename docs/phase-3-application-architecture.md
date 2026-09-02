# Architecture applicative — Phase 3

Date du contrôle : 2 septembre 2026  
Branche : `refactor/application-architecture`

## Frontières de routes

Le fichier `routes/web.php` est désormais un point d'entrée minimal :

- `routes/public.php` contient le site public sous `/abe` ;
- `routes/admin.php` contient l'espace d'administration sous `/admin` ;
- `/` redirige vers `/abe`.

Les noms de routes historiques (`home`, `programme`, `event`, `news`, etc.) sont conservés pour ne pas casser les vues existantes. Les routes de détail imposent un identifiant numérique et utilisent le route model binding implicite.

Le fichier des routes administratives est volontairement séparé mais pas encore protégé. L'authentification, les rôles et les policies constituent la phase 4.

## Validation des entrées

Les règles inline ont été extraites dans six Form Requests :

- `ActualiteRequest` ;
- `CommentaireRequest` ;
- `EvenementRequest` ;
- `ImageRequest` ;
- `MessageRequest` ;
- `ProgrammeRequest`.

Les créations et mises à jour utilisent uniquement `$request->validated()` au lieu de `$request->all()`. Une image doit référencer exactement un événement ou une actualité. Un message doit référencer un utilisateur existant.

Les méthodes `authorize()` retournent temporairement `true`. Elles seront connectées aux policies durant la phase 4, une fois l'authentification et les rôles définis.

## Lecture publique

Les collections publiques sont paginées par groupes de neuf avec un ordre déterministe :

- programmes : plus récents d'abord ;
- événements : date croissante ;
- actualités : date de publication décroissante.

La pagination utilise le rendu Bootstrap 4 correspondant au thème existant. Les vues présentent un état vide et n'affichent plus les cartes anglaises de démonstration mélangées aux données réelles.

Les pages de détail chargent explicitement leurs relations utiles afin d'éviter les requêtes implicites répétées.

## Réponses HTTP

- `/` retourne une redirection vers `/abe` ;
- un identifiant absent ou invalide sur une route liée retourne 404 ;
- une requête non authentifiée vers `/api/user` retourne toujours un JSON 401 ;
- la destination applicative après connexion est définie sur `/admin`.

## Médias

Le projet stocke actuellement des chaînes d'URL dans `image` et `images.url`. `ImageRequest` centralise la validation de leur propriétaire, mais aucun téléchargement de fichier fonctionnel n'existe encore. Le service de stockage, les règles MIME, les tailles maximales, les noms de fichiers et la suppression physique seront mis en place avec les écrans CRUD du back-office.

## Nettoyage

Les faux contenus visibles des listes publiques ont été retirés. Les nombreux fichiers HTML du template d'administration ne sont pas supprimés dans cette phase : les retirer avant de connaître les composants retenus pour le back-office ferait perdre des ressources potentiellement utiles. Le nettoyage définitif accompagnera la construction des écrans administratifs.

## Tests ajoutés

Les tests d'architecture couvrent :

- la redirection de la racine ;
- le binding implicite des programmes et événements ;
- les réponses 404 ;
- la pagination des trois collections publiques ;
- la règle de propriétaire unique des images ;
- la réponse JSON 401 de l'API.

## Travaux reportés

- authentification et autorisations du back-office ;
- séparation des contrôleurs publics et administratifs lors de la construction du CRUD ;
- détail dynamique des actualités ;
- filtres et recherche, à définir avec les besoins métier ;
- service de stockage et traitement des médias ;
- suppression des pages inutilisées du template après inventaire des écrans d'administration.

