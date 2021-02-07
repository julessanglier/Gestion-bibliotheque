<?php
    $title = "Dashboard - Bibliothèque d'Orléans";
    ob_start();
?>

<canvas class="my-4 m-100" id="myChart" width="900" height="380"></canvas>

<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
