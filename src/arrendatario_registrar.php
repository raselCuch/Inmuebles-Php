<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<!-- <?php // include("Apertura_navbar_usuario.php"); ?> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="login.php">Inmobilidaria "X"</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio.php">Modo admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inicio_usuario.php">Modo usuario</a>
                </li>
            </ul> -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="arrendatario_registrar.php">Registrarme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Entrar sin registro</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navegador de arriba (fin) -->

<?php include("modelo/conexion.php");
?>
<div class="mt-5 pt-5 container aea">
    <div class="row justify-content-center">
        <div class="pb-3 border border-4 col-10">
            <!-- Formulario -->
            <form class="p-1 m-auto" method="POST" enctype="multipart/form-data"> <!-- Era POST -->
                <h4 class="text-center text-secondary">Registrar arrendatario</h4>
                <?php include "controlador/C_arrendatario_registro.php" ?>
                <div class="container-fluid row">
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="nombres" pattern="[a-zA-Z\s]+" title="Solo se permiten letras y espacios" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" pattern="[a-zA-Z\s]+" title="Solo se permiten letras y espacios" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">DNI</label>
                            <input type="number" class="form-control" name="dni" id="dniInput" value="" required>
                        </div>
                        <!-- Limita a 8 digitos -->
                        <script>
                            document.getElementById('dniInput').addEventListener('input', function() {
                                if (this.value.length > 8) {
                                    this.value = this.value.slice(0, 8);
                                }
                            });
                        </script>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="edad" value="" min="18" max="200" required>
                        </div>
                        <div class="mb-2">
                            <label for="disabledSelect" class="form-label">Sexo</label>
                            <select name="sexo" class="form-select">
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" value="" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Sueldo</label>
                            <input type="number" class="form-control" name="sueldo" value="" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Estado</label>
                            <input type="text" class="form-control" name="estado" value="No comprobado" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="disabledSelect" class="form-label">Tipo de archivo</label>
                            <select name="tipoArchivo" class="form-select">
                                <option>Aval bancario</option>
                                <option>Boleta de pago</option>
                                <option>Documento de aval</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Archivo (WORD & PDF)</label>
                            <input type="file" name="archivo" id="archivo" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="Registrar" value="ok">Registrarse</button>
            </form>
            <!-- Formulario (fin) -->

        </div>
    </div>
</div>
<?php include("Apertura_biblierias_Js.php"); ?>