<?php
    $title = "Liste des livres";
    ob_start();
?>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Reference</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Collection</th>
        <th>Editeur</th>
        <th>Emprunté</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($livres as $livre): ?>
    <tr>
      <td>
        <a href="modif_livre.php?id=">
          <?php echo $livre['idLivre']; ?>
        </a>
      </td>
      <td>
        <?php echo $livre['titreLivre']; ?>
      </td>
      <td>
        <?php echo $livre['nomAuteur']; ?>
      </td>
      <td>
        <?php echo $livre['nomCollection']; ?>
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
