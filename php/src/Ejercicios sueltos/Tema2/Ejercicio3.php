<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 3</h1>
    <?php
        function calcular_mitjana($array) {
            $media = array_sum($array) / count($array);
            return $media;
        }

        $numeros = [10, 20, 30, 40, 50];

        $mitjana = calcular_mitjana($numeros);
        echo "La mitjana és: " . $mitjana;
    ?>
</body>
</html>
