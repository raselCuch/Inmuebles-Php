<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<!-- Contenido -->
<main class="mt-5 pt-4 bg-light">
  </script>
  <h3 class="text p-1">Ingreso de inmuebles</h3>
  <?php
  include "modelo/conexion.php";
  ?>
  <!-- <div class="container-fluid row"> -->
  <!-- Formulario -->
  <div class="container-fluid row">
    <form class="col-5 p-1 m-auto" method="POST">
      <h4 class="text-center text-secondary">Registro de inmuebles</h4>
      <?php
      include "controlador/C_inmueble_registro.php";
      ?>
      <div class="mb-2">
        <label for="disabledSelect" class="form-label">Tipo de inmueble</label>
        <select name="tipo" class="form-select" onchange="actualizarCantidadPisos(this.value)">
          <option>Edificio</option>
          <option>Est. comercial</option>
          <option>Oficina</option>
        </select>
        <script>
          function actualizarCantidadPisos(tipo) {
            const cantidadPisosInput = document.querySelector('input[name="Npisos"]');
            if (tipo === 'Oficina') {
              cantidadPisosInput.value = '1';
              cantidadPisosInput.setAttribute('readonly', 'readonly');
            } else {
              cantidadPisosInput.removeAttribute('readonly');
            }
          }
        </script>
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
      <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar inmueble</button>
    </form>
    <!-- Formulario (fin) -->

    <!-- <div class="col-9 p-3">
    </div> -->
  </div>
</main>
<!-- Contenido Inicio (fin) -->

<!-- Biblierias js -->
<?php include("Apertura_biblierias_Js.php"); ?>
<!-- Biblierias js (fin)-->
</body>

</html>