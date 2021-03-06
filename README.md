# Projet Winbet


## Description du projet


Winbet est un site d'initiation aux paris sportifs.
Il permet à l'utilisateur d'accéder à l'ensemble des matchs en temps réel grace à l'api [football-data.org](http://api.football-data.org "Api").
À l'aide des différentes côtes, il a la possibilité de miser sur 3 types de pronostique: 
- Victoire équipe domicile
- Match nul
- Victoire équipe extérieur

Le pari est alors enregistré en base de données et accessible depuis son espace personnel. Le match est également enregistré si celui-ci n'est pas déjà présent dans la base.

L'utilisateur doit être connecté pour effectuer un pari.

À l'inscription, l'utilisateur bénéficie de 200 euros crédité sur son compte.

Si le solde est insuffisant il ne pourra pas créer de pari.

Lors de la création d'un pari, la cote du match est récupérée via l'api afin que l'utilisateur ne puisse pas modifier ces valeurs et éviter les triches.


## Architecture du projet


### Les diférentes routes du front


- `/` Page d'accueil qui présente les prochains matchs
- `/sport/[sport]` Les prochains matchs triés par sport
- `/sport/[sport]/[competitions]` Les prochains matchs triés par sport et compétitions
- `/user/login` La page de connexion
- `/user/signup` La page d'inscription
- `/user/bets` La liste des paris de l'utilisateur (Accessibles uniquement en étant connecté)
- `/user/logout` Deconnexion de l'utilisateur



### Les routes de l'api publique de football

Lien pour afficher tous les matchs de foot entre deux dates avec toutes compétitions confondues:

- `http://api.football-data.org/v2/matches?dateFrom=[date]&dateTo=[date])`

Lien pour afficher tous les matchs de foot d'une certaine compétition entre deux dates:

- `http://api.football-data.org/v2/competitions/[id_competition]/matches?dateFrom=[date]&dateTo=[date])`

Lien pour récupérer les informations d'un match afin de procéder à la création du pari:

- `http://api.football-data.org/v2/matches/[id]`



### Technologies



L'application web est développée en PHP, Javascript et Css sans aucun framework ou librairie quelconques.



### Structure du projet

Architecture MVC

- Rooteur Index.php

- Dossier Views contenant les vues

- Dossier Model contenant des DAO, des models et une facade

- Dossier Controllers

- Un renderer s'occupe d'afficher la vue en lui passant les données nécessaires

Le EnvReader va récupérer les informations de connexion à la bdd du fichier config.ini


### Métodologie de travail


L'application web a été développé en respectant un certain gitflow:

- (Master, Develop, branches, feats, fix, merges, merge request, etc)

Durant ce projet, nous avons utilisé la méthode agile afin d'être plus efficient et d'avoir un meilleur suivi de l'avancée du projet.

- (daily meeting au téléphone, tableau kanban(tâche à développer, tâche en cours, tache terminé, tâche à merge))

## Déploiement du projet


- Cloner le projet
`git clone https://github.com/mickaelarabian/betwin-app.git`

- Lancer votre serveur apache pour l'environnement php

- Installer le package curl pour php
`sudo apt-get install php7.4-curl`

- Créer la base de données
`create database winbet`

- Créer un utilisateur dans le sgbd
`CREATE USER 'winbetuser'@'localhost' IDENTIFIED BY  '123+aze'`

- Donner les droits à l'utilisateur sur toutes les tables de la bdd
`GRANT ALL PRIVILEGES ON winbet.* TO 'winbetuser'@'localhost';`

- injecter le script sql
`mysql -u winbetuser -p winbet < dump.sql` (fichier disponible dans le dossier sql)



## Pour aller plus loin


Pour aller plus loin différentes fonctionnalités pourrait être implémentés:

- Espace administrateur permettant de gérer le résultat des paris
- Un système de droit et permission permettant de limiter les accès à l'espace administrateur
- Des statistiques pour l'utilisateur
- La possibilité de faire plusieurs paris d'un coup (gestion d'un panier avec variables de sessions)
- La responsivité avec les medias queries de Css
- Un déploiement du site est en cours sur un serveur (Raspberry Pi). Avec un peu de chance il sera disponible rapidement.