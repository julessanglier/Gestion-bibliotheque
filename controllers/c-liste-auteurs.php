<?php
require_once "modele.php";

$auteurs = get_auteurs();

$breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
1 => Array("link" => "index.php?id=liste-auteurs", "page" => "Auteurs"));

require "templates/t-liste-auteurs.php";
