# Projet Winbet


## Description du projet

Winbet est un site d'initiation aux paris sportifs.
Elle permet à l'utilisateur d'accéder à l'ensemble des matchs en temp réel grace à l'api ``.
A l'aide des différentes côtes, il a la possibilité de miser sur 3 types de pronostique: 
- Victoire équipe 1
- Match nul
- Victoir équipe 2


Le pari est élors enregister et accessible depusi sont éspace personel.

L'utilisateur doit être connécté pour éffecter un pari.

A l'inscription, l'utilisateur béniéfinie de 200 euros crédité sur son compte.

## Déploiement du projet

- Cloner le projet
`git clone fef`

- Lancer votre serveur apache

- Créer la base de donnée
``

- créer utilisateur

- injecter script sql


## Architecture du projet

Architecture MVC

- Rooteur Index.php

- Dossier Views contenant les vues

- Dossier Model contenant des DAS, des models et une facade

- Dossier Controllers

- Un renderer s'occupe d'afficher la vue en lui passant les données nécéssésaire

Le EnvReader va récupérer les informations de connexion à la bdd du fichier ini




`create database winbet`
`CREATE USER 'winbetuser'@'localhost' IDENTIFIED BY  '123+aze';`
`GRANT ALL PRIVILEGES ON winbet.* TO 'winbetuser'@'localhost';`

