<?php
// Comprobar si se ha cargado un archivo 
if (isset($_FILES['archivo'])) {
    // extract($_POST);
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo'];
    $sueldo = $_POST['sueldo'];
    $estado = $_POST['estado'];
    $tipoArchivo = $_POST['tipoArchivo'];
    $nombreArchivo = $dni.$nombres;

    // echo $tipoArchivo;
    // echo $nombreArchivo;
    // if($_FILES['archivo']['type'] == 'application/pdf'){
        // move_uploaded_file($_FILES['archivo']['tmp_name'], 'C:/xampp/htdocs/proyectoIngSoft/modulos/files/'.$_FILES['archivo']['name']);
        // if(move_uploaded_file($_FILES['archivo']['tmp_name'], 'C:/xampp/htdocs/proyectoIngSoft/modulos/files/'.$nombreArchivo.'.pdf')){
            // echo "Documento guardado correctamente";
            include "../modelo/conexion.php";
            $extension = "pdf";
            $sql = "insert into arrendatario
            (`arr_nombres`, `arr_apellidos`, `arr_dni`, `arr_edad`, `arr_sexo`, `arr_correo`, `arr_archivo`, `arr_archivo_tipo`, `arr_estado`, `arr_sueldo`) 
            VALUES 
            ('$nombres','$apellidos','$dni','$edad','$sexo', '$correo', '$nombreArchivo.$extension', '$tipoArchivo', '$estado', '$sueldo')";
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {//resgitrado
                header("Location: login.php");
                // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                // <strong>Ok!</strong> Arrendatario registrado correctamente.
                // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                // </div>';
                // sleep(10);
            } else {
                echo "<script language='JavaScript'> 
                alert('Error en sqlResultado'); 
                // location.assign('../index.php'); 
                </script>";
            }
        // }else{
        //     echo "<script language='JavaScript'> 
        //     alert('Error al subir el archivo. '); 
        //     </script>";
        // }
    // }else{
    //     echo "<script language='JavaScript'>
    //     alert('Solo se permiten archivos PDF'); 
    //     </script>";
    // }
}
?>

<!-- location.assign('../views/index.php');  -->