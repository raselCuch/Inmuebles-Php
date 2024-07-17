<?php 
// include('config.php');

$loginOK = false;

// $id_usuario = 2;
// echo ''.$id_usuario;

// $_SESSION['id_usuario'] = 0;

$id_usuario = 0;

if (!empty($_POST["btnIngresar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["contrasena"])) {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $sql = $conexion->query("SELECT usuar_id, usuar_nombre, usuar_contraseña, usuar_rol FROM usuario ORDER BY usuar_id");
        
        while ($datos = $sql->fetch_object()) {
            if ($datos->usuar_nombre == $usuario && $datos->usuar_contraseña == $contrasena) {
                $loginOK = true;
                $idUsuario = $datos->usuar_id;
                break;
            }
        }

        if ($loginOK) {
            if ($datos->usuar_rol == "admin") {
                // session_start();
                // $_SESSION['id_usuario'] = $datos->usuar_id;
                $id_usuario = $datos->usuar_id;
                // header("Location: inicio.php?id=$idUsuario");
                // echo "Logueado";

                echo '<script type="text/javascript">
                alert("Logueado correctamente como administrador.'.$id_usuario.'");
                window.location.href = "inicio.php?id='.$id_usuario.'";
                </script>';
                // '.$idUsuario'.
            } else {
                // session_start();
                // $_SESSION['id_usuario'] = $datos->usuar_id;
                
                $id_usuario = $datos->usuar_id;
                // echo "Logueado no admin";
                // header("Location: inicio_usuario.php?id=$idUsuario");

                echo '<script type="text/javascript">
                alert("Logueado correctamente.'.$id_usuario.'");
                window.location.href = "inicio_usuario.php?id='.$id_usuario.'";
                </script>';
            }
            exit();
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Datos inválidos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Alguno de los campos está vacío.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>
