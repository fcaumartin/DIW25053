<?php


$hash = password_hash("Afpa1234",PASSWORD_DEFAULT);
echo $hash . "<br>";
echo password_verify("Afpa1234", $hash);