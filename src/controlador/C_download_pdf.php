<?php
include "../modelo/conexion.php";

$id = $_GET['id'];

$sql = "SELECT * FROM arrendatario WHERE arr_id = '$id'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $archivo = $fila['arr_archivo'];
    $ruta_archivo = "../files/" . $archivo;

    if (file_exists($ruta_archivo)) {
        // Enviar el archivo al navegador
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $archivo);
        readfile($ruta_archivo);
        exit;
    } else {
        echo "El archivo no existe en el servidor.";
    }
} else {
    echo "El archivo no se encontró en la base de datos.";
}
?>
