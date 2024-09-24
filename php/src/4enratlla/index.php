<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Joc d'Adivinar la Paraula</title>
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

    </style>
</head>
<body>

    <h1>Joc de 4 en ratlla</h1>

    <form method="post">
        <label for="num">Escoge una columna:</label>
        <select id="num" name="num" required>
        <?php
            for ($j = 1; $j <= 7; $j++) {
                echo '<option value="' . $j . '">' . $j . '</option>';
            }
            ?>
        </select>
        <button type="submit">Fer Moviment</button>
    </form>

    <?php
        include 'funcions.php';

        $fila = 8;
        $columna = 7;
        $graella = inicialitzarGraella($fila, $columna);

        ferMoviment(1, 2, $graella);
        ferMoviment(2, 2, $graella);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num = (int)$_POST['num']; 
            $player = 1;

            ferMoviment($player, $num, $graella);
        }

        pintarGraella($graella, $fila, $columna);
    ?>

</body>
</html>
