<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Vista Productos</title>
  <link rel="stylesheet" href="http://localhost/dpweb/view/bootstrap/css/bootstrap.min.css">
</head>
<body>

  <!-- Carrusel -->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <h4 class="text-center mt-3" style="color: #007bff; font-weight: bold;">
        PRODUCTOS EN LÍNEA
    </h4>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src=http://localhost/dpweb/ class="d-block w-50" alt="Imagen 1">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="http://localhost/dpweb/view/img/" class="d-block w-100" alt="Imagen 2">
        </div>
        <div class="carousel-item">
            <img src="http://localhost/dpweb/view/img/" class="d-block w-100" alt="Imagen 3">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
      </button>
  </div>

  <!-- Contenedor de productos -->
  <div class="container mt-5">
      <div id="contenedor_productos" class="row"></div>
  </div>

  <!-- Scripts al final -->
  <script src="http://localhost/dpweb/view/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/dpweb/view/function/products-vista.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
