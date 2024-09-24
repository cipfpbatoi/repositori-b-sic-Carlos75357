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
            if($i == $fila - 1){
                echo ' " style="color:white;font-size:2em;">' . ($j + 1);
            }else{
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
            break; 
        }
    }
}

function comprovacioVictoria() {
    return false;
}
?>

