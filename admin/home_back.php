<?php

require_once($_SERVER['DOCUMENT_ROOT']. '/musicon/include/init.inc.php'); //Connexion à la base

if(!isset($_SESSION['login']))
{
  header('Location:../admin.php?action=redirect');
}

// RECUPERATION DES MESSAGES

include($_SERVER['DOCUMENT_ROOT']. '/musicon/include/functions.inc.php');

$messages = selectAll('muzicon_messages');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil Back Office</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
  <main class="flex-col">
    <div class="center">
      <h2><?= 'Bonjour, ' . $_SESSION['login'] ?></h2>
      <a href="../deconnexion.php">Déconnexion</a>
    </div>

    <section class="flex-col flex-sb flex-wrap">
      <div>
        <h2>Messages reçus</h2>
      </div>

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
              <td>Supprimer</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>