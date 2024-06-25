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
        <form action="registrar.php" method="post">
            <h1>RecetasFaciles Registrar</h1>
            <p>Usuario: <input type="text" placeholder="Ingrese su Usuario" name="usuario" required></p>
            <p>Contraseña: <input type="password" placeholder="Ingrese su Contraseña" name="contraseña" required></p>
            <button type="submit" class="registroBoton">Registrar</button>
        </form>
        <a href="index.php" title="Crear una nueva cuenta" class="linkRegistro">¿Ya tienes cuenta? Inicia Sesion aquí</a>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect('localhost', 'root', '', 'recetasfaciles');

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        if (isset($_POST["usuario"]) && isset($_POST["contraseña"])) {
            $usuario = $_POST["usuario"];
            $contraseña = $_POST["contraseña"];

            $stmt = $conn->prepare("INSERT INTO perfil (usuario, contraseña) VALUES (?, ?)");
            
            if ($stmt) {
                $stmt->bind_param("ss", $usuario, $contraseña);
            
                if ($stmt->execute() === TRUE) {
                    $message = "Registro exitoso";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Location:index.php");
                } else {
                    $message = "Error: " . $stmt->error;
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            
                $stmt->close();
            } else {
                echo "Error al preparar la consulta: " . $conn->error . "<br>";
            }
        } else {
            echo "Error: faltan datos requeridos<br>";
        }
    }
?>
    </div>
</body>
</html>