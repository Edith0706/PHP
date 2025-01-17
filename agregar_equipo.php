<?php
include 'conexion.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $fechaMtto = $_POST['fechaMtto'];
    $proximoMtto = $_POST['proximoMtto'];

    // Generar un nuevo id para el equipo
    $queryId = "SELECT MAX(id_Equipo) AS max_id FROM Equipo_Medico";
    $resultId = sqlsrv_query($conn, $queryId);
    $rowId = sqlsrv_fetch_array($resultId, SQLSRV_FETCH_ASSOC);
    $newId = 'EQ' . str_pad((int)substr($rowId['max_id'], 2) + 1, 3, '0', STR_PAD_LEFT);

    // Insertar el nuevo equipo en la tabla Equipo_Medico
    $queryEquipo = "INSERT INTO Equipo_Medico (id_Equipo, Nombre_Activo, Folio, Marca, No_Serie, id_Ubi, id_SubUbi, idEstatus, idPertenencia, idMP) 
                    VALUES (?, ?, 'FOL999', 'Generica', '999999', 'U001', 1, 1, 1, 1)";
    $paramsEquipo = array($newId, $nombre);
    $resultEquipo = sqlsrv_query($conn, $queryEquipo, $paramsEquipo);

    // Insertar la información del mantenimiento preventivo
    $queryMtto = "INSERT INTO MantenimientosPreventivos (id_Equipo, fechaMtto, proximoMtto) VALUES (?, ?, ?)";
    $paramsMtto = array($newId, $fechaMtto, $proximoMtto);
    $resultMtto = sqlsrv_query($conn, $queryMtto, $paramsMtto);

    if ($resultEquipo && $resultMtto) {
        $message = "Equipo agregado exitosamente";
    } else {
        $message = "Error al agregar equipo";
        die(print_r(sqlsrv_errors(), true));
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Agregar Equipo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Resultado de Agregar Equipo</h1>
        <div class="message">
            <?php echo $message; ?>
        </div>
        <br>
        <a href="index.php"><button>Volver</button></a>
    </div>
</body>
</html>
