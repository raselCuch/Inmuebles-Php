<?php include("Apertura_header.php"); ?>
<?php include("Apertura_navbar.php"); ?>
<?php include("Apertura_barraLateral.php"); ?>
<div class="container-fluid bg-light">
  <div class="mt-4 pt-4 row">
    <div class="col-2 p-1"></div> <!-- Contenido de la columna 1 -->
    <div class="col-10 p-4">
      <script>
        function eliminar() {
          var respuesta = confirm("Está seguro que desea eliminar?");
          return respuesta;
        }
      </script>
      <h3 class="text p-1">Gestión de inmuebles</h3>
      <a class="btn btn-primary" href="inmueble_registro.php"><i class="bi bi-plus-square"></i> Registrar inmueble</a>
      <?php
      include "modelo/conexion.php";
      include "controlador/C_inmueble_eliminar.php"
      ?>
      <div class="mt-3 pt-3">
        <table id="example" class="table table-striped data-table" style="width: 100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo</th>
              <th>Ubicación</th>
              <th>Detalle</th>
              <th>Pisos</th>
              <th>Alquilado?</th>
              <th>De alta?</th>
              <th class='text-center'>Opciones</th>
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
                <td class="text-center">
                  <a class="btn btn-small btn-warning" href="inmueble_modificar.php?id=<?= $datos->inm_id ?>">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a class="btn btn-small btn-info" href="pisoLocales_gestion2.php?id=<?= $datos->inm_id ?>">Pisos 
                    <i class="bi bi-eye-fill"></i>
                  </a>
                  <a onclick="return eliminar()" class="btn btn-small btn-danger" href="inmueble.php?id=<?= $datos->inm_id ?>">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-0 p-1"></div> <!-- Contenido de la columna 3 -->
  </div>
</div>
<?php include("Apertura_biblierias_Js.php"); ?>
</body>

</html>