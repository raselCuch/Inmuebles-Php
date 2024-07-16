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
<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-2 p-1">
      <!-- Contenido de la columna 1 -->
    </div>
    <div class="col-9 p-4">
      <!-- Contenido de la columna 2 -->
      <h3 class="mt-5 pt-3 text-dark mb-4">Ventana de inicio - Admin <?php echo "$idUsuario"; ?></h3>

      <h4 class="text-dark">Descripción de la empresa Inmobiliaria "X":</h4>
      <p class="fs-5 lh-lg">
        <span class="fw-bold">Inmobiliaria X</span> es una empresa líder en el sector inmobiliario, dedicada a brindar soluciones integrales en la compra, venta y alquiler de propiedades residenciales y comerciales. Con una amplia experiencia en el mercado, nos destacamos por ofrecer un servicio personalizado y de calidad, adaptado a las necesidades y preferencias de nuestros clientes.
      </p>

      <h4 class="text-dark">Reseña histórica de Inmobiliaria X:</h4>
      <p class="fs-5 lh-lg">
        Fundada en el año 2002, Inmobiliaria X ha estado presente en el mercado inmobiliario durante más de 21 años. Desde nuestros inicios, nos hemos esforzado por establecer relaciones sólidas y duraderas con nuestros clientes, basadas en la confianza, la honestidad y el profesionalismo. A lo largo de los años, hemos consolidado nuestra reputación como una empresa confiable y comprometida, brindando servicios inmobiliarios de excelencia.
      </p>

      <h4 class="text-dark">Contenido promocional:</h4>
      <p class="fs-5 lh-lg">
        <b>¡Descubre tu nuevo hogar con Inmobiliaria X!</b> Con nuestra amplia cartera de propiedades, te ayudaremos a encontrar la casa de tus sueños. Desde apartamentos modernos hasta casas familiares acogedoras, contamos con una variedad de opciones que se adaptan a tus necesidades y presupuesto. Además, aprovecha nuestras promociones especiales. Por tiempo limitado, ofrecemos descuentos exclusivos en la compra de propiedades seleccionadas. ¡No pierdas la oportunidad de invertir en tu futuro!
      </p>

      <p class="fs-5 lh-lg">
        Contáctanos hoy mismo y déjanos ayudarte a encontrar el lugar perfecto para llamar hogar. En Inmobiliaria X, estamos comprometidos con tu satisfacción y te brindaremos un servicio personalizado en cada paso del proceso.
      </p>
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