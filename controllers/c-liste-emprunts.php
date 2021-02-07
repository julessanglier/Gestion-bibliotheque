<?php
require_once "modele.php";

$livres = get_emprunts();

$breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
1 => Array("link" => "index.php?id=liste-emprunts", "page" => "Emprunts"));

require "templates/t-liste-emprunts.php";
