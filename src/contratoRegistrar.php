<?php
session_start();
$idUsuario = $_SESSION['id_usuario'];
?>

<?php include "Apertura_header.php" ?>
<!-- Navegador -->
<?php include "Apertura_navbar_usuario.php" ?>

<?php include("modelo/conexion.php"); ?>

<div class="container">
    <form class="col-5 p-1 m-auto" method="POST">
        <h5 class="mt-5 pt-3 text-dark mb-4">Alquiler de <?= $_GET["tipo_contrato"] ?></h5>
        <?php
            include "controlador/C_contrato_registro.php";
        ?>
        <div class="form-group">
            <label for="inmuebleId">ID <?= $_GET["tipo_contrato"] ?></label>
            <input type="text" class="form-control" id="inmuebleId" readonly name="idInmueble" value="<?= $_GET["id_inmueble"] ?>">
        </div>
        <div class="form-group">
            <label for="usuarioId">ID Usuario:</label>
            <input type="text" class="form-control" id="usuarioId" readonly name="idUsuario" value="<?php echo "$idUsuario"; ?>">
        </div>
        <div class="form-group">
            <label for="usuarioId">Tipo de contrato:</label>
            <input type="text" class="form-control" id="usuarioId" readonly name="tipoContrato" value="<?= $_GET["tipo_contrato"] ?>">
        </div>
        <div class="form-group">
            <label for="precioEdificio">Precio del Edificio:</label>
            <input type="text" class="form-control" id="precioEdificio" readonly name="precioContrato" value="<?= $_GET["precio_inmueble"] ?>">
        </div>

        <div class="form-group">
            <label for="fechaInicio">Fecha de inicio:</label>
            <input type="date" class="form-control" id="fechaInicio" name="Fincio" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="form-group">
            <label for="fechaFinal">Fecha final:</label>
            <input type="date" class="form-control" id="fechaFinal" name="Ffinal" required>
        </div>

        <div class="mt-1 pt-2 text-center">
            <!-- <button type="button" class="btn btn-success" id="alquilarBtn">Alquilar</button> -->
            <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Alquilar</button>
            <a class="btn btn-small btn-warning" href="inmuebles_mostrar.php">Regresar</a>
        </div>

    </form>
</div>

<?php include("Apertura_biblierias_Js.php"); ?>