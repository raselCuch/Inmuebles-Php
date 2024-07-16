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
$sql = $conexion->query("select * from bitacora where bit_id =$id");
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
            <h4 class="text-center text-secondary">Ver detalles de registro de bitacora</h4>
            <!-- <?php include "controlador/C_validar_arrendatario.php"; ?> -->
            <!-- include("modelo/conexion.php"); -->
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            // if ($sql && $sql->num_rows > 0) {
            while ($datos = $sql->fetch_object()) {
            ?>
                <div class="container-fluid row">
                    <!-- Tabla: bitacora
                        bit_id
                        bit_tabla_afectada
                        bit_registro_afectado_id
                        bit_actividad_realizada
                        bit_info_anterior
                        bit_info_nuevo
                        bit_f_modificacion
                        bit_usuar_id -->
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">ID bitacora</label>
                            <input type="text" class="form-control" name="nombres" value="<?= $datos->bit_id ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Tabla afectada</label>
                            <input type="text" class="form-control" name="apellidos" value="<?= $datos->bit_tabla_afectada ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">ID de registro afectado</label>
                            <input type="text" class="form-control" name="dni" value="<?= $datos->bit_registro_afectado_id ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Actividad realizada</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->bit_actividad_realizada ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Fecha de modificación</label>
                            <input type="text" class="form-control" name="sexo" value="<?= $datos->bit_f_modificacion ?>" readonly>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Información anterior</label>
                            <textarea class="form-control" name="sexo" rows="6" readonly><?= str_replace("*", "\n", $datos->bit_info_anterior); ?></textarea>

                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Información nueva</label>
                            <!-- <input type="text" class="form-control" name="sexo" value="<?= $datos->bit_info_nuevo ?>" readonly> -->
                            <textarea class="form-control" name="sexo" rows="6" readonly><?= str_replace("*", "\n",  $datos->bit_info_nuevo); ?></textarea>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
            <div class="text-center mt-1 pt-2 mb-4">
                <a class="btn btn-small btn-warning" href="bitacora.php">Regresar</a>
            </div>
        </form>
        <!-- Formulario (fin) -->
    </div>
</main>
<?php include("Apertura_biblierias_Js.php"); ?>