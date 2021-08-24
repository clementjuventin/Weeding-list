# Javascript-ElectronJs-TwitchOverlay

## Intro
J'emménage bientôt dans mon nouvel appartement pour mes études et j'ai crée une plateforme pour indiquer à mes proches quels objets ils peuvent m'offrir.
Convient pour les liste de naissance, de mariage, de course, de Noël, ect.

J'ai réalisé ce projet assez rapidement c'est pour cela que certaine partie du code sont difficilement maintenable en cas d'ajout (cf javascript dans liste.php...).
 
## Configuration

Il vous faudra créer un fichier env.php dans le dossier config:

```

<?php
//Database
define('HOST','mysql-clementjuventinliste.alwaysdata.net');
define('DB_NAME','clementjuventinliste_liste');
define('DB_LOGIN','exemple');
define('DB_PASSWORD','exemple123');

```

HOST pour votre hébergeur, DB_NAME pour le nom de la base de données, DB_LOGIN pour l'identifiant et DB_PASSWORD pour le mot de passe.

## Installation

- Configurer le env.php
- Télécharger les autres fichiers dans un serveur apache.

## Software screenshots

![--](doc/1.PNG)
![--](doc/2.PNG)

## Licence

GPLv3
