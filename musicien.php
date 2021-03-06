<?php
require_once('include/init.inc.php'); //Connexion à la base

if(!isset($_SESSION['login_user']))
{
  header('Location:inscription.php?action=notmusician');
}
echo "<input type='hidden' value='". $_SESSION["login_user"] ."' id='pls'>";

$req = $pdo->query("SELECT titre, lien, pseudo, avatar, id FROM songs, user WHERE artiste1 = artiste_id AND pseudo ='".$_SESSION['login_user']."'");
$topMusic = $req->fetchAll(PDO::FETCH_ASSOC);
//var_dump($topMusic);
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
    <aside class="aside-melomane aside-mus">
        <div>
            <a href="index.php"><img src="img/logo-coupe.png" alt="logo"></a>
        </div>
        <ul>
            <li>
                <a href="#" id="mes_creations">
                    <img src="img/icon/crea.svg" alt="bandes-sons">
                    <span>Mes créations</span>
                </a>
            </li>
            <li>
                <a href="#" id="outil_creation">
                    <img src="img/icon/levels.svg" alt="playlists">
                    <span>Outil de création</span>
                </a>
            </li>
            <li>
                <a href="#" id="messagerie">
                    <img src="img/icon/message.svg" alt="compte">
                    <span>Messagerie</span>
                </a>
            </li>
            <li>
                <a href="#" id="mon_compte">
                    <img src="img/icon/user2.svg" alt="compte">
                    <span>Mon compte</span>
                </a>
            </li>
        </ul>
    </aside>
    
    <main>
        <div class="head-melomane">
            <div>
                <div>
                    <input type="text" placeholder="Rechercher un artiste, un genre, une musique, un instrument…">
                    <i class="ti-search"></i>
                </div>
                <a href="melomane.php"><button class="music-space button">Écouter de la musique</button></a>
            </div>
            <div>
                <button class="btnfiltre btn-srti">Sortie</button>
                <button class="btnfiltre btn-genre">Genre</button>
                <button class="btnfiltre btn-top">Top</button>
                <button class="btnfiltre btn-mood">Mood</button>
                <button class="btnfiltre btn-instru">Instru</button>
            </div>
        </div>
        <section class="playlist my-crea">
            <div class="ligne-artiste">
                <h2>Mes créations</h2>
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

                                            <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    <?php } ?>
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
                                        <div class="name-mus">Nom création</div>
                                        <div>6 collaborateurs</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
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
                                        <div class="name-mus">Nom création</div>
                                        <div>1 collaborateur</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
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
                                        <div class="name-mus">Nom création</div>
                                        <div>4 collaborateurs</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
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
                                        <div class="name-mus">Nom création</div>
                                        <div>5 collaborateurs</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
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
                                        <div class="name-mus">Nom création</div>
                                        <div>1 collaborateur</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
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
                                        <div class="name-mus">Nom création</div>
                                        <div>2 collaborateurs</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
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
                                        <div class="name-mus">Nom création</div>
                                        <div>3 collaborateurs</div>
                                    </div>
                                    <div>
                                    <i class="fa fa-trash tooltip"><span class="tooltiptext">Effacer ma créa</span></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <div class="filtre">
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
    
    <div class="player2">
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