<?php
function imprimeixTauler($paraulaGuions) {
    echo "Progrés del joc:<br>\n";
    echo "+---------------------+<br>\n";
    echo "| " . implode(' | ', $paraulaGuions) . " |<br>\n";
    echo "+---------------------+\n<br>\n";
}

function comprovacioIntents($paraulaAEndevinar, $lletra, &$arrayDeLletres) {
    $posicions = [];
    for ($i = 0; $i < strlen($paraulaAEndevinar); $i++) {
        if ($paraulaAEndevinar[$i] === $lletra) {
            $posicions[] = $i;
        }
    }

    if (count($posicions) > 0) {
        foreach ($posicions as $posicio) {
            $arrayDeLletres[$posicio] = $lletra;
        }
        return true;
    } else {
        return false;
    }
}

function reiniciaJoc() {
    //session_destroy();
    // session_unset();
    $_SESSION['paraulaAEndevinar'] = "ejemplo";
    $_SESSION['paraulaGuions'] = array_fill(0, strlen($_SESSION['paraulaAEndevinar']), '_');
    $_SESSION['lletresIntroduides'] = array();
    //header('Location: index.php');
    //exit;
    //imprimeixTauler($_SESSION['paraulaGuions']);
    //session_start();
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

function comprovacioVictoria() {
    $paraula = implode('', $_SESSION['paraulaGuions']);
    if ($paraula === $_SESSION['paraulaAEndevinar']) {
        return true;
    } else {
        return false;
    }
}

function comprovarIntents() {
    if ($_SESSION['intents'] === 0) {
        return true;
    } else {
        return false;
    }
}