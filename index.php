<?php
require_once 'modele.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
session_start();

if (isset($_GET['id']) && isset($_SESSION['userId'])){
  $page = $_GET['id'];
  switch ($page){
    case 'liste-emprunts':
      include('controllers/c-liste-emprunts.php');
    break;

    case 'liste-livres':
      include('controllers/c-livres-liste.php');
      break;

    case 'liste-adherents':
      include('controllers/c-liste-adherents.php');
      break;

    case 'liste-collections':
      include('controllers/c-liste-collections.php');
      break;

    case 'liste-editeurs':
      include('controllers/c-liste-editeurs.php');
      break;

    case 'modif-livre':
      include('controllers/c-modif-livre.php');
      break;

    case 'ajout-livre':
      include('controllers/c-ajout-livre.php');
      break;

    case 'login':
      include('controllers/c-login.php');
    break;

    case 'deconnexion':
      include('controllers/c-deconnexion.php');
      break;

    case 'revoquer-emprunt':
      include('controllers/c-revoquer-emprunt.php');
      break;

    case 'modif-adherent':
      include('controllers/c-modif-adherent.php');
      break;

    case 'ajout-adherent':
      include('controllers/c-ajout-adherent.php');
      break;

    case 'liste-auteurs':
    include('controllers/c-liste-auteurs.php');
      break;

    default:
      include('controllers/c-404.php');
      break;
  }
}
else{
  if (!isset($_SESSION['userId'])){
      include('controllers/c-login.php');
  }
  else{
    include('controllers/c-graphe-emprunts.php');
  }
}
