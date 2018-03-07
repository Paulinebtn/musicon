<?php
include("include/init.inc.php");
include("include/functions.inc.php");
$query = "SELECT titre, lien, pseudo, avatar, id FROM songs, user WHERE artiste1 = artiste_id AND titre ='". $_POST['requete']."'";
echo $query;
$req = $pdo->query($query);
$topMusic = $req->fetchAll(PDO::FETCH_ASSOC);
var_dump($topMusic);
?>

<div class="head-melomane">
    <div>
        <div>
            <input type="text" placeholder="Rechercher un artiste, un genre, une musique, un instrument…">
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
        <h2>Mes créations</h2>
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
                                <div class="name-mus">Nom création</div>
                                <div>4 collaborateurs</div>
                            </div>
                            <div>
                                <i class="fa fa-trash"></i>
                                <i class="fa fa-plus"></i>
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>