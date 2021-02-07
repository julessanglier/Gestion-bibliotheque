<?php

//$editeurs = get_editeurs();

//require "templates/t-liste-editeurs.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  require_once "../modele.php";

  var_dump($_POST);
  $idLivre = $_POST['idLivre'];
  $titre = $_POST['titreLivre'];
  $category = $_POST['category'];

  if (isset($_POST['delete'])){
      //remove_livre_by_id($idLivre);
      echo 'le livre va être supprimé';
  }

  majLivre($idLivre, $titre, $category);
}
else{
  require_once "modele.php";

  $livre_id = $_GET['lid'] ?? 'L001';

  $livre = get_livre_by_id($livre_id);
  $categories = get_categories();

  $breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
  1 => Array("link" => "index.php?id=liste-livres", "page" => "Livres"),
  2 => Array("link" => "", "page" => "Modification"));

  require "templates/t-modif-livre.php";
}
