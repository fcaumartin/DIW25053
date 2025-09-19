<?php

    // var_dump($_FILES);
    // die;

    
    
    $title = $_POST["title"];
    $year = $_POST["year"];
    $label = $_POST["label"];
    $genre = $_POST["genre"];
    $price = $_POST["price"];
    $artist = $_POST["artist"];
    $id = $_POST["id"];

    
    
    require("connect.php");
    
    $sql = "UPDATE disc set disc_title=?, disc_year=?, disc_label=?, disc_genre=?, disc_price=?, artist_id=? WHERE disc_id=?";
    $requete = $db->prepare($sql);
    $requete->execute([$title, $year, $label, $genre, $price, $artist, $id]);
    
    header("Location: index.php");

