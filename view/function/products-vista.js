async function lista_productos_venta() {
    let dato = document.getElementById('busqueda_venta').value;
    const datos = new FormData();
    datos.append('dato', dato);

    try {
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=buscar_productos_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            
            body: datos
        });

        const json = await respuesta.json();
        console.log("productos_ventas:", json);

        let html = '';
        if (json.status && json.data.length > 0) {
            json.data.forEach(p => {
                const imagen = p.imagen ? base_url + p.imagen : 'view/img/default.jpg';
                html += `
                <div class="card m-2 col-3">
                    <img src="${imagen}" alt="${p.nombre}" width="100%" height="150px" style="object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">${p.nombre}</h5>
                        <p class="card-text">${p.detalle ?? 'Sin descripción'}</p>
                        <p class="card-text text-success fw-bold">$${parseFloat(p.precio).toFixed(2)}</p>
                        <p class="card-text"><span class="badge bg-secondary">${p.categoria}</span></p>
                        <button onclick="agregarAlCarrito(${p.id})" class="btn btn-primary">Agregar</button>
                    </div>
                </div>`;
            });
        } else {
            html = '<div class="col-12 text-center"><h4 class="text-muted">No se encontraron productos</h4></div>';
        }

        document.getElementById('productos_ventas').innerHTML = html;

    } catch (error) {
        console.error("Error al buscar productos:", error);
        document.getElementById('productos_ventas').innerHTML = '<div class="col-12 text-center text-danger">Error al buscar productos</div>';
    }
}
