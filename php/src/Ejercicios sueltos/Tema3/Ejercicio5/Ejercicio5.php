<?php
session_start();

if (isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'][] = $_SERVER['PHP_SELF'];
}
if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = array();
}

if (isset($_SESSION['paginas_visitadas'])) {
    echo "Historial de páginas visitadas durante la sesión:<br>";
    foreach ($_SESSION['paginas_visitadas'] as $pagina) {
        echo "- $pagina<br>";
    }
}