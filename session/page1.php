<?php

session_start();
if (isset($_SESSION["auth"]) == false) {
    header("Location: login.php");
    exit();
}

?>

<h1>Vous êtes connecté !!!</h1>

