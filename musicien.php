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
                <a href="#">
                    <img src="icon/music-player.svg" alt="bandes-sons">
                    <span>Mes créations</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="icon/music-player.svg" alt="playlists">
                    <span>Outil de création</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="icon/music-player.svg" alt="compte">
                    <span>Messagerie</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="icon/music-player.svg" alt="compte">
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
                <button>Sortie</button>
                <button>Genre</button>
                <button>Top</button>
                <button>Mood</button>
                <button>Instru</button>
            </div>
        </div>
        <section>
            <div>salut</div>
        </section>
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