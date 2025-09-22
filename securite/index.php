<?php


    $db = new PDO('mysql:host=localhost;dbname=securite;charset=utf8', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $requete = $db->query("SELECT * FROM client;");
    $tableau = $requete->fetchAll();


    foreach ($tableau as $client) {
        echo htmlspecialchars($client["nom"]) . " " . htmlspecialchars($client["prenom"]) . "<br />";    
    }

?>

<a href="ajout_form.php">Ajouter</a>
    