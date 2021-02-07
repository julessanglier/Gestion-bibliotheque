<?php

//$editeurs = get_editeurs();

//require "templates/t-liste-editeurs.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  require_once "../modele.php";

  $idLivre = $_POST['idLivre'];
  $titre = $_POST['titreLivre'];
  $category = $_POST['category'];
  $editeur = $_POST['editor'];

  $auteurs = Array();
  foreach ($_POST as $name=>$value){
      if (preg_match('/^auteurs-/', $name)){
        $auteurId = (int)explode("-", $name)[1];
        $auteurs[] = $auteurId;
      }
  }

  if (isset($_POST['delete'])){
      remove_livre_by_id($idLivre);
      header('Location: ../index.php?id=liste-livres');
      exit();
  }

  majLivre($idLivre, $titre, $category, $editeur, $auteurs);
  header('Location: ../index.php?id=liste-livres');
}
else{
  require_once "modele.php";

  $livre_id = $_GET['lid'] ?? 'L001';

  $livre = get_livre_by_id($livre_id);
  $categories = get_categories();
  $auteurs = get_auteurs();
  $editeurs = get_editeurs();
  $auteurs_livre_temp = get_authors_by_livre_id($livre_id);
  $auteurs_livre = Array();
  foreach ($auteurs_livre_temp as $auteur){
    array_push($auteurs_livre, $auteur['idAuteur']);
  }

  $breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
  1 => Array("link" => "index.php?id=liste-livres", "page" => "Livres"),
  2 => Array("link" => "", "page" => "Modification"));

  require "templates/t-modif-livre.php";
}
