<?php
require_once('include/init.inc.php');
//var_dump($_POST); //Connexion à la base
if (isset($_POST["logout"])) {
	session_unset();
	session_destroy();
}

//REDIRECTION
if(!empty($_SESSION['login_user']))
{
  $login_button = '<a href="musicien.php"><button class="create-music button">Créer ma musique</button></a>';
  //Si la session existe, le lien se fait vers la page musicien.

  $join_button = '<a href="musicien.php"><button class="music-space button">Rejoignez-nous</button></a>';
  //Si la session existe, le lien se fait vers la page musicien
}
else
{
	$login_button = '<a href="musicien.php"><button class="create-music button"  id="logUser">Créer ma musique</button></a>';
	//Si la session n'existe pas, on fait apparaitre le formulaire de connexion grâce à l'id logUser, qui déclenche le preventDefault en JS

	 $join_button = '<a href="inscription.php"><button class="music-space button">Rejoignez-nous</button></a>';
  //Si la session existe, le lien se fait vers la page inscription
}

//Gestion des messages
if(isset($_GET))
{
  if(!empty($_GET['msg']) && $_GET['msg'] === 'ok')
  {
    $confirmation = '<div class="confirmOk">
    										<div>Votre message a bien été envoyé !</div>
    								</div>';
  }
  else if(!empty($_GET['msg']) && $_GET['msg'] === 'nok')
  {
    $confirmation = '<div class="confirmNok">
    										<div>Erreur : Votre message n\'a pas pu être envoyé...</div>
    								</div>';
  }
}

//Gestion de la connexion utilisateur
if($_POST)
{
  if(!empty($_POST['login']) && !empty($_POST['password']))
  {
    $check = $pdo->prepare('SELECT * FROM user WHERE pseudo = :login');
    $check->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
    $check->execute();

    $check_user = $check->fetch(PDO::FETCH_ASSOC);

    if($check_user['mdp'] === $_POST['password'])
    {
      $_SESSION['login_user'] = $check_user['pseudo'];
      header('Location:musicien.php');
    }
    else
    {
    $confirmation = '<div class="confirmNok">
    										<div>Erreur : Login ou mot de passe incorrect</div>
    								</div>';
    }
  }
  else if(!isset($_POST["logout"]))
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
<body>
	
	<div id="loginDiv">
		<div id="opacity"></div>
		<div id="login">
			<div class="connexion">
				<div>
					<div class="title-co">Connectez-vous</div>
					<div>
						<div class="connexion-left">
							<form method="post" action="#">
								<div>
									<input type="text" name="login" placeholder="Email ou pseudo" required>
									<input type="password" name="password" placeholder="Mot de passe" required>
								</div>
								<a href="#">Mot de passe oublié ?</a>
								<button class="music-space button" type="submit" name="connexion">Se connecter</button>
							</form>
							<?php if(!empty($confirmation)){echo $confirmation;} ?>
						</div>
						<div class="connexion-right">
							<a href="#"><button>Se connecter avec <i class="ti-facebook"></i></button></a>
							<a href="#"><button>Se connecter avec <i class="fa fa-google"></i></button></a>
							<div>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici !</a></div>
							<div><a href="melomane.php">Continuer sans se connecter</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<header class="home">
		<nav>
			<div><a href="#"><img src="img/logo-musicon-white.png" alt="logo"></a></div>
			<div>
				<div class="header-RS">
					<a href="#"><i class="ti-linkedin"></i></a>
					<a href="#"><i class="ti-facebook"></i></a>
					<a href="#"><i class="ti-instagram"></i></a>
				</div>
				<div>
					<?= $login_button ?>
					<a href="melomane.php"><button class="music-space button">Mon espace musical</button></a>
				</div>
			</div>
		</nav>
		<?php if(!empty($confirmation)){echo $confirmation;} ?>
		<div id="mainTitle">
			<h1>Collaborez, créez et écoutez votre musique en ligne</h1>
		</div>
	</header>
	
	<div class="player">
		<audio src="" controls></audio>
		<div>
			<div class="player-left">
				<a href="#"><img src="img/player-img.png" alt="player-img" class="player-img" /></a>
				<div>
					<div>Nom musicien</div>
					<div>Nom chanson</div>
				</div>
				<div>
					<i class="fa fa-heart"></i>
					<i class="fa fa-plus"></i>
				</div>
			</div>
			<div class="player-middle">
				<div class="progress_value"></div>
				<div></div>
			</div>
			<div class="player-right">
				<div class="controls_btns">
					<button>
						<i class="fa fa-random"></i>
					</button>
					<button class="btn-previous">
						<i class="fa fa-step-backward"></i>
					</button>
					<button class="btn-play">
                        <i class="fa fa-play"></i>
                    </button>
					<button class="btn-pause hidden">
                        <i class="fa fa-pause"></i>
                    </button>
                    <button class="btn-next">
                        <i class="fa fa-step-forward"></i>
                    </button>
					<button class="btn-loop">
						<i  class="fa fa-undo"></i>
					</button>
				</div>
				<div class="button-vol">
					<button class="btn-volum">
						<i class="fa fa-volume-up"></i>
					</button>
					<button class="btn-muted hidden">
						<i class="fa fa-volume-off"></i>
					</button>
				</div>
				<div class="button-pm">
					<button class="btn-plus hidden">
						<i class="fa fa-plus"></i>
					</button>
					<button class="btn-minus hidden">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
		</div>	
	</div>
	
	<main>
		
		<section class="musician content">
			<h2>Découvrez nos musiciens</h2>
			<p>Écoutez les tendances du moment et bien plus encore !</p>
			<div>
				<div class="musician-line">
					<div>
						<figure class="anim-img">
							<img src="img/musician1.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician2.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician3.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician4.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician5.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
				</div>
				<div class="musician-line">
					<div>
						<figure class="anim-img">
							<img src="img/musician6.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician7.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/player-img.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play"><i class="fa fa-play"></i></button>
									<button class="btn-pause hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician9.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician10.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
				</div>
				<div class="musician-line">
					<div>
						<figure class="anim-img">
							<img src="img/musician11.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician12.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician13.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician14.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
					<div>
						<figure class="anim-img">
							<img src="img/musician15.png" alt="sample87"/>
							<figcaption>
								<span>
									<button class="btn-play2"><i class="fa fa-play"></i></button>
									<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
								</span>
								<div class="content-anim">
									<div>
										<div class="name-mus">Nom musicien</div>
										<div>Musique</div>
									</div>
									<div>
										<i class="fa fa-heart"></i>
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</figcaption>
						</figure>
					</div>
				</div>
			</div>
			<div>
				<a href="melomane.php"><button class="music-space button">Plus de musiciens</button></a>
			</div>
		</section>
		
		<section class="discover">
			<div>
				<div>
					<h2>Vous êtes musicien ?</h2>
					<div>His cognitis Gallus ut serpens adpetitus telo vel saxo iamque spes extremas opperiens et succurrens saluti suae quavis ratione colligi omnes iussit armatos et cum starent attoniti,districta dentium acie stridens adeste inquit viri fortes mihi periclitanti vobiscum.</div>
					<a href="musicien.php"><button class="create-music button">Découvrir</button></a>
				</div>
				<div>
					
				</div>
			</div>
		</section>
		
		<section class="check-in">
			<div>
				<h2>Inscrivez-vous</h2>
				<p>Que vous soyez mélomane ou musicien, inscrivez-vous et profitez de toutes nos fonctionnalités</p>
				<?= $join_button ?>
			</div>
		</section>
	
	</main>
	
	<footer>
		<div>
			<img src="img/logo-coupe.png" alt="small-logo">
			<div>
				<div class="contact">
					<div>17 passage des panoramas</div>
					<div>75002 Paris</div>
					<div>06 45 65 45 65</div>
				</div>
				<div class="next-pages">
					<div><a href="#">Qui sommes-nous?</a></div>
					<div><a href="#">Mentions légales</a></div>
					<div><a href="#">CGU</a></div>
				</div>
			</div>
			<div>
				<div><i class="fa fa-copyright"></i> Fait avec <i class="ti-heart"></i> par l'équipe Muzic on</div>
				<div class="footer-RS">
					<a href="#"><i class="ti-linkedin"></i></a>
					<a href="#"><i class="ti-facebook"></i></a>
					<a href="#"><i class="ti-instagram"></i></a>
				</div>
			</div>
		</div>
		<div>
			<form method="post" action="traitements/traitement_messages.php">
				<label>Contactez-nous</label>
				<input id="nom" name="nom" type="text" placeholder="Nom">
				<input id="email" name="email" type="email" placeholder="Email">
				<textarea id="contenu" name="contenu" placeholder="Votre message"></textarea>
				<button type="submit" name="message">Envoyer votre message</button>
			</form>
		</div>
	</footer>
    <script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
    <script src="js/changement_page.js"></script>
</body>
</html>