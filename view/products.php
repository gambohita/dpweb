<!-- INICIO DE CUERPO DE PÁGINA -->
<div class="container my-4">
  <div class="card shadow-sm border-0">
    <h5 class="card-header bg-primary text-white">
      <i class="bi bi-plus-circle"></i> Registrar Producto
    </h5>

    <form id="frm_produc" enctype="multipart/form-data" class="p-3">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="codigo" class="form-label">
            <i class="bi bi-upc"></i> Código:
          </label>
          <input type="text" class="form-control" id="codigo" name="codigo" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="nombre" class="form-label">
            <i class="bi bi-tag"></i> Nombre:
          </label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="detalle" class="form-label">
            <i class="bi bi-info-circle"></i> Detalle:
          </label>
          <input type="text" class="form-control" id="detalle" name="detalle" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="precio" class="form-label">
            <i class="bi bi-cash"></i> Precio:
          </label>
          <input type="number" step="0.01" min="0" class="form-control" id="precio" name="precio" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="stock" class="form-label">
            <i class="bi bi-boxes"></i> Stock:
          </label>
          <input type="number" min="0" class="form-control" id="stock" name="stock" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="fecha_vencimiento" class="form-label">
            <i class="bi bi-calendar-x"></i> Fecha de Vencimiento:
          </label>
          <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="imagen" class="form-label">
            <i class="bi bi-image"></i> Imagen:
          </label>
          <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="id_categoria" class="form-label">
            <i class="bi bi-tags"></i> Categoría:
          </label>
          <select class="form-select" id="id_categoria" name="id_categoria" required>
            <option value="">Seleccione una categoría</option>
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label for="id_persona" class="form-label">
            <i class="bi bi-truck"></i> Proveedor:
          </label>
          <select class="form-select" id="id_persona" name="id_persona" required>
            <option value="">Seleccione un proveedor</option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2">
        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Registrar
        </button>
        <button type="reset" class="btn btn-info text-white" id="btn_limpiar_produc">
          <i class="bi bi-arrow-clockwise"></i> Limpiar
        </button>
        <button type="button" class="btn btn-danger" id="btn_cancelar_produc">
          <i class="bi bi-x-circle"></i> Cancelar
        </button>
      </div>
    </form>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
  cargarCategorias();
  cargarProveedores();

  document.addEventListener('DOMContentLoaded', function () {
    const btnLimpiar = document.getElementById('btn_limpiar_produc');
    if (btnLimpiar) {
      btnLimpiar.addEventListener('click', function () {
        document.getElementById('frm_produc').reset();
        Swal.fire({
          icon: 'info',
          title: 'Formulario limpiado',
          text: 'Todos los campos han sido restablecidos.',
          timer: 2000,
          showConfirmButton: false
        });
      });
    }

    const btnCancelar = document.getElementById('btn_cancelar_produc');
    if (btnCancelar) {
      btnCancelar.addEventListener('click', function () {
        Swal.fire({
          title: '¿Estás seguro?',
          text: 'Se perderán todos los cambios no guardados.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Sí, cancelar',
          cancelButtonText: 'Continuar editando'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = base_url + 'produc';
          }
        });
      });
    }
  });
</script>
