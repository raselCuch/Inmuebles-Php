<?php
include("Apertura_header.php");
include("Apertura_navbar.php");
include("Apertura_barraLateral.php");
include "modelo/conexion.php";
?>

<!-- Contenido -->
<main class="mt-5 pt-4 bg-light">
  <h3 class="text p-1">Registro de los pisos</h3>
  <div class="container-fluid row">
    <!-- <h4 class="text p-1">Pisos</h4> -->
    <?php
    $idInmueble = $_GET["id"];
    $sql = "SELECT * FROM piso WHERE pis_inm_id = '$idInmueble'";
    $result = mysqli_query($conexion, $sql);
    ?>
    <div class="col-12 p-3">
      <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
          <tr>
            <th>ID piso</th>
            <th>Inmueble</th>
            <th>N° de piso</th>
            <th>Cantidad de locales</th>
            <th>Alquilado?</th>
            <th>Alta?</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['pis_id'] . "</td>";
            echo "<td>" . $row['pis_inm_id'] . "</td>";
            echo "<td>" . $row['pis_numero'] . "</td>";
            echo "<td>" . $row['pis_n_locales'] . "</td>";
            echo "<td>" . $row['pis_est_alquilado'] . "</td>";
            echo "<td>" . $row['pis_est_alta'] . "</td>";
            echo "<td class = 'text-center'>
                    <div>
                    <a class='btn btn-small btn-warning' href='pisoRegistro2.php?id=". $row['pis_id'] ." &inm_id=". $row['pis_inm_id']."'>Registrar piso <i class='bi bi-pencil-square'></i></a>
                    <a class='btn btn-small btn-info' href='pisoLocales_registro.php?id=" . $row['pis_id'] . "'><i class='bi bi-nut-fill'></i></a>
                    </div>
                  </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <!-- 
        pisoRegistro2.php?id=". $row['pis_id'] ." &inm_id=.". $row['pis_inm_id']."
        pisoRegistro2.php?id=" . $row['pis_id'] . "
       -->
    </div>
  </div>
</main>

<!-- Bibliotecas JS -->
<?php include("Apertura_biblierias_Js.php"); ?>
</body>
</html>
