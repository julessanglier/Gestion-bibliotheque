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
        <th>Révoquer emprunt ?</th>
        <th>Envoyer rappel ?</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($livres as $livre): ?>
    <tr>
      <td>
        <?php echo $livre['idLivre']; ?>
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
      <td>
        <button type="button" class="btn btn-danger" onclick="window.location.href = 'index.php?id=revoquer-emprunt&idlivre=<?php echo $livre['idLivre']?>&idadh=<?php echo $livre['idAdh']?>'">Révoquer</button>
      </td>
      <td>
        <button type="button" class="btn btn-warning" onclick="alert('Envoie d'un mail en cours ...');">Envoyer</button>
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
