<?php
include 'conexion.php';

$equipoId = $_POST['equipo'];

// Obtener la fecha del próximo mantenimiento para el equipo seleccionado
$query = "SELECT proximoMtto FROM MantenimientosPreventivos WHERE id_Equipo = ?";
$params = array($equipoId);
$result = sqlsrv_query($conn, $query, $params);
if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$proximoMtto = null;
if ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $proximoMtto = $row['proximoMtto']->format('Y-m-d');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Próximo Mantenimiento</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Próximo Mantenimiento</h1>
        <?php if ($proximoMtto): ?>
            <p>El próximo mantenimiento para el equipo seleccionado es el: <strong><?php echo $proximoMtto; ?></strong></p>
        <?php else: ?>
            <p>No se encontró información de mantenimiento para el equipo seleccionado.</p>
        <?php endif; ?>
        <br>
        <a href="index.php"><button>Volver</button></a>
    </div>
</body>
</html>
