<?php

    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];

    $db = new PDO('mysql:host=localhost;dbname=securite;charset=utf8', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = "INSERT INTO client (nom, prenom) VALUES (?, ?);";
    $requete = $db->prepare($sql);
    $requete->execute([$nom, $prenom]);

    header("Location: index.php");

