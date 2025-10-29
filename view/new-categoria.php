<!-- INICIO DE CUERPO DE PÁGINA -->
<div class="container my-4">
  <div class="card shadow-sm border-0">
    <h5 class="card-header bg-primary text-white">
      <i class="bi bi-plus-circle"></i> Registrar Categoría
    </h5>

    <form id="frm_categories" class="p-3">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="nombre" class="form-label">
            <i class="bi bi-tag"></i> Nombre:
          </label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ejemplo: Bebidas" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="detalle" class="form-label">
            <i class="bi bi-info-circle"></i> Detalle:
          </label>
          <input type="text" class="form-control" id="detalle" name="detalle" placeholder="Descripción breve..." required>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2 mt-3">
        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Registrar
        </button>
        <button type="reset" class="btn btn-info text-white" id="btn_limpiar_categoria">
          <i class="bi bi-arrow-clockwise"></i> Limpiar
        </button>
        <button type="button" class="btn btn-danger" id="btn_cancelar_categoria">
          <i class="bi bi-x-circle"></i> Cancelar
        </button>
      </div>
    </form>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<script src="<?php echo BASE_URL; ?>view/function/category.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {

    // Botón Limpiar
    const btnLimpiar = document.getElementById('btn_limpiar_categoria');
    if (btnLimpiar) {
      btnLimpiar.addEventListener('click', function() {
        document.getElementById('frm_categories').reset();
        Swal.fire({
          icon: 'info',
          title: 'Formulario limpiado',
          text: 'Todos los campos han sido restablecidos.',
          timer: 2000,
          showConfirmButton: false
        });
      });
    }

    // Botón Cancelar
    const btnCancelar = document.getElementById('btn_cancelar_categoria');
    if (btnCancelar) {
      btnCancelar.addEventListener('click', function() {
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
            window.location.href = base_url + 'categoria';
          }
        });
      });
    }
  });
</script>
