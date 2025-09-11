function validar_form(tipo) {
    let nro_documento = document.getElementById("nro_identidad").value;
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;
    if (nro_documento == ""
        | telefono == "" || correo == "" || departamento == "" || provincia
        == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
        alert("Completa los campos vacios");
        return;
    }
    if (tipo == "nuevo") {
        actualizarUsuario();

    }
    if (tipo == "actualizar") {
        actualizarUsuario();

    }
}

if (document.querySelector('#frm_user')) {
    // evita que se envie el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form('nuevo');
    }
}

async function registrarUsuario() {
    try {
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_user);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        //validamos que jnson.status sea = true
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_user').reset();
        } else {
            alert(json.msg);
        }
    } catch (error) {
        console.log("Error al registrar usuario:" + error);
    }
}


async function iniciar_sesion() {
    let usuario = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (usuario == "" || password == "") {
        alert("Error, campos vacios!");
        return;
    }
    try {
        const datos = new FormData(frm_login);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos

        })
        let json = await respuesta.json();
        //validamos que jnson.status sea = true
        if (json.status) {
            location.replace(base_url + 'new-user');
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log(error);

    }
}
async function view_users() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_usuario', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'

        });

        let json = await respuesta.json();
        if (json && json.length > 0) {
            let html = '';
            json.forEach((user, index) => {
                html += '<tr>'
                    + '<td>' + (index + 1) + '</td>'
                    + '<td>' + (user.nro_identidad || '') + '</td>'
                    + '<td>' + (user.razon_social || '') + '</td>'
                    + '<td>' + (user.correo || '') + '</td>'
                    + '<td>' + (user.rol || '') + '</td>'
                    + '<td>' + (user.estado || '') + '</td>'
                    + '<td><a href="' + base_url + 'edit-user/' + user.id + '">Editar</a></td>'
                    + '<td><button type="button" class="btn btn-danger" onclick="eliminarUsuario(' + user.id+')">eliminar</button></td>'
                    + '</tr>';
                
            });
            document.getElementById('content_users').innerHTML = html;
        } else {
            document.getElementById('content_users').innerHTML = '<tr><td colspan="6">No hay usuarios disponibles</td></tr>';
        }
    } catch (error) {
        console.log(error);
        document.getElementById('content_users').innerHTML = '<tr><td colspan="6">Error al cargar los usuarios</td></tr>';
    }
}

async function edit_user() {
    try {
        let id_persona = document.getElementById('id_persona').value;
        const datos = new FormData();
        datos.append('id_persona', id_persona);

        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos

        });
        json = await respuesta.json();
        if (!json.status) {
            alert(json.msg);
            return
        }
        document.getElementById('nro_identidad').value = json.data.nro_identidad
        document.getElementById('razon_social').value = json.data.razon_social
        document.getElementById('telefono').value = json.data.telefono
        document.getElementById('correo').value = json.data.correo
        document.getElementById('departamento').value = json.data.departamento
        document.getElementById('provincia').value = json.data.provincia
        document.getElementById('distrito').value = json.data.distrito
        document.getElementById('cod_postal').value = json.data.cod_postal
        document.getElementById('direccion').value = json.data.direccion
        document.getElementById('rol').value = json.data.rol

    } catch (error) {
        console.log('oops, ucurriò un error' + error);

    }


}

if (document.querySelector('#frm_edit_user')) {
    // evita que se envie el formulario
    let frm_user = document.querySelector('#frm_edit_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}

async function actualizarUsuario() {
    const datos = new FormData(frm_edit_user);
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos

    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Oooops, ocurrio un error al actualizar, contacte con el administrador");
        console.log(json.msg);
        return
    } else {
        alert(json.msg);

    }

}
async function eliminarUsuario(id) {
    // Preguntar antes de eliminar
    const confirmar = confirm("¿Estás seguro de que deseas eliminar este usuario?");
    if (!confirmar) {
        return; // si el usuario presiona "Cancelar", no hace nada más
    }
    const datos = new FormData();
    datos.append('id_persona', id);

    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=eliminar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });

    let json = await respuesta.json();
    if (!json.status) {
        alert("Ooops, ocurrió un error al eliminar, inténtalo nuevamente");
        console.log(json.msg);
        return;
    } else {
        alert(json.msg);
    }
}