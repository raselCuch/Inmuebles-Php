<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<?php include("modelo/conexion.php");
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM piso WHERE pis_id = $id");
?>
<main class="mt-5 pt-3">
    <div class="container-fluid row">
        <!-- Formulario -->
        <form class="col-5 p-1 m-auto" method="POST">
            <h4 class="text-center text-secondary">Modificación de pisos</h4>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            include("controlador/C_piso_modificar.php");
            if ($sql && $sql->num_rows > 0) {
                $datos = $sql->fetch_assoc();
            ?>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">ID piso</label>
                    <input type="text" class="form-control" name="pis_id" value="<?= $datos['pis_id'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Número de locales</label>
                    <input type="number" class="form-control" name="pis_n_locales" value="<?= $datos['pis_n_locales'] ?>">
                </div>
                <div class="mb-2">
                    <label for="disabledSelect" class="form-label">Estado de alquiler</label>
                    <select name="pis_est_alquilado" class="form-select">
                        <option value="Alquilado" <?php if ($datos['pis_est_alquilado'] == 'Alquilado') echo 'selected'; ?>>Alquilado</option>
                        <option value="No alquilado" <?php if ($datos['pis_est_alquilado'] == 'No alquilado') echo 'selected'; ?>>No alquilado</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="disabledSelect" class="form-label">Estado de alta</label>
                    <select name="pis_est_alta" class="form-select">
                        <option value="De alta" <?php if ($datos['pis_est_alta'] == 'De alta') echo 'selected'; ?>>De alta</option>
                        <option value="De baja" <?php if ($datos['pis_est_alta'] == 'De baja') echo 'selected'; ?>>De baja</option>
                    </select>
                </div>
            <?php
            }
            ?>
            <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">Modificar piso</button>
        </form>
        <!-- Formulario (fin) -->
    </div>
</main>
<?php include("Apertura_biblierias_Js.php"); ?>
