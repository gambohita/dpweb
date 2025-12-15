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

        json = await respuesta.json();
        contenidot = document.getElementById('productos_ventas')
        if (json.status) {
            let cont = 1;
            contenidot.innerHTML = ``;
            json.data.forEach(p => {
                let producto_list = ``;
                producto_list += `
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                  <div class="card h-100 shadow-sm text-center p-2" style="min-width: 180px;">
                    <img src="${base_url + p.imagen}" 
                         alt="${p.nombre}" 
                         class="card-img-top mx-auto d-block"
                         style="height: 150px; width: 100%; object-fit: contain;">
              
                    <div class="card-body">
                      <h5 class="card-title fw-bold" style="font-size: 1.1rem; color:#333;">
                        ${p.nombre}
                      </h5>
                      <p class="card-text text-success fw-semibold" style="font-size: 1rem;">
                        Precio: S/. ${p.precio}
                      </p>
                      <p class="card-text" style="font-size: 0.9rem;">
                        <span class="badge bg-secondary">Stock: ${p.stock}</span>
                      </p>
                      <button onclick="agregar_producto_venta(${p.id})" 
                              class="btn btn-primary btn-sm">
                        Agregar
                      </button>
                    </div>
                  </div>
                </div>
              `;
              

                let nueva_fila = document.createElement("div");
                nueva_fila.className = "div col-md-3 col-sm-6 col-xs-12"
                nueva_fila.innerHTML = producto_list;
                cont ++;
                contenidot.appendChild(nueva_fila);

                let id = document.getElementById('id_producto_venta');
                let precio = document.getElementById('producto_precio_venta');
                let cantidad = document.getElementById('producto_cantidad_venta');
                id.value = p.id;
                precio.value = p.precio;
                cantidad.value = 1;
            })
        }

    } catch (error) {
        console.error("Error al buscar productos:", error);
       
    }

}
if(document.getElementById('productos_venta')){
    lista_productos_venta();
}