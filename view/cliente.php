<div class="container">
  <div class="mt-3" style="background-color: #fd7e14; color: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(253, 126, 20, 0.3);">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-person-check-fill"></i> Lista de Clientes</h4>
      <a class="btn d-flex align-items-center" href="<?= BASE_URL ?>new-cliente"
         style="background-color: white; color: #fd7e14; font-weight: 600; border-radius: 8px; padding: 6px 15px;">
        <i class="bi bi-plus-circle me-1"></i> Nuevo Cliente
      </a>
    </div>
  </div>

  <table class="table table-bordered border-warning table-striped mt-3">
    <thead class="table-dark text-center">
      <tr>
        <th><i class="bi bi-hash"></i> Nro</th>
        <th><i class="bi bi-card-text"></i> DNI</th>
        <th><i class="bi bi-person"></i> Nombres y Apellidos</th>
        <th><i class="bi bi-envelope"></i> Correo</th>
        <th><i class="bi bi-shield-check"></i> Rol</th>
        <th><i class="bi bi-toggle-on"></i> Estado</th>
        <th><i class="bi bi-gear"></i> Acciones</th>
      </tr>
    </thead>
    <tbody id="content_clients"></tbody>
  </table>
</div>

<script src="<?= BASE_URL ?>view/function/clients.js"></script>
