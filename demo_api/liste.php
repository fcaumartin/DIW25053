<?php

$db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234'); 

$requete = $db->query ("SELECT * FROM client"); 

$resultat = $requete->fetchAll(PDO::FETCH_OBJ);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

echo json_encode($resultat);