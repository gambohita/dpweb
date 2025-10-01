<div class="container" style="margin-top: 50px; max-width: 800px;">
    <div class="card shadow-lg border-0 rounded-4" style="background: linear-gradient(135deg, #f0f9ff, #cbebff);">
        <div class="card-header text-center text-white fw-bold fs-4 rounded-top-4" 
             style="background: linear-gradient(90deg, #007bff, #00c6ff);">
            Registrar Producto
        </div>
        <form id="frm_product" enctype="multipart/form-data">
            <div class="card-body" style="padding: 30px;">

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label fw-bold">Código</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control border-primary shadow-sm" id="codigo" name="codigo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label fw-bold">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control border-primary shadow-sm" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label fw-bold">Detalle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control border-primary shadow-sm" id="detalle" name="detalle" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="precio" class="col-sm-2 col-form-label fw-bold">Precio</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control border-primary shadow-sm" id="precio" name="precio" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label fw-bold">Stock</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control border-primary shadow-sm" id="stock" name="stock" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_categoria" class="col-sm-2 col-form-label fw-bold">Categoría</label>
                    <div class="col-sm-10">
                        <select class="form-select border-primary shadow-sm" name="id_categoria" id="id_categoria">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fecha_vencimiento" class="col-sm-2 col-form-label fw-bold">	fecha_vencimiento</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control border-primary shadow-sm" id="fecha_vencimiento" name="fecha_vencimiento" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label fw-bold">Imagen</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control border-primary shadow-sm" id="imagen" name="imagen">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_proveedor" class="col-sm-2 col-form-label fw-bold">Proveedor</label>
                    <div class="col-sm-10">
                        <select class="form-select border-primary shadow-sm" name="id_proveedor" id="id_proveedor">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>

                <div class="text-center mt-4" style="gap:10px; display:flex; justify-content:center;">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Registrar</button>
                    <button type="reset" class="btn btn-warning px-4 shadow-sm">Limpiar</button>
                    <a href="<?php echo BASE_URL; ?>producto-listar" class="btn btn-success px-4 shadow-sm">Ver Lista</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        cargar_categorias();
        cargar_proveedores();
    });
</script>
