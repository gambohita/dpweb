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

 
