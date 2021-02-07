<?php
require_once "modele.php";

$adherents = get_adherents();

$breadcrumbs = Array(0 => Array("link" => "index.php", "page" => "Dashboard"),
1 => Array("link" => "index.php?id=liste-adherents", "page" => "Adhérents"));

require "templates/t-liste-adherents.php";
