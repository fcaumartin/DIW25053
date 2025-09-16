<?php

    require ("connect.php");

    $requete = $db->query("SELECT * FROM artist;");
    $tableau = $requete->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Les artistes</h1>

        <table border="1">

            <?php foreach ($tableau as $artiste): ?>

                <tr class="">
                    <td>
                        <?= $artiste["artist_id"]; ?>
                    </td>
                    <td>
                        <?= $artiste["artist_name"]; ?>
                    </td>
                </tr>
                
            <?php endforeach; ?>

        </table>


</body>
</html>
