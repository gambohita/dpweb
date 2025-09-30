<div class="container mt-5">
   <div class="card shadow-lg border-0">
      <div class="card-header text-white text-center fs-3 fw-bold"
         style="background: linear-gradient(135deg, #2563eb, #9333ea); border-radius: 10px 10px 0 0;">
         🛒 Lista de Productos
      </div>
      <a href="<?= BASE_URL ?>new-product" class="btn btn-primary">Nuevo +</a>
      <div class="card-body bg-light">
         <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center">
               <thead style="background: #1e293b; color: #f8fafc;">
                  <tr>
                <th>Nro</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>F.V.</th>
                <th>Acciones</th>
            </tr>
               </thead>
               <tbody id="content_productos">
                     <a href="<?php echo BASE_URL; ?>producto-listar" class="btn btn-secondary">Cancelar</a>

               </tbody>
            </table>

            <script src="<?php echo BASE_URL; ?>view/function/products.js"></script>