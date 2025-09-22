<!--inicio de acuerdo de pagina-->
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Registrar productos</h5>

        <form id="frm_producto" method="" enctype="multipart/form-data">
            <div class="card-body">

                <!-- Código -->
                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>

                <!-- Nombre -->
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <!-- Detalle -->
                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label">Detalle:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="detalle" name="detalle" required>
                    </div>
                </div>

                <!-- Precio -->
                <div class="mb-3 row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                    <div class="col-sm-4">
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                </div>

                <!-- Stock -->
                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                </div>

                <!-- Proveedor -->
                <div class="mb-3 row">
                    <label for="id_proveedor" class="col-sm-2 col-form-label">Proveedor:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="id_proveedor" name="id_proveedor" required>
                    </div>
                </div>

                <!-- Categoría -->
                <div class="mb-3 row">
                    <label for="id_categoria" class="col-sm-2 col-form-label">Categoría:</label>
                    <div class="col-sm-4">

                            <select name="id_categoria" id="id_categoria"></select>
                            <option value="">Seleccione</option>
                    </div>
                </div>

                <!-- Fecha vencimiento -->
                <div class="mb-3 row">
                    <label for="fecha_vencimiento" class="col-sm-2 col-form-label">Fecha vencimiento:</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                    </div>
                </div>

                <!-- Imagen -->
                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label">Imagen:</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" id="imagen" name="imagen" accept=".jpg,.jpeg,.png" required>
                    </div>
                </div>

                <!-- Botones -->
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-info">Limpiar</button>
                    <a href="index.php?page=products" class="btn btn-danger">Cancelar</a>
                    <a href="<?php echo BASE_URL; ?>producto-listar" class="btn btn-secondary">Ver</a>
                </div>

            </div>
        </form>
    </div>
</div>
<!--fin de acuerdo de pagina-->

<!-- Scripts -->
<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
    cargar_categorias();
</script>