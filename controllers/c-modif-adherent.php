<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  require_once "../modele.php";
  $id = $_POST['idAdh'];
  $mail = $_POST['mailAdh'];
  $nom = $_POST['nomAdh'];
  $prenom = $_POST['prenomAdh'];
  $rue = $_POST['rueAdh'];
  $ville = $_POST['villeAdh'];
  $zip = $_POST['cpAdh'];

  maj_adherent($id, $mail, $nom, $prenom, $rue, $ville, $zip);
  header('Location: ../index.php?id=liste-adherents');

}else{
  require_once "modele.php";
  $adherent = get_adherent_by_id($_GET['idadh']);

  $breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
  1 => Array("link" => "index.php?id=liste-adherents", "page" => "Adhérents"),
  2 => Array("link" => "index.php?id=modif-adherent", "page" => "Modification"));

  require "templates/t-modif-adh.php";
}
