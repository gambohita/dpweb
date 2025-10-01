<div class="container" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header text-center">
            Editar Producto
        </div>
        <form id="frm_edit_producto" enctype="multipart/form-data">
            <input type="hidden" name="id_producto" id="id_producto" value="<?= $ruta[1]; ?>">
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Código</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label">Detalle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="detalle" name="detalle" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_categoria" class="col-sm-2 col-form-label">Categoría</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_categoria" name="id_categoria" required>
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fecha_vencimiento" class="col-sm-2 col-form-label">Fecha Vencimiento</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_proveedor" class="col-sm-2 col-form-label">Proveedor</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_proveedor" name="id_proveedor" required>
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>

                <div class="text-center" style="gap:10px; display:flex; justify-content:center;">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="<?php echo BASE_URL; ?>producto-listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', async () => {
        let partes = window.location.pathname.split('/');
        let id = partes[partes.length - 1];

        if (!isNaN(id)) {
            await cargar_categorias();
            await cargar_proveedores();
            await cargarDatosProducto(id);
        }
    });
</script>
