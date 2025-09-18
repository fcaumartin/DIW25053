<?php

    // var_dump($_FILES);
    // die;

    
    
    $title = $_POST["title"];
    $year = $_POST["year"];
    $label = $_POST["label"];
    $genre = $_POST["genre"];
    $price = $_POST["price"];
    $artist = $_POST["artist"];

    
    
    require("connect.php");
    
    $sql = "INSERT INTO disc (disc_title, disc_year, disc_label, disc_genre, disc_price, artist_id) VALUES (?, ?, ?, ?, ?, ?);";
    $requete = $db->prepare($sql);
    $requete->execute([$title, $year, $label, $genre, $price, $artist]);
    
    $disc_id = $db->lastInsertId();
    
    $file_name = $disc_id . ".png";
    
    move_uploaded_file($_FILES["picture"]["tmp_name"], "pictures/" . $file_name); 

    $sql = "UPDATE disc SET disc_picture=? WHERE disc_id=?;";

    $requete2 = $db->prepare($sql);
    $requete2->execute([$file_name, $disc_id]);

    header("Location: index.php");

