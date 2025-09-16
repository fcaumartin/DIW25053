<?php
    

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];

    if ($nom=="") {
        echo "Vous devez saisir votre nom";
    }
    else {

        ?>


Vous vous appelez <?php echo $nom . " " . $prenom ?>
<br>
Vous avez <?= $age ?> ans

<?php
    }
?>