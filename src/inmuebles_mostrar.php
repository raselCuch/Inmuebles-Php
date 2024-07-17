<?php session_start();
$idUsuario = $_SESSION['id_usuario']; ?>

<?php include "Apertura_header.php";
include "Apertura_navbar_usuario.php";
include("modelo/conexion.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-1">
            <!-- Contenido de la columna 1 -->
        </div>
        <div class="col-9 p-4">
            <h3 class="mt-4 pt-4 text-dark mb-4">Lista de inmuebles</h3>
            <div class="row">
                <?php
                // Consultar los inmuebles de la base de datos
                $sql = "SELECT inmueble.inm_id, inmueble.inm_tipo, inmueble.inm_ubicacion, SUM(local.loc_precio) AS precio_total, inmueble.inm_detalle, inmueble.inm_est_alquilado, inmueble.imn_est_alta
                            FROM inmueble
                            INNER JOIN piso ON inmueble.inm_id = piso.pis_inm_id
                            INNER JOIN local ON piso.pis_id = local.loc_pis_id
                            -- WHERE inmueble.imn_est_alta = 1
                            GROUP BY inmueble.inm_id";
                $result = mysqli_query($conexion, $sql);

                // Verificar si hay resultados
                if (mysqli_num_rows($result) > 0) {
                    // Contador para la distribución en la matriz
                    $counter = 0;
                    // Iterar sobre los inmuebles
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Obtener los datos del inmueble
                        $inmuebleId = $row['inm_id'];
                        $inmuebleTipo = $row['inm_tipo'];
                        $inmuebleUbicacion = $row['inm_ubicacion'];
                        $inmuebleDetalle = $row['inm_detalle'];
                        $precioTotal = $row['precio_total'];
                        $precioDescuento = $precioTotal * 0.9; // Aplicar descuento del 10%
                        $inmuebleAlquilado = $row['inm_est_alquilado'];
                        $inmuebleAlta = $row['imn_est_alta'];

                        // Verificar si el inmueble está alquilado o de baja
                        if ($inmuebleAlquilado == "Alquilado" or $inmuebleAlta == "De baja") {
                            // Mostrar mensaje de "No disponible" en rojo con estilo de Bootstrap
                            echo    '<div class="col-4">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">' . $inmuebleTipo . ' ' . $inmuebleId . '</h5>
                                                <p class="card-text">Ubicación: ' . $inmuebleUbicacion . '</p>
                                                <p class="card-text">Descripción: ' . $inmuebleDetalle . '</p>
                                                <p class="card-text"><span class="text-danger font-weight-bold">No disponible</span></p>
                                            </div>
                                        </div>
                                    </div>';
                        } else {
                            // Mostrar la caja del inmueble con botones activos
                            echo '<div class="col-4">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">' . $inmuebleTipo . ' ' . $inmuebleId . '</h5>
                                                <p class="card-text">Ubicación: ' . $inmuebleUbicacion . '</p>
                                                <p class="card-text">Descripción: ' . $inmuebleDetalle . '</p>
                                                <p class="card-text">Precio: S/. ' . $precioDescuento . '</p>
                                            </div>
                                            <div class="card-footer text-center">';
                            // Verificar si el local está alquilado
                            $sql_local_alquilado = "SELECT loc_est_alquilado FROM local WHERE loc_pis_id IN (SELECT pis_id FROM piso WHERE pis_inm_id = $inmuebleId)";
                            $result_local_alquilado = mysqli_query($conexion, $sql_local_alquilado);
                            $hay_local_alquilado = false;
                            while ($row_local_alquilado = mysqli_fetch_assoc($result_local_alquilado)) {
                                if ($row_local_alquilado['loc_est_alquilado'] == "Alquilado") {
                                    $hay_local_alquilado = true;
                                    break;
                                }
                            }

                            if (!$hay_local_alquilado) {
                                // Si no hay local alquilado, mostrar el botón "Alquila edificio"
                                echo '<a href="contratoRegistrar.php?id_inmueble=' . $inmuebleId . '&precio_inmueble=' . $precioDescuento . '&tipo_contrato=Edificio" class="btn btn-outline-primary alquilar-btn">Alquilar edificio</a>';
                            }

                            // Mostrar el botón "Ver interiores" siempre
                            echo '<a href="piso_mostrar.php?id=' . $inmuebleId . '" class="btn btn-outline-warning">Ver interiores</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                        // Incrementar el contador
                        $counter++;
                        // Agregar salto de línea después de cada fila
                        if ($counter % 3 == 0) {
                            echo '<div class="w-100"></div>';
                        }
                    }
                } else {
                    echo "No se encontraron inmuebles.";
                }
                // Cerrar la conexión a la base de datos
                mysqli_close($conexion);
                ?>
            </div>
        </div>
        <div class="col-1 p-1">
            <!-- Contenido de la columna 3 -->
        </div>
    </div>
</div>

<?php include("Apertura_biblierias_Js.php"); ?>
<!-- </script> -->

</html>
