<?php

$prix = 0.056784;
$tva = 20;


$message = sprintf ("Prix HT = %.3f %d €", $prix, $tva);

// echo $message;

$a = 12;
$b = 4;

$c = $a + $b;

// echo "$a + $b = $c";

printf ("%d + %d = %d",$a, $b, $c);


$f = 12;
$g = "12";

if ($g===$f) 
    echo "oui"; 
else 
    echo "non";


$tab = [1, 2, 3, "poipoi", 4];

$tab[] = 666;

var_dump($tab);


