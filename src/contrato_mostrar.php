<?php
session_start();
$idUsuario = $_SESSION['id_usuario'];
include "Apertura_header.php";
include "Apertura_navbar_usuario.php";
include "modelo/conexion.php";

if($idUsuario == 0){
    echo 
    '<div class="mt-5 pt-4 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Está en modo invitado!</strong> No puede realizar contratos.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    exit;
}

$idLocal = $idInmueble;
        $sql1 = $conexion->query("SELECT usuar_arr_id FROM usuario WHERE usuario.usuar_id = $idUsuario;");
        while ($datos = $sql1->fetch_object()) {
            $idarrendatario = $datos->usuar_arr_id;
        }
// Consulta SQL
$sql = "SELECT CONCAT(a.arr_nombres, ', ', a.arr_apellidos) AS 'Nombre completo arrendatario',
        CONCAT(i.inm_tipo, '-', i.inm_id) AS 'Nombre inmueble',
        i.inm_ubicacion AS 'Ubicación inmueble',
        c.contr_modalidad,
        c.contr_f_inicio,
        COUNT(*) AS 'Total de pisos'
        FROM contrato AS c
        JOIN arrendatario AS a ON c.contr_arr_id = a.arr_id
        JOIN local AS l ON c.contr_loc_id = l.loc_id
        JOIN piso AS p ON l.loc_pis_id = p.pis_id
        JOIN inmueble AS i ON p.pis_inm_id = i.inm_id
        WHERE c.contr_vigencia = 'Vigente'
            AND a.arr_id = $idarrendatario
        GROUP BY c.contr_modalidad";

$resultado = mysqli_query($conexion, $sql);
?>

<div class="container-fluid bg-light">
    <script>
        function eliminar() {
            var respuesta = confirm("Está seguro que desea cancelar el contrato?");
            return respuesta;
        }
    </script>
    <div class="row">
        <div class="col-12 p-4">
            <!-- Contenido de la columna 2 -->
            <h3 class="mt-5 pt-3 text-dark mb-4">Lista de contratos</h3>
            <?php include "controlador/C_contrato_cancelar.php" ?>
            <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre completo arrendatario</th>
                            <th>Nombre inmueble</th>
                            <th>Ubicación inmueble</th>
                            <th>Modalidad</th>
                            <th>Fecha de inicio</th>
                            <th>Total de locales</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 1;
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $contador . "</td>";
                            echo "<td>" . $row['Nombre completo arrendatario'] . "</td>";
                            echo "<td>" . $row['Nombre inmueble'] . "</td>";
                            echo "<td>" . $row['Ubicación inmueble'] . "</td>";
                            echo "<td>" . $row['contr_modalidad'] . "</td>";
                            echo "<td>" . $row['contr_f_inicio'] . "</td>";
                            echo "<td>" . $row['Total de pisos'] . "</td>";
                            echo "<td>";
                            echo '<a onclick="return eliminar()" class="btn btn-danger" href="contrato_mostrar.php?arrendatario=' . urlencode($row['Nombre completo arrendatario']) . '&inmueble=' . urlencode($row['Nombre inmueble']) . '&modalidad=' . urlencode($row['contr_modalidad']) . '">Cancelar contrato <i class="bi bi-trash-fill"></i></a>';
                            echo "</td>";
                            echo "</tr>";
                            $contador++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("Apertura_biblierias_Js.php"); ?>

</html>