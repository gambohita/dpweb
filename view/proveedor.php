<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg border-0 w-100" style="max-width: 1100px;">
        <h5 class="card-header text-white text-center" 
            style="background: linear-gradient(135deg, #1d4ed8, #9333ea); border-radius: 10px 10px 0 0;">
            📋 Lista de Usuarios
        </h5>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered align-middle text-center">
                    <thead style="background: #2563eb; color: white;">
                        <tr>
                            <th>nro</th>
                            <th>nro_identidad</th>
                            <th>razon_social</th>
                            <th>correo</th>
                            <th>rol</th>
                            <th>estado</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody id="content_users">
                        <!-- Aquí se cargarán los usuarios -->
                    </tbody>
                </table>
            </div>

            <script src="<?= BASE_URL ?>view/function/user.js"></script>
            <script>
                view_users();
            </script>