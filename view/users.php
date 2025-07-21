<div class="container">
    <h4 class="mt-3 mb-3 "> Lista de Usuarios</h4>

 <table class="table table-success table-striped-columns">
        <div class="container text-center">
        <thead>
            <tr>
                <th>nro</th>
                <th>nro_identidad</th>
                <th>razon_social</th>
                <th>correo</th>
                <th>rol</th>
                <th>estado</th>
            </tr>
        </thead>
        <tbody id="content_users">

        </tbody>
    </table>
</div>
<script src="<?= BASE_URL ?>view/function/user.js"></script>
<script>view_users();</script>
