<?php
    $title = "Liste des collections";
    ob_start();
?>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Collection</th>
        <th>Nom Editeur</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($collections as $collection): ?>
    <tr>
      <td>
        <a href="">
          <?php echo $collection['idCollection']; ?>
        </a>
      </td>
      <td>
        <?php echo $collection['nomCollection']; ?>
      </td>
      <td>
        <?php echo $collection['nomEditeur']; ?>
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
