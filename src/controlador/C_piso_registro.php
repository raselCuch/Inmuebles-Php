<?php
if (!empty($_POST["btnModificar"])) {
    $inm_id=$_POST["inm_id"];
    $pis_id = $_POST["pis_id"];
    $pis_n_locales = $_POST["pis_n_locales"];

    // Realizar la actualización en la tabla "piso"
    $updatePisoQuery = "UPDATE piso SET pis_n_locales = $pis_n_locales WHERE pis_id = $pis_id";
    // Ejecutar la consulta de actualización en la base de datos (reemplaza $conexion con tu conexión real)
    $conexion->query($updatePisoQuery);

    // Realizar los registros en la tabla "local"
    for ($i = 1; $i <= $pis_n_locales; $i++) {
        $loc_pis_id = $pis_id;
        $loc_numero = $i;
        $loc_est_alquilado = "No alquilado";
        $loc_est_alta = "De alta";

        // Insertar el registro en la tabla "local"
        $insertLocalQuery = "INSERT INTO local (loc_pis_id, loc_numero, loc_est_alquilado, loc_est_alta) 
                            VALUES ('$loc_pis_id', '$loc_numero', '$loc_est_alquilado', '$loc_est_alta')";
        // Ejecutar la consulta de inserción en la base de datos (reemplaza $conexion con tu conexión real)
        $conexion->query($insertLocalQuery);
    }

        // location.assign('../modulos/pisoRegistro.php');
        // pisoRegistro.php?id=81#?id=165 
    // Mensaje de éxito y redireccionamiento
    echo "<script language='JavaScript'>
        alert('Se ah registrado el piso correctamente.');
        location.assign('../modulos/pisoRegistro.php?id=" . $inm_id . "');
        </script>
        ";
}
?>
