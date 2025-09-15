function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;

    if (nombre == "" || detalle == "") {
        alert("Completa los campos vacios");
        return;
    }
    registrarCategoria();
}

if (document.querySelector('#frm_categoria')) {
    // evita que se envie el formulario
    let frm_categoria = document.querySelector('#frm_categoria');
    frm_categoria.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
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
        //validamos que jnson.status sea = true
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_categoria').reset();
        } else {
            alert(json.msg);
        }
    } catch (error) {
        console.log("Error al registrar categoria:" + error);
    }
}
async function view_categoria() {
    try {
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver_categoria', {
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
            document.getElementById('content_categories').innerHTML = '<tr><td colspan="6">No hay categoria disponibles</td></tr>';
        }
    } catch (error) {
        console.log(error);
        document.getElementById('content_categories').innerHTML = '<tr><td colspan="6">Error al cargar categoria</td></tr>';
    }
}
if (document.getElementById('content_categories')) {
    view_categoria;
}
async function edit_categoria() {
    try {
        let id_categoria = document.getElementById('id_categoria').value;
        const datos = new FormData();
        datos.append('id_categoria', id_categoria);

        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver', {
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
        document.getElementById('codigo').value = json.data.nombre;
        document.getElementById('nombre').value = json.data.detalle;

    } catch (error) {
        console.log("Error al cargar datos del categoria: " + error);
    }


}

if (document.querySelector('frm_edit_categorie')) {

    let frm_edit_categorie = document.querySelector('#frm_edit_categorie');
    frm_edit_categorie.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}
async function actualizarCategoria() {
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
        return;
    } else {
        alert("✅ " + json.msg);
        //window.location.href = "index.php?page=products"; // redirige a la lista
    }

}
async function eliminar(id) {
    if (!confirm("¿Estás seguro de eliminar este categoria?")) {
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
            return;
        }
        alert("✅ " + json.msg);
        view_categoria(); // recarga la lista
    } catch (error) {
        console.log("Error al eliminar categoria: " + error);
    }


}
