<?php
session_start();
include 'funcions.php';

if (!isset($_SESSION['graella'])) {
    $fila = 8;
    $columna = 7;
    $graella = inicialitzarGraella($fila, $columna);
    $_SESSION['graella'] = $graella;
} else {
    $graella = $_SESSION['graella'];
}

if (!isset($_SESSION['player'])) {
    $_SESSION['player'] = 1;
}

if (isset($_POST['columna'])) {
    $num = (int)$_POST['columna'];
    $player = $_SESSION['player'];

    ferMoviment($player, $num, $graella);
    $_SESSION['graella'] = $graella;

    if ($player == 1) {
        $_SESSION['player'] = 2;
    } else {
        $_SESSION['player'] = 1;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Joc de 4 en ratlla</title>
    <style>
        table { border-collapse: collapse; }
        td {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 10px dotted #fff; /* Cercle amb punts blancs */
            background-color: #000; /* Fons negre o pot ser un altre color */
            display: inline-block;
            margin: 10px;
        }
        .player1 {
            background-color: red; /* Color vermell per un dels jugadors */
        }
        .player2 {
            background-color: yellow; /* Color groc per l'altre jugador */
        }
        .buid {
            background-color: white; /* Color blanc per cercles buits */
            border-color: #000; /* Puntes negres per millor visibilitat */
        }
        button {
            width: 100%;
            height: 100%;
            font-size: 1.5em;
        }
    </style>
</head>
<body>

<h1>Joc de 4 en ratlla</h1>


<?php
pintarGraella($_SESSION['graella'], 8, 7);
?>

</body>
</html>
