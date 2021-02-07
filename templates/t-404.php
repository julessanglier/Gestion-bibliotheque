<?php
    $title = "Erreur";
    ob_start();
?>

<div class="alert alert-danger">
  <strong>Erreur 404.</strong> Mauvais identifiant de requête.
</div>
<button type="button" onclick="window.location.href='index.php'" class="btn btn-primary">Retourner à l'accueil</button>

<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
