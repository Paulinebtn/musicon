<?php
include("include/init.inc.php");
include("include/functions.inc.php");
$req = $pdo->query("SELECT titre, lien, pseudo, avatar, id FROM songs, user WHERE artiste1 = artiste_id");
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
                    <input type="text" placeholder="Rechercher un artiste, un genre, une musique, un instrument…">
                    <i class="ti-search"></i>
                </div>
                <a href="musicien.php"><button class="create-music button">Créer ma musique</button></a>
            </div>
            <div>
                <button>Sortie</button>
                <button>Genre</button>
                <button>Top</button>
                <button>Mood</button>
                <button>Instru</button>
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
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-plus"></i>
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
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-plus"></i>
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
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-plus"></i>
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
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure></div>
                </div>
            </div>
        </section>
    </main>

    <div class="player2">
		<audio src="" controls></audio>
		<div>
			<div class="player-left">
				<a href="#"><img src="img/player-img.png" alt="player-img" class="player-img" id="player_img"/></a>
				<div>
					<div id="player_musicien">Nom musicien</div>
					<div id="player_musique ">Nom chanson</div>
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