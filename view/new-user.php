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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    </li>
                    <a class="nav-link " aria-current="page" href="#">users</a>
                    </li>
                    <a class="nav-link " aria-current="page" href="#">products</a>
                    </li>
                    </li>
                    <a class="nav-link " aria-current="page" href="#">categories</a>
                    </li>
                    </li>
                    <a class="nav-link " aria-current="page" href="#">clients</a>
                    </li>
                    <a class="nav-link " aria-current="page" href="#">shops</a>
                    </li>
                    <a class="nav-link " aria-current="page" href="#">sales</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true"></a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">TITULO</h5>
            <form id="frm_user" action="" method="">
                <div class="card-body">
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

    

</body>
<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>