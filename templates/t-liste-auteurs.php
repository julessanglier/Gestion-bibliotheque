<?php
    $title = "Liste des auteurs";
    ob_start();
?>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Prénom</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($auteurs as $auteur): ?>
    <tr>
      <td>
        <a href="">
          <?php echo $auteur['idAuteur']; ?>
        </a>
      </td>
      <td>
        <?php echo $auteur['nomAuteur']; ?>
      </td>
      <td>
        <?php echo $auteur['prenomAuteur']; ?>
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
