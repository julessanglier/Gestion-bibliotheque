<?php
    $title = "Liste des emprunts";
    ob_start();
?>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Réf. Livre</th>
        <th>Id Adhérent</th>
        <th>Titre Livre</th>
        <th>Date début</th>
        <th>Date fin</th>
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
        <a href="">
          <?php echo $livre['idAdh']; ?>
        </a>
      </td>
      <td>
        <?php echo $livre['titreLivre']; ?>
      </td>
      <td>
        <?php echo $livre['dateDebut']; ?>
      </td>
      <td>
        <?php echo $livre['dateFin']; ?>
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
