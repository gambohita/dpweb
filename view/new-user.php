
    <!-- inicio de cuerpo de pagina -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Registro de Usuario</h5>
            <form id="frm_user" action="" method="">
                <div class="card-body ">
                    <div class="mb-3 row">
                        <label for="nro_identidad" class="col-sm-2 col-form-label">Nro de documento:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="razon_social" class="col-sm-2 col-form-label">Razon Social:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo Electronico:</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="departamento" class="col-sm-2 col-form-label">Departamento:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="departamento" name="departamento" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="provincia" class="col-sm-2 col-form-label">Provincia:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="provincia" name="provincia" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="distrito" class="col-sm-2 col-form-label">Distrito:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="distrito" name="distrito" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="cod_postal" class="col-sm-2 col-form-label">Cod_Postal:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="cod_postal" name="cod_postal" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="direccion" class="col-sm-2 col-form-label">Direccion:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rol" class="col-sm-2 col-form-label">Rol:</label>
                        <div class="col-sm-4">
                            <select class="form_control" name="rol" id="rol">

                                <option value="" disabled selected>Seleccione</option>
                                <option value="Administrador"> Administrador</option>
                                <option value="Vendedor"> Vendedor</option>

                            </select>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-info">Limpiar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </div>

            </form>
        </div>
    </div>
    <!-- fin de cuerpo de pagina -->
     <script src="<?php echo BASE_URL; ?>view/function/user.js"></script>