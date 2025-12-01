<?php
require_once("../model/VentaModel.php");
require_once("../model/productoModel.php");
$objProducto = new ProductoModel();
$objVenta = new VentaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar_Temporal") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id_producto = $_POST['id_producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $b_producto = $objVenta->buscarTemporal($id_producto);
    if ($b_producto) {
    
        $objVenta->actualizarCantidadTemporal($id_producto, $cantidad);
        $respuesta =  array('status' => true, 'msg' => 'producto registrado');
    }else {
        $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'Producto registrado temporalmente');
    }
    echo json_encode($respuesta);
    


    
}


    
