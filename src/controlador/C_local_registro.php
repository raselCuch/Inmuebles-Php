<?php
if (!empty($_POST["btnModificar"])) {
    $loc_id = $_POST["loc_id"];
    $loc_detalle = $_POST["loc_detalle"];
    $loc_precio = $_POST["loc_precio"];
    $loc_pis_id = $_POST["loc_pis_id"];
    // Consulta SQL para actualizar los datos en la tabla local
    $sql = "UPDATE local SET loc_detalle = '$loc_detalle', loc_precio = '$loc_precio' WHERE loc_id = '$loc_id'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // echo "Los datos de la tabla local se actualizaron correctamente.";
        echo "<script language='JavaScript'>
        alert('Se ah registrado el local correctamente.');
        location.assign('../modulos/pisoLocales_registro.php?id=" . $loc_pis_id . "');
        </script>
        ";
    } else {
        echo "Error al actualizar los datos de la tabla local: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
