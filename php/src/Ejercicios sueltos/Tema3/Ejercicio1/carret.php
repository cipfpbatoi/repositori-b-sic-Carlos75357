<?php
session_start();

if (!isset($_SESSION['carret'])) {
    $_SESSION['carret'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producte'])) {
    $producte = $_POST['producte'];

    if (isset($_SESSION['carret'][$producte])) {
        $_SESSION['carret'][$producte]++;
    } else {
        $_SESSION['carret'][$producte] = 1;
    }
}

if (isset($_GET['elimina'])) {
    $producteAEliminar = $_GET['elimina'];
    unset($_SESSION['carret'][$producteAEliminar]);
}

if (isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'][] = $_SERVER['PHP_SELF'];
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Carret de la compra</title>
</head>
<body>
    <h1>Carret de la compra</h1>

    <?php if (!empty($_SESSION['carret'])): ?>
        <ul>
            <?php foreach ($_SESSION['carret'] as $producte => $quantitat): ?>
                <li>
                    <?= htmlspecialchars($producte) ?>: <?= $quantitat ?> 
                    <a href="carret.php?elimina=<?= urlencode($producte) ?>">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>El carret està buit.</p>
    <?php endif; ?>

    <a href="Ejercicio1.php">Tornar a la selecció de productes</a>
</body>
</html>
