<?php
if (!empty($_GET["pis_id"])) {
  $pis_id = $_GET["pis_id"];
  // Realizar la consulta de eliminación en la base de datos
  $sql = "DELETE FROM piso WHERE pis_id = $pis_id";
  $resultado = $conexion->query($sql);

  if ($resultado) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ok!</strong> Piso eliminado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> No se pudo eliminar el registro.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
}
?>