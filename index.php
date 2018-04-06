<?php

function getHeroA($id)
{
    /* Modification des Json en Tableau */
    $api_urlHero = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/' . $id .'.json';
    $api_json = file_get_contents($api_urlHero);
    $api_array = json_decode($api_json, true);
    return $api_array;
}

function getHeroO($id)
{
    /* Modification des Json en Objet */
    $api_urlHero = "https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/" . $id .'.json';
    $api_json = file_get_contents($api_urlHero);
    $apiObject = json_decode($api_json);
    return $apiObject;
}

$playerOneIds = [207, 208, 307, 398, 418, 555, 639, 729];
$playerTwoIds = [207, 208, 307, 398, 418, 555, 639, 729];

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
    <link href="https://fonts.googleapis.com/css?family=Dhurjati" rel="stylesheet">
    <!-- Mon CSS -->
    <link rel="stylesheet" href="vader.css" />
</head>

<body>
    <header>
        <div class="container-fluid box-logo">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <img class=" logo center-block" src="http://res.cloudinary.com/tiffanym/image/upload/q_100/v1522944567/img_vader_yzpyyy.png" alt="vader" />
                </div>
            </div>
        </div>
    </header>

    <section>

        <div class="versus"><img src="http://res.cloudinary.com/tiffanym/image/upload/q_100/v1522944572/img_vs_zkzj5y.png"/></div>

        <div class="container box">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <h2>PLAYER ONE</h2>
                    <p>CHOOSE YOUR FIGHTER</p>

                    <p class="select">
                        <?php
                            foreach ($playerOneIds as $id) {
                                echo '<input type="image" id="' . $id . '" class="hero1" src="' . getHeroO($id)->images->xs . '" alt="' . getHeroO($id)->name .'" title="'.getHeroO($id)->id.'"/>';
                                $post_form[] = $id;
                            }
                        ?>

                    </p>

                    <h3 id='fighter1name'></h3>
                    <p class="fighter">
                    <input type="image" id='fighter1' src="" alt=""/>
                    </p>



                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <h2>PLAYER TWO</h2>
                    <p>CHOOSE YOUR FIGHTER</p>

                    <p class="select">
                        <?php
                            foreach ($playerTwoIds as $id) {
                                echo '<input type="image" id="' . $id . '" class="hero2" src="' . getHeroO($id)->images->xs . '" alt="' . getHeroO($id)->name .'" title="'.getHeroO($id)->id.'"/>';
                            }
                        ?>
                    </p>

                    <h3 id="fighter2name"></h3>
                    <p class="fighter">
                        <input type="image" id='fighter2' src="" alt=""/>
                    </p>



                </div>
                <div class="col-xs-offset-5 col-xs-2 col-xs-offset-5 button-fight">
                  <form action="post_form.php" method="POST">
                    <input type="hidden" value="" id="champs1" name="champs1">
                    <input type="hidden" value="" id="champs2" name="champs2">
                    <div class="button ">
                      <button type="submit">FIGHT</button>
                    </div>
                  </form>
                </div>

            </div>
        </div>


    </section>

    <footer>
        <p>Made by Hery, Thomas, Kyle, & Tiffany.</p>
    </footer>
</body>

</html>

<script src="/script_hero.js"></script>
