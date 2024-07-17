<?php
if (!empty($_POST["btnRegistrar"])) {
    if ((!empty($_POST["tipo"]) and !empty($_POST["ubicacion"]) and 
    !empty($_POST["detalle"]) and !empty($_POST["Npisos"]))) {// echo "Todo good";
        $tipo=$_POST["tipo"];
        $ubicacion=$_POST["ubicacion"];
        $detalle=$_POST["detalle"];
        $Npisos=$_POST["Npisos"];
        // $estado=$_POST["estado"]
        $sql=$conexion->query ("insert into inmueble (inm_tipo, inm_ubicacion, inm_detalle, inm_n_pisos, inm_est_alquilado, imn_est_alta) 
        values('$tipo', '$ubicacion', '$detalle', '$Npisos', 'No alquilado', 'De alta')");
        if ($sql==1) {
            // echo '<div class="alert alert-success">Inmueble registrado correctamente</div>';
          //   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          //   <strong>Ok!</strong> Inmueble registrado correctamente.
          //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          // </div>';
          // location.assign('../modulos/pisoLocales_gestion2.php'); 

          echo '<script type="text/javascript">
                alert("Inmueble registrado correctamente");
                window.location.href = "inmueble.php";
                </script>';

          $sql=$conexion->query ("select inm_id from inmueble order by inm_id asc");
          while ($row = $sql->fetch_assoc()) {
            $lastId = $row['inm_id'];
          }
          echo "<script language='JavaScript'>
          alert('Inmueble registrado correctamente.'); 
          location.assign('../modulos/pisoRegistro.php?id=" . $lastId . "'); 
          </script>";
        } else {
            // echo '<div class="alert alert-danger">Error al registrar persona</div>';
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong> Error al registrar inmueble.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        }else{
            // echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Alguno de los campos esta vacio.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
}
?>