function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    let precio = document.getElementById("precio").value;
    let stock = document.getElementById("stock").value;

    if (nombre === "" || detalle === "" || precio === "" || stock === "") {
        alert("⚠ Completa todos los campos obligatorios");
        return;
    }
    registrarProducto();
}

// Verificamos si existe el formulario de producto
if (document.querySelector('#frm_producto')) {
    let frm_producto = document.querySelector('#frm_producto');
    frm_producto.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

// 👉 Función para registrar producto
async function registrarProducto() {
    try {
        const frm_producto = document.getElementById("frm_producto");
        const datos = new FormData(frm_producto);

        let respuesta = await fetch(base_url + 'control/productController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();

        if (json.status) {
            alert("✅ " + json.msg);
            frm_producto.reset();
            window.location.href = "index.php?page=products"; // redirige a la lista
        } else {
            alert("❌ " + json.msg);
        }

    } catch (error) {
        console.error("Error al registrar producto:", error);
    }
}

// 👉 Función para listar productos
async function view_products() {
    try {
        let respuesta = await fetch(base_url + 'control/productController.php?tipo=ver_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();

        if (json && json.length > 0) {
            let html = '';
            json.forEach((producto, index) => {
                html += '<tr>'
                    + '<td>' + (index + 1) + '</td>'
                    + '<td>' + (producto.codigo || '') + '</td>'
                    + '<td>' + (producto.nombre || '') + '</td>'
                    + '<td>' + (producto.detalle || '') + '</td>'
                    + '<td>' + (producto.precio || '') + '</td>'
                    + '<td>' + (producto.stock || '') + '</td>'
                    + '<td>' + (producto.fecha_vencimiento || '') + '</td>'
                    + '</tr>';
            });
            document.getElementById('content_products').innerHTML = html;
        } else {
            document.getElementById('content_products').innerHTML =
                '<tr><td colspan="8">No hay productos disponibles</td></tr>';
        }

    } catch (error) {
        console.error(error);
        document.getElementById('content_products').innerHTML =
            '<tr><td colspan="8">⚠ Error al cargar los productos</td></tr>';
    }
}

// Ejecutamos la vista de productos si existe la tabla
if (document.getElementById('content_products')) {
    view_products();
}
