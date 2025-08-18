<?php

$villes = ["Amiens", "Paris", "Los Angeles", "New York"];

foreach ($villes as $v) {
    echo $v . "<br>";
}


for ($i=0; $i < 150; $i+=2) { 
    echo $i . "<br>";
}

for ($i=0; $i < 150; $i++) { 
    if ($i%2==0)
        echo $i . "<br>";
}