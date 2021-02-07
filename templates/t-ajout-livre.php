<?php
    $title = "Ajout d'un nouveau livre ...";
    ob_start();
?>

<h3>Ajout d'un nouveau livre ...</h3>

<form method="post" action="controllers/c-ajout-livre.php">
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">#</span>
      <input type="text" class="form-control" name="idLivre" value="ALEA" aria-label="ALEA" aria-describedby="basic-addon1" readonly="readonly">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">Titre</span>
      <input type="text" name="titreLivre" placeholder="Un chouette nom" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="">
    </div>

    <div class="input-group mb-3">
      <select class="form-select" id="inputGroupSelect02" name="category">
        <?php foreach($categories as $categorie): ?>
          <option value="<?php echo $categorie['idCategorie']?>"><?php echo $categorie['nomCategorie'] ?></option>
        <?php endforeach; ?>
      </select>
      <label class="input-group-text" for="inputGroupSelect02">Catégorie</label>
    </div>

    <div class="input-group mb-3">
      <select class="form-select" id="inputGroupSelect02" name="editor">
        <?php foreach($editeurs as $editeur): ?>
          <option value="<?php echo $editeur['idEditeur']?>"><?php echo $editeur['nomEditeur'] ?></option>
        <?php endforeach; ?>
      </select>
      <label class="input-group-text" for="inputGroupSelect02">Éditeur</label>
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon2">Auteur(s)</span>
      <ul class="list-group" style="max-height: 30vh; overflow: scroll;">
        <?php foreach($auteurs as $auteur): ?>
          <li class="list-group-item">
            <input class="form-check-input me-1" name="auteurs-<?php echo $auteur['idAuteur']?>" type="checkbox" aria-label="...">
            <?php echo $auteur['nomAuteur']. ' ' . $auteur['prenomAuteur']; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-success">Ajouter</button>
    </div>
  </form>

<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
