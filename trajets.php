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
    <link rel="stylesheet" type="text/css" href="css/trajets.css">

    

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
				<li><a href="index.html" class="nav-link px-2 link-dark">Accueil</a></li>
				<li><a href="trajets.html" class="nav-link px-2 link-secondary">Trajets</a></li>
			</ul>

			<div class="col-md-3 text-end">
				<button type="button" class="btn btn-primary">Se connecter</button>
			</div>
		</header>

		<h2>Trajets proposés</h2>
		<section>	
			<ul id="list-trajets">
				<li class="box">
					<div class="trajet">
						<div class="top">
							<time>09:30</time>
							<span>Annecy le Vieux</span>
							<br />
							<span style="margin-left: 5%">|</span>
							<br />
							<time>09:45</time>
							<span>Le Bowl, Annecy</span>
						</div>
						<div class="bottom">
							<div class="pp">
								<img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" style="max-width: 100%; max-height: 100%;">
							</div>
							<span id="name">Clément</span>
						</div>
					</div>
				</li>
				<li class="box">
					<div class="trajet">
						<div class="top">
							<time>23:30</time>
							<span>Seynod</span>
							<br />
							<span style="margin-left: 5%">|</span>
							<br />
							<time>00:00</time>
							<span>Le Bowl, Annecy</span>
						</div>
						<div class="bottom">
							<div class="pp">
								<img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" style="max-width: 100%; max-height: 100%;">
							</div>
							<span id="name">Jeremy</span>
						</div>
					</div>
				</li>
			</ul>
		</section>
  	</div>
   
	


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  </body>
</html>
