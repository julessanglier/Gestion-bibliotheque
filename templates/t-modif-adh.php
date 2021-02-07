<?php
    $title = "Modification d'un adhérent";
    ob_start();
?>

<h2>Modification d'un adhérent</h2>

<form class="row g-3" action="controllers/c-modif-adherent.php" method="POST">
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">#</label>
    <input type="email" class="form-control" id="inputId" name="idAdh" value="<?php echo $adherent['idAdh'] ?>" readonly="readonly">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputMail" name="mailAdh" value="<?php echo $adherent['mailAdh'] ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nom</label>
    <input type="text" class="form-control" id="inputNom" name="nomAdh" value="<?php echo $adherent['nomAdh'] ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="inputPrenom" name="prenomAdh" value="<?php echo $adherent['prenomAdh'] ?>">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="inputAddress" name="rueAdh" placeholder="1234 Main St" value="<?php echo $adherent['rueAdh'] ?>">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Ville</label>
    <input type="text" class="form-control" id="inputCity" name="villeAdh" value="<?php echo $adherent['villeAdh'] ?>">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">CP</label>
    <input type="text" class="form-control" id="inputZip" name="cpAdh" value="<?php echo $adherent['cpAdh'] ?>">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
  </div>
</form>

<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
