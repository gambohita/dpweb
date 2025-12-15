<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mi tienda</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>view/img/gati.jpg">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap y Estilos -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/css/style.css">

    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>


<body>
    <!-- 🟩 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="#">
            <img src="<?php echo BASE_URL; ?>view/img/gati.jpg" alt="Logo" width="50" height="50" class="me-2 rounded-circle">
            <span>Mi Tienda</span>
        </a>
        <!-- resto del código igual -->


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-semibold" href="<?= BASE_URL ?>">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>users"><i class="bi bi-people"></i> Users</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>produc"><i class="bi bi-box-seam"></i> Products</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>vista-producto"><i class="bi bi-eye"></i> Vista Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>categoria"><i class="bi bi-tags"></i> Categories</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>cliente"><i class="bi bi-person-check"></i> Clientes</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>proveedor"><i class="bi bi-truck"></i> Proveedor</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>ventas"><i class="bi bi-cart4"></i> Ventas</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>reportes"><i class="bi bi-bar-chart-line"></i> Reportes</a></li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Mi Cuenta
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Configuración</a></li>
                            <li><a class="dropdown-item" href="#" id="logout-btn"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- JS -->
    <script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
    