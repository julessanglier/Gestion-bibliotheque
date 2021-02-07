<?php
require_once "connect.php";

function get_livre_by_id($id){
  $linker = connect();
  $sql = 'SELECT idLivre, titreLivre, nomEditeur, idCategorie, nomCategorie, idEditeur FROM livre natural join edite_par natural join editeur natural join a_pour_categorie natural join categorie where idLivre = :id';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->execute();

  $livre = $stmt->fetchAll();
  return $livre[0];
}

function remove_livre_by_id($id){
  $linker = connect();
  $sql = 'DELETE FROM livre where idLivre = :id;';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->execute();
}


function get_livres(){
  $linker = connect();
  $sql = 'SELECT idLivre, titreLivre, nomEditeur, nomCategorie, (idLivre  in (select idLivre from emprunts e where dateFin > CURRENT_DATE and e.idLivre = idLivre)) as emprunte FROM livre natural join edite_par natural join editeur natural join a_pour_categorie natural join categorie
';

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

    return $stmt->fetchAll();
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

function get_editeurs(){
  $linker = connect();
  $sql = 'SELECT idEditeur, nomEditeur from editeur';
  $stmt = $linker->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll();
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

function get_nb_livres(){
  $linker = connect();
  $sql = 'SELECT count(idLivre) as nbLivres from livre';
  $stmt = $linker->prepare($sql);
  $stmt->execute();
  return $stmt->fetchObject();
}

function get_nb_livres_reserves(){
  $linker = connect();
  $sql = 'SELECT count(idLivre) as nbEmprunts from emprunts where dateFin > CURRENT_DATE';
  $stmt = $linker->prepare($sql);
  $stmt->execute();
  return $stmt->fetchObject();
}

function get_nb_adherents(){
  $linker = connect();
  $sql = 'SELECT count(idAdh) as nbAdh from adherent';
  $stmt = $linker->prepare($sql);
  $stmt->execute();
  return $stmt->fetchObject();
}

function livre($id){
  $linker = connect();
  $sql = 'SELECT idLivre from livre l where exists (select idLivre from emprunts ewhere dateFin > CURRENT_DATE and e.idLivre = l.idLivre)';

}

function check_if_reserved($id){
  $linker = connect();
  $sql = 'SELECT idLivre from emprunts e where dateFin > CURRENT_DATE and idLivre = :id';
}

function revoke_reservation($idlivre, $idadh){
  $linker = connect();
  $sql = 'DELETE from emprunts where idLivre = :id1 and idAdh = :id2';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':id1', $idlivre, PDO::PARAM_STR);
  $stmt->bindParam(':id2', $idadh, PDO::PARAM_INT);
  var_dump($idlivre);
  var_dump($idadh);
  $stmt->execute();
  echo $stmt->errorCode();
}

function ajout_adherent($nom, $prenom, $rue, $ville, $cp, $mail){
  $linker = connect();

  $sql = 'INSERT INTO adherent (mailAdh, nomAdh, prenomAdh, rueAdh, villeAdh, cpAdh) values(:mail, :nom, :prenom, :rue, :ville, :cp)';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
  $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
  $stmt->bindParam(':rue', $rue, PDO::PARAM_STR);
  $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
  $stmt->bindParam(':cp', $cp, PDO::PARAM_INT);

  return $stmt->execute();
}

function get_adherent_by_id($id){
  $linker = connect();
  $sql = 'SELECT * from adherent where idAdh = :id';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll()[0];
}

function maj_adherent($id, $mail, $nom, $prenom, $rue, $ville, $cp){
  $linker = connect();

  $sql = 'UPDATE adherent SET mailAdh = :mail, nomAdh = :nom, prenomAdh = :prenom, rueAdh = :rue, villeAdh = :ville, cpAdh = :cp where idAdh = :id';
  $stmt = $linker->prepare($sql);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
  $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
  $stmt->bindParam(':rue', $rue, PDO::PARAM_STR);
  $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
  $stmt->bindParam(':cp', $cp, PDO::PARAM_INT);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  return $stmt->execute();
}

function majLivre($id, $titre, $categorie, $editeur, $auteurs){
  $linker = connect();
  $sql = 'UPDATE livre set titreLivre = :titre where idLivre = :id';
  $stmt_book = $linker->prepare($sql);

  $stmt_book->bindParam(':titre', $titre, PDO::PARAM_STR);
  $stmt_book->bindParam(':id', $id, PDO::PARAM_STR);

  $update_category = 'UPDATE a_pour_categorie set idCategorie = :categorie where idLivre = :id';
  $stmt_category = $linker->prepare($update_category);
  $stmt_category->bindParam(':categorie', $categorie, PDO::PARAM_INT);
  $stmt_category->bindParam(':id', $id, PDO::PARAM_STR);

  $update_publisher = 'UPDATE edite_par set idEditeur = :editeur where idLivre = :id';
  $stmt_publisher = $linker->prepare($update_publisher);
  $stmt_publisher->bindParam(':editeur', $editeur, PDO::PARAM_INT);
  $stmt_publisher->bindParam(':id', $id, PDO::PARAM_STR);

  $auteurs_avant_update_temp = get_authors_by_livre_id($id);
  $auteurs_avant_update = Array();
  foreach ($auteurs_avant_update_temp as $auteur){
    array_push($auteurs_avant_update, $auteur['idAuteur']);
  }

  $stmt_auteur1 = null;
  $stmt_auteur2 = null;

  foreach ($auteurs as $auteurId){
    if (in_array($auteurId, $auteurs) && !in_array($auteurId, $auteurs_avant_update)){ //ajout
      $ajout_auteur = 'INSERT INTO ecrit_par (idLivre, idAuteur) values (:id1, :id2)';
      $stmt_auteur1 = $linker->prepare($ajout_auteur);
      $stmt_auteur1->bindParam(':id1', $id, PDO::PARAM_STR);
      $stmt_auteur1->bindParam(':id2', $auteurId, PDO::PARAM_INT);
    }
    if (in_array($auteurId, $auteurs_avant_update) && !in_array($auteurId, $auteurs)){ //suppression
      $suppression_auteur = 'DELETE from ecrit_par where idLivre = :id1 and idAuteur = :id2';
      $stmt_auteur2 = $linker->prepare($suppression_auteur);
      $stmt_auteur2->bindParam(':id1', $id, PDO::PARAM_STR);
      $stmt_auteur2->bindParam(':id2', $auteurId, PDO::PARAM_INT);
    }
  }

  if ($stmt_auteur1 != null && $stmt_auteur2 == null){
    return $stmt_book->execute() && $stmt_category->execute() && $stmt_auteur1->execute() && $stmt_publisher->execute();
  }

  if ($stmt_auteur1 == null && $stmt_auteur2 != null){
    return $stmt_book->execute() && $stmt_category->execute() && $stmt_auteur2->execute() && $stmt_publisher->execute();
  }

  if ($stmt_auteur1 != null && $stmt_auteur2 != null){
    return $stmt_book->execute() && $stmt_category->execute() && $stmt_auteur1->execute() && $stmt_auteur2->execute() && $stmt_publisher->execute();
  }

  return $stmt_book->execute() && $stmt_category->execute() && $stmt_publisher->execute();
}

function ajoutLivre($titre, $categorie, $editeur, $auteurs){
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

  $stmt_auteur1 = null;
  foreach ($auteurs as $auteurId){
      $ajout_auteur = 'INSERT INTO ecrit_par (idLivre, idAuteur) values (:id1, :id2)';
      $stmt_auteur1 = $linker->prepare($ajout_auteur);
      $stmt_auteur1->bindParam(':id1', $id, PDO::PARAM_STR);
      $stmt_auteur1->bindParam(':id2', $auteurId, PDO::PARAM_INT);
  }

  return $stmt_book->execute() && $stmt_category->execute() && $stmt_editor->execute() && $stmt_auteur1->execute();
}

function login($mail, $password){
  $logged = false;
  $linker = connect();
  $sql = 'SELECT userId from user where mail = :mail and pass = :pass';
  $stmt = $linker->prepare($sql);
  $hashed_pass = md5($password);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->bindParam(':pass', $hashed_pass, PDO::PARAM_STR);

  $stmt->execute();
  if ($stmt->rowCount() != 0){
    $user = $stmt->fetchObject();
    $_SESSION['userId'] = $user->userId;
    echo 'ok';
    return true;
  }
  echo 'pas ok';
  return $logged;
}
