<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <?php
        // Asignación de variables
        $a = 5;
        $b = 3;
        $c = "Hola";
        $d = true;

        // Operaciones aritméticas
        $suma = $a + $b;
        $resta = $a - $b;
        $multiplicacion = $a * $b;
        $division = $a / $b;

        // Operadores lógicos
        $igual = $a == $b;
        $diferente = $a != $b;
        $mayor = $a > $b;
        $menor = $a < $b;

        // Concatenación de cadenas
        $e = $c . " " . "Mundo";

        // Resultados
        echo "Suma: " . $suma . "<br>";
        echo "Resta: " . $resta . "<br>";
        echo "Multiplicación: " . $multiplicacion . "<br>";
        echo "División: " . $division . "<br>";
        echo "Igual: " . ($igual ? 'true' : 'false') . "<br>";
        echo "Diferente: " . ($diferente ? 'true' : 'false') . "<br>";
        echo "Mayor: " . ($mayor ? 'true' : 'false') . "<br>";
        echo "Menor: " . ($menor ? 'true' : 'false') . "<br>";
        echo "Concatenación: " . $e . "<br>";
    ?>
</body>
</html>