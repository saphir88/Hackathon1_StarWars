<?php
session_start();
header('Location: resultat.php');


/* Modification des Json en Tableau */
$api_url1 = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/'. $_POST['champs1'] . '.json';
echo var_dump($api_url1).'<br><br><br>';
$api_json1 = file_get_contents($api_url1);
echo var_dump($api_json1).'<br><br><br>';
$api_array1 = json_decode($api_json1, true);
echo var_dump($api_array1).'<br><br><br>';
echo $api_array1["name"].'<br><br><br>';

$api_url2 = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/'. $_POST['champs2'] . '.json';
echo var_dump($api_url2).'<br><br><br>';
$api_json2 = file_get_contents($api_url2);
echo var_dump($api_json2).'<br><br><br>';
$api_array2 = json_decode($api_json2, true);
echo var_dump($api_array2).'<br><br><br>';
echo $api_array2["name"].'<br><br><br>';

/* Déroulement Combat */
$etat = 'vivant';
$vie1 = $api_array1['powerstats']['strength']*2;
$vie2 = $api_array2['powerstats']['strength']*2;
$max_attack1 = $api_array1['powerstats']['power']+$api_array1['powerstats']['intelligence']+$api_array1['powerstats']['combat'];
$max_attack1 = $max_attack1/3;
$max_attack2 = $api_array2['powerstats']['power']+$api_array2['powerstats']['intelligence']+$api_array2['powerstats']['combat'];
$max_attack2 = $max_attack2/3;
$resume = array();
$nb_tour = 1;

while ($etat == 'vivant') {
    if ($api_array1['id']=='639' AND $api_array2['id']=='639') {
        $resume[]= "Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew Pew Pew Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew Pew Pew<br>";
        $resume[]= "Pew Pew Pew Pew<br>";
        $resume[]= "<br>Le combat entre les 2 Stormtroopers est long... Très long ! Ils sont tellement forts (ou tellement nuls) que le combat dure des heures et des heures. Cependant, ce combat ne peut pas être infini. On sait qu'un jour, l'un des 2 Stormtroopers arrivera à tuer l'autre... Mais on ne sait pas quand !<br>";
        $winner = $api_array1['id'];
        $etat = 'Mort';
    } else {
        $resume[]= "<br>---------- Tour ".$nb_tour." ----------<br>";
        $resume[]=  $api_array1['name']. ' a '. $vie1. ' points de vie.<br>';
        $resume[]=  $api_array2['name']. ' a '. $vie2. ' points de vie.<br><br>';
        $nb_tour ++;
        if ($api_array1['powerstats']['speed'] >= $api_array2['powerstats']['speed']) {
            $attack = rand(10, $max_attack1);
            $vie2 = $vie2 - $attack;
            $resume[]=  $api_array1['name']. ' attaque et inflige '. $attack . ' de dégats à '. $api_array2['name']. '.<br>';
            if ($vie2 <= 0) {
                $etat = 'mort';
                $resume[]= $api_array2['name']. ' est KO !<br>';
                $resume[]=  $api_array1['name']. ' remporte le combat !';
                $winner = $api_array1['id'];
            } else {
                $attack = rand(10, $max_attack2);
                $vie1 = $vie1 - $attack;
                $resume[]=  $api_array2['name']. ' attaque et inflige '. $attack . ' de dégats à '. $api_array1['name']. '.<br>';
                if ($vie1 <= 0) {
                    $etat = 'mort';
                    $resume[]= $api_array1['name']. ' est KO !<br>';
                    $resume[]=  $api_array2['name']. ' remporte le combat !';
                    $winner = $api_array2['id'];
                }
            }
        } else {
            $attack = rand(10, $max_attack2);
            $vie1 = $vie1 - $attack;
            $resume[]=  $api_array2['name']. ' attaque et inflige '. $attack . ' de dégats à '. $api_array1['name']. '.<br>';
            if ($vie1 <= 0) {
                $etat = 'mort';
                $resume[]= $api_array1['name']. ' est KO !<br>';
                $resume[]=  $api_array2['name']. ' remporte le combat !';
                $winner = $api_array2['id'];
            } else {
                $attack = rand(10, $max_attack1);
                $vie2 = $vie2 - $attack;
                $resume[]=  $api_array1['name']. ' attaque et inflige '. $attack . ' de dégats à '. $api_array2['name']. '.<br>';
                if ($vie2 <= 0) {
                    $etat = 'mort';
                    $resume[]= $api_array2['name']. ' est KO !<br>';
                    $resume[]=  $api_array1['name']. ' remporte le combat !';
                    $winner = $api_array1['id'];
                }
            }
        }
    }
}

$_SESSION['resume'] = $resume;
$_SESSION['winner'] = $winner;
