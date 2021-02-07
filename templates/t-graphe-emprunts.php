<?php
    $title = "Dashboard - Bibliothèque d'Orléans";
    ob_start();
?>

<div class="row">
  <div class="col-sm-6">
    <div class="card" style="margin-bottom: 10px;">
      <div class="card-body">
        <h5 class="card-title">Nombres de livres enregistrés</h5>
        <p class="card-text"><?php echo $books->nbLivres ?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="margin-bottom: 10px;">
      <div class="card-body">
        <h5 class="card-title">Nombre de livres empruntés en ce moment</h5>
        <p class="card-text"><?php echo $books_reserved->nbEmprunts ?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="margin-bottom: 10px;">
      <div class="card-body">
        <h5 class="card-title">Nombre d'adhérents à la Bibliothèque</h5>
        <p class="card-text"><?php echo $adherents->nbAdh ?></p>
      </div>
    </div>
  </div>
</div>


<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
