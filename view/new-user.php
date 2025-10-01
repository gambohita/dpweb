<!-- inicio de cuerpo de pagina -->
<div class="container" style="margin-top: 80px; max-width: 900px;">
    <div class="card shadow-lg border-0 rounded-4" 
         style="background: linear-gradient(135deg, #f0fff4, #e6fffa);">
        <h5 class="card-header text-center text-white fw-bold fs-4 rounded-top-4" 
            style="background: linear-gradient(90deg, #11998e, #38ef7d);">
            Registro de Usuario
        </h5>
        <form id="frm_user" action="" method="">
            <div class="card-body" style="padding: 30px;">

                <div class="mb-3 row">
                    <label for="nro_identidad" class="col-sm-2 col-form-label fw-bold">Nro de documento</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control border-success shadow-sm" id="nro_identidad" name="nro_identidad" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="razon_social" class="col-sm-2 col-form-label fw-bold">Razón Social</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control border-success shadow-sm" id="razon_social" name="razon_social" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-2 col-form-label fw-bold">Teléfono</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control border-success shadow-sm" id="telefono" name="telefono" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="correo" class="col-sm-2 col-form-label fw-bold">Correo Electrónico</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control border-success shadow-sm" id="correo" name="correo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="departamento" class="col-sm-2 col-form-label fw-bold">Departamento</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control border-success shadow-sm" id="departamento" name="departamento" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="provincia" class="col-sm-2 col-form-label fw-bold">Provincia</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control border-success shadow-sm" id="provincia" name="provincia" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="distrito" class="col-sm-2 col-form-label fw-bold">Distrito</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control border-success shadow-sm" id="distrito" name="distrito" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="cod_postal" class="col-sm-2 col-form-label fw-bold">Código Postal</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control border-success shadow-sm" id="cod_postal" name="cod_postal" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="direccion" class="col-sm-2 col-form-label fw-bold">Dirección</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control border-success shadow-sm" id="direccion" name="direccion" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="rol" class="col-sm-2 col-form-label fw-bold">Rol</label>
                    <div class="col-sm-4">
                        <select class="form-select border-success shadow-sm" name="rol" id="rol" required>
                            <option value="" disabled selected>Seleccione</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Vendedor">Vendedor</option>
                        </select>
                    </div>
                </div>

                <div class="text-center mt-4" style="gap:15px; display:flex; flex-wrap: wrap; justify-content:center;">
                    <button type="submit" class="btn text-white px-4 shadow-sm" 
                            style="background: linear-gradient(90deg, #11998e, #38ef7d); border:none;">
                        Registrar
                    </button>
                    <button type="reset" class="btn btn-warning px-4 shadow-sm">Limpiar</button>
                    <button type="button" class="btn btn-danger px-4 shadow-sm">Cancelar</button>
                </div>

            </div>
        </form>
    </div>
</div>
<!-- fin de cuerpo de pagina -->

<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
