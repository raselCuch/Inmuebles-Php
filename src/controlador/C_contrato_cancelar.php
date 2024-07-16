<?php 
if (isset($_GET['arrendatario'], $_GET['inmueble'], $_GET['modalidad'])) {
    $nombreArrendatario = $_GET['arrendatario'];
    $nombreInmueble = $_GET['inmueble'];
    $modalidadContrato = $_GET['modalidad'];

    // Actualizar el valor de 'contr_vigencia' a 'No vigente' y otros campos relacionados
    $sql = "UPDATE contrato AS c
            JOIN arrendatario AS a ON c.contr_arr_id = a.arr_id
            JOIN local AS l ON c.contr_loc_id = l.loc_id
            JOIN piso AS p ON l.loc_pis_id = p.pis_id
            JOIN inmueble AS i ON p.pis_inm_id = i.inm_id
            SET c.contr_vigencia = 'No vigente',
                p.pis_est_alquilado = 'No alquilado',
                l.loc_est_alquilado = 'No alquilado',
                i.inm_est_alquilado = 'No alquilado'
            WHERE CONCAT(a.arr_nombres, ', ', a.arr_apellidos) = '$nombreArrendatario'
            AND CONCAT(i.inm_tipo, '-', i.inm_id) = '$nombreInmueble'
            AND c.contr_modalidad = '$modalidadContrato'";

    if (mysqli_query($conexion, $sql)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ok!</strong> Se canceló el contrato.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error al actualizar el valor: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}

?>