<html>
<body>
<?php

include_once("Helpers/funciones.php");
$resultat = suma(5, 3);

include_once('Helpers/funciones.php');
saludar();

// Assignació de valors
$x = 5;
$y = "Hola món";

// Operacions aritmètiques
$suma = $x + 10;
$producte = $x * 2;

// Concatenació de cadenes
$nom = "Joan";
$salutacio = $y . ", " . $nom;

// Impressió de resultats
echo "<br>";
echo "Resultado de la función suma(5, 3): ";
echo $resultat;
echo "<br>";
echo $y;  // Hola món
echo "<br>";
echo "Suma: ";
echo $suma;  // 15
echo "<br>";
echo "Producte: ";
echo $producte;  // 10
echo "<br>";
echo $salutacio;  // Hola món, Joan
?>
</body>
</html>