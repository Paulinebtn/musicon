<?php

require_once('include/init.inc.php'); //Connexion à la base
$req = $pdo->query("SELECT titre, lien, pseudo, avatar, id FROM songs, user WHERE artiste1 = artiste_id AND pseudo ='".$_SESSION['login_user']."'");
$topMusic = $req->fetchAll(PDO::FETCH_ASSOC);
?>
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