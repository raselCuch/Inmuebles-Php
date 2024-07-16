<?php
if (!empty($_POST["btnModificar"])) {
    $pis_id = $_POST["pis_id"];
    $pis_est_alquilado = $_POST["pis_est_alquilado"];
    $pis_est_alta = $_POST["pis_est_alta"];


    // $conexion, es la variable conexion
    $sql = $conexion->query("UPDATE piso SET pis_est_alquilado = '$pis_est_alquilado', pis_est_alta = '$pis_est_alta'
    WHERE pis_id = $pis_id");

    if ($sql == 1) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Ok!</strong> Piso modificado correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong> Error al modificar piso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
