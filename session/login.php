<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($email=="toto@afpa.fr" && $password=="Secret") {

            $_SESSION["auth"] = "ok";
            header("Location: page1.php");
            exit();
        }
        else {
            header("Location: login.php");
            exit();
        }
    }
?>

    <form action="" method="POST">
        <input type="text" name="email" id="">
        <input type="password" name="password" id="">
        <input type="submit" value="Valider">
    </form>