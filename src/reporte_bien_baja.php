<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<!-- Contenido -->
<main class="mt-5 pt-4 bg-light">
  <script>
    function eliminar() {
      var respuesta = confirm("Está seguro que desea eliminar?");
      return respuesta;
    }
  </script>
  <h3 class="text p-1">Inmuebles de baja</h3>
  <?php
  include "modelo/conexion.php";
  include "controlador/C_inmueble_eliminar.php"
  ?>
  <!-- <div class="container-fluid row"> -->
  <!-- Formulario -->
  <!-- <div class="container-fluid row">
    <form class="col-3 p-0" method="POST">
      <h4 class="text-center text-secondary">Registro de inmuebles</h4>
      <?php
      include "controlador/C_inmueble_registro.php";
      ?>
      <div class="mb-2">
        <label for="disabledSelect" class="form-label">
          Tipo de inmueble
        </label>
        <select name="tipo" class="form-select">
          <option>Edificio</option>
          <option>Est. comercial</option>
          <option>Oficina</option>
        </select>
      </div>
      <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Ubicación de inmueble</label>
        <input type="text" class="form-control" name="ubicacion">
      </div>
      <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Detalle de inmueble</label>
        <textarea class="form-control" name="detalle" rows="1"></textarea>
      </div>
      <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Cantidad de pisos</label>
        <input type="number" class="form-control" name="Npisos">
      </div>
      <div class="mb-2">
        <label for="disabledSelect" class="form-label">
          Estado de inmueble
        </label>
        <select name="estado" class="form-select">
          <option>No alquilado</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar inmueble</button>
    </form> -->
    <!-- Formulario (fin) -->

    <div class="col-12 p-3">
      <!-- Tabla -->
      <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre edificio</th>
            <th>Tipo</th>
            <th>Ubicación</th>
            <!-- <th>Detalle</th> -->
            <!-- <th>Pisos</th> -->
            <!-- <th>Alquilado?</th> -->
            <th>De alta?</th>
            <!-- <th>Opciones</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          include "modelo/conexion.php";
          $sql = $conexion->query("select * from inmueble where imn_est_alta = 'De baja';");
          while ($datos = $sql->fetch_object()) {
          ?>
            <tr>
              <td><?= $datos->inm_id ?></td>
              <td><?= $datos->inm_tipo ?> - <?= $datos->inm_id ?></td>
              <td><?= $datos->inm_tipo ?></td>
              <td><?= $datos->inm_ubicacion ?></td>
              <!-- <td><?= $datos->inm_detalle ?></td> -->
              <!-- <td><?= $datos->inm_n_pisos ?></td> -->
              <!-- <td><?= $datos->inm_est_alquilado ?></td> -->
              <td><?= $datos->imn_est_alta?></td>
              <!-- <td>
                <a class="btn btn-small btn-warning" href="inmueble_modificar.php?id=<?= $datos->inm_id ?>"><i class="bi bi-pencil-square"></i></a>
                <a onclick="return eliminar()" class="btn btn-small btn-danger" href="inmueble.php?id=<?= $datos->inm_id ?>"><i class="bi bi-trash-fill"></i></a>
              </td> -->
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <!-- Tabla (fin)-->
      <!-- </div> -->
    </div>
  </div>
</main>
<!-- Contenido Inicio (fin) -->

<!-- Biblierias js -->
<?php include("Apertura_biblierias_Js.php"); ?>
<!-- Biblierias js (fin)-->
</body>

</html>