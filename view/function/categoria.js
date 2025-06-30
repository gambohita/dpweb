function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
  
    if (nombre == ""  || detalle == "") {
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
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_categoria);
        //enviar datos al controlador
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
            document.getElementById('frm_user').reset();
        }else{
            alert(json.msg);
        }
    } catch (error) {
        console.log("Error al registrar usuario:" + error);
    }
}