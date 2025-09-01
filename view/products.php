<div class="container">
<h4 class="mt-3 mb-3 text-center text-danger fs-1">Lista de Usuarios</h4>
    <table class="table table-success table-striped-columns text-center">
        <thead>
            <tr>
                <th>nombre</th>
                <th>precio</th>
                <th>codigo	</th>
                <th>correo</th>
                
            </tr>
        </thead>
        <tbody id="content_users">
            <!-- Aquí se cargarán los usuarios -->
        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>view/function/user.js"></script>
<script>view_products();</script>
<script> const base_url = "<?= BASE_URL ?>";</script>
