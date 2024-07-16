<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<?php include("modelo/conexion.php");
$id = $_GET["id"];
$inm_id = $_GET["inm_id"];
$sql = $conexion->query("SELECT * FROM local WHERE loc_id = $id");
?>
<main class="mt-5 pt-3">
    <div class="pb-5 container-fluid row">
        <!-- Formulario -->
        <form class="col-5 p-1 m-auto" method="POST">
            <h4 class="text-center text-secondary">Editar de local - <?= $_GET["id"] ?></h4>
            <?php include("controlador/C_local_modificar.php"); ?>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            if ($sql && $sql->num_rows > 0) {
                $datos = $sql->fetch_assoc();
            ?>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">ID Local</label>
                    <input type="text" class="form-control" name="loc_id" value="<?= $datos['loc_id'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">ID piso</label>
                    <input type="text" class="form-control" name="loc_pis_id" value="<?= $datos['loc_pis_id'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Número de local</label>
                    <input type="number" class="form-control" name="loc_numero" value="<?= $datos['loc_numero'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Detalle del local</label>
                    <textarea class="form-control" name="loc_detalle"><?= $datos['loc_detalle'] ?></textarea>

                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Precio del local (S/. )</label>
                    <input type="number" class="form-control" name="loc_precio" value="<?= $datos['loc_precio'] ?>">
                </div>
                <div class="mb-2">
                    <label for="disabledSelect" class="form-label">Estado de alquiler</label>
                    <select name="loc_est_alquilado" class="form-select">
                        <option value="Alquilado" <?php if ($datos['loc_est_alquilado'] == 'Alquilado') echo 'selected'; ?>>Alquilado</option>
                        <option value="No alquilado" <?php if ($datos['loc_est_alquilado'] == 'No alquilado') echo 'selected'; ?>>No alquilado</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="disabledSelect" class="form-label">Estado de alta</label>
                    <select name="loc_est_alta" class="form-select">
                        <option value="De alta" <?php if ($datos['loc_est_alta'] == 'De alta') echo 'selected'; ?>>De alta</option>
                        <option value="De baja" <?php if ($datos['loc_est_alta'] == 'De baja') echo 'selected'; ?>>De baja</option>
                    </select>
                </div>
            <?php
            }
            ?>
            <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">Registrar piso</button>
        </form>
        <!-- Formulario (fin) -->
    </div>
</main>
<?php include("Apertura_biblierias_Js.php"); ?>