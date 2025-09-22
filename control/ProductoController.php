<?php

require_once("../model/ProductoModel.php");
$objProducto = new ProductoModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    // Capturamos los datos enviados por el formulario
    $codigo  = $_POST['codigo'];
    $nombre  = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio  = $_POST['precio'];
    $stock   = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_proveedor = $_POST['id_proveedor'];



    // Validación de campos vacíos
    if (
        $codigo == "" || $nombre == "" || $detalle == "" ||
        $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == ""|| $id_proveedor== ""
    ) {
        $arrResponse = array('status' => false, 'msg' => '⚠ Error, campos vacíos');

           if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'msg' => 'Error, imagen no recibida']);
        exit;
    }
       $file = $_FILES['imagen'];
    $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $extPermitidas)) {
        echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
        exit;
    }
    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        echo json_encode(['status' => false, 'msg' => 'La imagen supera 2MB']);
        exit;
    }
    $carpetaUploads = "../uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }

    $nombreUnico = uniqid('prod_') . '.' . $ext;
    $rutaFisica  = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;

    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
        exit;
    }
        
    } else {
        // Validar que el código no se repita
        $existeProducto = $objProducto->existeProducto($codigo);
        if ($existeProducto > 0) {
            $arrResponse = array('status' => false, 'msg' => '⚠ Error, ya existe un producto con este código');
        } else {
            // Intentamos registrar
            $respuesta = $objProducto->registrar(
                $codigo,
                $nombre,
                $detalle,
                $precio,
                $stock,
                $id_categoria,
                $fecha_vencimiento
            );

            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => ' Producto registrado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => ' Error, fallo al registrar producto');
            }
        }
    }
    echo json_encode($arrResponse);
}

if ($tipo == "mostrar_productos") {
    $productos = $objProducto->mostrarProductos();
    header('content-type: application/json');
    echo json_encode($productos);
}

if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objProducto->ver($id_producto);
    if ($producto) {
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    } else {
        $respuesta['msg'] = "Error, categoria no existe";
    }
    echo json_encode($respuesta);
}

if ($tipo == "actualizar") {
    $id_producto = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];

    if ($id_producto == "" || $codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        $existeID = $objProducto->ver($id_producto);
        if (!$existeID) {
            $arrResponse = array('status' => false, 'msg' => 'Error, categoria no existe');
            echo json_encode($arrResponse);
            exit;
        } else {
            $actualizar = $objProducto->actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento);
            if ($actualizar) {
                $arrResponse = array('status' => true, 'msg' => 'Actualizado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => $actualizar);
            }
            echo json_encode($arrResponse);
            exit;
        }
    }
}


if ($tipo == "eliminar") {
    $id_producto = $_POST['id_producto'];
    if ($id_producto == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, id vacio');
    } else {
        $eliminar = $objProducto->eliminar($id_producto);
        if ($eliminar) {
            $arrResponse = array('status' => true, 'msg' => 'Producto eliminado');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error al eliminar producto');
        }
        echo json_encode($arrResponse);
        exit;
    }
}
