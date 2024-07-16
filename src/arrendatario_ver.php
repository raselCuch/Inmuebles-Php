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
$sql = $conexion->query("select * from arrendatario where arr_id =$id");
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
            <h4 class="text-center text-secondary">Ver datos de arrendatario</h4>
            <?php include "controlador/C_validar_arrendatario.php"; ?>
            <!-- include("modelo/conexion.php"); -->
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            // if ($sql && $sql->num_rows > 0) {
            while ($datos = $sql->fetch_object()) {
            ?>
                <div class="container-fluid row">
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombres" value="<?= $datos->arr_nombres ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" value="<?= $datos->arr_apellidos ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">DNI</label>
                            <input type="text" class="form-control" name="dni" value="<?= $datos->arr_dni ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Edad</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->arr_edad ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Sexo</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->arr_sexo ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->arr_correo ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Sueldo</label>
                            <input type="text" class="form-control" name="sexo" value="S/. <?= $datos->arr_sueldo ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Estado</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->arr_estado ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Tipo archivo</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->arr_archivo_tipo ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Archivo (.pdf)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="sexo" value="<?= $datos->arr_archivo ?>" readonly>
                                <a class="btn btn-small btn-info input-group-text" href="controlador/C_download_pdf.php?id=<?= $datos->arr_id ?>">
                                    <i class="bi bi-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Modificar inmueble</button> -->
            <div class="text-center mt-1 pt-2 mb-4">
                <a class="btn btn-small btn-warning" href="arrendatario.php">Regresar</a>
                <a class="btn btn-small btn-success" href="arrendatario_ver.php?id=<?= $_GET["id"] ?>&accion=Confirma">
                    Confirmar cliente
                </a>
                <a class="btn btn-small btn-danger" href="arrendatario_ver.php?id=<?= $_GET["id"] ?>&accion=Rechaza">
                    Rechazar cliente
                </a>
            </div>
        </form>
        <!-- Formulario (fin) -->
    </div>
</main>
<?php include("Apertura_biblierias_Js.php"); ?>