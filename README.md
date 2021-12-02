# Projet Winbet


## Description du projet

Winbet est un site d'initiation aux paris sportifs.
Elle permet à l'utilisateur d'accéder à l'ensemble des matchs en temp réel grace à l'api [football-data.org](http://api.football-data.org "Api").
A l'aide des différentes côtes, il a la possibilité de miser sur 3 types de pronostique: 
- Victoire équipe 1
- Match nul
- Victoir équipe 2

Le pari est alors enregistré en base de données et accessible depuis sont éspace personel. Le match est également enregistré si celui ci n'est pas déjà présent dans la base.

L'utilisateur doit être connécté pour éffecter un pari.

A l'inscription, l'utilisateur bénéficie de 200 euros crédité sur son compte.

Si le solde est inssufisant il ne pourra pas créer de pari.

Lors de la création d'un pari, la cote du match est récupéré via l'api afin que l'utilisateur ne puisse pas modifier ces valeurs et éviter les triches.

## Déploiement du projet

- Cloner le projet
`git clone https://github.com/mickaelarabian/betwin-app.git`

- Lancer votre serveur apache

- Créer la base de donnée
`create database winbet`

- Créer un utilisateur dans le sgbd
`CREATE USER 'winbetuser'@'localhost' IDENTIFIED BY  '123+aze'`

- Donner les droits à l'utilisateur sur toutes les tabels de la bdd
`GRANT ALL PRIVILEGES ON winbet.* TO 'winbetuser'@'localhost';`

- injecter script sql
`mysql -u winbetuser -p winbet < dump.sql`

## Les diférentes routes du front

- `/` Page d'acceuil qui présentes les prochains matchs
- `/sport/[sport]` Les prochains matchs trié par sport
- `/sport/[sport]/[competitions]` Les prochains matchs triés par sport et compétitions
- `/user/login` La page de connexion
- `/user/signup` La page d'inscription
- `/user/bets` La liste de spari de l'uitlisateurs (Accessible uniquement en étant connecté)
- `/user/logout` Deconnexion de l'utilisateur

## technologies

L'applciation web est développé en PHP, javascript et css sans aucun frameworks ou librairies quelconques.

## Architecture du projet

Architecture MVC

- Rooteur Index.php

- Dossier Views contenant les vues

- Dossier Model contenant des DAS, des models et une facade

- Dossier Controllers

- Un renderer s'occupe d'afficher la vue en lui passant les données nécéssésaires

Le EnvReader va récupérer les informations de connexion à la bdd du fichier config.ini


L'application web a été développé en respectant un certain gitflow:

- (Master, Develop, branches, feats, fix, merges etc)

## Pour aller plus loin

Pour aller plus loin différentes fonctionnalités pourrait être implémentés:

- Espace administrateur permetant de gérer le resultat des paris
- Un systeme de droit et permission permetant de limiter les accès à l'epace administrateurs
- Des statistiques pour l'utilisateurs
- La possibilité de faire plusieurs paris d'un coup (gestion d'un paneir avec variables de sessions)
- La résponsivité avec les medias queries de css
