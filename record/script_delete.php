<?php

    
    $id = $_GET["id"];

    
    
    require("connect.php");
    
    $sql = "DELETE FROM disc WHERE disc_id=?";
    $requete = $db->prepare($sql);
    $requete->execute([$id]);
    
    header("Location: index.php");

