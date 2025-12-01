<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Vista Productos</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
  <div>
    <h4 class="text-center mt-3" style="color: #007bff; font-weight: bold;">
      PRODUCTOS EN LÍNEA
    </h4>

    <!--  Barra de búsqueda -->
    <div class="container mt-3 mb-3 text-center">
      <input type="text" class="form-control d-inline-block"
        placeholder="Buscar producto por nombre o código..."

        id="busqueda_venta" onkeyup="lista_productos_venta();">
        <input type="hidden" id="id_producto_venta">
        <input type="hidden" id="producto_precio_venta">
        <input type="hidden" id="producto_cantidad_venta" value="1">
      
    </div>

    <!--  Contenedor principal -->
    <div class="container mt-4">
      <div class="row">

        <!--  Productos (en su propio cuadro) -->
        <div class="col-md-8">
          <div class="card border rounded shadow-sm mb-4">
            <div class="card-header bg-white fw-bold fs-5">
              Lista de Productos
            </div>
            <div class="card-body">
              <div class="row" id="productos_ventas">
                <div id="contenedor_productos" class="row">
                  <!-- Ejemplo de producto -->
                  <div class="col-md-6 mb-4">
                    <div class="card h-100">
                      <div class="card-body text-center">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción breve del producto.</p>
                        <p class="fw-bold">$10.00</p>
                        <button class="btn btn-primary btn-sm">Agregar al carrito</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 🛒 Carrito (también en su propio cuadro) -->
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
  </div>

  <!-- Scripts -->
  <script src="view/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="view/function/products-vista.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= BASE_URL ?>view/function/venta.js"></script>
  <script>
    lista_productos_venta();
  </script>
  <script>
    let input = document.getElementById('busqueda_venta');
    input.addEventListener('keydown',  (event) => {
      if (event.key === 'Enter') {
        agregar_producto_temporal();
      }
    });
  </script>

</body>

</html>