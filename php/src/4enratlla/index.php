<?php
session_start();
include 'funcions.php';

if(isset($_POST['logout'])) {
    logout();
}

if (isset($_COOKIE['token_csrf'])) {
    $token_csrf = $_COOKIE['token_csrf'];
} elseif (isset($_SESSION['token_csrf'])) {
    $token_csrf = $_SESSION['token_csrf'];
}

if (!isset($token_csrf) || (isset($_POST['token_csrf']) && $_POST['token_csrf'] !== $token_csrf)) {
    echo 'Tienes que iniciar sesión para poder jugar';
    echo '<form method="post"> <button type="submit" name="logout" value="1">Iniciar Sesión</button> </form>';
    exit;
}

if (isset($_POST['reiniciar'])) {
    reiniciarJoc();
    echo 'Juego reiniciado!';
}

$fila = 8;
$columna = 7;

if (!isset($_SESSION['graella'])) {
    $graella = inicialitzarGraella($fila, $columna);
    $_SESSION['graella'] = $graella;
    $_SESSION['guanyador'] = false;
} else {
    $graella = $_SESSION['graella'];
}


if (!isset($_SESSION['player'])) {
    $_SESSION['player'] = 1;
}

$guanyador = $_SESSION['guanyador'];

if (isset($_POST['columna']) && !$guanyador) { 

    $num = (int)$_POST['columna'];
    $player = $_SESSION['player'];

    $filaMovida = ferMoviment($player, $num, $graella);
    if ($filaMovida == -1) {
        echo "Columna llena. Elige otra columna.";
        exit();
    }

    $_SESSION['graella'] = $graella;

    echo "Jugador actual: $player\n";

    $guanyador = comprovarGuanyador($graella, $player);
    $_SESSION['guanyador'] = $guanyador; // Guarda el resultado en la sesión

    if ($guanyador) {
        echo "¡El jugador $player ha ganado!" . PHP_EOL;
        echo "</br></br><h2>No puedes seguir jugando. Has ganado.</h2>";
        // exit(); 
    }    

    $_SESSION['player'] = ($player == 1) ? 2 : 1;
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
            border: 10px dotted #fff;
            background-color: #000;
            display: inline-block;
            margin: 10px;
        }
        .player1 {
            background-color: red;
        }
        .player2 {
            background-color: yellow;
        }
        .buid {
            background-color: white;
            border-color: #000;
        }
        button {
            width: 100%;
            height: 100%;
            font-size: 1.5em;
        }
        .disabled { 
            pointer-events: none; 
            opacity: 0.5;
        }
        .botones {
            width: 150px;
            height: 70px;
        }
    </style>
</head>
<body>

<h1>Joc de 4 en ratlla</h1>

<?php
pintarGraella($_SESSION['graella'], 8, 7);
?>

<form method="post" class="botones">
    <button type="submit" name="reiniciar">Reiniciar</button>
    <button type="submit" name="logout">Tancar sessió</button>
</form>

</body>
</html>
