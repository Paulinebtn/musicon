<?php
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
        <button class="btn-srti">Sortie</button>
        <button class="btn-genre">Genre</button>
        <button class="btn-top">Top</button>
        <button class="btn-mood">Mood</button>
        <button class="btn-instru">Instru</button>
    </div>
</div>

<!-- Section 3 : mes playlists-->
<section class="playlist">
    <div class="list-sons">
        <h2>Playlist 1</h2>
        <div id="first-div">
            <div>Titres</div>
            <div>Auteurs</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div>
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <div id="last-div">
            <div>Titre</div>
            <div>Auteur</div>
            <div>
                <i class="fa fa-play"></i>
                <i class="fa fa-trash"></i>
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