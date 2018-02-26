<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  
  <!--icones-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/themify-icons.css">
  <link rel="icon" type="image/png" href="../img/logo-musicon.png">
  
  <!--forme & responsive-->

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="../css/style_back.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <span><?= 'Bonjour, ' . $_SESSION['login'] ?></span>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home_back.php">Accueil Back<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="messages_back.php">Messages reçus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Modération des musiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../deconnexion.php">Deconnexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Front office</a>
        </li>
      </ul>
    </div>
  </nav>