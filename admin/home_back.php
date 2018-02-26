<?php

$title = "Accueil Back Office";

require_once($_SERVER['DOCUMENT_ROOT']. '/musicon/include/init.inc.php'); //Connexion à la base


//REDIRECTION

if(!isset($_SESSION['login']))
{
  header('Location:../admin.php?action=redirect');
}

include($_SERVER['DOCUMENT_ROOT']. '/musicon/include/functions.inc.php');



include "haut.inc.php";

?>


<main class="flex-col">

  <section class="flex-col flex-sb flex-wrap">
    <div>
      <h2>Accueil</h2>
    </div>
  </section>
</main>

<?php

include "bas.inc.php";