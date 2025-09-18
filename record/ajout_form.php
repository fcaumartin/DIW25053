<?php
    require("header.php");
    require("connect.php");

    $requete = $db->query("select * from artist;");
    $artistes = $requete->fetchAll();

?>
<h1>Formulaire ajout</h1>

<form action="ajout_script.php" method="post" enctype="multipart/form-data">

    <div>
        Titre
        <input type="text" name="title" >
    </div>
    <div>
        Année
        <input type="number" name="year" >
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