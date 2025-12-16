<?php
// Agregar al inicio del archivo
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

require_once("../model/VentaModel.php");
require_once("../model/productoModel.php");

$objProducto = new ProductoModel();
$objVenta = new VentaModel();

// VALIDAR que existe el parámetro 'tipo'
if (!isset($_GET['tipo'])) {
    echo json_encode(['status' => false, 'msg' => 'Parámetro tipo no definido']);
    exit;
}

$tipo = $_GET['tipo'];

if ($tipo == "registrar_Temporal") {
    try {
        $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
        
        // VALIDAR que llegan todos los datos necesarios
        if (!isset($_POST['id_producto']) || !isset($_POST['precio']) || !isset($_POST['cantidad'])) {
            $respuesta = array('status' => false, 'msg' => 'Datos incompletos');
            echo json_encode($respuesta);
            exit;
        }
        
        $id_producto = $_POST['id_producto'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        // Validar que sean valores válidos
        if (empty($id_producto) || empty($precio) || empty($cantidad)) {
            $respuesta = array('status' => false, 'msg' => 'Valores inválidos');
            echo json_encode($respuesta);
            exit;
        }

        $b_producto = $objVenta->buscarTemporal($id_producto);
        
        if ($b_producto) {
            $n_cantidad = $b_producto->cantidad + 1;
            $objVenta->actualizarCantidadTemporal($id_producto, $n_cantidad);
            $respuesta = array('status' => true, 'msg' => 'Producto actualizado');
        } else {
            $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
            if ($registro) {
                $respuesta = array('status' => true, 'msg' => 'Producto registrado');
            } else {
                $respuesta = array('status' => false, 'msg' => 'Error al registrar producto');
            }
        }
        
    } catch (Exception $e) {
        $respuesta = array('status' => false, 'msg' => 'Error: ' . $e->getMessage());
    }
    
    echo json_encode($respuesta);
    exit; // Importante: detener ejecución después de responder
}

if($tipo == "lista_venta_temporal"){
    try {
        $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
        $b_producto = $objVenta->buscarTemporales();
        
        if ($b_producto) {
            $respuesta = array('status' => true, 'data' => $b_producto);
        } else {
            $respuesta = array('status' => false, 'msg' => 'no se encontraron datos');
        }
        
    } catch (Exception $e) {
        $respuesta = array('status' => false, 'msg' => 'Error: ' . $e->getMessage());
    }
    
    echo json_encode($respuesta);
    exit;
}

if($tipo == "eliminar_temporal"){
    try {
        if (!isset($_GET['id'])) {
            echo json_encode(['status' => false, 'msg' => 'ID no proporcionado']);
            exit;
        }
        
        $id = $_GET['id'];
        $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
        $consulta = $objVenta->eliminarTemporal($id);
        
        if ($consulta) {
            $respuesta = array('status' => true, 'msg' => 'Producto eliminado');
        } else {
            $respuesta = array('status' => false, 'msg' => 'Error al eliminar el producto');
        }
        
    } catch (Exception $e) {
        $respuesta = array('status' => false, 'msg' => 'Error: ' . $e->getMessage());
    }
    
    echo json_encode($respuesta);
    exit;
}

if($tipo == "actualizar_cantidad"){
    try {
        if (!isset($_POST['id']) || !isset($_POST['cantidad'])) {
            echo json_encode(['status' => false, 'msg' => 'Datos incompletos']);
            exit;
        }
        
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
        $consulta = $objVenta->actualizarCantidadTemporalByid($id, $cantidad);
        
        if ($consulta) {
            $respuesta = array('status' => true, 'msg' => 'success');
        } else {
            $respuesta = array('status' => false, 'msg' => 'error');
        }
        
    } catch (Exception $e) {
        $respuesta = array('status' => false, 'msg' => 'Error: ' . $e->getMessage());
    }
    
    echo json_encode($respuesta);
    exit;
}

if($tipo == "registrar_venta"){
    try {
        if (!isset($_POST['correlativo']) || !isset($_POST['fecha_venta']) || 
            !isset($_POST['id_cliente']) || !isset($_POST['id_vendedor'])) {
            echo json_encode(['status' => false, 'msg' => 'Datos incompletos']);
            exit;
        }
        
        $correlativo = $_POST['correlativo'];
        $fecha_venta = $_POST['fecha_venta'];
        $id_cliente = $_POST['id_cliente'];
        $id_vendedor = $_POST['id_vendedor'];

        $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
        $venta = $objVenta->registrar_venta($correlativo, $fecha_venta, $id_cliente, $id_vendedor);
        
        if($venta){
            $temporales = $objVenta->buscarTemporales();
            
            if ($temporales) {
                foreach($temporales as $temporal){
                    $objVenta->registrar_detalle_venta($venta, $temporal->id_producto, $temporal->precio, $temporal->cantidad);
                }
                $objVenta->eliminarTemporales();
                $respuesta = array('status' => true, 'msg' => 'Venta realizada con exito');
            } else {
                $respuesta = array('status' => false, 'msg' => 'No hay productos en el carrito');
            }
        } else {
            $respuesta = array('status' => false, 'msg' => 'Error al registrar la venta');
        }
        
    } catch (Exception $e) {
        $respuesta = array('status' => false, 'msg' => 'Error: ' . $e->getMessage());
    }
    
    echo json_encode($respuesta);
    exit;
}

// Si no coincide ningún tipo
echo json_encode(['status' => false, 'msg' => 'Tipo de operación no válido']);
