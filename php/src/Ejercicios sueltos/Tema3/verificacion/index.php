<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    $logged_in = $_SESSION['logged_in'];
} else {
    $logged_in = false;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['logged_in'] = true;
        $logged_in = true;
        if (isset($_POST['remember_me'])) {
            setcookie('username', $_POST['username'], time() + (86400 * 30), '/');
        }
        header('Location: index.php');
        exit;
    } else {
        echo "Usuari o contrasenya incorrectes";
    }
}

if (isset($_COOKIE['username'])) {
    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $_COOKIE['username'];
}

if (isset($_GET['logout'])) {
    session_destroy();
    if (isset($_COOKIE['username'])) {
        setcookie('username', '', time() - 1, '/');
    }
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Formulari Iniciar Sessió</title>
</head>
<body>
    <?php if (!$logged_in) { ?>
    <h1>Iniciar Sessió</h1>
    <form action="index.php" method="POST">
        <label for='username'>Nom d'usuari: </label>
        <input type='text' id='username' name='username'/><br>
        <label for='password'>Contrasenya: </label>
        <input type='password' id='password' name='password'/><br>
        <input type='submit' value='Iniciar sessió'/>
        <input type="checkbox" id="remember_me" name="remember_me"/>
        <label for="remember_me">Recordar-me</label>
    </form>
    <?php } else { ?>
    <h1>Benvingut!</h1>
    <p>Has iniciat sessió correctament.</p>
    <form action="jocs" method="POST">
        </br>
        <label for="ofegat"><a href="../../../ofegat/index.php">Joc del penjat</a>
        </br>
        </br>
        <label for="4enratlla"><a href="../../../4enratlla/index.php">4 en ratlla</a>
    </form>
    <?php echo "<p><a href='?logout'>Tancar sessió</a></p>"; ?>
    <?php if (isset($error)) echo "<p>$error</p>" ?>
    <?php } ?>
</body>
</html>