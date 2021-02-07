<?php

require_once __DIR__ . '/../modele.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idLivre = $_GET['idlivre'];
    $idAdh = $_GET['idadh'];

    revoke_reservation($idLivre, $idAdh);

    //header('Location: index.php?id=liste-emprunts');
}
