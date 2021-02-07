<?php

//$editeurs = get_editeurs();

//require "templates/t-liste-editeurs.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  require_once "../modele.php";

  $titre = $_POST['titreLivre'];
  $category = $_POST['category'];
  $editor = $_POST['editor'];

  if (ajoutLivre($titre, $category, $editor)){
    require_once "../templates/t-liste-livres.php";
  }else{
    echo "error";
  }
}
else{
  require_once "modele.php";

  $categories = get_categories();
  $editeurs = get_editeurs();

  $breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
  1 => Array("link" => "index.php?id=liste-livres", "page" => "Livres"),
  2 => Array("link" => "", "page" => "Ajout"));

  require "templates/t-ajout-livre.php";
}
