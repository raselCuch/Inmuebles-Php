<?php
session_start();
$idUsuario = $_SESSION['id_usuario'];
?>

<?php include "Apertura_header.php" ?>
<!-- Navegador -->
<?php include "Apertura_navbar_usuario.php" ?>

<?php include("modelo/conexion.php");
$idInmueble = $_GET["id"];
//"$conexion" esta es la variable conexion
?>

<div class="mt-4 pt-4 container-fluid">
    <div class="row">
        <div class="col-2 p-1">
            <!-- Contenido de la columna 1 -->
        </div>
        <div class="col-9 p-4">
            <h3 class="text p-1">Listado de pisos del edificio - <?php echo "$idInmueble"; ?></h3>
            <?php
            // Consultar los pisos del inmueble
            $sqlPisos = "SELECT piso.pis_id, piso.pis_numero, SUM(local.loc_precio) AS precio_piso, piso.pis_est_alquilado, piso.pis_est_alta
                        FROM piso
                        INNER JOIN local ON piso.pis_id = local.loc_pis_id
                        WHERE piso.pis_inm_id = $idInmueble
                        GROUP BY piso.pis_id
                        ORDER BY piso.pis_numero";
            $resultPisos = mysqli_query($conexion, $sqlPisos);

            // Verificar si hay resultados
            if (mysqli_num_rows($resultPisos) > 0) {
                // Iterar sobre los pisos
                while ($rowPiso = mysqli_fetch_assoc($resultPisos)) {
                    // Obtener los datos del piso
                    $pisoId = $rowPiso['pis_id'];
                    $pisoNumero = $rowPiso['pis_numero'];
                    $precioPiso = $rowPiso['precio_piso'];
                    $precioDescuento = $precioPiso * 0.95; // Aplicar descuento del 5%
                    $pisoAlquilado = $rowPiso['pis_est_alquilado'];
                    $pisoAlta = $rowPiso['pis_est_alta'];

                    // Mostrar el título del piso y el precio del piso
                    echo '<div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mt-1 pt-1 card-title">Piso ' . $pisoNumero . '(' . $pisoId . ')</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Precio del piso completo: S/. ' . $precioDescuento . '</p>
                                <div class="text-right">';

                    // Verificar si el piso está alquilado
                    if ($pisoAlquilado == "Alquilado" or $pisoAlta == "De baja") {
                        echo '<p class="text-danger">No disponible</p>';
                    } else {
                        echo '<a href="contratoRegistrar.php?id_inmueble=' . $pisoId . '&precio_inmueble=' . $precioDescuento . '&tipo_contrato=Piso" class="btn btn-primary">Alquilar piso</a>';
                    }

                    echo '</div>
                            </div>
                        </div>';

                    // Consultar los locales del piso
                    $sqlLocales = "SELECT * FROM local WHERE loc_pis_id = $pisoId";
                    $resultLocales = mysqli_query($conexion, $sqlLocales);

                    // Verificar si hay locales
                    if (mysqli_num_rows($resultLocales) > 0) {
                        echo '<div class="row">';
                        // Iterar sobre los locales
                        while ($rowLocal = mysqli_fetch_assoc($resultLocales)) {
                            // Obtener los datos del local
                            $localId = $rowLocal['loc_id'];
                            $localNumero = $rowLocal['loc_numero'];
                            $localDetalle = $rowLocal['loc_detalle'];
                            $localPrecio = $rowLocal['loc_precio'];
                            $localAlquilado = $rowLocal['loc_est_alquilado'];
                            $localAlta = $rowLocal['loc_est_alta'];

                            // Mostrar la tarjeta del local
                            echo '<div class="col-4">
                                    <div class="card mb-4">
                                        <img src="files/local.png" class="card-img-top" alt="Edificio">
                                        <div class="card-body">
                                            <h5 class="card-title">Local ' . $localNumero . '(' . $localId . ')</h5>
                                            <p class="card-text">Descripción: ' . $localDetalle . '</p>
                                            <p class="card-text">Precio: S/. ' . $localPrecio . '</p>
                                        </div>
                                        <div class="card-footer text-center">';

                            // Verificar si el local está alquilado
                            if ($localAlquilado == "Alquilado" or $localAlta == "De baja") {
                                echo '<p class="text-danger">No disponible</p>';
                            } else {
                                echo '<a href="contratoRegistrar.php?id_inmueble=' . $localId . '&precio_inmueble=' . $localPrecio . '&tipo_contrato=Local" class="btn btn-primary">Alquilar local</a>';
                            }

                            echo '</div>
                                    </div>
                                </div>';
                        }
                        echo '</div>';
                    } else {
                        echo "No se encontraron locales para este piso.";
                    }
                }
            } else {
                echo "No se encontraron pisos para este inmueble.";
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
            ?>
        </div>
        <div class="col-1 p-1">
            <!-- Contenido de la columna 3 -->
        </div>
    </div>
</div>
<?php include("Apertura_biblierias_Js.php"); ?>
