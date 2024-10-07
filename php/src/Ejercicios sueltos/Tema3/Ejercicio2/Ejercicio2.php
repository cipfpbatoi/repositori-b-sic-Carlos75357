<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $_POST['username'];
        if (isset($_POST['remember_me'])) {
            setcookie('username', $_POST['username'], time() + (86400 * 30), '/');
        }
        header('Location: Ejercicio2.php');
        exit;
    } else {
        $error = 'Usuari o contrasenya incorrectes';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    if (isset($_COOKIE['username'])) {
        setcookie('username', '', time() - 1, '/');
    }
    header('Location: Ejercicio2.php');
    exit;
}

if (isset($_COOKIE['username'])) {
    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $_COOKIE['username'];
}

if (isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'][] = $_SERVER['PHP_SELF'];
}
if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = array();
}

$_SESSION['paginas_visitadas'][] = $_SERVER['PHP_SELF'];

if (isset($_SESSION['authenticated'])) {
    $username = $_SESSION['username'];
    echo "<p>Hola, $username!</p>";
    echo "<p><a href='?logout'>Tancar sessió</a></p>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <title>Formulari Iniciar Sessió</title>
    </head>
    <body>
        <h1>Iniciar Sessió</h1>
        <form action="Ejercicio2.php" method="POST">
            <label for='username'>Nom d'usuari: </label>
            <input type='text' id='username' name='username'/><br>
            <label for='password'>Contrasenya: </label>
            <input type='password' id='password' name='password'/><br>
            <input type='submit' value='Iniciar sessió'/>
            <input type="checkbox" id="remember_me" name="remember_me"/>
            <label for="remember_me">Recordar-me</label>
        </form>
        <?php if (isset($error)) echo "<p>$error</p>" ?>
    </body>
    </html>
    <?php
}