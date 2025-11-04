<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$json = file_get_contents('php://input', true);

$data = json_decode($json);

$db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234'); 
$requete = $db->prepare("INSERT INTO client (nom, prenom) VALUES (:nom, :prenom);");
$requete->bindValue(":nom", $data->nom);
$requete->bindValue(":prenom", $data->prenom);
$requete->execute();

echo('{ "message": "ok" }');

