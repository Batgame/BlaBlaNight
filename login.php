<?php
session_start();
try {
  $bdd = new PDO("mysql:host=172.17.0.6;dbname=blablanight;charset=utf8", "php", "couilles");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (PDOException $e){
  echo $e->getMessage();
}

if(isset($_POST['connexion']))
{

  if(!empty($_POST['mail']) and !empty($_POST['pass']))
  {
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['pass']);

    $reqUser = $bdd->prepare("SELECT * from users where mail = ?");
    $reqUser->execute(array($mail));

    $result = $reqUser->fetch(PDO::FETCH_ASSOC);

    if(!$result)
    {
      $erreur = "Identifiant ou mot de passe invalide. Veuillez réessayer.";
    } else
    {
      if(password_verify($mdp, $result['pass']))
      {
        $_SESSION['user'] = $result['name'];
        $_SESSION['userId'] = $result['id'];
        $_SESSION['email'] = $result['mail'];
        $_SESSION['discord'] = $result['discord'];
        header('Location: index.php');
      }
      else
      {
        $erreur = "Identifiant ou mot de passe invalide. Veuillez réessayer.";
      }
    }

  } else
  {
    $erreur = "Merci de completer tous les champs";
  }
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - BlaBlaNight</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" action="login.php">
    <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo-black.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Connexion</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="mail" value="<?= $mail ?>" required>
      <label for="floatingInput">Adresse mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="pass" required>
      <label for="floatingPassword">Mot de passe</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Se souvenir de moi
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="connexion">Connexion</button>

    <?php
      if(isset($erreur))
      {
        echo "<br /><br />" . $erreur;
      }

    ?>
    <p class="mt-5 mb-3 text-muted">&copy; BlaBlaNight, 2021</p>
  </form>
</main>


    
  </body>
</html>
