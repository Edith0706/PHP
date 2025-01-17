<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Equipo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Equipo</h1>
        <form action="agregar_equipo.php" method="POST">
            <label for="nombre">Nombre del Equipo:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br><br>
            <label for="fechaMtto">Fecha de Mantenimiento:</label>
            <input type="date" id="fechaMtto" name="fechaMtto" required>
            <br><br>
            <label for="proximoMtto">Próxima Fecha de Mantenimiento:</label>
            <input type="date" id="proximoMtto" name="proximoMtto" required>
            <br><br>
            <button type="submit">Agregar Equipo</button>
        </form>
        <br>
        <a href="index.php"><button>Volver</button></a>
    </div>
</body>
</html>
