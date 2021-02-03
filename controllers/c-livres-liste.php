<?php
require_once "modele.php";

$livres = get_livres();

require "templates/t-liste-livres.php";
