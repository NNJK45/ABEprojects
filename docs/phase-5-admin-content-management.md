# Phase 5 — Gestion des contenus du back-office

## Périmètre livré

Le back-office authentifié couvre désormais :

- les programmes, événements et actualités : création, recherche, modification et suppression ;
- la médiathèque : rattachement exclusif d'une image à un événement ou une actualité ;
- les messages : recherche, consultation et suppression ;
- les utilisateurs : création, recherche, modification et suppression par un administrateur ;
- les paramètres généraux : nom du site et coordonnées de contact ;
- un tableau de bord alimenté par les données réelles.

Toutes les listes sont paginées et conservent le terme de recherche dans la pagination. Les suppressions demandent une confirmation dans l'interface.

## Autorisations

| Fonction | Éditeur | Administrateur |
| --- | --- | --- |
| Contenus, images et messages | Oui | Oui |
| Utilisateurs | Non | Oui |
| Paramètres du site | Non | Oui |

La sécurité est appliquée côté serveur par les policies et les Form Requests ; masquer un lien dans l'interface n'est jamais considéré comme une autorisation suffisante.

## Protections particulières

- une image doit posséder exactement un rattachement ;
- changer son rattachement efface automatiquement l'ancien ;
- un mot de passe de compte comporte au moins 12 caractères et doit être confirmé ;
- un administrateur ne peut pas supprimer son propre compte ;
- le dernier administrateur ne peut être ni supprimé ni rétrogradé ;
- les paramètres du site sont stockés dans un enregistrement unique créé à la demande.

## Vérification

```bash
php artisan migrate:fresh --seed
php artisan test
vendor/bin/pint --test
npm run build
```

Les tests fonctionnels couvrent chaque CRUD, les recherches, la validation des rattachements, les frontières de rôles et les protections du dernier administrateur.
