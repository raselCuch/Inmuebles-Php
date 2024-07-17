<?php include "Apertura_header.php" ?>
<!-- Navegador -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="login.php">Inmobilidaria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="arrendatario_registrar.php">Registrarme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inicio_usuario.php">Entrar sin registro</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Formulario -->

<div class="mt-5 pt-5">
    <div class="mt-5 pt-5 container aea">
        <div class="row justify-content-center">
            <div class="pb-3 border border-4 col-3">
                <form class="" method="POST">
                    <?php include "modelo/conexion.php"; ?>
                    <h3 class="pt-3 text-center text-secondary">Login</h3>
                    <?php include "controlador/C_login.php"; ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-3">Correo</label>
                        <input type="text" class="form-control" name="usuario">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary" name="btnIngresar" value="ok">Ingresar</button>
                    </div>
                </form>
                <!-- <a class="btn btn-success" href="#">Registrase</a>
                <a class="text-dark text-decoration-none" href="#">Entrar sin registro</a> -->
            </div>
            <!-- <a href="inicio.php">Modo admin</a> -->
        </div>
    </div>
</div>
</body>
<?php include("Apertura_biblierias_Js.php"); ?>

</html>