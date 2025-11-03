<div class="container">
  <div class="mt-3" style="background: linear-gradient(135deg, #1e3c72, #2a5298); color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(30, 60, 114, 0.4);">
    <div class="d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-people-fill"></i> Lista de Usuarios</h4>
      <a class="btn btn-light d-flex align-items-center" href="<?= BASE_URL ?>new-user">
        <i class="bi bi-plus-circle"></i>&nbsp;Nuevo Usuario
      </a>
    </div>
  </div>

  <table class="table table-bordered border-primary table-striped mt-3">
    <thead class="table-dark">
      <tr class="text-center">
        <th><i class="bi bi-hash"></i> Nro</th>
        <th><i class="bi bi-card-text"></i> DNI</th>
        <th><i class="bi bi-person"></i> Nombres y Apellidos</th>
        <th><i class="bi bi-envelope"></i> Correo</th>
        <th><i class="bi bi-shield-check"></i> Rol</th>
        <th><i class="bi bi-toggle-on"></i> Estado</th>
        <th><i class="bi bi-gear"></i> Acciones</th>
      </tr>
    </thead>
    <tbody id="content_users"></tbody>
  </table>
</div>
<script src="<?= BASE_URL ?>view/function/user.js"></script>
