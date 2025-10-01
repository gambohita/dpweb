<!-- inicio de cuerpo de pagina -->
<div class="container" style="margin-top: 100px; max-width: 700px;">
    <div class="card shadow-lg border-0 rounded-4" 
         style="background: linear-gradient(135deg, #fdfbfb, #ebedee);">
        <div class="card-header text-center text-white fw-bold fs-4 rounded-top-4" 
             style="background: linear-gradient(90deg, #6a11cb, #2575fc);">
            Registrar Categoría
        </div>
        <form id="frm_categorie" action="" method="">
            <div class="card-body" style="padding: 30px;">

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label fw-bold">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control border-secondary shadow-sm" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label fw-bold">Detalle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control border-secondary shadow-sm" id="detalle" name="detalle" required>
                    </div>
                </div>

                <div class="text-center mt-4" style="display:flex; justify-content:center; gap:15px; flex-wrap: wrap;">
                    <button type="submit" class="btn px-4 shadow-sm text-white" 
                            style="background: linear-gradient(90deg, #6a11cb, #2575fc); border:none;">
                        Registrar
                    </button>
                    <button type="reset" class="btn btn-warning px-4 shadow-sm">Limpiar</button>
                    <button type="button" class="btn btn-danger px-4 shadow-sm">Cancelar</button>
                    <a href="<?php echo BASE_URL; ?>categorias-lista" 
                       class="btn btn-success px-4 shadow-sm">Ver Lista</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- fin de cuerpo de pagina -->

<script src="<?php echo BASE_URL; ?>view/function/categoria.js"></script>
