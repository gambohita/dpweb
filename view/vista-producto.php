<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Vista Productos</title>
  <link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
</head>

<body>

  <h4 class="text-center mt-3" style="color: #007bff; font-weight: bold;">
    PRODUCTOS EN LÍNEA
  </h4>

  <div class="container mt-4">
    <div class="row">

      <!-- 🧩 Productos a la izquierda -->
      <div class="col-md-8">
        <div id="contenedor_productos" class="row">
          <!-- Ejemplo de producto -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Producto 1</h5>
                <p class="card-text">Descripción breve del producto.</p>
                <p class="fw-bold">$10.00</p>
                <button class="btn btn-primary btn-sm">Agregar al carrito</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 🛒 Carrito de compras a la derecha -->
      <div class="col-md-4">
        <div id="carrito_panel" class="card border rounded shadow-sm">
          <div class="card-header bg-white fw-bold fs-5">
            Lista de Compra
          </div>

          <div class="card-body p-3" id="carrito_contenedor">
            <table class="table table-borderless align-middle mb-3">
              <thead>
                <tr class="fw-semibold border-bottom">
                  <th>Producto</th>
                  <th>Cant.</th>
                  <th>Precio</th>
                  <th>SubTotal</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody id="carrito_tabla">
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                </tr>
              </tbody>
            </table>

            <hr>

            <div class="text-end pe-2">
              <p class="mb-1 fw-semibold">Subtotal : <span class="fw-normal">$00.00</span></p>
              <p class="mb-1 fw-semibold">IGV : <span class="fw-normal">$00.00</span></p>
              <p class="mb-3 fw-semibold">Total : <span class="fw-normal">$00.00</span></p>
              <button class="btn btn-success btn-sm">Realizar Venta</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <!-- Scripts -->
  <script src="view/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="view/function/products-vista.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= BASE_URL ?>view/function/venta.js"></script>
 

</body>

</html>