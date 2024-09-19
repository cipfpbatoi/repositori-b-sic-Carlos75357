<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 4</h1>
    <?php        
        $cadena = "Ejemplo de texto para vocales";
        
        $cadena_minuscula = strtolower($cadena);

        function contar_vocales($cadena_minuscula) {
            $vocales = 0; 
            for ($i = 0; $i < strlen($cadena_minuscula); $i++) {
                if (in_array($cadena_minuscula[$i], ['a', 'e', 'i', 'o', 'u'])) {
                    $vocales++;
                }
            }
            return $vocales; 
        }

        $vocales_en_cadena = contar_vocales($cadena_minuscula);

        echo "El número de vocales en la cadena es: " . $vocales_en_cadena;
    ?>
</body>
</html>
