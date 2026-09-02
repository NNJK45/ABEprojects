# Phase 8 — Recette client

Cette checklist sépare les contrôles techniques reproductibles des décisions qui nécessitent la validation de l'équipe ABE.

## Précontrôle technique — 2 septembre 2026

Contrôles exécutés sur `http://127.0.0.1:8000` :

- [x] `/` redirige vers `/abe` ;
- [x] les sept pages publiques principales répondent en HTTP 200 ;
- [x] `/health` répond en HTTP 200 avec `{"status":"ok"}` ;
- [x] `/admin` redirige un visiteur vers `/admin/login` ;
- [x] les 37 tests automatisés passent avec 183 assertions ;
- [x] les audits Composer et npm de production ne signalent aucune vulnérabilité connue ;
- [x] le build Vite et Laravel Pint passent.

Le contrôle visuel interactif n'a pas pu être automatisé dans l'environnement Windows actuel, car le composant de navigateur intégré ne démarre pas. Les contrôles responsive, tactiles et multi-navigateurs restent donc à exécuter manuellement avec le client.

## 1. Accès et navigation

- [ ] La page d'accueil correspond à l'identité de l'ABE.
- [ ] Le menu fonctionne sur ordinateur, tablette et téléphone.
- [ ] Les pages Programmes, Événements, Actualités, Galerie, À propos et Contact sont accessibles.
- [ ] Les liens du pied de page sont corrects.
- [ ] Le logo, le favicon et les images officielles sont validés.

## 2. Contenus à valider par l'ABE

- [ ] La présentation et la mission sont exactes.
- [ ] Les coordonnées, l'adresse et les réseaux sociaux sont officiels.
- [ ] Les programmes publiés sont complets et à jour.
- [ ] Les événements utilisent les bonnes dates, lieux et illustrations.
- [ ] Les actualités peuvent être publiées sans correction complémentaire.
- [ ] L'historique, la gouvernance, les partenaires et les résultats chiffrés ont été fournis ou volontairement omis.

## 3. Formulaire de contact

- [ ] Un visiteur peut envoyer un message valide.
- [ ] Les erreurs sont compréhensibles lorsque les champs sont invalides.
- [ ] Le message apparaît dans Administration > Messages.
- [ ] L'administrateur peut lire et supprimer le message.
- [ ] Le client confirme s'il souhaite une notification par email.
- [ ] Si oui, le transport SMTP et l'adresse destinataire sont fournis et testés.

## 4. Administration

- [ ] Un administrateur peut se connecter et se déconnecter.
- [ ] Un éditeur accède aux contenus, images et messages.
- [ ] Un éditeur ne peut pas administrer les comptes ni les paramètres.
- [ ] Les créations, modifications, recherches et suppressions fonctionnent pour chaque contenu.
- [ ] Une image peut être rattachée à un seul événement ou une seule actualité.
- [ ] Le dernier administrateur ne peut être ni supprimé ni rétrogradé.
- [ ] Le changement de mot de passe est compris et validé.

## 5. Affichage et accessibilité

Tester au minimum Chrome, Edge ou Firefox récent, puis Safari sur iPhone si le public visé l'utilise.

- [ ] Aucun texte ne déborde à 320 px, 768 px, 1024 px et 1440 px.
- [ ] Le menu mobile s'ouvre et se ferme au clavier et au toucher.
- [ ] Les contrastes, tailles de caractères et états de focus sont lisibles.
- [ ] Toutes les images utiles ont un texte alternatif adapté.
- [ ] La navigation principale est utilisable au clavier.
- [ ] Les pages restent compréhensibles lorsque les images ne chargent pas.

## 6. Préproduction

- [ ] L'environnement utilise HTTPS avec `APP_DEBUG=false`.
- [ ] MySQL/MariaDB est configuré avec un compte aux droits limités.
- [ ] `/health` retourne `200` sans exposer de donnée interne.
- [ ] Une sauvegarde de base est créée puis restaurée lors d'un test réel.
- [ ] Les logs sont accessibles à l'équipe technique et protégés du Web.
- [ ] La surveillance de disponibilité et d'espace disque est active.
- [ ] Le déploiement et le retour arrière ont été répétés hors production.

## 7. Procès-verbal

| Champ | Valeur |
| --- | --- |
| Environnement testé | |
| Version / commit | |
| Date | |
| Représentant ABE | |
| Responsable technique | |
| Anomalies bloquantes | |
| Anomalies non bloquantes | |
| Décision | Accepté / Accepté avec réserves / Refusé |
| Signature ou validation écrite | |

Une anomalie doit préciser l'URL, le rôle utilisé, les données saisies, le résultat obtenu, le résultat attendu, le navigateur et une capture d'écran.
