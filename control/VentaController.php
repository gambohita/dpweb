<?php
header('Content-Type: application/json; charset=utf-8');
ob_start(); // <- captura cualquier salida accidental

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
    $id = $_POST['id'];
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $consulta = $objVenta-> eliminarTemporal($id);
    if ($consulta) {
        $respuesta = array('status' => true, 'msg' => 'success');
    }else {
        $respuesta = array('status' => false, 'msg' => 'error');
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

if ($tipo == "registrar_venta") {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();

    // Validar sesión del vendedor
    if (!isset($_SESSION['ventas_id'])) {
        echo json_encode(['status' => false, 'msg' => 'Error: sesión no iniciada']);
        exit;
    }

    $id_cliente = $_POST['id_cliente'] ?? '';
    $fecha_venta = $_POST['fecha_venta'] ?? '';
    $id_vendedor = $_SESSION['ventas_id'];

    if ($id_cliente == '' || $fecha_venta == '') {
        echo json_encode(['status' => false, 'msg' => 'Campos incompletos']);
        exit;
    }

    // Obtener correlativo
    $ultima_venta = $objVenta->buscar_ultima_venta();
    $correlativo = ($ultima_venta) ? $ultima_venta->codigo + 1 : 1;

    // Registrar venta
    $venta_id = $objVenta->registrar_venta($correlativo, $fecha_venta, $id_cliente, $id_vendedor);

    if ($venta_id) {
        // Registrar los detalles
        $temporales = $objVenta->buscarTemporales();

        foreach ($temporales as $temporal) {
            $objVenta->registrar_detalle_venta(
                $venta_id,
                $temporal->id_producto,
                $temporal->precio,
                $temporal->cantidad
            );
        }

        // Limpiar temporales
        $objVenta->eliminarTemporales();

        $respuesta = ['status' => true, 'msg' => 'Venta registrada con éxito'];
    } else {
        $respuesta = ['status' => false, 'msg' => 'Error al registrar la venta (INSERT falló)'];
    }

    echo json_encode($respuesta);
}
