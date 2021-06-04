<?php
session_start();

try {
  $bdd = new PDO("mysql:host=172.17.0.6;dbname=blablanight;charset=utf8", "php", "couilles");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (PDOException $e){
  echo $e->getMessage();
}

$reqRoutes = $bdd->prepare("SELECT r.id, r.userID, r.source, r.sourceDate, r.destination, r.destinationDate, u.name from routes r JOIN users u on r.userID=u.id");
$reqRoutes->execute();

$routes = $reqRoutes->FetchAll(PDO::FETCH_ASSOC);


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
				<li><a href="index.php" class="nav-link px-2 link-dark">Accueil</a></li>
				<li><a href="routes.php" class="nav-link px-2 link-secondary">Trajets</a></li>
			</ul>

			<?php

			if(isset($_SESSION['user']))
			{
				echo '

					<div class="col-md-3 text-end">
						<a href="index.php?action=logout" id="loginButton"><button type="button" class="btn btn-primary" style="background-color:#e02c2c;">Log out</button></a>
					</div>
				';
			} else
			{
				echo '

					<div class="col-md-3 text-end">
						<a href="login.php" id="loginButton"><button type="button" class="btn btn-primary">Connexion</button></a>
					</div>
				';
			}	

			?>
		</header>

		<h2>Trajets proposés</h2><br />
		<section>	
			<ul id="list-trajets">

				<?php 
				foreach($routes as $route)
				{
					echo '

						<li class="box">
							<div class="trajet">
								<div class="top">
									<time>'. date("H:i", strtotime($route["sourceDate"])).'</time>
									<span>'.$route["source"].'</span>
									<br />
									<span style="margin-left: 5%">|</span>
									<br />
									<time>'. date("H:i", strtotime($route["destinationDate"])).'</time>
									<span>'.$route["destination"].'</span>
								</div>
								<div class="bottom">
									<div class="pp">
										<img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" style="max-width: 100%; max-height: 100%;">
									</div>
									<span id="name">'.$route["name"].'</span>
								</div>
							</div>
						</li>
					';
				}


				?>

				
			</ul>
		</section>
  	</div>
   
	


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  </body>
</html>
