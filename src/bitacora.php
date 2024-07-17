<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<!-- Contenido -->
<main class="mt-5 pt-4">
  <script>
    function eliminar() {
      var respuesta = confirm("Está seguro que desea eliminar?");
      return respuesta;
    }
  </script>
  <h3 class="text p-1">Bitacora (Historial de cambios)</h3>
  <?php
  include "modelo/conexion.php";
  ?>
  <div class="container-fluid row">
    <div class="pb-5 col-12 p-2">
      <!-- Tabla -->
      <table id="example" class="table data-table" style="width: 100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tabla afectada</th>
            <th>ID afectado</th>
            <th>Actividad realizada</th>
            <th>Fecha</th>
            <th>Ver</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "modelo/conexion.php";
          $sql = $conexion->query("select * from bitacora");
          while ($datos = $sql->fetch_object()) {
          ?>
            <tr>
              <td><?= $datos->bit_id?></td>
              <td><?= $datos->bit_tabla_afectada ?></td>
              <td><?= $datos->bit_registro_afectado_id ?></td>
              <td><?= $datos->bit_actividad_realizada ?></td>
              <!-- <td><?= $datos->bit_info_anterior ?></td>
              <td><?= $datos->bit_info_nuevo ?></td> -->
              <td><?= $datos->bit_f_modificacion ?></td>
              <td>
                <a class="btn btn-outline-info" href="bitacora_ver.php?id=<?= $datos->bit_id ?>"><i class="bi bi-eye-fill"></i></a>
                <!-- <a onclick="return eliminar()" class="btn btn-small btn-danger" href="inmuebles.php?id=<?= $datos->inm_id ?>"><i class="bi bi-trash-fill"></i></a> -->
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <!-- Tabla (fin)-->
    </div>
  </div>
</main>
<!-- Contenido Inicio (fin) -->

<!-- Biblierias js -->
<?php include("Apertura_biblierias_Js.php"); ?>
<!-- Biblierias js (fin)-->
</body>

</html>