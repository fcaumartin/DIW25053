<?php

    require("connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST["title"];
        $year = $_POST["year"];
        $label = $_POST["label"];
        $genre = $_POST["genre"];
        $price = $_POST["price"];
        $artist = $_POST["artist"];

        $erreurs = null;
        if ($title == "") {
            $erreurs["title"] = "Ce champ est obligatoire";
        }      
        if (is_numeric($year) == false) {
            $erreurs["year"] = "L'année est obligatoire";
        } 
        if ($year<1900) {
            $erreurs["year"] = "Soyons sérieux !!!";
        } 
        
        if (isset($erreurs) == false) {

            
            
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
            exit();
        }
    }


    require("header.php");

    $requete = $db->query("select * from artist;");
    $artistes = $requete->fetchAll();

?>
<h1>Formulaire ajout</h1>

<form action="" method="post" enctype="multipart/form-data">

    <div>
        Titre
        <input type="text" name="title" value="<?= $title ?>">
        <div class="text-danger"><?= $erreurs["title"] ?></div>
    </div>
    <div>
        Année
        <input type="number" name="year" value="<?= $year ?>">
        <div class="text-danger"><?= $erreurs["year"] ?></div>
    </div>
    <div>
        Label
        <input type="text" name="label" >
    </div>
    <div>
        Genre
        <input type="text" name="genre" >
    </div>
    <div>
        Prix
        <input type="text" name="price" >
    </div>
    <div>
        Artiste
        <select name="artist">
            <?php foreach ($artistes as $artiste): ?>
                <option value="<?= $artiste["artist_id"] ?>"><?= $artiste["artist_name"] ?></option>             
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        Image
        <input type="file" name="picture">
    </div>
    <div>
        <input type="submit" >
    </div>
</form>

<?php
    require("footer.php");
?>