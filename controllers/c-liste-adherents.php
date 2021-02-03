<?php
require_once "modele.php";

$adherents = get_adherents();

require "templates/t-liste-adherents.php";
