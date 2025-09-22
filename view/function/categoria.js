function validar_form(accion = "registrar") {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;

    if (nombre == "" || detalle == "") {
        alert("Completa los campos vacíos");
        return;
    }

    if (accion === "registrar") {
        registrarCategoria();
    } else if (accion === "actualizar") {
        actualizarCategoria();
    }
}

if (document.querySelector('#frm_categoria')) {
    let frm_categoria = document.querySelector('#frm_categoria');
    frm_categoria.onsubmit = function (e) {
        e.preventDefault();
        validar_form("registrar");
    }
}

async function registrarCategoria() {
    try {
        const frm_categoria = document.querySelector("#frm_categoria");
        const datos = new FormData(frm_categoria);

        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            frm_categoria.reset();
            view_categoria();
        } else {
            alert(json.msg);
        }
    } catch (error) {
        console.log("Error al registrar categoria: " + error);
    }
}

async function view_categoria() {
    try {
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=mostrar_categorias', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        if (json && json.length > 0) {
            let html = '';
            json.forEach((categoria, index) => {
                html += '<tr>'
                    + '<td>' + (index + 1) + '</td>'
                    + '<td>' + (categoria.nombre || '') + '</td>'
                    + '<td>' + (categoria.detalle || '') + '</td>'
                    + '</tr>';
            });
            document.getElementById('content_categories').innerHTML = html;
        } else {
            document.getElementById('content_categories').innerHTML = '<tr><td colspan="6">No hay categorías disponibles</td></tr>';
        }
    } catch (error) {
        console.log(error);
        document.getElementById('content_categories').innerHTML = '<tr><td colspan="6">Error al cargar categorías</td></tr>';
    }
}

if (document.getElementById('content_categories')) {
    view_categoria(); // ← ahora sí se ejecuta
}

async function edit_categoria(id_categoria) {
    try {
        const datos = new FormData();
        datos.append('id_categoria', id_categoria);

        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver', {
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

        document.getElementById('id_categoria').value = id_categoria;
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;

    } catch (error) {
        console.log("Error al cargar datos de la categoría: " + error);
    }
}

if (document.querySelector('#frm_edit_categorie')) {
    let frm_edit_categorie = document.querySelector('#frm_edit_categorie');
    frm_edit_categorie.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}

async function actualizarCategoria() {
    try {
        const frm_edit_categorie = document.querySelector("#frm_edit_categorie")
        const datos = new FormData(frm_edit_categorie);

        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=actualizar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        if (!json.status) {
            alert("❌ " + json.msg);
        } else {
            alert("✅ " + json.msg);
            view_categoria();
        }
    } catch (error) {
        console.log("Error al actualizar categoría: " + error);
    }
}

async function eliminar(id) {
    if (!confirm("¿Estás seguro de eliminar esta categoría?")) {
        return;
    }
    try {
        const datos = new FormData();
        datos.append('id_categoria', id);

        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=eliminar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        if (!json.status) {
            alert("❌ " + json.msg);
        } else {
            alert("✅ " + json.msg);
            view_categoria();
        }
    } catch (error) {
        console.log("Error al eliminar categoría: " + error);
    }
}
