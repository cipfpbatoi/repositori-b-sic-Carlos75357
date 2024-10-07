<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
    <style>
        .error {
            color: red;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<form action="Ejercicio8.php" method="post">
    <div>
        <label for="module">Mòdul:</label>
        <select id="module" name="module">
            <?php
            $modules = ["Matemàtiques", "Història", "Física", "Literatura"];
            foreach ($modules as $mod) {
                echo "<option value='$mod'>$mod</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label for="publisher">Editorial:</label>
        <input type="text" id="publisher" name="publisher" value="">
    </div>

    <div>
        <label for="price">Preu:</label>
        <input type="text" id="price" name="price" value="">
    </div>

    <div>
        <label for="pages">Pàgines:</label>
        <input type="text" id="pages" name="pages" value="">
    </div>

    <div>
        <label for="status">Estat:</label>
        <?php
        $statuses = ["Disponible", "No disponible"];
        foreach ($statuses as $stat) {
            echo "<input type='radio' name='status' value='$stat'>$stat ";
        }
        ?>
    </div>

    <div>
        <label for="comments">Comentaris:</label>
        <textarea id="comments" name="comments"></textarea>
    </div>

    <div>
        <button type="submit">Donar d'alta</button>
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $module = $_POST['module'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $pages = $_POST['pages'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];

    echo "<h2>Detalls del llibre:</h2>";
    echo "<table>";
    echo "<tr><th>Mòdul</th><td>$module</td></tr>";
    echo "<tr><th>Editorial</th><td>$publisher</td></tr>";
    echo "<tr><th>Preu</th><td>$price</td></tr>";
    echo "<tr><th>Pàgines</th><td>$pages</td></tr>";
    echo "<tr><th>Estat</th><td>$status</td></tr>";
    echo "<tr><th>Comentaris</th><td>$comments</td></tr>";
    echo "</table>";
}
?>

</body>
</html>
