<?php
include 'conexion.php';

// Obtener los equipos médicos de la base de datos
$query = "SELECT id_Equipo, Nombre_Activo FROM Equipo_Medico";
$result = sqlsrv_query($conn, $query);
if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$equipos = [];
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $equipos[] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Equipo Médico</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Seleccionar Equipo Médico</h1>
        <form action="mantenimiento.php" method="POST">
            <label for="equipo">Seleccione un equipo médico:</label>
            <select name="equipo" id="equipo" required>
                <?php foreach ($equipos as $equipo): ?>
                    <option value="<?php echo $equipo['id_Equipo']; ?>">
                        <?php echo $equipo['Nombre_Activo']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <button type="submit">Ver Mantenimiento</button>
        </form>
        <br>
        <a href="agg_equipo.php"><button>Agregar Nuevo Equipo</button></a>
    </div>
</body>
</html>
