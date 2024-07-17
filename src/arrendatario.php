<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<!-- Contenido -->
<main class="pb-5 mt-5 pt-4">
  <script>
    function eliminar() {
      var respuesta = confirm("Está seguro que desea eliminar?");
      return respuesta;
    }
  </script>
  <h3 class="text p-1">Lista de arrendatarios</h3>
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
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Correo</th>
            <th>Sueldo</th>
            <th>Estado</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "modelo/conexion.php";
          $sql = $conexion->query("select * from arrendatario");
          while ($datos = $sql->fetch_object()) {
          ?>
            <tr>
              <td><?= $datos->arr_id ?></td>
              <td><?= $datos->arr_nombres ?></td>
              <td><?= $datos->arr_apellidos ?></td>
              <td><?= $datos->arr_dni ?></td>
              <td><?= $datos->arr_correo ?></td>
              <td>S/. <?= $datos->arr_sueldo ?></td>
              <td><?= $datos->arr_estado ?></td>
              <td>
                <a class="btn btn-outline-info" href="arrendatario_ver.php?id=<?= $datos->arr_id ?>">Ver</a>
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