<?php
require_once "modele.php";

$editeurs = get_editeurs();

require "templates/t-liste-editeurs.php";
