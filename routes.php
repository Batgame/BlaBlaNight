<?php
session_start();
setlocale(LC_TIME, 'fr_FR.UTF-8');

try {
  $bdd = new PDO("mysql:host=172.17.0.6;dbname=blablanight;charset=utf8", "", "");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (PDOException $e){
  echo $e->getMessage();
}

$reqRoutes = $bdd->prepare("SELECT r.id, r.userID, r.source, r.sourceDate, r.destination, r.destinationDate, u.name, u.discord from routes r JOIN users u on r.userID=u.id where r.sourceDate > sysdate() order by r.sourceDate");
$reqRoutes->execute();

$routes = $reqRoutes->FetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['postRoute']))
{
	if(isset($_SESSION['discord']))
	{
		if(!empty($_POST['sourceDate']) and !empty($_POST['source']) and !empty($_POST['destination']) and !empty($_POST['duree']))
		{
			$sourceDate = htmlspecialchars($_POST['sourceDate']);
			$source = htmlspecialchars($_POST['source']);
			$destination = htmlspecialchars($_POST['destination']);
			$duree = htmlspecialchars($_POST['duree']);

			$sourceDate = str_replace("T", " ", $sourceDate);

			$destinationDate = strtotime($sourceDate . "+" . $duree . " minutes");
			
			//var_dump(date("Y-m-d H:i", strtotime($sourceDate)));
			//var_dump(date("Y-m-d H:i", $destinationDate));

			$insertRoute = $bdd->prepare("INSERT into routes (userID, source, sourceDate, destination, destinationDate) values (?, ?, ?, ?, ?)");
			$insertRoute->execute(array($_SESSION['userId'], $source, date("Y-m-d H:i", strtotime($sourceDate)), $destination, date("Y-m-d H:i", $destinationDate)));

			header("Refresh:0");
		}
	} else 
	{
		$_POST['erreur'] = "";
	}
	
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
    <script src="https://kit.fontawesome.com/d1ae676b0e.js" crossorigin="anonymous"></script>

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

			<a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
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
						<a href="index.php?action=logout" id="loginButton"><button type="button" class="btn btn-primary" style="background-color:#e02c2c;"><i style="color: black;" class="fas fa-sign-out-alt"></i></button></a>
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

		<h1>Trajets propos??s</h1><br />
		<section>	

			<?php
				if(isset($_POST['erreur']))
				{
					echo '
						<div class="alert alert-danger" role="alert">
  							Vous devez renseigner votre pseudo Discord sur votre profil pour cr??er un trajet.
						</div>
					';
				}

				if(isset($_SESSION['userId']))
				{
					echo '
						<button class="btn btn-lg btn-outline-success" type="submit" onclick="openForm();">Proposer un trajet</button><br /><br />
					';
				}
				else
				{
					echo '
						<div class="alert alert-primary" role="alert">
  							Cr??ez un compte pour proposer un trajet ou contacter un covoitureur !
						</div>
					';
				}

			?>
			<form class="row g-2" id="formRoute" style="display: none;" method="POST" action="routes.php">

				<div class="col-12">
			    	<input type="datetime-local" class="form-control" name="sourceDate" value="" title="Date de d??part" required>
			  	</div>
			  
			  	<div class="col-md-6">
			    	<input type="text" class="form-control" name="source" placeholder="D??part" required>
			  	</div>
			  	
			  	<div class="col-md-6">
			    	<input type="text" class="form-control" name="destination" placeholder="Arriv??e" required>
			  	</div>

			  	<div class="col-md-12">
			    	<input type="number" class="form-control" name="duree" placeholder="Dur??e (min)" required>
			  	</div>

			  	<div class="col-md-12">
			  		<button class="btn btn-md btn-outline-success" name="postRoute" type="submit">Cr??er</button>
			  	</div>
			</form>
		
			<ul id="list-trajets">

				<?php 
				foreach($routes as $route)
				{
					echo '

						<li class="box">
							<div class="trajet">
								<div class="top">
									<time class="dateText">'. strftime("%a %d/%m", strtotime($route["sourceDate"])).'</time><br />
									<time>'. strftime("%H:%M", strtotime($route["sourceDate"])).'</time>
									<span>'.$route["source"].'</span>
									<br />
									<span style="margin-left: 5%">|</span>
									<br />
									<time>'. strftime("%H:%M", strtotime($route["destinationDate"])).'</time>
									<span>'.$route["destination"].'</span>
								</div>
								<div class="bottom">
									<div class="pp">
										<img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" style="max-width: 100%; max-height: 100%;">
									</div>
									<div class="name">
										<span id="name">'.$route["name"] . ($_SESSION["userId"] ? " (" .$route['discord']. ")": "").'</span>									
									</div>
								</div>
							</div>
						</li>
					';
				}


				?>

				
			</ul>
		</section>
  	</div>
   
	

  	<script type="text/javascript">

  		let count = 0;

  		function openForm()
		{
			count += 1;
			if(count % 2 == 0 )
			{
				document.getElementById('formRoute').style.display = 'none';
			}
			else
			{
				document.getElementById('formRoute').style.display = '';
			}
			console.log(count);
		}
  	</script>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  </body>
</html>
