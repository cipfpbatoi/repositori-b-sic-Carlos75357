<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 6</h1>
    <?php

    $nota = 8;
    
    $resultat = match ($nota) {
        10 => "Excel·lent",
        8, 9 => "Molt bé",
        5, 6, 7 => "Bé",
        default => "Insuficient"
    };

    echo $resultat;
    
    ?>
</body>
</html>