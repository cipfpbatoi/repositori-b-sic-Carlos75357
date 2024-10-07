<?php
session_start();

if (!isset($_SESSION['token_csrf'])) {
    $token_csrf = bin2hex(random_bytes(32));
    $_SESSION['token_csrf'] = $token_csrf;
} else {
    $token_csrf = $_SESSION['token_csrf'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['token_csrf']) && $_POST['token_csrf'] === $_SESSION['token_csrf']) {
        echo "El formulari s'ha enviat correctament!";
    } else {
        echo "Error: el token CSRF no és vàlid.";
    }
}

if (isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'][] = $_SERVER['PHP_SELF'];
}
if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = array();
}

$_SESSION['paginas_visitadas'][] = $_SERVER['PHP_SELF'];
?>

<form action="Ejercicio4.php" method="POST">
    <input type="hidden" name="token_csrf" value="<?php echo $token_csrf; ?>">
    <label for="name">Nom: </label>
    <input type="name" name="name" id="name"></br>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email"></br>
    <label for="message">Missatge: </label>
    <textarea name="message" id="message" cols="30" rows="10"></textarea></br>
    <input type="submit" value="Enviar">
</form>