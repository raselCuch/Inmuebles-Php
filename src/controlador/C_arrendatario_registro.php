<?php
ob_start();
// Comprobar si se ha cargado un archivo 
if (isset($_FILES['archivo'])) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo'];
    $sueldo = $_POST['sueldo'];
    $estado = $_POST['estado'];
    $tipoArchivo = $_POST['tipoArchivo'];
    $nombreArchivo = $dni . $nombres;

    // echo "Nombres: $nombres<br>";
    // echo "Apellidos: $apellidos<br>";
    // echo "DNI: $dni<br>";
    // echo "Edad: $edad<br>";
    // echo "Sexo: $sexo<br>";
    // echo "Correo: $correo<br>";
    // echo "Sueldo: $sueldo<br>";
    // echo "Estado: $estado<br>";
    // echo "Tipo de Archivo: $tipoArchivo<br>";
    // echo "Nombre del Archivo: $nombreArchivo<br>";

    include("modelo/conexion.php");

    // Escapa los valores para evitar inyección SQL
    $nombres = mysqli_real_escape_string($conexion, $nombres);
    $apellidos = mysqli_real_escape_string($conexion, $apellidos);
    $dni = mysqli_real_escape_string($conexion, $dni);
    $edad = mysqli_real_escape_string($conexion, $edad);
    $sexo = mysqli_real_escape_string($conexion, $sexo);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $sueldo = mysqli_real_escape_string($conexion, $sueldo);
    $estado = mysqli_real_escape_string($conexion, $estado);
    $tipoArchivo = mysqli_real_escape_string($conexion, $tipoArchivo);
    $nombreArchivo = mysqli_real_escape_string($conexion, $nombreArchivo);

    $extension = "pdf";
    $sql = "INSERT INTO arrendatario
    (`arr_nombres`, `arr_apellidos`, `arr_dni`, `arr_edad`, `arr_sexo`, `arr_correo`, `arr_archivo`, `arr_archivo_tipo`, `arr_estado`, `arr_sueldo`) 
    VALUES 
    ('$nombres', '$apellidos', '$dni', '$edad', '$sexo', '$correo', '$nombreArchivo', '$tipoArchivo', '$estado', '$sueldo')";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        // echo "Registro guardado";
        // header("Location: login.php");
        echo '<script type="text/javascript">
                alert("Arrendatario registrado correctamente.");
                window.location.href = "login.php";
              </script>';
    } else {
        // echo "Error guardando: " . mysqli_error($conexion);
        echo "<script language='JavaScript'> 
        alert('Error en sqlResultado'); 
        location.assign('../index.php'); 
        </script>";
    }
}
?>
