<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="inicio_usuario.php">Inmobilidaria "X"</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio_usuario.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="inmuebles_mostrar.php">Ver inmuebles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contrato_mostrar.php">Ver contratos</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown me-4">
                    <a class="text-muted nav-link dropdown-toggle ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-muted me-2"><i class="bi bi-person-fill"></i></span>
                        <span>Sesión</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Ver contratos</a></li> -->
                        <li><a class="dropdown-item" href="#">Ver datos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="login.php">Cerrar Sessión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>