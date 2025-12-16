let productos_venta = {};
let id = 2;
let id4 = 4;
let producto = {};
producto.nombre = "Producto A";
producto.precio = 10.00;
producto.cantidad = 2;

let id2 = 3;
let producto2 = {};
producto2.nombre = "Producto B";
producto2.precio = 20.00;
producto2.cantidad = 1;
//productos_venta.push(producto);
productos_venta[id] = producto;
productos_venta[id2] = producto2;
console.log(productos_venta);

// Añadir producto desde la vista de productos: establece los campos ocultos y agrega al temporal
function agregar_producto_venta(id,precio) {
    try {
        const inputId = document.getElementById('id_producto_venta');
        const inputPrecio = document.getElementById('producto_precio_venta');
        const inputCantidad = document.getElementById('producto_cantidad_venta');
        if (!inputId || !inputPrecio || !inputCantidad) {
            console.error('Campos de producto no encontrados en el DOM');
            return;
        }
        inputId.value = id;
        inputPrecio.value = precio;
        inputCantidad.value = 1;
        agregar_producto_temporal();
    } catch (e) {
        console.error('Error en agregar_producto_venta:', e);
    }
}

async function  agregar_producto_temporal() {
    let id = (document.getElementById('id_producto_venta') || {}).value;
    let precio = (document.getElementById('producto_precio_venta') || {}).value;
    let cantidad = (document.getElementById('producto_cantidad_venta') || {}).value || 1;

    if (!id) {
        Swal.fire("Aviso", "Seleccione un producto antes de agregar.", "warning");
        return;
    }

    cantidad = parseInt(cantidad, 10) || 1;

    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);

    try {
        console.log('Agregar producto temporal',{ id, precio, cantidad });
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=registrar_Temporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        if (!respuesta.ok) {
            const text = await respuesta.text();
            console.error('Error HTTP al registrar temporal:', respuesta.status, text);
            Swal.fire('Error', 'Error del servidor al agregar el producto.', 'error');
            return;
        }

        let json = await respuesta.json();
        if (json.status) {
            Swal.fire('Listo', json.msg || 'Producto agregado', 'success');
            listar_temporales();
        } else {
            Swal.fire('Error', json.msg || 'No se pudo agregar el producto', 'error');
        }

    } catch (error) {
        console.error("Error en cargar producto temporal:", error);
        Swal.fire('Error', 'Ocurrió un error al agregar el producto.', 'error');
    }
}

async function listar_temporales() {

    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=lista_venta_temporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();
        if (json.status) {
            let lista_temporal = '';
            json.data.forEach(t_venta => {
                lista_temporal += `<tr>
                                    <td>${t_venta.nombre}</td>
                                    <td><input type="number" id="cant_${t_venta.id}" value="${t_venta.cantidad}" min="1" style="width: 60px;" onkeyup="actualizar_subtotal(${t_venta.id}, ${t_venta.precio});" onchange="actualizar_subtotal(${t_venta.id}, ${t_venta.precio});"></td>
                                    <td>S/. ${t_venta.precio}</td>
                                    <td id="subtotal_${t_venta.id}">S/. ${t_venta.cantidad * t_venta.precio}</td>
                                    <td><button class="btn btn-danger btn-sm" onclick="eliminar_producto_temporal(${t_venta.id})">Eliminar</button></td>
                                </tr>`
            });
            document.getElementById('lista_compra').innerHTML = lista_temporal;
            act_subt_general();
        }
    } catch (error) {
        console.log("error al cargar productos temporales " + error);
    }
}


async function eliminar_producto_temporal(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=eliminar_temporal&id=' + id, {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache'
                });
                let json = await respuesta.json();
                if (json.status) {
                    Swal.fire("¡Eliminado!", json.msg, "success");
                    listar_temporales();
                } else {
                    Swal.fire("¡Error!", json.msg, "error");
                }
            } catch (e) {
                console.log("Error al eliminar producto temporal: ", e);
                Swal.fire("¡Error!", "Ocurrió un error al eliminar el producto.", "error");
            }
        }
    });
}


async function actualizar_subtotal(id, precio) {
    let cantidad = document.getElementById('cant_' + id).value;
    try {
        const datos = new FormData();
        datos.append('id', id);
        datos.append('cantidad', cantidad);
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=actualizar_cantidad', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            let subtotal = cantidad * precio;
            document.getElementById('subtotal_' + id).innerHTML = 'S/. ' + subtotal;
            act_subt_general();
        }
    } catch (error) {
        console.log("error al actualizar cantidad : " + error);
    }
}


async function act_subt_general() {
    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=lista_venta_temporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();
        if (json.status) {
            let subtotal_general = 0;
            json.data.forEach(t_venta => {
                subtotal_general += (t_venta.precio * t_venta.cantidad);
            });
            igv = subtotal_general*0.18;
            total = subtotal_general+igv;
            document.getElementById('subtotal_general').innerHTML = 'S/. '+subtotal_general;
            document.getElementById('igv_general').innerHTML = 'S/. '+igv;
            document.getElementById('total').innerHTML = 'S/. '+total;
        }
    } catch (error) {
        console.log("error al cargar productos temporales " + error);
    }
}
async function buscar_cliente_venta() {
    let dni = document.getElementById('cliente_dni').value;
    try {
        const datos = new FormData();
        datos.append('dni', dni);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=buscar_por_dni', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            document.getElementById('cliente_nombre').value = json.data.razon_social;
            document.getElementById('id_cliente_venta').value = json.data.id;
        }else{
            alert(json.msg);
        }
    } catch (error) {
        console.log("error al buscar cliente por dni " + error);
    }
}
async function registrarventa() {
    let id_cliente = document.getElementById('id_cliente_venta').value;
    let fecha_venta = document.getElementById('fecha_venta').value;
    if (id_cliente === '' || fecha_venta === '') {
        alert("Aviso", "Complete los datos del cliente y la fecha de venta.", "warning");
        return;
    }
    try {
        const datos = new FormData();
        datos.append('id_cliente', id_cliente);
        datos.append('fecha_venta', fecha_venta); 
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=registrar_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();  
    } catch (error) {
        console.log("error al registrar venta " + error);
    }
}