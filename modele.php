<?php
require_once "connect.php";


function get_element_by_id($table, $id_column, $id){
  /*$linker = connect();
  $sql = 'SELECT * from ? where ?=?';
  $stmt = $linker->prepare($sql);
  //$stmt->bindParam(':table', $table, PDO::PARAM_STR);
  //$stmt->bindParam(':column', $id_column, PDO::PARAM_STR);
  //$stmt->bindParam(':id', $id, PDO::PARAM_STR);
  //$stmt->execute();
  //var_dump($stmt);
  //var_dump($stmt->fetch());
  $stmt->execute([$table, $id_column, $id]);
  var_dump($table);
  var_dump($stmt->fetch());
  return $stmt->fetch();*/

  $linker = connect();
  $sql = 'SELECT * FROM '. $table .' where ' . $id_column . ' = ' . '\''.$id.'\''; //optimisable ...

  if (!$linker->query($sql))
    echo "Pb d'accès à la table livres";
  else{
    $data = null;
    foreach($linker->query($sql) as $row){
      $data = $row;
    }
    return $data;
  }

  return null;
}

function prepared_stmt_retrieve_array($stmt, $table){
  if (!$stmt)
    echo "Pb d'accès à la table " . $table;
  else{
    $t = Array();
    foreach($stmt as $r){
      $t[] = $r;
    }
    return $t;
  }

  return null;
}

function get_livre_by_id($id){
  $linker = connect();
  $sql = 'SELECT idLivre, titreLivre, nomEditeur, idCategorie, nomCategorie FROM livre natural join edite_par natural join editeur natural join a_pour_categorie natural join categorie where idLivre = :id';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->execute();

  $livre = $stmt->fetchAll();
  return $livre;
}

function remove_livre_by_id($id){
  $sql = 'DELETE FROM livre where idLivre = :id;';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->execute();
}

function get_livres(){
  $linker = connect();
  $sql = 'SELECT idLivre, titreLivre, nomEditeur, nomCategorie FROM livre natural join edite_par natural join editeur natural join a_pour_categorie natural join categorie';

  if (!$linker->query($sql))
    echo "Pb d'accès à la table livre";
  else{
    $livres = Array();
    foreach($linker->query($sql) as $row){
      $row['auteursLivre'] = get_authors_by_livre_id($row['idLivre']);
      $livres[] = $row;
    }
    return $livres;
  }

  return null;
}

function get_authors_by_livre_id($id){
    $linker = connect();
    $sql = 'select * from auteur natural join ecrit_par where idLivre = :id';
    $stmt = $linker->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    if (!$stmt)
      echo "Pb d'accès à la table auteur";
    else{
      $auteurs = Array();
      foreach ($stmt as $row){
        $auteurs[] = $row;
      }
      /*while ($row = $result->fetch_assoc()){
        $auteurs[] = $row;
      }
      */return $auteurs;
    }

    return null;
}

function get_auteurs(){
  $linker = connect();
  $sql = 'select * from auteur';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->execute();
  if (!$stmt)
    echo "Pb d'accès à la table auteur";
  else{
    $auteurs = Array();
    foreach ($stmt as $row){
      $auteurs[] = $row;
    }
    /*while ($row = $result->fetch_assoc()){
      $auteurs[] = $row;
    }
    */return $auteurs;
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

function get_editeurs(){
  $linker = connect();
  $sql = 'SELECT idEditeur, nomEditeur from editeur';
  $stmt = $linker->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll();
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

function get_categories(){
  $linker = connect();
  $sql = 'SELECT idCategorie, nomCategorie FROM categorie';
  $stmt = $linker->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
}

function get_reserved_books($id){
  $linker = connect();
  $sql = 'SELECT idLivre from livre l where exists (select idLivre from emprunts e where dateFin > CURRENT_DATE and e.idLivre = l.idLivre)';

}

function check_if_reserved($id){
  $linker = connect();
  $sql = 'SELECT idLivre from emprunts e where dateFin > CURRENT_DATE and idLivre = :id';
}

function revoke_reservation($id){
  $linker = connect();
  $sql = 'DELETE from emprunts where dateFin > CURRENT_DATE and idLivre = :id1 and idAdh = :id2';
}

function ajout_adherent($nom, $prenom, $rue, $ville, $cp, $mail){

}

function majLivre($id, $titre, $categorie){
  $linker = connect();
  $sql = 'UPDATE livre set titreLivre = :titre where idLivre = :id';
  $stmt_book = $linker->prepare($sql);

  $stmt_book->bindParam(':titre', $titre, PDO::PARAM_STR);
  $stmt_book->bindParam(':id', $id, PDO::PARAM_STR);

  $update_category = 'UPDATE a_pour_categorie set idCategorie = :categorie where idLivre = :id';
  $stmt_category = $linker->prepare($update_category);
  $stmt_category->bindParam(':categorie', $categorie, PDO::PARAM_INT);
  $stmt_category->bindParam(':id', $id, PDO::PARAM_STR);

  return $stmt_book->execute() && $stmt_category->execute();
}

function ajoutLivre($titre, $categorie, $editeur){
  $linker = connect();
  $book = 'INSERT INTO livre (idLivre, titreLivre) values (:id, :titre)';

  $stmt_book = $linker->prepare($book);

  $id = uniqid();
  $stmt_book->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt_book->bindParam(':titre', $titre, PDO::PARAM_STR);

  $category = 'INSERT INTO a_pour_categorie (idLivre, idCategorie) values (:id1, :id2)';
  $stmt_category = $linker->prepare($category);
  $stmt_category->bindParam(':id1', $id, PDO::PARAM_STR);
  $stmt_category->bindParam(':id2', $categorie, PDO::PARAM_INT);

  $editor = 'INSERT INTO edite_par (idLivre, idEditeur) values (:id1, :id2)';
  $stmt_editor = $linker->prepare($editor);
  $stmt_editor->bindParam(':id1', $id, PDO::PARAM_STR);
  $stmt_editor->bindParam(':id2', $editeur, PDO::PARAM_INT);

  return $stmt_book->execute() && $stmt_category->execute() && $stmt_editor->execute();
}
