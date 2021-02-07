<?php
    $title = "Liste des livres";
    ob_start();
?>
<div class="table-responsive">
  <button type="button" class="btn btn-info" onclick="window.location.href = 'index.php?id=ajout-livre'">Ajouter un livre</a></button>
  <button type="button" class="btn btn-info">Trier</button>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Reference</th>
        <th>Titre</th>
        <th>Auteur(s)</th>
        <th>Catégorie</th>
        <th>Editeur</th>
        <th>Emprunté</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($livres as $livre): ?>
    <tr>
      <td>
        <a href="index.php?id=modif-livre&lid= <?php echo $livre['idLivre'] ?>">
          <?php echo $livre['idLivre']; ?>
        </a>
      </td>
      <td>
        <?php echo $livre['titreLivre']; ?>
      </td>
      <td>
        <?php
        $auteurs = '';
        $i = 0;
        for ($i = 0; $i < sizeof($livre['auteursLivre']); $i++){
            $auteurs .= $livre['auteursLivre'][$i]['nomAuteur'] . " " . $livre['auteursLivre'][$i]['prenomAuteur'] . ($i === (sizeof($livre['auteursLivre'])-1) ? "" : ", ");
        }
        echo $auteurs;
        ?>
      </td>
      <td>
        <?php echo $livre['nomCategorie']; ?>
      </td>
      <td>
        <?php echo $livre['nomEditeur']; ?>
      </td>
      <td>
        Oui
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
