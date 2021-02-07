<?php
    $title = "Modification du livre " .$livre_id;
    ob_start();
?>

<h2>Blahblahblah</h2>

<form method="post" action="controllers/c-modif-livre.php" id="modify-form">
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">#</span>
      <input type="text" class="form-control" name="idLivre" value="<?php echo $livre_id ?>" aria-label="<?php echo $livre_id ?>" aria-describedby="basic-addon1" readonly="readonly">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">Titre</span>
      <input type="text" name="titreLivre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $livre['titreLivre'] ?>">
    </div>

    <div class="input-group mb-3">
    <select class="form-select" id="inputGroupSelect02" name="category">
      <?php foreach($categories as $categorie): ?>
        <?php if ($categorie['idCategorie'] != $livre['idCategorie']): ?>
        <option value="<?php echo $categorie['idCategorie']?>"><?php echo $categorie['nomCategorie'] ?></option>
        <?php else: ?>
        <option value="<?php echo $categorie['idCategorie']?>" selected><?php echo $categorie['nomCategorie'] ?></option>
      <?php endif; ?>
      <?php endforeach; ?>
    </select>
    <label class="input-group-text" for="inputGroupSelect02">Catégorie</label>
  </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Sauvegarder</button>
      <button type="submit" name="delete" class="btn btn-danger">Supprimer le livre</button>
    </div>
  </form>

<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
