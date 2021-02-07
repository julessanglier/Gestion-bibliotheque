<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  require '../modele.php';

  session_start();
  $mail = $_POST['mail'];
  $password = $_POST['password'];

  if (!login($mail, $password))
    header('Location: /gestion_bibliotheque/index.php?id=login&error');
  else
    header('Location: /gestion_bibliotheque/');

}else{
    require 'templates/t-login.php';
}
