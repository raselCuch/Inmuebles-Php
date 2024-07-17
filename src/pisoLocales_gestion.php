<?php include("Apertura_header.php"); ?>
<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<!-- Contenido -->
<main class="mt-5 pt-4">
  <h3 class="text p-1">Gestión de pisos y locales</h3>
  <?php
  include "modelo/conexion.php";
  ?>
  <!-- <div class="container-fluid row"> -->
  <div class="container-fluid row">
  <h4 class="text p-1">Inmuebles</h4>
    <div class="col-12 p-3">
      <!-- Tabla -->
      <table id="example" class="table table-striped data-table " style="width: 100%">
        <thead>
          <tr class="">
            <th>ID <br>inmueble</th>
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
              <td><?= $datos->inm_est_alquilado?></td>
              <td><?= $datos->imn_est_alta?></td>
              <td>
                <a class="btn btn-small btn-info" href="pisoLocales_gestion2.php?id=<?= $datos->inm_id ?>"><i class="bi bi-nut-fill"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<!-- Contenido Inicio (fin) -->

<!-- Biblierias js -->
<?php include("Apertura_biblierias_Js.php"); ?>
<!-- Biblierias js (fin)-->
</body>

</html>