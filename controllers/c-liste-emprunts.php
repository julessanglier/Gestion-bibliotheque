<?php
require_once "modele.php";

$livres = get_emprunts();

require "templates/t-liste-emprunts.php";
