<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema ventas</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body style="background: linear-gradient(135deg, #f0fff4, #e6fffa); min-height: 100vh;">
    <!-- Navbar con colores estilo "new user" -->
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background: linear-gradient(90deg, #11998e, #38ef7d); box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="#">
                <i class="bi bi-shop"></i> Logo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-semibold" aria-current="page" href="<?= BASE_URL ?>">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>users">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>produc">
                            <i class="bi bi-box-seam"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>categoria">
                            <i class="bi bi-tags"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>cliente">
                            <i class="bi bi-person-check"></i> Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>proveedor">
                            <i class="bi bi-truck"></i> Proveedor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>">
                            <i class="bi bi-truck"></i> Shops
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="<?= BASE_URL ?>">
                            <i class="bi bi-truck"></i> Sales
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> My Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                            <li><a class="dropdown-item" href="#" id="logout-btn"><i class="bi bi-box-arrow-right"></i> Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        document.getElementById('logout-btn').addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to log out?')) {
                fetch(base_url + 'control/UsuarioController.php?tipo=cerrar_sesion', {
                    method: 'POST'
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            window.location.href = base_url;
                        } else {
                            alert('Error while logging out');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error while logging out');
                    });
            }
        });
    </script>

    <script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
