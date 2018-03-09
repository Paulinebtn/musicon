<!-- Section 4 : mon compte -->
<?php
require_once('include/init.inc.php');
if (!empty($_SESSION["login_user"])){
    $req = $pdo->query("SELECT * FROM user WHERE pseudo = '".$_SESSION["login_user"]."'");
    $info = $req->fetchAll(PDO::FETCH_ASSOC);
}

?>
<link rel="stylesheet" type="text/css" href="css/custom-bootstrap.css" />
<section class="account" style="text-align: center">
	<div>
		<h2>Mon compte</h2>
	</div>
  <?php
    if (isset($_SESSION["login_user"])){
  ?>
        <img src="<?= $info[0]["avatar"] ?>" width="200px" height="200px" style="border-radius: 50%;">
        <form action="melomane.php" method="post" style="">
            <input type="hidden" name="id" value="<?= $info[0]["artiste_id"]; ?>">

                <label for="nom">Nom :</label>
                <input class="form-control" type="text" name="nom" value="<?= $info[0]["nom"]; ?>"><br>



            <label for="nom">Prénom :</label>
            <input type="text" class="form-control" name="prenom" value="<?= $info[0]["prenom"]; ?>"><br>

            <label for="nom">Email :</label>
            <input type="email" class="form-control" name="email" value="<?= $info[0]["email"]; ?>"><br>

            <label for="nom">Pseudo :</label>
            <input type="text" class="form-control" name="pseudo" value="<?= $info[0]["pseudo"]; ?>"><br>

            <label for="nom">Mot de passe :</label>
            <input type="text" class="form-control" name="mdp" value="<?= $info[0]["mdp"]; ?>"><br>

            <label for="artiste">Catégorie :</label>
            <?php
                if ($info[0]["artiste"] == 2) {
                    ?>
                    <select name="artiste">
                        <option value="2" selected>Mélomane</option>
                        <option value="1">Musicien</option>
                    </select>
            <?php
                } else {
            ?>
            <select name="artiste">
                <option value="2" selected>Mélomane</option>
                <option value="1">Musicien</option>
            </select>
            <?php } ?>
            <br><input type="submit" value="Enregistrer les modifications" class="btn btn-primary" style="margin-bottom: 20px;">
        </form>
  <form action="index.php" method="post">
    <input type="hidden" name="logout">
    <input type="submit" value="Se déconnecter" class="btn btn-danger">
  </form>

<?php 
    } else {
        ?>
        <h3>Vous n'êtes pas connecté, veuillez vous connecter pour accéder à cette fonctionnalité.</h3>
        <a href="musicien.php"><button class="music-space button"  id="logUser">Se connecter</button></a>
    <?php
    }
?>


	</section>
	
	<!-- INFORMATION MEMBRE :
- Pseudo : "pseudo enregistré"
- Identifiant : "mail ou fb"
- mdp : "mdp enregistré"
- catégorie : "mélomane ou musicien"
- supprimer compte
- passer à un compte musicien

INFORMTION MUSICIEN :
- publication de ma musique : "oui ou non"
- modification possible "oui ou non"-->
