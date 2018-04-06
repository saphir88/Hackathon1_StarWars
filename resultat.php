<?php
session_start();
/* Recherche des infos du gagnant */
$api_url = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/'. $_SESSION['winner'] . '.json';
$api_json = file_get_contents($api_url);
$api_array = json_decode($api_json, true);
?>

	<!DOCTYPE html>
	    <html>

	    <head>
	        <meta charset="utf-8">
	        <title>TRAINING TO BEAT VADER</title>
	        <!-- Meta tags -->
	        <meta charset="utf-8">
	        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	        <!--Jquery-->
	        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	        <!-- Bootstrap -->
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	        <!-- Optional theme -->
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	        <!-- Latest compiled and minified JavaScript -->
	        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	        <!--Police-->
	        <link href="https://fonts.googleapis.com/css?family=Geo" rel="stylesheet">
	        <link href="https://fonts.googleapis.com/css?family=Dhurjati" rel="stylesheet">
	        <!-- Mon CSS -->
	        <link rel="stylesheet" href="resultat.css" />



	    </head>

	    <body>
	        <header>
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-xs-12">
	                        <img class=" logo center-block" src="http://res.cloudinary.com/tiffanym/image/upload/q_100/v1522944567/img_vader_yzpyyy.png" alt="vader" />
	                    </div>
	                </div>
	            </div>
	        </header>

	        <section>
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-xs-8 col-xs-offset-2 ">
	                        <div class="description">
<h2> And the winner is : </h2>
                                 <img class="img_winner center-block" src=<?php echo $api_array['images']['lg']; ?> alt="img_gagnant">

													<h1> <?php echo $api_array['name']; ?></h1>

													<?php foreach ($_SESSION['resume'] as $arrayElement)
														echo $arrayElement; ?>

	                        </div>
	                    </div>
                        <div class="row">
                            <div class="col-xs-12">
                            </br>
                            <a href="index.php"><button type="button" class="btn center-block">Try again !</button></a>
                            </div>




	        </section>

	        <footer>
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-xs-12">
	                        <p>Made by Hery, Thomas, Kyle, & Tiffany.</p>
	                    </div>
	                </div>
	            </div>
	        </footer>
	    </body>

</html>
