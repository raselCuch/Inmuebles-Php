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
$sql = $conexion->query("SELECT * FROM piso WHERE pis_id = $id");
?>
<main class="mt-5 pt-3">
    <div class="container-fluid row">
        <!-- Formulario -->
        <form class="col-5 p-1 m-auto" method="POST">
            <h4 class="text-center text-secondary">Registro de piso - <?= $_GET["id"] ?></h4>
            <?php include("controlador/C_piso_registro.php"); ?>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            if ($sql && $sql->num_rows > 0) {
                $datos = $sql->fetch_assoc();
            ?>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">ID Inmueble</label>
                    <input type="text" class="form-control" name="inm_id" value="<?= $inm_id ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">ID piso</label>
                    <input type="text" class="form-control" name="pis_id" value="<?= $datos['pis_id'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Número de locales</label>
                    <input type="number" class="form-control" name="pis_n_locales" value="<?= $datos['pis_n_locales'] ?>">
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