<div class="container">
  <div class="mt-3" style="background: linear-gradient(135deg, #8e2de2, #ff6fd8); color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(142, 45, 226, 0.3);">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-box-seam-fill"></i> Lista de Productos</h4>
      <a class="btn btn-light d-flex align-items-center fw-semibold" href="<?= BASE_URL ?>products">
        <i class="bi bi-plus-circle me-1"></i> Nuevo Producto
      </a>
    </div>
  </div>

  <table class="table table-bordered border-secondary table-striped mt-3">
    <thead class="table-dark text-center">
      <tr>
        <th><i class="bi bi-hash"></i> Nro</th>
        <th><i class="bi bi-upc"></i> Código</th>
        <th><i class="bi bi-tag"></i> Nombre</th>
        <th><i class="bi bi-info-circle"></i> Detalle</th>
        <th><i class="bi bi-cash"></i> Precio</th>
        <th><i class="bi bi-boxes"></i> Stock</th>
     
        <th><i class="bi bi-calendar-x"></i> Vencimiento</th>
        <th><i class="bi bi-tags"></i> Categoría</th>
        <th><i class="bi bi-gear"></i> Acciones</th>
      </tr>
    </thead>
    <tbody id="content_productos"></tbody>
  </table>
</div>

<script src="<?= BASE_URL ?>view/function/products.js"></script>