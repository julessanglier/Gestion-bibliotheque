--------------------------------------------
          Projet d'IHM, fin P2
          Gestion d'une bibliothèque
          -------------------------
            IUT Info d'Orléans
          Année Spéciale 2020-2021
              Jules Sanglier
--------------------------------------------

Ce site a pour vocation de gérer une bibliothèque de façon minimale.
Il permet essentiellement de : se connecter à une interface d'admini-
stration afin de gérer le stock de livres et de gérer les adhérents.

Informations techniques : le site est codé selon la représentation MVC
(Modèle Vue Contrôleur), il s'agit essentiellement de PHP. On s'est
intéressé ici surtout à développer le côté PHP et pas tant le contenu,
en effet les interfaces sont toutes issues de Bootstrap (autorisé).

Le modèle est fabriqué pour fonctionner avec une base MySQL à la
dernière version, lors du développement la communication était
faite via une bdd dockerisée.
PHP 7.3 est utilisé dans tout le projet.

Choix :
  - peu de sécurité (aucun filtre avec regex pour les entrées utilisateurs)
  - pas d'interface utilisateur faite à la main
  - utilisation de la représentation MVC
  - utilisation du système de session de PHP

Bugs connus :
  MàJ avec suppression des auteurs : non fonctionnelle

IMPORTANT :
  -> Laisser le dossier tel quel avec le nom 'gestion_bibliotheque' (utilisé pour des redirections).

  -> Installation de la BD :
    - lancez le script : db_schema.sql (création de la bdd : 'bibliotheque2')
    - lancez le script : scriptInsertion.sql

  -> Vous pouvez trouver le MLD utilisé dans le dossier /sql : mcd.png.

  -> Pour se connecter à l'interface utilisez les identifiants suivants :
      Mail : admin@bib-orleans.com
      Mdp : admin


Description des fichiers :

```bash
  ├── connect.php : utilitaire PDO, connexion, ...
  ├── controllers : contrôleurs respectifs
  │   ├── c-404.php
  │   ├── c-ajout-adherent.php
  │   ├── c-ajout-livre.php
  │   ├── c-deconnexion.php
  │   ├── c-graphe-emprunts.php
  │   ├── c-liste-adherents.php
  │   ├── c-liste-auteurs.php
  │   ├── c-liste-editeurs.php
  │   ├── c-liste-emprunts.php
  │   ├── c-livres-liste.php
  │   ├── c-login.php
  │   ├── c-modif-adherent.php
  │   ├── c-modif-editeur.php
  │   ├── c-modif-livre.php
  │   └── c-revoquer-emprunt.php
  ├── dashboard.css : fichier de style pour l'interface d'administration
  ├── db_constants.php : constantes de connexion à la BDD
  ├── index.php : page principale et routeur du site
  ├── modele.php : implémentation du modèle (toutes les fonctions d'accès directs à la BDD)
  ├── README.md
  ├── signin.css : fichier de style de la page de connexion
  ├── sql : dossier répertoriant les différents scripts
  │   ├── db_schema.sql
  │   ├── scriptInsertion.sql
  └── templates : templates respectifs
      ├── baseLayout.php : template de base
      ├── liste_livres.php
      ├── t-404.php
      ├── t-ajout-adherent.php
      ├── t-ajout-livre.php
      ├── t-graphe-emprunts.php
      ├── t-liste-adherents.php
      ├── t-liste-auteurs.php
      ├── t-liste-editeurs.php
      ├── t-liste-emprunts.php
      ├── t-liste-livres.php
      ├── t-liste.php
      ├── t-login.php
      ├── t-modif-adh.php
      └── t-modif-livre.php
```
