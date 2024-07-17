<?php
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sqll=$conexion->query("delete from inmueble where inm_id=$id");
    if ($sqll==1) {
        // echo '<div class="alert alert-danger">Eliminado correctamente</div>';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ok!</strong> Eliminado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        // echo '<div class="alert alert-danger">Error al eliminar</div>';
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong> Error al eliminar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
}
?>
