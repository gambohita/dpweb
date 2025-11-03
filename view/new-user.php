<!-- INICIO DE CUERPO DE PAGINA -->
<div class="container-fluid" style="min-height: 100vh; background: linear-gradient(135deg, #d4fc79, #96e6a1); display: flex; justify-content: center; align-items: center; padding: 40px 0; font-family: 'Poppins', sans-serif;">
    <div class="card shadow" style="width: 90%; max-width: 900px; border: none; border-radius: 20px; background: #ffffffcc; backdrop-filter: blur(8px); box-shadow: 0 8px 25px rgba(0,0,0,0.2);">
        <h5 class="card-header text-center" style="background: linear-gradient(90deg, #11998e, #38ef7d); color: white; font-weight: 600; border-top-left-radius: 20px; border-top-right-radius: 20px; padding: 15px;">
            <i class="bi bi-person-plus"></i> Registro de Usuario
        </h5>

        <form id="frm_user" action="" method="">
            <div class="card-body" style="padding: 30px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nro_identidad" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-card-text"></i> Nro de Documento:</label>
                            <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="razon_social" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-building"></i> Razón social:</label>
                            <input type="text" class="form-control" id="razon_social" name="razon_social" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="telefono" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-telephone"></i> Teléfono:</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="correo" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-envelope"></i> Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="departamento" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-geo-alt"></i> Departamento:</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="provincia" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-geo-alt"></i> Provincia:</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="distrito" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-geo-alt"></i> Distrito:</label>
                            <input type="text" class="form-control" id="distrito" name="distrito" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cod_postal" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-mailbox"></i> Código postal:</label>
                            <input type="number" class="form-control" id="cod_postal" name="cod_postal" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="direccion" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-house"></i> Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required style="border-radius:10px; border:1px solid #a5d6a7;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rol" class="form-label" style="color:#0f5132; font-weight:500;"><i class="bi bi-shield-check"></i> Rol:</label>
                            <select class="form-control" name="rol" id="rol" required style="border-radius:10px; border:1px solid #a5d6a7;">
                                <option disabled selected>Seleccionar rol</option>
                                <option value="administrador">Administrador</option>
                                <option value="cliente">Cliente</option>
                                <option value="proveedor">Proveedor</option>
                                <option value="vendedor">Vendedor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" class="btn btn-success btn-sm" style="background: linear-gradient(90deg, #11998e, #38ef7d); border:none; color:white; border-radius:10px;"><i class="bi bi-check-circle"></i> Registrar</button>
                    <button type="reset" class="btn btn-info btn-sm" id="btn_limpiar" style="background-color:#4dd0e1; border:none; color:white; border-radius:10px;"><i class="bi bi-arrow-clockwise"></i> Limpiar</button>
                    <button type="button" class="btn btn-danger btn-sm" id="btn_cancelar" style="background-color:#ef5350; border:none; color:white; border-radius:10px;"><i class="bi bi-x-circle"></i> Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FIN DE CUERPO DE PAGINA -->

<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
