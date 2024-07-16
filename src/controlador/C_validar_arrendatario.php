<?php
if (isset($_GET['id'], $_GET['accion'])) {
    if ($_GET["accion"] == "Confirma" or $_GET["accion"] == "Rechaza") {
        $id = $_GET["id"];
        $accion = $_GET["accion"];

        if ($accion == "Confirma") {
            $estado = "Comprobado";
        } else if ($accion == "Rechaza") {
            $estado = "No comprobado";
        }
        // echo $id;
        // echo $estado;
        $sql = $conexion->query("update `arrendatario` SET `arr_estado`='$estado' WHERE arr_id= $id");
        if ($sql == 1) { //si
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ok!</strong> Arrendatario ' . $accion . 'do correctamente
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        // header("Location: " . $_SERVER['HTTP_REFERER']);
        } else { //si es 0, hay error
            // echo '<div class="alert alert-danger">Error al registrar persona</div>';
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong> Error al ' . $accion . ' arrendatario
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
}
//     $estado = "No se ah dado acción";
?>