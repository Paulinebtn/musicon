<?php
include("include/init.inc.php");
include("include/functions.inc.php");
$query = "SELECT titre, lien, pseudo, avatar, id FROM songs, user WHERE artiste1 = artiste_id AND titre ='". addslashes($_POST['requete'])."'";
//echo $query;
$req = $pdo->query($query);
$topMusic = $req->fetchAll(PDO::FETCH_ASSOC);
//var_dump($topMusic);
?>

<div class="head-melomane">
    <div>
        <div>
            <input id="requete" type="text" placeholder="Rechercher un artiste, un genre, une musique, un instrument…">
            <i class="ti-search" id="recherche"></i>
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

<section class="playlist my-crea">
    <div class="ligne-artiste">
        <h2>Résultat(s)</h2>
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
</section>