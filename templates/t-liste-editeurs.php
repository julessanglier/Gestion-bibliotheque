<?php
    $title = "Liste des editeurs";
    ob_start();
?>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom Editeur</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($editeurs as $editeur): ?>
    <tr>
      <td>
        <a href="">
          <?php echo $editeur['idEditeur']; ?>
        </a>
      </td>
      <td>
        <?php echo $editeur['nomEditeur']; ?>
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
