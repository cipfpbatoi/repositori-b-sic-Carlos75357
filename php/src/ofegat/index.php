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

if (!isset($token_csrf) || isset($_POST['token_csrf']) && $_POST['token_csrf'] !== $token_csrf) {
    echo 'Tienes que iniciar sesión para poder jugar';
    echo '<form method="post"> <button type="submit" name="logout" value="1">Iniciar Sesión</button> </form>';
    exit;
}

if (!isset($_SESSION['paraulaAEndevinar'])) {
    reiniciaJoc();
}

if (isset($_POST['reinicia'])) {
    reiniciaJoc();
    echo 'Juego reiniciado!';
}

if (!isset($_SESSION['intents'])) {
    $_SESSION['intents'] = 6; 
}
?>

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
        <input type="text" id="lletra" name="lletra" maxlength="1" required 
               <?php echo (comprovacioVictoria() || comprovarIntents()) ? 'disabled' : ''; ?>>
        <button type="submit" 
                <?php echo (comprovacioVictoria() || comprovarIntents()) ? 'disabled' : ''; ?>>Enviar</button>
    </form>

    <form method="post">
        <button type="submit" name="reinicia" value="1">Reinicia</button>
        <button type="submit" name="logout" value="1">Tancar Sessió</button>
    </form>

    <?php
        $lletra = $_POST['lletra'] ?? '';
        $lletresIntroduides = $_SESSION['lletresIntroduides'] ?? array();

        if (strlen($lletra) === 1) {
            if (in_array($lletra, $lletresIntroduides)) {
                echo '<span style="color: #FFD700;">Ya habías intentado la letra ' . $lletra . '</span><br>'; 
                imprimeixTauler($_SESSION['paraulaGuions']);
            } else {
                $lletresIntroduides[] = $lletra;
                $_SESSION['lletresIntroduides'] = $lletresIntroduides;
                if (comprovacioIntents($_SESSION['paraulaAEndevinar'], $lletra, $_SESSION['paraulaGuions'])) {
                    imprimeixTauler($_SESSION['paraulaGuions']);
                } else {
                    echo '<span class="incorrect">La lletra ' . $lletra . ' no està en la paraula</span><br>';
                    imprimeixTauler($_SESSION['paraulaGuions']);
                    $_SESSION['intents']--;
                }
            }
        } else {
            echo 'Introdueix nomes una lletra<br>';
            imprimeixTauler($_SESSION['paraulaGuions']);
        }

        if (comprovacioVictoria()) {
            echo '<span class="correct">HAS ACERTAT</span><br>';
        }

        if (comprovarIntents()) {
            echo '<span class="incorrect">HAS PERDUT</span><br>';
        }

        echo 'Intents restants: ' . $_SESSION['intents'];
        echo '</br>';
        echo 'Lletres intentades: ' . implode(', ', $lletresIntroduides);
    ?></body>
</html>

