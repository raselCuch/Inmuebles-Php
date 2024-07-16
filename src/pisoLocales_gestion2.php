<?php
include("Apertura_header.php");
include("Apertura_navbar.php");
include("Apertura_barraLateral.php");
include "modelo/conexion.php";
?>

<main class="mt-5 pt-4 bg-light">
  <script>
    function eliminar() {
      var respuesta = confirm("Está seguro que desea eliminar?");
      return respuesta;
    }
  </script>
  <h3 class="text p-1">Gestión de pisos</h3>
  <?php
      include "modelo/conexion.php";
      include "controlador/C_piso_eliminar.php"
      ?>
  <div class="container-fluid row">
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
            <th>ID Inmueble</th>
            <th>N° de piso</th>
            <th>Cantidad de locales</th>
            <th>Alquilado?</th>
            <th>Alta?</th>
            <th class='text-center'>Opciones</th>
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
                    <a class='btn btn-small btn-warning' href='pisoLocal_modificar.php?id=" . $row['pis_id'] . "'><i class='bi bi-pencil-square'></i></a>
                    <a class='btn btn-small btn-info' href='pisoLocales_gestion3.php?id=" . $row['pis_id'] . "'>Locales <i class='bi bi-eye-fill'></i></a>
                    <a onclick='return eliminar()' class='btn btn-small btn-danger' href='pisoLocales_gestion2.php?id=" . $idInmueble . "&pis_id=".$row['pis_id']."'>
                      <i class='bi bi-trash-fill'></i>
                    </a>
                    </div>
                  </td>";
            echo "</tr>";
          }
          ?>
          <!-- inmueble.php?id=<?= $datos->inm_id ?> -->
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Bibliotecas JS -->
<?php include("Apertura_biblierias_Js.php"); ?>
</body>

</html>