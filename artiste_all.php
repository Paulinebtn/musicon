<!-- search-barre -->
<?php
include("include/init.inc.php");
include("include/functions.inc.php");
$req = $pdo->query("SELECT titre, lien, pseudo, avatar, id FROM songs, user WHERE artiste1 = artiste_id");
$topMusic = $req->fetchAll(PDO::FETCH_ASSOC);

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
?>
<div class="head-melomane">
    <div>
        <div>
            <input id="requete" type="text" placeholder="Rechercher un artiste, un genre, une musique, un instrument…">
            <i class="ti-search" id="recherche"></i>
        </div>
        <?= $login_button; ?>
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