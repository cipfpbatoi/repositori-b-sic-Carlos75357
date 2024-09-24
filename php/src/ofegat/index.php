<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Joc d'Adivinar la Paraula</title>
    <style>
        .correct { color: green; }
        .incorrect { color: red; }
    </style>
</head>
<body>
    <h1>Joc d'Adivinar la Paraula</h1>

    <form method="post">
        <label for="lletra">Introdueix una lletra:</label>
        <input type="text" id="lletra" name="lletra" maxlength="1" required>
        <button type="submit">Enviar</button>
    </form>

    <?php
        include 'funcions.php';

        $paraulaAEndevinar = "ejemplo";

        $paraulaGuions = array_fill(0, strlen($paraulaAEndevinar), '_');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            imprimeixTauler($paraulaGuions);
        }

        $lletra = $_POST['lletra'] ?? '';

        if (strlen($lletra) === 1) {
            if (comprovacioIntents($paraulaAEndevinar, $lletra, $paraulaGuions)) {
                imprimeixTauler($paraulaGuions);
            } else {
                echo '<span class="incorrect">La lletra ' . $lletra . ' no està en la paraula</span>';
            }
        } else {
            echo 'Introdueix nomes una lletra';
        }
    ?>
</body>
</html>
