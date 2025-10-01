<div class="container">
    <h5 class="mt-3 text-center" style="background: blue; color: white; padding: 8px;">LISTA DE PRODUCTOS</h5>
    <table class="table table-striped text-center" style="border: 2px solid blue;">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Proveedor</th>
                <th>Fecha Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="content_products">
            <!-- Aquí se cargan los productos con JavaScript -->
        </tbody>
    </table>
</div>

<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
