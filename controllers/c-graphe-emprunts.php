<?php

$books = get_nb_livres();
$books_reserved = get_nb_livres_reserves();
$adherents = get_nb_adherents();
$breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"));

require 'templates/t-graphe-emprunts.php';
