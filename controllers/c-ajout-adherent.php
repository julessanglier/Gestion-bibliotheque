<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  require_once "../modele.php";

  $mail = $_POST['mailAdh'];
  $nom = $_POST['nomAdh'];
  $prenom = $_POST['prenomAdh'];
  $rue = $_POST['rueAdh'];
  $ville = $_POST['villeAdh'];
  $zip = $_POST['cpAdh'];

  ajout_adherent($nom, $prenom, $rue, $ville, $zip, $mail);
  header('Location: ../index.php?id=liste-adherents');

}else{
  require_once "modele.php";

  $breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
  1 => Array("link" => "index.php?id=liste-adherents", "page" => "Adhérents"),
  2 => Array("link" => "index.php?id=modif-adherent", "page" => "Ajout"));

  require "templates/t-ajout-adherent.php";
}
