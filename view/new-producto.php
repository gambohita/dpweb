<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMBOA</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>

    <!--inicio de acuerdo de pagina-->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Registro productos</h5>
            <form id="frm_producto" method="POST">
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="codigo" name="codigo" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="detalle" class="col-sm-2 col-form-label">Detalle:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="detalle" name="detalle" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fecha_vencimiento" class="col-sm-2 col-form-label">Fecha Vencimiento:</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                        <div class="col-sm-4">
                            <select class="form-select" id="tipo" name="tipo" required>
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="reset" class="btn btn-info">Limpiar</button>
                        <a href="index.php?page=products" class="btn btn-danger">Cancelar</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!--fin de acuerdo de pagina-->


</body>
<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>