<?php
    $title = "Modification du livre " .$livre_id;
    ob_start();
?>

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

  <div class="input-group mb-3">
    <select class="form-select" id="inputGroupSelect02" name="editor">
      <?php foreach($editeurs as $editeur): ?>
        <?php if ($editeur['idEditeur'] == $livre['idEditeur']):?>
          <option value="<?php echo $editeur['idEditeur']?>" selected><?php echo $editeur['nomEditeur'] ?></option>
        <?php else: ?>
            <option value="<?php echo $editeur['idEditeur']?>"><?php echo $editeur['nomEditeur'] ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
    <label class="input-group-text" for="inputGroupSelect02">Éditeur</label>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon2">Auteur(s)</span>
    <ul class="list-group" style="max-height: 30vh; overflow: scroll;">
      <?php foreach($auteurs as $auteur): ?>
        <?php

        ?>
        <li class="list-group-item">
          <?php if (in_array($auteur['idAuteur'], $auteurs_livre)): ?>
          <input class="form-check-input me-1" name="auteurs-<?php echo $auteur['idAuteur']?>" type="checkbox" aria-label="..." checked>
          <?php else: ?>
          <input class="form-check-input me-1" name="auteurs-<?php echo $auteur['idAuteur']?>" type="checkbox" aria-label="...">
          <?php endif; ?>
          <?php echo $auteur['nomAuteur']. ' ' . $auteur['prenomAuteur']; ?>
        </li>
      <?php endforeach; ?>
    </ul>
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
