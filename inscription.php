<?php

require_once('include/init.inc.php'); //Connexion à la base

//Inscription utilisateur
if($_POST)
{
  if(!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['artiste']))
  {
    $insert = $pdo->prepare('INSERT INTO user(email, pseudo, mdp, artiste) VALUES (:email, :pseudo, :mdp, :artiste)');
    $insert->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $insert->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $insert->bindValue(':mdp', $_POST['password'], PDO::PARAM_STR);
    $insert->bindValue(':artiste', intval($_POST['artiste']), PDO::PARAM_INT);
    $insert->execute();
    
    if($_POST['artiste'] == 1)
    {
      header('location:musicien.php?action=inscriptionOk');
    }
    else
    {
      header('location:melomane.php?action=inscriptionOk');
    } 
    
  }
  else
  {
    $confirmation = '<div class="confirmNok">
                        <div>Erreur : Veuillez remplir tous les champs !</div>
                    </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Muzic On, personnalisez votre musique</title>
	<meta name="description" content="Muzic On page d'accueil">
	
	<!--icones-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/themify-icons.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="img/logo-musicon.png">
	
	<!--forme & responsive-->
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body class="inscription">
  <?php if(!empty($confirmation)){echo $confirmation;} ?>
	<main>
		<div class="title-co">Inscrivez-vous</div>
        <form method="post" action="inscription.php" id="formInscription">
            <input type="text" name="pseudo" placeholder="Pseudo">
            <input type="email" name="email" placeholder="Email" class="margin-insc">
            <input type="password" name="password" placeholder="Mot de passe" class="margin-insc">
            <input type="hidden" name="artiste" id="artiste" value="1">
        </form>
        <div class="inscription-choice">
            <button id="boutonMusicien">
                <div class="circle" id="circle-img1"></div>
                <div>Je suis musicien</div>
            </button>
            <button id="boutonMelomane">
                <div class="circle" id="circle-img2"></div>
                <div>Je suis mélomane</div>
            </button>
        </div>
		<a href="#"><button class="music-space button" id="boutonInscription">S'inscrire</button></a>
	</main>

  <script src="js/jquery.js"></script>
  <script src="js/inscription.js"></script>
</body>
</html>