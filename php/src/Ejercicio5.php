<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taula de Multiplicar</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Exercici 5: Taula de Multiplicar del 1 al 5</h1>
    <table>
        <thead>
            <tr>
                <th>Multiplicar</th>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<th>$i</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $taula = array();
                for ($i = 1; $i <= 5; $i++) {
                    echo "<tr>";
                    echo "<th>$i</th>";
                    for ($j = 1; $j <= 5; $j++) {
                        $taula[$i][$j] = $i * $j;
                        echo "<td>" . $taula[$i][$j] . "</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
