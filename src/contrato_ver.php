<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<?php include("modelo/conexion.php");
$id = $_GET["id"];
// include "modelo/conexion.php";
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
    c.contr_monto_alquiler AS montoAlquiler

    FROM contrato c
    JOIN local l ON c.contr_loc_id = l.loc_id
    JOIN piso p ON l.loc_pis_id = p.pis_id
    JOIN inmueble i ON p.pis_inm_id = i.inm_id
    JOIN arrendatario a ON c.contr_arr_id = a.arr_id WHERE c.contr_id =$id");
?>
<main class="mt-5 pt-4">
    <script>
        function validar(parametro) {
            var respuesta = confirm("¿Está seguro que desea " + parametro + "?");
            return respuesta;
        }
    </script>
    <!-- <h3 class="text p-1">Gestión de inmuebles</h3> -->
    <div class="">
        <!-- Formulario -->
        <form class="p-1 m-auto" method="GET"> <!-- Era POST -->
            <h4 class="text-center text-secondary">Contrato de alquiler</h4>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            // if ($sql && $sql->num_rows > 0) {
            while ($datos = $sql->fetch_object()) {
            ?>
                <div class="container-fluid row">
                    <!-- 1era columna -->
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">ID de contrato</label>
                            <input type="text" class="form-control" value="<?= $_GET["id"] ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Nombre de inmueble</label>
                            <input type="text" class="form-control" name="nombres" value="<?= $datos->nombreInmueble ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Descripción inmueble</label>
                            <input type="text" class="form-control" name="apellidos" value="<?= $datos->descripcionBien ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Modalidad de contrato</label>
                            <input type="text" class="form-control" name="dni" value="<?= $datos->Cmodalidad ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Ubicación de inmueble</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->inm_ubicacion ?>" readonly>
                        </div>
                    </div>
                    <!-- 2da columna -->
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Nombre de arrendatario</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->nombreArrendatario ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">DNI de arrendatario</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->dniArrendatario ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Fecha inicio contrato</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->fechaInicioContrato ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Fecha fin contrato</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->fechaFinContrato ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Dia de pago mensualidad</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->diaPagoContrato ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Monto de alquiler</label>
                            <input type="text" class="form-control" name="sexo" value="S/. <?= $datos->montoAlquiler ?>" readonly>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Modificar inmueble</button> -->
            <div class="text-center mt-1 pt-2 mb-4">
                <a class="btn btn-small btn-warning" href="contrato.php">Regresar</a>
            </div>
        </form>
        <!-- Formulario (fin) -->
    </div>
</main>
<?php include("Apertura_biblierias_Js.php"); ?>