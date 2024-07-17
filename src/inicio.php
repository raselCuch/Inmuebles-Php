<?php session_start();
$idUsuario = $_SESSION['id_usuario'];?>

<?php include("Apertura_header.php"); ?>

<!-- Navegador de arriba -->
<?php include("Apertura_navbar.php"); ?>
<!-- Navegador de arriba (fin) -->

<!-- Barra lateral izquierda -->
<?php include("Apertura_barraLateral.php"); ?>
<!-- Barra lateral izquierda (fin) -->

<!-- Contenido Inicio -->
<div class="container-fluid">
  <div class="row">
    <div class="col-2 p-1">
      <!-- Contenido de la columna 1 -->
    </div>
    <div class="col-9 p-4">
      <!-- Contenido de la columna 2 -->
      <h3 class="mt-5 pt-3 text-dark mb-4">Ventana de inicio - Admin <?php echo "$idUsuario"; ?></h3>
<!--  -->
    </div>
    <div class="col-1 p-1">
      <!-- Contenido de la columna 3 -->
    </div>
  </div>
</div>

<!-- Contenido Inicio (fin) -->

<!-- Biblierias js -->
<?php include("Apertura_biblierias_Js.php"); ?>
<!-- Biblierias js (fin)-->
</body>

</html>