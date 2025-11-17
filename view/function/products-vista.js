async function cargarProductosTienda() {
    try {
        const respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        const productos = await respuesta.json(); // ya viene como array []
        const contenedor = document.getElementById('contenedor_productos');

        if (!productos || productos.length === 0) {
            contenedor.innerHTML = `<div class="col-12 text-center"><h4 class="text-muted">No hay productos disponibles</h4></div>`;
            return;
        }

        let html = '';

        productos.data.forEach(p => {
            const imagen = p.imagen
                ? base_url + p.imagen.replace('../', '')
                : 'https://via.placeholder.com/300x200?text=Sin+Imagen';

            html += `
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="${imagen}" class="card-img-top" alt="${p.nombre}" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">${p.nombre}</h5>
                        <p class="card-text text-muted small">${p.detalle ?? 'Sin descripción disponible'}</p>
                        <p class="card-text text-success fw-bold fs-5">$${parseFloat(p.precio).toFixed(2)}</p>
                        <p class="card-text"><span class="badge bg-secondary">${p.categoria}</span></p>
                        <div class="mt-auto d-flex gap-1">
                            <a href="${base_url}producto-detalle/${p.id}" class="btn btn-outline-primary btn-sm flex-fill">Ver Detalles</a>
                            <button onclick="agregarAlCarrito(${p.id})" class="btn btn-success btn-sm flex-fill">Carrito</button>
                        </div>
                    </div>
                </div>
            </div>`;
        });

        contenedor.innerHTML = html;

    } catch (error) {
        console.error(error);
        document.getElementById('contenedor_productos').innerHTML = `<div class="col-12 text-center text-danger">Error al cargar los productos</div>`;
    }
}

document.addEventListener('DOMContentLoaded', cargarProductosTienda);

