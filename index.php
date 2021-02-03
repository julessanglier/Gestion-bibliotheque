<?php
require_once 'modele.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/index.php' == $uri){
  //load main page
}
elseif (isset($_GET['id'])){
  $page = $_GET['id'];
  switch ($page){
    case 'liste-emprunts':
      include('controllers/c-liste-emprunts.php');
    break;

    case 'liste-livre':
      include('controllers/c-livres-liste.php');
      break;

    case 'liste-adherents':
      include('controllers/c-liste-adherents.php');
      break;

    case 'liste-collections':
      include('controllers/c-liste-collections.php');
      break;
  }
}
