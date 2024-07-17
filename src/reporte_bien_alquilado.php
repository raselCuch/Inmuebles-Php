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
  <h3 class="text p-1">Bienes alquilados</h3>
  <?php
  include "modelo/conexion.php";
  // include "controlador/eliminar_inmueble.php"
  ?>
  <div class="container-fluid row">
    <div class="col-12 p-2">
      <!-- Tabla -->
      <table id="example" class="table data-table" style="width: 100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre Inmueble</th>
            <th>Detalle</th>
            <!-- <th>Nombre arrendatario</th> -->
            <!-- <th>DNI</th> -->
            <th>F. Inicio</th>
            <th>Vigente</th>
            <!-- <th>Monto</th> -->
            <!-- <th>Ver</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          include "modelo/conexion.php";
          $sql = $conexion->query("SELECT c.contr_id AS idContrato,
          CONCAT(i.inm_tipo, ' - ', i.inm_id) AS nombreInmueble,
          CONCAT(i.inm_tipo, ', N° piso: ', p.pis_numero, ', N° local: ', l.loc_numero) AS descripcionBien,
          c.contr_modalidad AS Cmodalidad,
          i.inm_ubicacion,
          CONCAT(a.arr_nombres, ', ', a.arr_apellidos) AS nombreArrendatario,
          a.arr_dni AS dniArrendatario,
          c.contr_f_inicio AS fechaInicioContrato,
          c.contr_f_fin AS fechaFinContrato,
          c.contr_dia_pago AS diaPagoContrato,
          c.contr_monto_alquiler AS montoAlquiler,
          contr_vigencia

          FROM contrato c
          JOIN local l ON c.contr_loc_id = l.loc_id
          JOIN piso p ON l.loc_pis_id = p.pis_id
          JOIN inmueble i ON p.pis_inm_id = i.inm_id
          JOIN arrendatario a ON c.contr_arr_id = a.arr_id
          where contr_vigencia = 'vigente';");
          while ($datos = $sql->fetch_object()) {
          ?>
            <tr>
              <td><?= $datos->idContrato ?></td>
              <td><?= $datos->nombreInmueble ?></td>
              <td><?= $datos->descripcionBien ?></td>
              <!-- <td><?= $datos->Cmodalidad ?></td> -->
              <!-- <td><?= $datos->nombreArrendatario ?></td>
              <td><?= $datos->dniArrendatario ?></td> -->
              <td><?= $datos->fechaInicioContrato ?></td>
              <td><?= $datos->contr_vigencia ?></td>
              <!-- <td><?= $datos->fechaFinContrato ?></td> -->
              <!-- <td>S/. <?= $datos->montoAlquiler ?></td> -->
              <!-- <td>
                <a class="btn btn-small btn-info" href="contrato_ver.php?id=<?= $datos->idContrato ?>"><i class="bi bi-eye-fill"></i></a> -->
                <!-- <a onclick="return eliminar()" class="btn btn-small btn-danger" href="inmuebles.php?id=<?= $datos->inm_id ?>"><i class="bi bi-trash-fill"></i></a> -->
              <!-- </td> -->
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