<?php
session_start();

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

$conn = mysqli_connect('localhost', 'root', '', 'recetasfaciles');

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["usuario"]) && isset($_POST["contraseña"])) {
        $usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
        $contraseña = mysqli_real_escape_string($conn, $_POST["contraseña"]);

        $sql = "SELECT * FROM perfil WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['usuario'] = $usuario;
            header("Location: main.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Por favor, complete todos los campos.</div>';
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas Faciles</title>
    <link rel = "stylesheet" href = "styles.css">
</head>
<body>
    <div class="contenedorSesion">
        <form action="index.php" method="post">
            <h1>RecetasFaciles Login</h1>
            <p>Usuario: <input type="text" placeholder="Ingrese su nombre" name="usuario" required></p>
            <p>Contraseña: <input type="password" placeholder="Ingrese su contraseña" name="contraseña" required></p>
            <button type="submit" name="btningresar" class="registroBoton">Ingresar</button>
        </form>
        <a href="registrar.php" title="Crear una nueva cuenta" class="linkRegistro">¿No tienes cuenta? Regístrate aquí</a>
    </div>
</body>
</html>