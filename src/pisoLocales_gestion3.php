<?php
include("Apertura_header.php");
include("Apertura_navbar.php");
include("Apertura_barraLateral.php");
include "modelo/conexion.php";
?>

<!-- Contenido -->
<main class="mt-5 pt-4 bg-light">
  <h3 class="text p-1">Gestión de locales</h3>
  <div class="container-fluid row">
    <!-- <h4 class="text p-1">Locales</h4> -->
    <?php
    $idPiso = $_GET["id"];
    $sql = "SELECT * FROM local WHERE loc_pis_id = '$idPiso'";
    $result = mysqli_query($conexion, $sql);
    ?>
    <div class="col-12 p-3">
      <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
          <tr>
            <th>ID local</th>
            <th>ID piso</th>
            <th>N° de local</th>
            <th>Detalle de local</th>
            <th>Precio</th>
            <th>Alquilado?</th>
            <th>Alta?</th>
            <th>Opciones</th>
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
          //   echo "<td class = 'text-center'>
          //   <div>
          //   <a class='btn btn-small btn-warning' href='pisoLocal_modificar.php?id=" . $row['pis_id'] . "'><i class='bi bi-pencil-square'></i></a>
          //   <a class='btn btn-small btn-info' href='pisoLocales_gestion3.php?id=" . $row['pis_id'] . "'><i class='bi bi-nut-fill'></i></a>
          //   <a onclick='return eliminar()' class='btn btn-small btn-danger' href='pisoLocales_gestion2.php?id=" . $idInmueble . "&pis_id=".$row['pis_id']."'>
          //   <i class='bi bi-trash-fill'></i>
          // </a>
          //   </div>
          // </td>";
            echo "<td class = 'text-center'>
            <div>
                    <a class='btn btn-small btn-warning' href='local_modificar.php?id=" . $row['loc_id'] . "'>Aea<i class='bi bi-pencil-square'></i></a>
                    <a onclick='return eliminar()' class='btn btn-small btn-danger' href='pisoLocales_gestion2.php?id=" . $row['loc_pis_id'] . "&loc_id=".$row['loc_id']."'>
                      <i class='bi bi-trash-fill'></i>
                    </a>
                    </div>
                  </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
        <!-- <a class='btn btn-small btn-info' href='pisoLocales_gestion2.php?id=" . $row['loc_id'] . "'><i class='bi bi-nut-fill'></i></a> 
                    <a class='btn btn-small btn-info' href='pisoLocales_gestion3.php?id=" . $row['loc_id'] . "'><i class='bi bi-nut-fill'></i></a>--> 
      </table>
    </div>
  </div>
</main>

<!-- Bibliotecas JS -->
<?php include("Apertura_biblierias_Js.php"); ?>
</body>
</html>
