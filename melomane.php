<?php
include("include/init.inc.php");
include("include/functions.inc.php");
$req = $pdo->query("SELECT titre, lien, pseudo, avatar, id FROM songs, user WHERE artiste1 = artiste_id");
$topMusic = $req->fetchAll(PDO::FETCH_ASSOC);
//var_dump($topMusic);

//REDIRECTION
if(!empty($_SESSION['login_user']))
{
  $login_button = '<a href="musicien.php"><button class="create-music button">Créer ma musique</button></a>';
  //Si la session existe, le lien se fait vers la page musicien.
}
else
{
  $login_button = '<a href="musicien.php"><button class="create-music button"  id="logUser">Créer ma musique</button></a>';
  //Si la session n'existe pas, on fait apparaitre le formulaire de connexion grâce à l'id logUser, qui déclenche le preventDefault en JS
}

//Modification compte
if (!empty($_POST["id"])) {
    $update = $pdo->prepare('UPDATE user SET nom = :nom, prenom = :prenom, email = :email, pseudo = :pseudo, mdp = :mdp, artiste = :artiste WHERE artiste_id = :id');
    $update->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $update->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $update->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $update->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $update->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    $update->bindValue(':artiste', intval($_POST['artiste']), PDO::PARAM_INT);
    $update->bindValue(':id', intval($_POST['id']), PDO::PARAM_INT);;
    $update->execute();
}

//Connexion
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

<body class="melomane">

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <aside class="aside-melomane">
        <div>
            <a href="index.php"><img src="img/logo-coupe.png" alt="logo"></a>
        </div>
        <ul>
            <li>
                <a href="#"  id="artiste_all">
                    <img src="img/icon/all-artist.svg" alt="artistes">
                    <span>Tous les artistes</span>
                </a>
            </li>
            <li>
                <a href="#" id="bandes_collab">
                    <img src="img/icon/sound-band.svg" alt="bandes-sons">
                    <span>Bandes sons collaboratives</span>
                </a>
            </li>
            <li>
                <a href="#" id="mes_playlists">
                    <img src="img/icon/playlist.svg" alt="playlists">
                    <span>Mes playlists</span>
                </a>
            </li>
            <li>
                <a href="#" id="mon_compte">
                    <img src="img/icon/user.svg" alt="compte">
                    <span>Mon compte</span>
                </a>
            </li>
        </ul>
    </aside>
    
    <main>
        <!-- search-barre -->
        <div class="head-melomane">
            <div>
                <div>
                    <input id="requete" type="text" placeholder="Rechercher un artiste, un genre, une musique, un instrument…">
                    <i class="ti-search" id="recherche"></i>
                </div>
                <?= $login_button ?>
            </div>
            <div>
                <button class="btn-srti">Sortie</button>
                <button class="btn-genre">Genre</button>
                <button class='btn-top'>Top</button>
                <button class='btn-mood'>Mood</button>
                <button class='btn-instru'>Instru</button>
            </div>
        </div>

        <!-- section tous les artistes -->
        <section class="list-artist">
            <div class="ligne-artiste">
                <h2>Top Muzic On</h2>
                <div class="artists">
                    <?php foreach($topMusic as $data){ ?>
                    <div>
                        <figure class="anim-img">
                            <img src="<?= $data["avatar"]; ?>" alt="sample87"/>
                            <figcaption>
						<span>
							<button class="btn-play2" id="<?= $data["id"]; ?><?= $data["id"]; ?>" onclick="document.getElementById('<?= $data["id"]; ?>').style.display = 'block';
							                                                                            this.style.display = 'none';
							                                                                            current_song = 0; songs[0] = '<?= $data["lien"]; ?>';
							                                                                            player.src = songs[current_song];
							                                                                            play();
                                                                                                        playerupdate('<?= $data["titre"]; ?>','<?= $data["pseudo"]; ?>','<?= $data["avatar"]; ?>')"><i class="fa fa-play"></i></button>
							<button class="btn-pause2 hidden" id="<?= $data["id"]; ?>" onclick="pause();
							                                                                    this.style.display = 'none';
							                                                                    document.getElementById('<?= $data["id"]; ?><?= $data["id"]; ?>').style.display = 'block';"><i class="fa fa-pause"></i></button>
						</span>
                                <div class="content-anim">
                                    <div>
                                        <div class="name-mus"><?= $data["pseudo"]; ?></div>
                                        <div><?= $data["titre"]; ?></div>
                                    </div>
                                    <div>
                                       
                                        <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="ligne-artiste">
                <h2>Sorties de la semaine</h2>
                <div class="artists">
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
                                   
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                        
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                        
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                        
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="ligne-artiste">
                <h2>Meilleures collaborations</h2>
                <div class="artists">
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
							<button class="btn-play2"><i class="fa fa-play"></i></button>
							<button class="btn-pause2 hidden"><i class="fa fa-pause"></i></button>
						</span>
                                <div class="content-anim">
                                    <div>
                                        <div class="name-mus">Nom musicien</div>
                                        <div>Musique</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="ligne-artiste">
                <h2>Meilleures collaborations</h2>
                <div class="artists">
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="ligne-artiste">
                <h2>Meilleures collaborations</h2>
                <div class="artists">
                    <div>
                        <figure class="anim-img">
                            <img src="img/player-img.png" alt="sample87"/>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="ligne-artiste">
                <h2>Meilleures collaborations</h2>
                <div class="artists">
                    <div>
                        <figure class="anim-img">
                            <img src="img/player-img.png" alt="sample87"/>
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
                                       <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="ligne-artiste">
                <h2>Meilleures collaborations</h2>
                <div class="artists">
                    <div><figure class="anim-img">
                            <img src="img/player-img.png" alt="sample87"/>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure></div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="ligne-artiste">
                <h2>Meilleures collaborations</h2>
                <div class="artists">
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div><figure class="anim-img">
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
                                    <i class="fa fa-heart tooltip"><span class="tooltiptext">Ajouter à mes playlists</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure></div>
                </div>
            </div>
        </section>
        <div class="filtre filtre-artist">
            <div class="filtre-sortie">
                <ul>
                    <li>Sortie du jour</li>
                    <li>Sortie de la semaine</li>
                    <li>Sortie du mois</li>
                    <li>Sortie de l'année 2017</li>
                </ul>
            </div>
            <div class="filtre-genre">
               <div>
                    <div>
                        <input type="checkbox">
                        <label>Pop</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Rock</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Hip-hop</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Rap</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Variété</label>
                    </div>
               </div>
               <div>
                    <div>
                        <input type="checkbox">
                        <label>Techno</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>RnB</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Jazz</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Latino</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Electro</label>
                    </div>
               </div>
               <div>
                    <div>
                        <input type="checkbox">
                        <label>Classique</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Soul</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Reggae</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Country</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Accoustique</label>
                    </div>
               </div>
            </div>
            <div class="filtre-top">
                <ul>
                    <li>Les plus aimées</li>
                    <li>Les plus écoutées</li>
                    <li>Les meilleures collaborations</li>
                    <li>Top artistes muzic on</li>
                </ul>
            </div>
            <div class="filtre-mood">
                <div>
                    <div>
                        <input type="checkbox">
                        <label>Douceur</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Chill</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Fête</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Motivation</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Romantique</label>
                    </div>
               </div>
               <div>
                    <div>
                        <input type="checkbox">
                        <label>Mélancolie</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Concentration</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Sunny</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Aphrodite</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Dreamy</label>
                    </div>
               </div>
            </div>
            <div class="filtre-instru">
                <div>
                    <div>
                        <input type="checkbox">
                        <label>Piano</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Batterie</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Guitare accoustique</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Saxophone</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Basse</label>
                    </div>
               </div>
               <div>
                    <div>
                        <input type="checkbox">
                        <label>Trompette</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Violon</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Clavier midi</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Flûte</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Ukulélé</label>
                    </div>
               </div>
               <div>
                    <div>
                        <input type="checkbox">
                        <label>Guitare éléctrique</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Congas</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Accordéon</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Kazoo</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label>Acapela</label>
                    </div>
               </div>
            </div>
        </div>

    </main>

    <div class="player2 player2bis">
		<audio src="" controls></audio>
		<div>
			<div class="player-left">
				<a href="#"><img src="img/player-img.png" alt="player-img" class="player-img" id="player_img"/></a>
				<div>
					<div id="player_musicien">Nom musicien</div>
					<div id="player_musique">Nom chanson</div>
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
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/changement_page.js"></script>
    
</body>
</html>