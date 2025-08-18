<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $message = "Ca marche !!!<br>\n";
        for ($i=0; $i<30; $i++) { 
            echo $message;
        } 
    ?>

        <hr>

    <?php 
        for ($i=0; $i<30; $i++) { 
            echo "Ca marche toujours !!!<br />";
        } 
    ?>
</body>
</html>