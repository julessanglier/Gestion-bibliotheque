<?php
require_once "connect.php";


function get_element_by_id($table, $id_column, $id){
  $linker = connect();
  $sql = 'SELECT * from :table where :column=:id';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':table', $table, PDO::PARAM_STR);
  $stmt->bindParam(':column', $id_column, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt->fetch();
}

function get_livre_by_id($id){
  return get_element_by_id('livre', 'idLivre', $id);
}

function get_livres(){
  $linker = connect();
  $sql = 'SELECT idLivre, titreLivre, nomCollection, nomEditeur, nomAuteur, prenomAuteur FROM livre natural join collection natural join editeur natural join ecrit_par natural join auteur';

  if (!$linker->query($sql))
    echo "Pb d'accès à la table livres";
  else{
    $livres = Array();
    foreach($linker->query($sql) as $row){
      $livres[] = $row;
    }
    return $livres;
  }

  return null;
}

function get_collections(){
  $linker = connect();
  $sql = 'SELECT idCollection, nomCollection, idEditeur, nomEditeur from collection natural join editeur';

  if (!$linker->query($sql))
    echo "Pb d'accès à la table collection";
  else{
    $collections = Array();
    foreach($linker->query($sql) as $row){
      $collections[] = $row;
    }
    return $collections;
  }

  return null;
}

function get_collection_by_id($id){
  return get_element_by_id('collection', 'idCollection', $id);
}

function get_editeur(){
  $linker = connect();
  $sql = 'SELECT idEditeur, nomEditeur from editeur';

  if (!$linker->query($sql))
    echo "Pb d'accès à la table editeur";
  else{
    $editeurs = Array();
    foreach($linker->query($sql) as $row){
      $editeur[] = $row;
    }
    return $editeur;
  }

  return null;
}

function get_editeur_by_id($id){
  return get_element_by_id('editeur', 'idEditeur', $id);
}

function get_adherents(){
  $linker = connect();
  $sql = 'SELECT idAdh, nomAdh, prenomAdh, mailAdh from adherent';
  if (!$linker->query($sql))
    echo "Pb d'accès à la table adherent";
  else{
    $adherents = Array();
    foreach($linker->query($sql) as $row){
      $adherents[] = $row;
    }
    return $adherents;
  }
  return null;
}

function get_adherent_by_id($id){
  return get_element_by_id('adherent', 'idAdh', $id);
}

function get_emprunts(){
  $linker = connect();
  $sql = 'SELECT * from emprunts natural join livre natural join adherent';
  if (!$linker->query($sql))
    echo "Pb d'accès à la table emprunts";
  else{
    $emprunts = Array();
    foreach($linker->query($sql) as $row){
      $emprunts[] = $row;
    }
    return $emprunts;
  }
  return null;
}
