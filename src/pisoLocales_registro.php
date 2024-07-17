<?php
include("Apertura_header.php");
include("Apertura_navbar.php");
include("Apertura_barraLateral.php");
include "modelo/conexion.php";
?>

<!-- Contenido -->
<main class="mt-5 pt-4">
  <h3 class="text p-1">Registro de locales</h3>
  <div class="container-fluid row">
    <!-- <h4 class="text p-1">Locales</h4> -->
    <?php
    $idPiso = $_GET["id"];
    $sql = "SELECT * FROM local WHERE loc_pis_id = '$idPiso'";
    $result = mysqli_query($conexion, $sql);
    
    // $idInmueble = $idInmueble;
            $sql1 = $conexion->query("SELECT pis_inm_id FROM piso WHERE pis_id = $idPiso;");
            while ($datos = $sql1->fetch_object()) {
                $idInmueble = $datos->pis_inm_id;
            }
    
    ?>
    
  <a class="col-2 btn btn-primary" href="pisoRegistro.php?id=<?= $idInmueble?>">Regresar a pisos</a>
    <div class="col-12 p-3">
      <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
          <tr>
            <th>ID local</th>
            <th>loc_pis_id</th>
            <th>N° de local</th>
            <th>Detalle de local</th>
            <th>Precio</th>
            <th>Alquilado?</th>
            <th>Alta?</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['loc_id'] . "</td>";
            echo "<td>" . $row['loc_pis_id'] . "</td>";
            echo "<td>" . $row['loc_numero'] . "</td>";
            echo "<td>" . $row['loc_detalle'] . "</td>";
            echo "<td>S/. " . $row['loc_precio'] . "</td>";
            echo "<td>" . $row['loc_est_alquilado'] . "</td>";
            echo "<td>" . $row['loc_est_alta'] . "</td>";
            echo "<td class = 'text-center'>
                    <a class='btn btn-small btn-info' href='pisoLocal_modificar2.php?id=" . $row['loc_id'] . "'><i class='bi bi-nut-fill'></i></a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Bibliotecas JS -->
<?php include("Apertura_biblierias_Js.php"); ?>
</body>
</html>
