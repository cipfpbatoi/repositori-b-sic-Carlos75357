<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <?php
        // Bucle for
        for ($i = 1; $i <= 20; $i++) {
            if ($i % 2 == 0) {
                echo $i . ", ";
            }
        }
        echo "<hr>";
        // Bucle While
        $i = 1;
        while ($i <= 20) {
            if ($i % 2 == 0) {
                echo $i . ", ";
            }
            $i++;
        }
    ?>
</body>
</html>