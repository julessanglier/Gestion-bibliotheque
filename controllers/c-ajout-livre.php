<?php

//$editeurs = get_editeurs();

//require "templates/t-liste-editeurs.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  require_once "../modele.php";

  $titre = $_POST['titreLivre'];
  $category = $_POST['category'];
  $editor = $_POST['editor'];

  $auteurs = Array();
  foreach ($_POST as $name=>$value){
      if (preg_match('/^auteurs-/', $name)){
        $auteurId = (int)explode("-", $name)[1];
        $auteurs[] = $auteurId;
      }
  }

  if (ajoutLivre($titre, $category, $editor, $auteurs)){
    header('Location: ../index.php?id=liste-livres');
  }else{
    echo "error";
  }
}
else{
  require_once "modele.php";

  $categories = get_categories();
  $editeurs = get_editeurs();
  $auteurs = get_auteurs();

  $breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
  1 => Array("link" => "index.php?id=liste-livres", "page" => "Livres"),
  2 => Array("link" => "", "page" => "Ajout"));

  require "templates/t-ajout-livre.php";
}
