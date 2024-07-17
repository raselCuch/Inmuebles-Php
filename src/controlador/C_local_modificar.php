<?php
if (!empty($_POST["btnModificar"])) {
    $loc_id = $_POST["loc_id"];
    $loc_detalle = $_POST["loc_detalle"];
    $loc_precio = $_POST["loc_precio"];
    $loc_pis_id = $_POST["loc_pis_id"];
    $loc_est_alquilado = $_POST["loc_est_alquilado"];
    $loc_est_alta = $_POST["loc_est_alta"];
    
    // echo "$loc_id<br>";
    // echo "$loc_detalle<br>";
    // echo "$loc_precio<br>";
    // echo "$loc_pis_id<br>";
    $sql = "UPDATE local SET loc_detalle = '$loc_detalle', loc_precio = '$loc_precio', loc_est_alta = '$loc_est_alta', loc_est_alquilado = '$loc_est_alquilado' 
            WHERE loc_id = '$loc_id'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // echo "Los datos de la tabla local se actualizaron correctamente.";
        // echo "<script language='JavaScript'>
        // alert('Se ah modificado el local correctamente.');
        // location.assign('../modulos/pisoLocales_registro.php?id=" . $loc_pis_id . "');
        // </script>
        // ";

        echo '<script type="text/javascript">
                alert("Se ah modificado el local correctamente.");
                window.location.href = "inmueble.php";
                </script>';
    } else {
        echo "Error al actualizar los datos de la tabla local: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
