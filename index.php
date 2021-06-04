<?php

try {
  $bdd = new PDO("mysql:host=192.168.1.35;dbname=".SQL_DTBS.";charset=utf8", SQL_USER, SQL_PASS);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (PDOException $e){
  echo $e->getMessage();
}

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>BlaBlaNight - Home</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
        <meta name="theme-color" content="#7952b3">
        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            }
            .btn-primary
            {
            margin-right: 5%;
            }
            .py-5
            {
            padding-top: 1rem !important;
            }
            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/5.0/examples/heroes/heroes.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo-black.svg" width="50">
                </a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.html" class="nav-link px-2 link-secondary">Accueil</a></li>
                    <li><a href="trajets.html" class="nav-link px-2 link-dark">Trajets</a></li>
                </ul>
                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-primary">Se connecter</button>
                </div>
            </header>
        </div>
        <main>
            <div class="container col-xl-10 col-xxl-8 px-4 py-5">
                <div class="row align-items-center g-lg-5 py-5">
                    <div class="col-lg-7 text-center text-lg-start">
                        <h1 class="display-4 fw-bold lh-1 mb-3">Bienvenue sur BlaBlaNight™ !</h1>
                        <br />
                        <p class="col-lg-10 fs-4">BlaBlaNight est une application officieuse créée par les membres du BDE Odin pour permettre à ses membres de co-voiturer pour se rendre en soirée. Si tu t'es toujours sentis Sam, cette app est faite pour toi !</p>
                    </div>
                    <div class="col-md-10 mx-auto col-lg-5">
                        <form class="p-4 p-md-5 border rounded-3 bg-light">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="prenom" placeholder="Dupond">
                                <label for="floatingInput">Prénom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="mail" placeholder="name@example.com">
                                <label for="floatingInput">Adresse mail</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="pass" placeholder="Password">
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <div class="checkbox mb-3">
                                <label>
                                <input type="checkbox" value="remember-me"> Se souvenir de moi
                                </label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>