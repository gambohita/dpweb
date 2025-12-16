<?php
require_once("../model/VentaModel.php");
require_once("../model/ProductoModel.php");

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
        $n_cantidad = $b_producto->cantidad+1;
    
        $objVenta->actualizarCantidadTemporal($id_producto, $n_cantidad);
        $respuesta =  array('status' => true, 'msg' => 'producto actualizado');
    }else {
        $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'Producto registrado');
    }
    echo json_encode($respuesta);
    
}
if($tipo=="lista_venta_temporal"){
    $respuesta = array('status' => false, 'msg' =>'fallo el controlador');
    $b_producto = $objVenta->buscarTemporales();
    if ($b_producto) {
        $respuesta = array('status' => true, 'data' => $b_producto);

    }else{
        $respuesta = array('status' => false, 'msg' => 'no se encontraron datos');
    }
    echo json_encode($respuesta);
}


if($tipo=="eliminar_temporal"){
    $id = $_GET['id'];
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $consulta = $objVenta->eliminarTemporal($id);
    if ($consulta) {
        $respuesta = array('status' => true, 'msg' => 'Producto eliminado');
    } else {
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar el producto');
    }
    echo json_encode($respuesta);

}
if($tipo=="actualizar_cantidad"){
    $id = $_POST['id'];
    $cantidad =  $_POST['cantidad'];
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $consulta = $objVenta-> actualizarCantidadTemporalByid($id, $cantidad);
    if ($consulta) {
        $respuesta = array('status' => true, 'msg' => 'success');
    }else {
        $respuesta = array('status' => false, 'msg' => 'error');
    }
    echo json_encode($respuesta);
}
if($tipo=="registrar_venta"){
    session_start();

    // Obtener datos del POST con seguridad
    $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : null;
    $fecha_venta = isset($_POST['fecha_venta']) ? $_POST['fecha_venta'] : null;

    // Obtener id del vendedor desde la sesión
    $id_vendedor = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 1; // valor por defecto

    $ultima_venta = $objVenta->buscar_ultima_venta();

    // Determinar correlativo
    if($ultima_venta){
        $correlativo = $ultima_venta->codigo + 1;
    } else {
        $correlativo = 1;
    }

    // Registrar la venta oficial
    $venta = $objVenta->registrar_venta($correlativo, $fecha_venta, $id_cliente, $id_vendedor);

    if ($venta) {
        // Registrar los detalles de la venta
        $temporales = $objVenta->buscarTemporales();
        foreach ($temporales as $temporal) {
            $objVenta->registrar_detalle_venta($venta, $temporal->id_producto, $temporal->precio, $temporal->cantidad);
        }
        // Eliminar los temporales
        $objVenta->eliminarTemporales();
        $respuesta = array('status' => true, 'msg' => 'venta registrada con exito');
    } else {
        $respuesta = array('status' => false, 'msg' => 'error al registrar la venta');
    }

    // Devolver JSON limpio
    header('Content-Type: application/json');
    echo json_encode($respuesta);
    exit;
}

    

