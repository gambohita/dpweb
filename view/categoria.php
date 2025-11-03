<div class="container">
  <div class="mt-3" style="background: linear-gradient(135deg, #8e2de2, #ff6fd8); color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(142, 45, 226, 0.3);">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-tags-fill"></i> Lista de Categorías</h4>
      <a class="btn d-flex align-items-center" href="<?= BASE_URL ?>categories" 
         style="background: white; color: #8e2de2; font-weight: 600; border-radius: 10px; padding: 6px 15px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
        <i class="bi bi-plus-circle me-1"></i> Nueva Categoría
      </a>
    </div>
  </div>

  <table class="table table-bordered border-secondary table-striped mt-3">
    <thead class="table-dark text-center">
      <tr>
        <th><i class="bi bi-hash"></i> Nro</th>
        <th><i class="bi bi-tag"></i> Nombre</th>
        <th><i class="bi bi-info-circle"></i> Detalle</th>
        <th><i class="bi bi-gear"></i> Acciones</th>
      </tr>
    </thead>
    <tbody id="content_categories"></tbody>
  </table>
</div>

<script src="<?= BASE_URL ?>view/function/categories.js"></script>
