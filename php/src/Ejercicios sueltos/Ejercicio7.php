<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de Registre</title>
</head>
<body>
    <h1>Exercici 7: Validació de Formularis</h1>
    
    <?php
    // Inicialitzem variables d'errors
    $nameError = $emailError = $passwordError = $confirmPasswordError = "";
    $name = $email = $password = $confirmPassword = "";
    $isValid = true;

    // Comprovem si el formulari ha estat enviat
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validació del nom
        if (empty($_POST["name"])) {
            $nameError = "El nom és obligatori.";
            $isValid = false;
        } else {
            $name = $_POST["name"];
        }

        // Validació del correu electrònic
        if (empty($_POST["email"])) {
            $emailError = "El correu electrònic és obligatori.";
            $isValid = false;
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailError = "El correu electrònic no és vàlid.";
            $isValid = false;
        } else {
            $email = $_POST["email"];
        }

        // Validació del password
        if (empty($_POST["password"])) {
            $passwordError = "La contrasenya és obligatòria.";
            $isValid = false;
        } elseif (strlen($_POST["password"]) < 8 || !preg_match("/[A-Z]/", $_POST["password"]) || !preg_match("/[0-9]/", $_POST["password"])) {
            $passwordError = "La contrasenya ha de tenir almenys 8 caràcters, incloure una majúscula i un número.";
            $isValid = false;
        } else {
            $password = $_POST["password"];
        }

        // Validació de la confirmació de password
        if (empty($_POST["confirm_password"])) {
            $confirmPasswordError = "La confirmació de la contrasenya és obligatòria.";
            $isValid = false;
        } elseif ($_POST["password"] != $_POST["confirm_password"]) {
            $confirmPasswordError = "Les contrasenyes no coincideixen.";
            $isValid = false;
        } else {
            $confirmPassword = $_POST["confirm_password"];
        }

        // Si totes les validacions passen
        if ($isValid) {
            echo "<p style='color:green;'>Usuari registrat correctament!</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name);?>">
        <span style="color:red;"><?php echo $nameError;?></span>
        <br><br>

        <label for="email">Correu electrònic:</label>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email);?>">
        <span style="color:red;"><?php echo $emailError;?></span>
        <br><br>

        <label for="password">Contrasenya:</label>
        <input type="password" id="password" name="password">
        <span style="color:red;"><?php echo $passwordError;?></span>
        <br><br>

        <label for="confirm_password">Confirma la contrasenya:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <span style="color:red;"><?php echo $confirmPasswordError;?></span>
        <br><br>

        <input type="submit" value="Registrar-se">
    </form>
</body>
</html>
