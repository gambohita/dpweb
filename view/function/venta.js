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

 async function agregar_producto_temporal(){
    let id = document.getElementById('id_producto_venta').value;
    let precio = document.getElementById('producto_precio_venta').value;
    let cantidad = document.getElementById('producto_cantidad_venta').value;
    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);
    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=registrar_Temporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos 
        });
        json = await respuesta.json();
        if(json.status){
            if(json.msg == 'registrado'){
                alert("el producto fue actualizado");
            }else{
                alert("el producto fue registrado");
            }   
        }     
        
    } catch (error) {
        console.log("Error en cargar producto temporal: " + error);
        
    }
   

}

 
