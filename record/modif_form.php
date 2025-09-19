<?php
    require("header.php");
    require("connect.php");

    $requete = $db->query("select * from artist;");
    $artistes = $requete->fetchAll();

    $id = $_GET["id"];

    $sql = "select * from disc where disc_id=?";
    $requete2 = $db->prepare($sql);
    $requete2->execute([$id]);

    $disc = $requete2->fetch();

?>
<h1>Formulaire modification</h1>

<form action="modif_script.php" method="post" enctype="multipart/form-data">

    <div>
        Titre
        <input type="text" name="title" value="<?= $disc["disc_title"] ?>">
    </div>
    <div>
        Année
        <input type="number" name="year"  value="<?= $disc["disc_year"] ?>">
    </div>
    <div>
        Label
        <input type="text" name="label"  value="<?= $disc["disc_label"] ?>">
    </div>
    <div>
        Genre
        <input type="text" name="genre"  value="<?= $disc["disc_genre"] ?>">
    </div>
    <div>
        Prix
        <input type="text" name="price"  value="<?= $disc["disc_price"] ?>">
    </div>
    <div>
        Artiste
        <select name="artist">
            <?php foreach ($artistes as $artiste): ?>
                <option value="<?= $artiste["artist_id"] ?>" <?= $artiste["artist_id"]==$disc["artist_id"]?"selected":"" ?> ><?= $artiste["artist_name"] ?></option>             
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
    <input type="hidden" name="id" value="<?= $disc["disc_id"] ?>">
</form>

<?php
    require("footer.php");
?>