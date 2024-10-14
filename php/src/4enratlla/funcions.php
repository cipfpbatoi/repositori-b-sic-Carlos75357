<?php
function inicialitzarGraella($fila, $columna){
    $graella = array();
    for ($i = 0; $i < $fila; $i++) {
        $graella[$i] = array();
        for ($j = 0; $j < $columna; $j++) {
            $graella[$i][$j] = $i == $fila - 1 ? 3 : 0;
        }
    }
    return $graella;
}

function pintarGraella($graella, $fila, $columna){
    echo '<table>';
    for ($i = 0; $i < $fila; $i++) {
        echo '<tr>';
        for ($j = 0; $j < $columna; $j++) {
            echo '<td class="';
            switch ($graella[$i][$j]) {
                case 0:
                    echo 'buid';
                    break;
                case 1:
                    echo 'player1';
                    break;
                case 2:
                    echo 'player2';
                    break;
            }
            
            if ($i == $fila - 1) {
                echo ' "><form method="post" style="margin:0;">';
                if (isset($_SESSION['guanyador']) && $_SESSION['guanyador']) {
                    echo '<button type="submit" name="columna" value="' . ($j + 1) . '" disabled>' . ($j + 1) . '</button>';
                } else {
                    echo '<button type="submit" name="columna" value="' . ($j + 1) . '">' . ($j + 1) . '</button>';
                }
                echo '</form>';
            } else {
                echo '">';
            }

            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function ferMoviment($player, $columna, &$graella) {
    for ($i = count($graella) - 1; $i >= 0; $i--) {
        if ($graella[$i][$columna - 1] === 0) {
            $graella[$i][$columna - 1] = $player; 
            return $i;
        }
    }
    return -1;
}


function reiniciarJoc() {
    $_SESSION['player'] = 1;
    $_SESSION['guanyador'] = false;
    $_SESSION['graella'] = inicialitzarGraella(8, 7);

    //session_unset();
    //header('Location: index.php');
    //exit;
}

function logout() {
    session_destroy();
    if (isset($_COOKIE['username']) || isset($_COOKIE['token_csrf'])) {
        setcookie('username', '', time() - 1, '/');
        setcookie('token_csrf','', time() - 1, '/');
    }
    header('Location: /verificacion/index.php');
    exit;
}

function comprovarGuanyador($graella, $jugador) {
    for ($i = 0; $i < 7; $i++) {
        for ($j = 0; $j < 7; $j++) {
            if ($graella[$i][$j] == $jugador) {
                if ($j + 3 < 7 && $graella[$i][$j + 1] == $jugador && $graella[$i][$j + 2] == $jugador && $graella[$i][$j + 3] == $jugador) {
                    return true;
                }
                if ($i + 3 < 7 && $graella[$i + 1][$j] == $jugador && $graella[$i + 2][$j] == $jugador && $graella[$i + 3][$j] == $jugador) {
                    return true;
                }
                if ($i + 3 < 7 && $j + 3 < 7 && $graella[$i + 1][$j + 1] == $jugador && $graella[$i + 2][$j + 2] == $jugador && $graella[$i + 3][$j + 3] == $jugador) {
                    return true;
                }
                if ($i + 3 < 7 && $j - 3 >= 0 && $graella[$i + 1][$j - 1] == $jugador && $graella[$i + 2][$j - 2] == $jugador && $graella[$i + 3][$j - 3] == $jugador) {
                    return true;
                }
            }
        }
    }
    return false;
}