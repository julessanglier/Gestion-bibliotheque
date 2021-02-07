<?php
require_once "modele.php";

$editeurs = get_editeurs();

$breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
1 => Array("link" => "index.php?id=liste-editeurs", "page" => "Éditeurs"));

require "templates/t-liste-editeurs.php";
