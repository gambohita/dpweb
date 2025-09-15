function validar_form(tipo) {
    let codigo = document.getElementById("codigo").value;
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    let precio = document.getElementById("precio").value;
    let stock = document.getElementById("stock").value;
    let id_categoria = document.getElementById("id_categoria").value;
    let fecha_vencimiento = document.getElementById("fecha_vencimiento").value;



    if (codigo == "" || nombre == "" || detalle == "" || precio == "" || stock == "" || id_categoria == "" || fecha_vencimiento == "") {
        alert("Completa los campos vacíos");
        return;
    }
    if (tipo == "nuevo") {
        registrarProducto();
    }
    if (tipo == "actualizar") {
        actualizarProducto();

    }

}



if (document.querySelector('#frm_producto')) {
    // evita que se envíe el formulario
    let frm_producto = document.querySelector('#frm_producto');
    frm_producto.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}

async function registrarProducto() {
    try {
        // capturar campos de formulario (HTML)
        const frm_producto = document.getElementById("frm_producto");
        const datos = new FormData(frm_producto);
        // enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();

        if (json.status) {
            alert("✅ " + json.msg);
            document.getElementById("frm_producto").reset();
            //frm_producto.reset();
            //window.location.href = "index.php?page=products"; // redirige a la lista
        } else {
            alert("❌ " + json.msg);
        }

    } catch (error) {
        console.log("Error al registrar producto:" + error);
    }
}

async function view_producto() {
    try {
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=mostrar_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        if (json && json.length > 0) {
            let html = '';
            json.forEach((producto, index) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${producto.codigo || ''}</td>
                    <td>${producto.nombre || ''}</td>
                    <td>${producto.precio || ''}</td>
                    <td>${producto.fecha_vencimiento || ''}</td>
                    <td>
                        <a href="`+ base_url + `producto-edit/` + producto.id + `" class="btn btn-primary">Editar</a>
                        <button onclick="eliminar(` + producto.id + `)" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>`;
            });
            document.getElementById('content_productos').innerHTML = html;
        } else {
            document.getElementById('content_productos').innerHTML = '<tr><td colspan="7">No hay productos disponibles</td></tr>';
        }
    } catch (error) {
        console.log(error);
        document.getElementById('content_productos').innerHTML = '<tr><td colspan="7">Error al cargar los productos</td></tr>';
    }
}

if (document.getElementById('content_productos')) {
    view_producto(); // ✅ ejecutar la función
}
async function edit_producto() {
    try {
        let id_producto = document.getElementById('id_producto').value;
        const datos = new FormData();
        datos.append('id_producto', id_producto);

        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (!json.status) {
            alert("❌ " + json.msg);
            return;
        }
        document.getElementById('codigo').value = json.data.codigo;
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;
        document.getElementById('precio').value = json.data.precio;
        document.getElementById('stock').value = json.data.stock;
        document.getElementById('id_categoria').value = json.data.id_categoria;
        document.getElementById('fecha_vencimiento').value = json.data.fecha_vencimiento;
    } catch (error) {
        console.log("Error al cargar datos del producto: " + error);
    }


}

if (document.querySelector('#frm_edit_producto')) {

    let frm_edit_producto = document.querySelector('#frm_edit_producto');
    frm_edit_producto.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}
async function actualizarProducto() {
    const frm_edit_producto = document.querySelector("#frm_edit_producto")
    const datos = new FormData(frm_edit_producto);
    let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    let json = await respuesta.json();
    if (!json.status) {
        alert("❌ " + json.msg);
        return;
    }else {
        alert("✅ " + json.msg);
        //window.location.href = "index.php?page=products"; // redirige a la lista
    }

}
async function eliminar(id) {
    if (!confirm("¿Estás seguro de eliminar este producto?")) {
        return;
    }
    try {
        const datos = new FormData();
        datos.append('id_producto', id);
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=eliminar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (!json.status) {
            alert("❌ " + json.msg);
            return;
        }
        alert("✅ " + json.msg);
        view_producto(); // recarga la lista
    } catch (error) {
        console.log("Error al eliminar producto: " + error);
    }       


}