<?php
if (!empty($_POST["btnRegistrar"])) {
    // Obtener los datos del formulario
    $idInmueble = $_POST["idInmueble"];
    $idUsuario = $_POST["idUsuario"];
    $tipoContrato = $_POST["tipoContrato"];
    $precioContrato = $_POST["precioContrato"];
    $Fincio = $_POST["Fincio"];
    $Ffinal = $_POST["Ffinal"];

    if($idUsuario == 0){
        echo 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Está en modo invitado!</strong> No puede realizar contratos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        exit;
    } else{
        if ($tipoContrato == "Local") {
            $idLocal = $idInmueble;
            $sql1 = $conexion->query("SELECT usuar_arr_id FROM usuario WHERE usuario.usuar_id = $idUsuario;");
            while ($datos = $sql1->fetch_object()) {
                $idarrendatario = $datos->usuar_arr_id;
            }
        
            // Actualizar estado del local a "Alquilado"
            $sqlUpdateLocal = $conexion->query("UPDATE local SET loc_est_alquilado = 'Alquilado' WHERE loc_id = $idLocal");
        
            if ($sqlUpdateLocal == 1) {
                // Registrar el contrato para el local
                $sqlContrato = $conexion->query("INSERT INTO contrato (contr_loc_id, contr_arr_id, contr_modalidad, contr_vigencia, contr_estado, contr_f_inicio, contr_f_fin, contr_monto_alquiler, contr_dia_pago)
                        VALUES ('$idLocal', '$idarrendatario', '$tipoContrato', 'Vigente', 'Alquilado', '$Fincio', '$Ffinal', '$precioContrato', DAY('$Fincio'))");
        
                if ($sqlContrato == 1) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Ok!</strong> Contrato registrado correctamente para el local ID: ' . $idLocal . '.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        
                    // Verificar si el piso solo tiene un local
                    $sqlCountLocales = $conexion->query("SELECT COUNT(*) AS num_locales FROM piso WHERE pis_id IN (SELECT loc_pis_id FROM local WHERE loc_id = $idLocal)");//loc_pis_id = $idInmueble
                    $rowCountLocales = $sqlCountLocales->fetch_assoc();
                    $numLocales = $rowCountLocales['num_locales'];
        
                    if ($numLocales == 1) {
                        // Actualizar estado del piso a "Alquilado"
                        $sqlUpdatePiso = $conexion->query("UPDATE piso SET pis_est_alquilado = 'Alquilado' WHERE pis_id IN (SELECT loc_pis_id from local WHERE loc_id = $idLocal)");
        
                        // if ($sqlUpdatePiso == 1) {
                        //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //         <strong>Ok!</strong> Estado del piso actualizado a "Alquilado" debido a que solo tiene un local.
                        //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //     </div>';
                        // } else {
                        //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        //         <strong>Alerta!</strong> Error al actualizar el estado del piso ID: ' . $idInmueble . '.
                        //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //     </div>';
                        // }
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Alerta!</strong> Error al registrar el contrato para el local ID: ' . $idLocal . '.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Alerta!</strong> Error al actualizar el estado del local ID: ' . $idLocal . '.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        
        if ($tipoContrato == "Piso") {
            $idPiso = $idInmueble;
            $sql1 = $conexion->query("SELECT usuar_arr_id FROM usuario WHERE usuario.usuar_id = $idUsuario;");
            while ($datos = $sql1->fetch_object()) {
                $idarrendatario = $datos->usuar_arr_id;
                // Encontrar los locales ligados al piso mediante INNER JOIN
                $sqlLocales = $conexion->query("SELECT local.loc_id FROM local INNER JOIN piso ON local.loc_pis_id = piso.pis_id WHERE piso.pis_id = $idPiso");
                $numLocales = $sqlLocales->num_rows;
    
                if ($numLocales > 0) {
                    $montoAlquilerPorLocal = $precioContrato / $numLocales;
    
                    // Actualizar estados de pisos
                    $sqlUpdatePisos = $conexion->query("UPDATE piso SET pis_est_alquilado = 'Alquilado' WHERE pis_id = $idPiso");
    
                    // Actualizar estados de locales
                    $sqlUpdateLocales = $conexion->query("UPDATE local SET loc_est_alquilado = 'Alquilado' WHERE loc_pis_id = $idPiso");
    
                    while ($datos = $sqlLocales->fetch_object()) {
                        $idLocal = $datos->loc_id;
    
                        // Registrar el contrato para el local
                        $sqlContrato = $conexion->query("INSERT INTO contrato (contr_loc_id, contr_arr_id, contr_modalidad, contr_vigencia, contr_estado, contr_f_inicio, contr_f_fin, contr_monto_alquiler, contr_dia_pago)
                    VALUES ('$idLocal', '$idarrendatario', '$tipoContrato', 'Vigente', 'Alquilado', '$Fincio', '$Ffinal', '$montoAlquilerPorLocal', DAY('$Fincio'))");
    
                        if ($sqlContrato == 1) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Ok!</strong> Contrato registrado correctamente para el local ID: ' . $idLocal . '.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Alerta!</strong> Error al registrar el contrato para el local ID: ' . $idLocal . '.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                        }
                    }
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Advertencia!</strong> No se encontraron locales para el piso seleccionado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
        }
        if ($tipoContrato == "Edificio") {
            $sql1 = $conexion->query("SELECT usuar_arr_id FROM usuario WHERE usuario.usuar_id = $idUsuario;");
            while ($datos = $sql1->fetch_object()) {
                $idarrendatario = $datos->usuar_arr_id;
            }
            // Encontrar los locales ligados al inmueble
            $sqlLocales = $conexion->query("SELECT loc_id FROM local WHERE loc_pis_id IN (SELECT pis_id FROM piso WHERE pis_inm_id = $idInmueble)");
            $numLocales = $sqlLocales->num_rows;
    
            if ($numLocales > 0) {
                $montoAlquilerPorLocal = $precioContrato / $numLocales;
    
                // Actualizar atributos de inmueble
                $sqlUpdateInmueble = $conexion->query("UPDATE inmueble SET inm_est_alquilado = 'Alquilado' WHERE inm_id = $idInmueble");
    
                if ($sqlUpdateInmueble) {
                    // Actualizar atributos de pisos
                    $sqlUpdatePisos = $conexion->query("UPDATE piso SET pis_est_alquilado = 'Alquilado' WHERE pis_inm_id = $idInmueble");
    
                    // Actualizar atributos de locales
                    $sqlUpdateLocales = $conexion->query("UPDATE local SET loc_est_alquilado = 'Alquilado' WHERE loc_pis_id IN (SELECT pis_id FROM piso WHERE pis_inm_id = $idInmueble)");
    
                    while ($datos = $sqlLocales->fetch_object()) {
                        $idLocal = $datos->loc_id;
    
                        // Registrar el contrato para el local
                        $sqlContrato = $conexion->query("INSERT INTO contrato (contr_loc_id, contr_arr_id, contr_modalidad, contr_vigencia, contr_estado, contr_f_inicio, contr_f_fin, contr_monto_alquiler, contr_dia_pago)
                            VALUES ('$idLocal', '$idarrendatario', '$tipoContrato', 'Vigente', 'Alquilado', '$Fincio', '$Ffinal', '$montoAlquilerPorLocal', DAY('$Fincio'))");
    
                        if ($sqlContrato == 1) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Ok!</strong> Contrato registrado correctamente para el local ID: ' . $idLocal . '.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Alerta!</strong> Error al registrar el contrato para el local ID: ' . $idLocal . '.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Alerta!</strong> Error al actualizar el estado del inmueble.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            } else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Advertencia!</strong> No se encontraron locales para el inmueble seleccionado.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
    
}
?>