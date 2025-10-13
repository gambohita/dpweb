<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sis Venta</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">💻 SisVenta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Links principales -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active text-warning" href="#">🏠 Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>users">👤 Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-producto">📦 Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-categoria">📂 Categories</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-client"> clientes</a></li>
                     <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-proveedor">📂 proveedor</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">🏬 Shops</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">💰 Sales</a></li>
                </ul>

                <!-- Dropdown usuario -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            ⚙️ Opciones
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido de la página 
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="text-center text-success">Bienvenido al Sistema de Ventas</h3>
            <p class="text-center text-muted">Aquí podrás gestionar productos, usuarios, categorías, clientes y más.</p>
        </div>
    </div>-->

    <script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
