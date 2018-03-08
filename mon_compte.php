<!-- Section 4 : mon compte -->
<?php
require_once('include/init.inc.php');
?>
<section class="account">
	<div>
		<h2>Mon compte</h2>
	</div>
  
  <form action="index.php" method="post">
    <input type="hidden" name="logout">
    <input type="submit" value="Starfoullah">
  </form>

<?php 
var_dump($_SESSION);
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
