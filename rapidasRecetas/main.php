<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'recetasfaciles');

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT * FROM recetas";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecetasFaciles</title>
    <link rel = "stylesheet" href = "styles.css">
</head>
<body>
    <div class = "contenedorSesion">  
        <?php
        echo "<h1>Bienvenido a RecetasFaciles,  " . $_SESSION['usuario'] . "! </h1>";
        ?>
        <div class = "navegacionBarra">
            <a href = "main.php">Recetario</a>
            <a href = "agregarReceta.php">Agregar Receta</a>
            <a href = "acercade.html">Acerca De Nosotros</a>
            <a href = "index.php">Cerrar Sesion</a>
        </div>
        <div class = "contenedorRecetas">
        <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="tablaReceta">';
            echo '<h1>' . $row['nombre'] . '</h1>';
            echo '<p> ' . $row['descripcion'] . '</p>';
            echo '<img src="' . $row['imagen'] . '" alt="' . $row['nombre'] . '" style="padding:5px;object-fit:cover; width : 225px; height : 225px;">';
            echo '<br>';
            echo '</div>';
        }
    } else {
        echo '<p>No hay recetas en la base de datos.</p>';
    }
    ?>
        </div>
    </div>
</body>
</html>