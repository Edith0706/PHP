<?php
include 'conexion.php';

// Consultar los equipos médicos de la base de datos
$sql = "SELECT Nombre_Activo FROM Equipo_Medico";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$equipos = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $equipos[] = $row['Nombre_Activo'];
}

sqlsrv_free_stmt($stmt);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Equipo Médico</title>
</head>
<body>
    <h1>Seleccionar Equipo Médico</h1>
    <form action="mantenimiento.php" method="GET">
        <label for="equipo">Equipo Médico:</label>
        <select name="equipo" id="equipo" required>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?php echo $equipo; ?>"><?php echo $equipo; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Ver Mantenimiento</button>
    </form>
</body>
</html>
