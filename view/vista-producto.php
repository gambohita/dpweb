
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
            <div class="row" id="productos_ventas"></div>
                <div id="contenedor_productos" class="">
                  
              </div>
            </div>
          </div>
        </div>

        <!-- 🛒 Carrito (también en su propio cuadro) -->
        <div class="col-md-4">
          <div id="carrito_panel" class="card border rounded shadow-sm">
            <div class="card-header bg-white fw-bold fs-10">
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
                <tbody id="lista_compra">
                
                </tbody>
              </table>

              <div class="text-end pe-2">
                <h6 class="mb-1 fw-semibold">Subtotal : <label class="fw-normal" id="subtotal_general"></label></h6>
                <h6 class="mb-1 fw-semibold">IGV : <label class="fw-normal" id="igv_general"></label></h6>
                <h6 class="mb-3 fw-semibold">Total : <label class="fw-normal" id="total"></label></h6>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="view/function/products-vista.js"></script>
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
    listar_temporales();
    
   act_subt_general();
  </script>

