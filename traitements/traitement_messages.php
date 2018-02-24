<?php

require_once('../include/init.inc.php'); //Connexion à la base

if(isset($_POST['message']))
{
  if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['contenu']))
  {
    ini_set('display_errors', 1);
    $insert = $pdo->prepare('INSERT INTO muzicon_messages(nom_message, email_message, contenu_message, date_message) VALUES (:nom, :email, :contenu, NOW() )');
    $insert->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $insert->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $insert->bindValue(':contenu', $_POST['contenu'], PDO::PARAM_STR);
    $insert->execute();

    header('Location:../index.php?msg=ok');
  }
  else
  {
    header('Location:../index.php?msg=nok');
  }
}
else
{
  var_dump($_POST);
}