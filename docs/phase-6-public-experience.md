# Phase 6 — Expérience publique

## Périmètre livré

- accueil alimenté par les programmes, événements, actualités et images du back-office ;
- galerie dynamique et paginée ;
- pages de détail dynamiques pour les programmes, événements et actualités ;
- formulaire de contact traité par Laravel et consultable dans l'administration ;
- coordonnées et nom du site issus des paramètres administrables ;
- suppression des faux témoignages, enseignants, commentaires et textes du thème ;
- correction des liens `.html`, du balisage HTML imbriqué et du chemin Modernizr ;
- titres et descriptions de pages, textes alternatifs, chargement différé des images et lien d'accès rapide au contenu.

## Contact et anti-abus

Le formulaire accepte les visiteurs non connectés. Les messages conservent le nom, l'email, l'objet et le contenu. Les protections comprennent :

- validation serveur ;
- limite de cinq soumissions par minute et par client ;
- champ leurre invisible pour bloquer les robots simples ;
- longueur maximale de 5 000 caractères ;
- échappement automatique lors de l'affichage Blade.

L'envoi d'un email de notification n'est pas activé tant que le client n'a pas fourni de transport SMTP. Le message reste disponible dans le back-office.

## Contenu à faire valider par le client

Les formulations institutionnelles sont volontairement neutres. L'équipe ABE doit confirmer l'historique, la gouvernance, les partenaires, les réseaux sociaux et les résultats chiffrés avant leur publication. Aucun faux chiffre ou témoignage n'a été conservé.

## Vérification

```bash
php artisan migrate:fresh --seed
php artisan test
vendor/bin/pint --test
php artisan route:cache
php artisan view:cache
npm run build
```
