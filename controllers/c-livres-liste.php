<?php
require_once "modele.php";

$livres = get_livres();

$breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
1 => Array("link" => "index.php?id=liste-livres", "page" => "Livres"));

require "templates/t-liste-livres.php";
