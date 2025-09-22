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

    $file_name = $id . ".png";
    move_uploaded_file($_FILES["picture"]["tmp_name"], "pictures/" . $file_name); 

    
    $sql = "UPDATE disc set disc_title=?, disc_year=?, disc_label=?, disc_genre=?, disc_price=?, artist_id=?, disc_picture=? WHERE disc_id=?";
    $requete = $db->prepare($sql);
    $requete->execute([$title, $year, $label, $genre, $price, $artist, $file_name, $id]);

    
    header("Location: index.php");

