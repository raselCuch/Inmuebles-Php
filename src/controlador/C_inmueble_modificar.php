<?php
if (!empty($_POST["btnRegistrar"])) {
  // if ((!empty($_POST["tipo"]) and !empty($_POST["ubicacion"]) and
  //   !empty($_POST["detalle"]) and !empty($_POST["Npisos"]))) { // echo "Todo good";
    //
    $id = $_POST["id"];
    // $tipo = $_POST["tipo"];
    $ubicacion = $_POST["ubicacion"];
    $detalle = $_POST["detalle"];
    $Npisos = $_POST["Npisos"];
    $estadoAlquilado = $_POST["estadoAlquilado"];
    $estadoAlta = $_POST["estadoAlta"];
    //
    $sql = $conexion->query("
    update inmueble set inm_ubicacion='$ubicacion', inm_detalle='$detalle', inm_n_pisos=$Npisos, inm_est_alquilado='$estadoAlquilado' , imn_est_alta='$estadoAlta'
        where inm_id = $id");
    if ($sql == 1) { //si
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Ok!</strong> Inmueble modificado correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      // header("Location: Apertura_header.php");
      // header("Location: Apertura_navbar.php");
      // header("Location: Apertura_barraLateral.php");
      // header("Location: inmueble.php");
      // header("Location: ../inmueble.php");
      // echo "<script language='JavaScript'> 
      //           alert('Modificado correctamente'); 
      //           location.assign('../inmueble.php'); 
      //           </script>";
    } else { //si es 0, hay error
      // echo '<div class="alert alert-danger">Error al registrar persona</div>';
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong> Error al modificar inmueble.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
}
?>