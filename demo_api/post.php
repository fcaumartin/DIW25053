<?php


// header('Content-Type: application/json');
// header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$json = file_get_contents('php://input', true);

$data = json_decode($json);

$db = new PDO('mysql:host=localhost;charset=utf8;dbname=hotel', 'admin', 'Afpa1234'); 
$requete = $db->prepare("INSERT INTO client (cli_nom, cli_prenom, cli_ville) VALUES (:nom, :prenom, :ville);");
$requete->bindValue(":nom", $data->nom);
$requete->bindValue(":prenom", $data->prenom);
$requete->bindValue(":ville", $data->ville);
$requete->execute();

echo('{ "message": "ok" }');

