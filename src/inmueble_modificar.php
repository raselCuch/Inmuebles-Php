<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<?php include("modelo/conexion.php");
$id = $_GET["id"];
$sql = $conexion->query("select * from inmueble where inm_id=$id");
?>
<main class="mt-5 pt-3">
    <h3 class="text p-1">Gestión de inmuebles</h3>
    <div class="container-fluid row">
        <!-- Formulario -->
        <form class="col-5 p-1 m-auto" method="POST">
            <h4 class="text-center text-secondary">Modificación de inmuebles</h4>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            include("controlador/C_inmueble_modificar.php");
            // if ($sql && $sql->num_rows > 0) {
            while ($datos = $sql->fetch_object()) {
            ?>
                <div class="mb-2">
                    <label for="disabledSelect" class="form-label">
                        Tipo de inmueble
                    </label>
                    <select name="tipo" class="form-select" onchange="actualizarCantidadPisos(this.value)" disabled >
                        <option <?php if ($datos->inm_tipo == 'Edificio') echo 'selected'; ?>>Edificio</option>
                        <option <?php if ($datos->inm_tipo == 'Establecimiento comercial') echo 'selected'; ?>>Est. comercial</option>
                        <option <?php if ($datos->inm_tipo == 'Oficina') echo 'selected'; ?>>Oficina</option>
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
                    <input type="text" class="form-control" name="ubicacion" value="<?= $datos->inm_ubicacion ?>" required>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Detalle de inmueble</label>
                    <textarea class="form-control" name="detalle" rows="1" required><?= $datos->inm_detalle ?></textarea>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Cantidad de pisos</label>
                    <input type="number" class="form-control" name="Npisos" value="<?= $datos->inm_n_pisos ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="disabledSelect" class="form-label">
                        Estado de alquiler de inmueble
                    </label>
                    <select name="estadoAlquilado" class="form-select">
                        <!-- <option>No alquilado</option> -->
                        <option <?php if ($datos->inm_est_alquilado == 'No alquilado') echo 'selected'; ?>>No alquilado</option>
                        <option <?php if ($datos->inm_est_alquilado == 'Alquilado') echo 'selected'; ?>>Alquilado</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="disabledSelect" class="form-label">
                        Estado de alta o baja de inmueble
                    </label>
                    <select name="estadoAlta" class="form-select">
                        <!-- <option>No alquilado</option> -->
                        <option <?php if ($datos->imn_est_alta == 'De alta') echo 'selected'; ?>>De alta</option>
                        <option <?php if ($datos->imn_est_alta == 'De baja') echo 'selected'; ?>>De baja</option>
                    </select>
                </div>
            <?php
            }
            ?>
            <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Modificar inmueble</button>
        </form>
        <!-- Formulario (fin) -->
    </div>
</main>
<?php include("Apertura_biblierias_Js.php"); ?>