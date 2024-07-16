<?php include("Apertura_header.php"); ?>
<?php include("Apertura_navbar.php"); ?>
<?php include("Apertura_barraLateral.php"); ?>
<div class="container-fluid row">
  <div class="row">
    <div class="col-2 p-3"></div>
    <div class="col-12 mt-5 pt-4 bg-light">
      <script>
        function eliminar() {
          var respuesta = confirm("Está seguro que desea eliminar?");
          return respuesta;
        }
      </script>
      <div class="col-9 p-3">
        <h3 class="text p-1">Gestión de inmuebles</h3>
        <a class="btn btn-primary" href="inmueble_registro.php">Registrar inmueble</a>
        <?php
        include "modelo/conexion.php";
        include "controlador/C_inmueble_eliminar.php"
        ?>
        <!-- <div class="container-fluid row"> -->
        <!-- <div class="p-3"> -->
        <!-- <table id="example" class="table table-striped data-table" style="width: 110%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Ubicación</th>
                <th>Detalle</th>
                <th>Pisos</th>
                <th>Alquilado?</th>
                <th>De alta?</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "modelo/conexion.php";
              $sql = $conexion->query("select * from inmueble");
              while ($datos = $sql->fetch_object()) {
              ?>
                <tr>
                  <td><?= $datos->inm_id ?></td>
                  <td><?= $datos->inm_tipo ?></td>
                  <td><?= $datos->inm_ubicacion ?></td>
                  <td><?= $datos->inm_detalle ?></td>
                  <td><?= $datos->inm_n_pisos ?></td>
                  <td><?= $datos->inm_est_alquilado ?></td>
                  <td><?= $datos->imn_est_alta ?></td>
                  <td>
                    <a class="btn btn-small btn-warning" href="inmueble_modificar.php?id=<?= $datos->inm_id ?>"><i class="bi bi-pencil-square"></i></a>
                    <a onclick="return eliminar()" class="btn btn-small btn-danger" href="inmueble.php?id=<?= $datos->inm_id ?>"><i class="bi bi-trash-fill"></i></a>
                    <a class="btn btn-small btn-info" href="pisoLocales_gestion2.php?id=<?= $datos->inm_id ?>"><i class="bi bi-nut-fill"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table> -->
        <!-- </div> -->
      </div>
      <!-- </div> -->
    </div>
    <div class="col0- p-3"></div>
  </div>
</div>
<!-- Contenido Inicio (fin) -->

<!-- Biblierias js -->
<?php include("Apertura_biblierias_Js.php"); ?>
<!-- Biblierias js (fin)-->
</body>

</html>

<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-2 p-1"></div> <!-- Contenido de la columna 1 -->
    <div class="col-9 p-4">
      <h3 class="text p-1">Gestión de inmuebles</h3>
      <a class="btn btn-primary" href="inmueble_registro.php">Registrar inmueble</a>
      <?php
      include "modelo/conexion.php";
      include "controlador/C_inmueble_eliminar.php"
      ?>

      <table id="example" class="table table-striped data-table" style="width: 110%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Ubicación</th>
            <th>Detalle</th>
            <th>Pisos</th>
            <th>Alquilado?</th>
            <th>De alta?</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "modelo/conexion.php";
          $sql = $conexion->query("select * from inmueble");
          while ($datos = $sql->fetch_object()) {
          ?>
            <tr>
              <td><?= $datos->inm_id ?></td>
              <td><?= $datos->inm_tipo ?></td>
              <td><?= $datos->inm_ubicacion ?></td>
              <td><?= $datos->inm_detalle ?></td>
              <td><?= $datos->inm_n_pisos ?></td>
              <td><?= $datos->inm_est_alquilado ?></td>
              <td><?= $datos->imn_est_alta ?></td>
              <td>
                <a class="btn btn-small btn-warning" href="inmueble_modificar.php?id=<?= $datos->inm_id ?>"><i class="bi bi-pencil-square"></i></a>
                <a onclick="return eliminar()" class="btn btn-small btn-danger" href="inmueble.php?id=<?= $datos->inm_id ?>"><i class="bi bi-trash-fill"></i></a>
                <a class="btn btn-small btn-info" href="pisoLocales_gestion2.php?id=<?= $datos->inm_id ?>"><i class="bi bi-nut-fill"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class="col-1 p-1"></div> <!-- Contenido de la columna 3 -->
  </div>
</div>