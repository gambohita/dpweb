<!-- INICIO DE CUERPO DE PÁGINA -->
<div class="container-fluid py-5" style="background-color: #f1f5f9; min-height: 100vh;">
    <div class="card shadow-lg mx-auto" style="max-width: 700px; background-color: #ffffff;">
        <h5 class="card-header bg-primary text-white text-center">Registro de Cliente</h5>
        
        <form id="frm_client" action="" method="">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nro_identidad" class="col-sm-4 col-form-label">Nro de Documento :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="razon_social" class="col-sm-4 col-form-label">Razón Social :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-4 col-form-label">Teléfono :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="correo" class="col-sm-4 col-form-label">Correo :</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="departamento" class="col-sm-4 col-form-label">Departamento :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="departamento" name="departamento" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="provincia" class="col-sm-4 col-form-label">Provincia :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="provincia" name="provincia" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="distrito" class="col-sm-4 col-form-label">Distrito :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="distrito" name="distrito" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cod_postal" class="col-sm-4 col-form-label">Código Postal :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="cod_postal" name="cod_postal" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="direccion" class="col-sm-4 col-form-label">Dirección :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="rol" class="col-sm-4 col-form-label">Rol :</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="rol" id="rol" required readonly>
                            <option value="Cliente" selected>Cliente</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                     <button type="button" class="btn btn-danger">Cancelar</button>
                    <a href="<?php echo BASE_URL; ?>clients" class="btn btn-primary">Ver Clientes</a>
                  
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<script src="<?php echo BASE_URL; ?>view/function/clients.js"></script>
