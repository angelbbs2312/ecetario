

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas Faciles</title>
    <link rel = "stylesheet" href = "styles.css">
</head>
<body>
    <div class = "contenedorSesion">
        <h1>Agregar Receta</h1>
    <div class = "navegacionBarra">
            <a href = "main.php">Recetario</a>
            <a href = "agregarReceta.php">Agregar Receta</a>
            <a href = "acercade.html">Acerca De Nosotros</a>
            <a href = "index.php">Cerrar Sesion</a>
        </div>
    <div class = "formularioAgregar">
    <form method="post" action="agregarReceta.php" enctype="multipart/form-data">
        Nombre:<br>
        <input type="text" name="nombre" required>
        <br>
        Descripcion:<br>
        <textarea name="descripcion" required></textarea>
        <br>
        Imagen:<br>
        <input type="file" name="imagen" required>
        <br><br>
        <input type="submit" value="Agregar Receta">
    </form>
        </div>
    </div>
</body>
</html>