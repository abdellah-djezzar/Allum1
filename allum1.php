#!/usr/bin/php
<?php

function Grille($nbr_allum, $nbr_ordi){
$i = 0;
echo PHP_EOL;
$calcu = 11 - $nbr_allum;
echo str_pad("", $calcu, " ", STR_PAD_LEFT);
    while($i < $nbr_allum  && $nbr_allum != 0)
    {
        // echo "coucou";
        echo "|";
        $i++;
    }
    delAllum($nbr_allum);
}

function Mother($x){
    $i = 0;
    usleep(1000000);
    echo PHP_EOL."Tour de l'IA ...".PHP_EOL;
    usleep(1000000);
    if($x ==1)
    {
        echo "Oh NON,j'ai perdu!!";
    }
    if(($x - 1)% 4 == 1)
    {
        $nbr_ordi = 1;
        $nbr_allum = $x -$nbr_ordi;
        echo "L'IA enlève ". $nbr_ordi ." allumettes";
        Grille($nbr_allum, $nbr_ordi);
    } else if (($x - 2) % 4 == 1) {
        $nbr_ordi = 2;
        $nbr_allum = $x -$nbr_ordi;
        echo "L'IA enlève ". $nbr_ordi ." allumettes";
        Grille($nbr_allum, $nbr_ordi);
    } else if (($x - 3) % 4 == 1) {
        $nbr_ordi = 3;
        $nbr_allum = $x -$nbr_ordi;
        echo "L'IA enlève ". $nbr_ordi ." allumettes";
        Grille($nbr_allum, $nbr_ordi);
    } else {
        $nbr_allum = $x - (1+rand(1, 3));
        echo "L'IA enlève ". $nbr_ordi ." allumettes";
        Grille($nbr_allum, $nbr_ordi);
    }
}

// Suppression de maximum 3 allumettes
function delAllum($limit){
    $i=0;
    echo PHP_EOL."Votre Tour !Combien d'allumettes voulez-vous enlever? ";
    $delAllum = readline();
    echo "Vous avez enlever ".$delAllum." allumettes" . PHP_EOL;
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
        echo "Error : invalid input ( Un nombre valide doit être écris! )" . PHP_EOL;
        delAllum($limit);
    } else if ($delAllum == 0){
        echo "Error : Vous devez enlever au moins 1 allumettes!";
        delAllum($limit);
    } else if ($delAllum >= 4){
        echo "Error : La valeur est trop grande!" . PHP_EOL;
        echo "Error : invalid input ( Un nombre valide doit être écris! )";
        delAllum($limit);
    }
    if(isset($result)){
        // echo PHP_EOL."Player removed ".$delAllum." match ( es )" . PHP_EOL;
        if($result == 0){
            echo PHP_EOL."Vous avez perdu!".PHP_EOL;
            exit;
        }
        Mother($result);
        delAllum($result);
    }
}

// Défini le nombre d'allumettes que l'on va pouvoir enlever
function defAllum($texte2) {
    $limit = 11;
    $i = 0;
    while($i < $limit)
    {  
        echo "|";
        // $test1 = $i;
        $i++;
    }
    $test = delAllum($limit);
}

// Fonction de lancement
function start() {
    $texte2 = 11;
    $limit = defAllum($texte2);
    if ($line == "stop") {
        exit;
    }
    else {
        $texte = "Votre nom est visiteur";
        start($texte);
    }
}

// Lancement d'application
start();