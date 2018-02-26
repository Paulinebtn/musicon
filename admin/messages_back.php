<?php

$title = "Messages reçus";

require_once($_SERVER['DOCUMENT_ROOT']. '/musicon/include/init.inc.php'); //Connexion à la base

//REDIRECTION

if(!isset($_SESSION['login']))
{
  header('Location:../admin.php?action=redirect');
}


// SUPPRESSION DES MESSAGES

if(isset($_GET))
{
  if(!empty($_GET['del']))
  {
    $delete = $pdo->prepare('DELETE FROM muzicon_messages WHERE id_message =' . $_GET['del']);
    $delete->execute();

    $confirmation = '<div class="confirmOk">
                        <div>Le message a été effacé.</div>
                    </div>';
  }
}

// RECUPERATION DES MESSAGES

include($_SERVER['DOCUMENT_ROOT']. '/musicon/include/functions.inc.php');

$messages = selectAll('muzicon_messages');


include "haut.inc.php";

?>


<main class="flex-col">

  <section class="flex-col flex-sb flex-wrap">
    <div>
      <h2>Messages reçus</h2>
    </div>

    <?php if(!empty($confirmation)){echo $confirmation;} ?>


    <table>
      <thead>
        <tr>
          <?php foreach($messages[0] as $titles => $value) : ?>
          <th><?= $titles ?></th>
          <?php endforeach; ?>
          <th>Supprimer</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($messages as $key => $value) : ?>
          <tr>
            <td><?= $value['id_message'] ?></td>
            <td><?= htmlspecialchars($value['nom_message']) ?></td>
            <td><?= htmlspecialchars($value['email_message']) ?></td>
            <td><?= htmlspecialchars($value['contenu_message']) ?></td>
            <td><?= $value['date_message'] ?></td>
            <td><a onclick="return confirm('vous sur de vouloir supprimer ce message ?')" href="messages_back.php?del=<?= $value['id_message'] ?>">Supprimer</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</main>

<?php

include "bas.inc.php";