<?php
    require("connect.php");

    $id = $_GET["id"];

    $sql = "SELECT * 
        FROM disc d
        JOIN artist a ON a.artist_id=d.artist_id
        WHERE disc_id=?";

    // var_dump($sql);
    // die;

    $requete = $db->prepare($sql);
    $requete->execute([$id]);

    $disc = $requete->fetch();


    require("header.php");
?>


    <div class="container">
        <div class="row">
                <section class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-3">
                    <div>
                        <img src="/pictures/<?= $disc["disc_picture"]?>" alt="" class="img-fluid">
                    </div>
                    <div class="fw-bold">
                        <?= $disc["disc_title"] ?>
                    </div>
                    <div>
                        <?= $disc["artist_name"] ?>
                    </div>
                    <div>
                        <?= $disc["disc_year"] ?>
                    </div>
                    <div>
                        <a href="modif_form.php?id=<?= $disc["disc_id"] ?>" class="btn btn-primary">Modifier</a>
                    </div>
                </section>
        </div>
    </div>
    
<?php
    require("footer.php");
?>