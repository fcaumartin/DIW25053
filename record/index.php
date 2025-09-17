<?php
    require("connect.php");

    $requete = $db->query("
        SELECT * 
        FROM disc d
        JOIN artist a ON a.artist_id=d.artist_id;
    ");
    $tableau = $requete->fetchAll();


    require("header.php");
?>


    <div class="container">
        <div class="row">
            <?php foreach ($tableau as $disc): ?>
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
                        <a href="details.php?id=<?= $disc["disc_id"] ?>" class="btn btn-primary">
                            Afficher les détails
                        </a>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
    
<?php
    require("footer.php");
?>