<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'recetasfaciles');

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$id = isset($_GET['id_receta']) ? (int)$_GET['id_receta'] : 0;

if ($id <= 0) {
    die("ID de receta no válido.");
}

$sql = "SELECT * FROM recetas WHERE id_receta = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $receta = mysqli_fetch_assoc($result);
} else {
    echo ($id);
    echo "Receta no encontrada.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <link rel = "stylesheet" href = "styles.css">
</head>
<body>
    <div class = "contenedorSesion">
        <h1>Receta de <?php $nombre = isset($_GET['nombre']); echo ($nombre)?>!</h1>
    <div class = "navegacionBarra">
            <a href = "main.php">Recetario</a>
            <a href = "agregarReceta.php">Agregar Receta</a>
            <a href = "acercade.html">Acerca De Nosotros</a>
            <a href = "index.php">Cerrar Sesion</a>
        </div>

    </div>
</body>
</html>