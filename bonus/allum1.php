#!/usr/bin/php
<?php
//Dire à L'IA : sil le premier tour, il y a entre 1,5,9,13,17,21 baton, et que c'est a Joueur de commencer,
//il faut que l'ia laisse toujours ces chiffres de baton au joueur.
//mais si c'est à l'IA de commencer, il faut prier pour le joueur ne connnaisse pas la technique
#!/usr/bin/php

function Grille($nbr_allum, $nbr_ordi){
$i = 0;
echo PHP_EOL;
$calcu = 11 - $nbr_allum;
echo str_pad("", $calcu, " ", STR_PAD_LEFT);
    while($i < $nbr_allum  && $nbr_allum != 0)
    {
        echo "|";
        $i++;
    }
    delAllum($nbr_allum);
}

function Mother($x){
    $i = 0;
    usleep(1000000);
    echo PHP_EOL."AI 's turn ...".PHP_EOL;
    usleep(1000000);
    if($x ==1)
    {
        echo "I lost ... snif ... but I'll get you next time !!";
    }
    if(($x - 1)% 4 == 1)
    {
        $nbr_ordi = 1;
        $nbr_allum = $x -$nbr_ordi;
        echo "AI removed ". $nbr_ordi ." match ( es )";
        Grille($nbr_allum, $nbr_ordi);
    } else if (($x - 2) % 4 == 1) {
        $nbr_ordi = 2;
        $nbr_allum = $x -$nbr_ordi;
        echo "AI removed ". $nbr_ordi ." match ( es )";
        Grille($nbr_allum, $nbr_ordi);
    } else if (($x - 3) % 4 == 1) {
        $nbr_ordi = 3;
        $nbr_allum = $x -$nbr_ordi;
        echo "AI removed ". $nbr_ordi ." match ( es )";
        Grille($nbr_allum, $nbr_ordi);
    } else {
        $var = 1+rand(1, 3);
        $nbr_allum = $x - $var;
        echo "AI removed ". $var ."match ( es )";
        Grille($nbr_allum, $nbr_ordi);
    }
}

// Suppression de maximum 3 allumettes
function delAllum($limit){
    $i=0;
    echo PHP_EOL."Your turn : Matches : ";
    $delAllum = readline();
    // echo $delAllum;
    if($delAllum >= 1 && $delAllum <= 3 && $delAllum != 0)
    {    
        $result = $limit- $delAllum;
        $calcu2 = 11 - $result;
        echo str_pad("", $calcu2, " ", STR_PAD_LEFT);
        while($i < $result)
        { 
            echo "|";
            $i++;
        }

    } else if ($delAllum < 0 || !is_string($delAllum)){
        echo "Error : invalid input ( positive number expected )" . PHP_EOL;
        delAllum($limit);
    } else if ($delAllum == 0){
        echo "Error : you have to remove at least one match";
        delAllum($limit);
    } else if ($delAllum >= 4){
        echo "Error : not enough matches Matches :" . PHP_EOL;
        echo "Error : invalid input ( positive number expected )";
        delAllum($limit);
    }
    if(isset($result)){
        // echo PHP_EOL."Player removed ".$delAllum." match ( es )" . PHP_EOL;
        if($result == 0){
            echo PHP_EOL."You lost , too bad ...".PHP_EOL;
            exit;
        }
        Mother($result);
        delAllum($result);
    }
}

// Défini le nombre d'allumettes que l'on va pouvoir enlever
function defAllum($texte2) {
    echo $texte2;
    $limit = readline();
    $i = 0;
    while($i < $limit)
    {
        echo "|";
        $i++;
    }
    $test = delAllum($limit);
}

// Fonction de lancement
function start($texte) {
    echo $texte;
    $line = readline();
    if (is_string($line)) {
       echo "Bonjour " . $line. ". " .PHP_EOL;
       $texte2 = "->Combien d'allumettes au maximum voulez-vous créer? ".PHP_EOL;
       $limit = defAllum($texte2);
    }
    elseif ($line == "stop") {
        exit;
    }
    else {
        $texte = "Votre nom est visiteur";
        start($texte);
    }
}

// Lancement d'application
$texte = "->Quel est votre nom: ";
start($texte);