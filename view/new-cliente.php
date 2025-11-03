<!-- INICIO DE CUERPO DE PÁGINA -->
<div class="container my-4">
  <div class="card shadow-sm border-0">
    <h5 class="card-header bg-primary text-white">
      <i class="bi bi-person-plus"></i> Registro de Cliente
    </h5>

    <form id="frm_client" class="p-3">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="nro_identidad" class="form-label">
            <i class="bi bi-card-text"></i> Nro de Documento:
          </label>
          <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="razon_social" class="form-label">
            <i class="bi bi-building"></i> Razón Social:
          </label>
          <input type="text" class="form-control" id="razon_social" name="razon_social" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="telefono" class="form-label">
            <i class="bi bi-telephone"></i> Teléfono:
          </label>
          <input type="number" class="form-control" id="telefono" name="telefono" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="correo" class="form-label">
            <i class="bi bi-envelope"></i> Correo:
          </label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="departamento" class="form-label">
            <i class="bi bi-geo-alt"></i> Departamento:
          </label>
          <input type="text" class="form-control" id="departamento" name="departamento" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="provincia" class="form-label">
            <i class="bi bi-geo-alt"></i> Provincia:
          </label>
          <input type="text" class="form-control" id="provincia" name="provincia" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="distrito" class="form-label">
            <i class="bi bi-geo-alt"></i> Distrito:
          </label>
          <input type="text" class="form-control" id="distrito" name="distrito" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="cod_postal" class="form-label">
            <i class="bi bi-mailbox"></i> Código Postal:
          </label>
          <input type="number" class="form-control" id="cod_postal" name="cod_postal" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="direccion" class="form-label">
            <i class="bi bi-house"></i> Dirección:
          </label>
          <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="rol" class="form-label">
            <i class="bi bi-shield-check"></i> Rol:
          </label>
          <select class="form-select" name="rol" id="rol" readonly>
            <option value="2" selected>Cliente</option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2 mt-3">
        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Registrar
        </button>
        <button type="reset" class="btn btn-info text-white" id="btn_limpiar_cliente">
          <i class="bi bi-arrow-clockwise"></i> Limpiar
        </button>
        <button type="button" class="btn btn-danger" id="btn_cancelar_cliente">
          <i class="bi bi-x-circle"></i> Cancelar
        </button>
      </div>
    </form>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<script src="<?php echo BASE_URL; ?>view/function/clients.js"></script>
