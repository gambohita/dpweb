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
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Realizar Venta</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">registro de venta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_venta">
          <div class="row">
            <div class="col-md-6">
              <label for="cliente_dni" class="form-label">DNI del cliente</label>
              <input type="text" class="form-control" id="cliente_dni" name="cliente_dni" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11">
            </div>

            <div class="col-md-6">
              <button type="button" class="btn btn-primary mt-4" onclick="buscar_cliente_venta()">Buscar Cliente</button>
            </div>
            <div class="col-md-12">
              <label for="cliente_nombre" class="form-label">Nombre del cliente</label>
              <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" readonly>
              <input type="hidden" class="form-control" id="cliente_venta">
            </div>
            <div class="col-md-6">
              <label for="fecha_venta">fecha de venta</label>
              <input type="datetime" class="form-control" id="fecha_venta" name="fecha_venta" value="<?= date('Y-m-d H:i') ?>">
            </div>
          </div>



        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerra</button>
        <button type="button" class="btn btn-primary">Realizar Venta</button>
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
  input.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
      agregar_producto_temporal();

    }
  });
  listar_temporales();

  act_subt_general();
</script>