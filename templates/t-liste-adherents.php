<?php
    $title = "Liste des adhérents";
    ob_start();
?>
<button type="button" class="btn btn-info" onclick="window.location.href = 'index.php?id=ajout-adherent'">Ajouter manuellement un adhérent</a></button>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Mail</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($adherents as $adherent): ?>
    <tr>
      <td>
        <a href="index.php?id=modif-adherent&idadh=<?php echo $adherent['idAdh']?>">
          <?php echo $adherent['idAdh']; ?>
        </a>
      </td>
      <td>
        <?php echo $adherent['nomAdh']; ?>
      </td>
      <td>
        <?php echo $adherent['prenomAdh']; ?>
      </td>
      <td>
        <?php echo $adherent['mailAdh']; ?>
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
