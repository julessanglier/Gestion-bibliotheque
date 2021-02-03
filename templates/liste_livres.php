<?php
    $title = "Liste de mes Amis";
    ob_start();
?>
    <ul>
        <?php foreach ($amis as $ami): ?>
        <li>
            <?php echo $ami['ID'] .' '. $ami['PRENOM'].' '.$ami['NOM'] ?>
        </a>
        </li>
        <?php endforeach; ?>
    </ul>
<?php
    // On récupère le contenu du buffer et on vide le buffer
    $content = ob_get_clean();
    include("baseLayout.php");
?>
