<?php
require_once('include/init.inc.php'); //Connexion à la base


if(isset($_SESSION['login']))
{
  header('Location:admin/home_back.php');
}


//Gestion des messages (Deconnexion / Redirection)
if(isset($_GET))
{
  if(!empty($_GET['action']) && $_GET['action'] === 'logout')
  {
    $confirmation = '<h3 class="center green-text">Déconnecté avec succès</h3>';
  }
  else if(!empty($_GET['action']) && $_GET['action'] === 'redirect')
  {
    $confirmation = '<h3 class="center red-text">Connexion requise !</h3>';
  }
}

//Gestion de la connexion
if($_POST)
{
  if(!empty($_POST['login']) && !empty($_POST['password']))
  {
    $check = $pdo->prepare('SELECT * FROM m_admin_user WHERE login = :login');
    $check->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
    $check->execute();

    $check_user = $check->fetch(PDO::FETCH_ASSOC);

    if($check_user['password'] === $_POST['password'])
    {
      $_SESSION['login'] = $check_user['login'];
      header('Location:admin/home_back.php');
    }
    else
    {
      $confirmation = '<h3 class="center red-text">Login ou mot de passe incorrect</h3>';
    }
  }
  else
  {
    $confirmation = '<h3 class="center red-text">Veuillez remplir tous les champs !</h3>';
  }
}


//echo $_SERVER['DOCUMENT_ROOT'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion administrateur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>

  <main>
    <div>
      <h1>Connexion au Back Office</h1>
    </div>

    <?php if(!empty($confirmation)){echo $confirmation;} ?>

    <section>
        <form method="post" action="#">
          <div>
            <input id="login" name="login" type="text" required>
            <label for="login">Login</label>
          </div>
          <div class="input-field col s12">
            <input id="password" name="password" type="password" required>
            <label for="password">Password</label>
          </div>
          <div class="center">
            <button type="submit" name="connexion">Connexion</button>
          </div>
        </form>
    </section>
  </main>
</body>
</html>
