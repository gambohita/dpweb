<div class="container">
  <h4 class="mt-3 mb-3 text-center text-danger fs-1">Lista de Productos</h4>
  <table class="table table-success table-striped-columns text-center">
    <thead>
      <tr>
        <th>nombre</th>
        <th>detalle</th>
        <th>precio</th>
        <th>fecha_vencimiento</th>
        <th>imagen</th>
      </tr>
    </thead>
    <tbody id="content_products">
      <!-- Aquí se cargarán los productos -->
    </tbody>
  </table>
</div>

<script> const base_url = "<?= BASE_URL ?>"; </script>
<script src="<?= BASE_URL ?>view/function/product.js"></script>
<script> products(); </script>
