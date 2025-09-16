<?php
$db = new PDO('mysql:host=localhost;dbname=record;charset=utf8', 'admin', 'Afpa1234');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);