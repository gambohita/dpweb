<?php

require_once("../model/ProductoModel.php");
require_once("../model/CategoriaModel.php");

$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

//
if ($tipo == 'registrar') {

    $codigo = $_POST['codigo'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $detalle = $_POST['detalle'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $fecha_vencimiento = $_POST['fecha_vencimiento'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';
    $id_proveedor = $_POST['id_persona'] ?? '';

    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $fecha_vencimiento == "" || $id_categoria == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
        echo json_encode($arrResponse);
        exit;
    }
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        $arrResponse = array('status' => false, 'msg' => 'Error, imagen no recibida');
        echo json_encode($arrResponse);
        exit;
    }
    if ($objProducto->existeCodigo($codigo) > 0) {
        $arrResponse = array('status' => false, 'msg' => 'Error, el código ya existe');
        echo json_encode($arrResponse);
        exit;
    }
    $file = $_FILES['imagen'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $extPermitidas)) {
        $arrResponse = array('status' => false, 'msg' => 'Formato de imagen no permitido');
        echo json_encode($arrResponse);
        exit;
    }

    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        $arrResponse = array('status' => false, 'msg' => 'La imagen supera 5MB');
        echo json_encode($arrResponse);
        exit;
    }
    $carpetaUploads = "../Uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }

    $nombreUnico = uniqid('prod_') . '.' . $ext;
    $rutaFisica = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;

    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        $arrResponse = array('status' => false, 'msg' => 'No se pudo guardar la imagen');
        echo json_encode($arrResponse);
        exit;
    }
    require_once("../model/CategoriaModel.php");
    $objCategoria = new CategoriaModel();
    $categoria = $objCategoria->obtenerCategoriaPorId($id_categoria);
    if (!$categoria) {
        $arrResponse = array('status' => false, 'msg' => 'Error, la categoría no existe');
        echo json_encode($arrResponse);
        exit;
    }
    $id = $objProducto->registrar($codigo, $nombre, $detalle, $precio, $stock, $fecha_vencimiento, $rutaRelativa, $id_categoria, $id_proveedor);
    if ($id > 0) {
        $arrResponse = array('status' => true, 'msg' => 'Registrado correctamente', 'id' => $id, 'img' => $rutaRelativa);
    } else {
        @unlink($rutaFisica);
        $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
    }

    echo json_encode($arrResponse);
    exit;
}

if ($tipo == "ver_productos") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $productos = $objProducto->verProductos();
    $arrProduct = array();
    if(count($productos)){
        foreach ($productos as $producto){
            $categoria = $objCategoria->ver($producto->id_categoria);
            $producto->categoria = $categoria->nombre;
            array_push($arrProduct, $producto);
        }
        $respuesta = array('status' => true, 'msg' => '', 'data' => $arrProduct);
    }
    echo json_encode($respuesta);
}

if($tipo == "ver"){
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objProducto->ver($id_producto);
    if($producto){
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    }else{
        $respuesta['msg'] = 'Error, producto no existe';
    }
    echo json_encode($respuesta);
}

if ($tipo == 'buscar_producto_venta') {
    $dato = $_POST['dato'];
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $productos = $objProducto->buscarProductoByNombreOrCodigo($dato);
    $arrProduct = array();
    if (count($productos)){
        foreach ($productos as $producto){
            $categoria = $objCategoria->ver($producto->id_categoria);
            $producto->categoría = $categoria->nombre;
            array_push($arrProduct, $producto);
        }
        $respuesta = array('status' => true, 'msg' => '', 'data' => $arrProduct);
    }
    echo json_encode($respuesta);
}

// actualizar
if ($tipo == "actualizar_producto") {

    //$data = $_POST;
    $id_producto = $_POST['id_producto'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $nombre             = $_POST['nombre'] ?? '';
    $detalle            = $_POST['detalle'] ?? '';
    $precio             = $_POST['precio'] ?? '';
    $stock              = $_POST['stock'] ?? '';
    $id_categoria       = $_POST['id_categoria'] ?? '';
    $fecha_vencimiento  = $_POST['fecha_vencimiento'] ?? '';
    $id_proveedor       = $_POST['id_persona'] ?? '';
    if ($codigo === "" || $nombre === "" || $detalle === "" || $precio === "" || $stock === "" || $id_categoria === "" || $fecha_vencimiento === "" || $id_proveedor === "" ){
        echo json_encode(['status' => false, 'msg' => 'Error, campos vacíos']);
        exit;
    }
    
    $producto = $objProducto->ver($id_producto);
    if (!$producto) {
        echo json_encode(['status' => false, 'msg' => 'Error, producto no existe en BD']);
        exit;
    }
    
    // Procesar la imagen si se ha subido una nueva
    $imagen = $producto->imagen; // Mantener la imagen actual por defecto
    
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['imagen'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $extPermitidas = ['jpg', 'jpeg', 'png'];

        if (!in_array($ext, $extPermitidas)) {
            echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
            exit;
        }

        if ($file['size'] > 5 * 1024 * 1024) { // 5MB
            echo json_encode(['status' => false, 'msg' => 'La imagen supera 5MB']);
            exit;
        }
        
        $carpetaUploads = "../Uploads/productos/";
        if (!is_dir($carpetaUploads)) {
            @mkdir($carpetaUploads, 0775, true);
        }

        $nombreUnico = uniqid('prod_') . '.' . $ext;
        $rutaFisica = $carpetaUploads . $nombreUnico;
        $rutaRelativa = "uploads/productos/" . $nombreUnico;

        if (move_uploaded_file($file['tmp_name'], $rutaFisica)) {
            // Eliminar la imagen anterior si existe
            if (!empty($producto->imagen)) {
                $rutaAnterior = "../" . str_replace(BASE_URL, "", $producto->imagen);
                if (file_exists($rutaAnterior)) {
                    @unlink($rutaAnterior);
                }
            }
            $imagen = $rutaRelativa;
        }
    }
    
    $actualizar = $objProducto->actualizarProducto($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $id_proveedor, $imagen);
    
    if ($actualizar) {
        echo json_encode(['status' => true, 'msg' => "Actualizado correctamente"]);
    } else {
        echo json_encode(['status' => false, 'msg' => 'Error al actualizar el producto']);
    }
    exit;
}

// eliminar producto 
if ($tipo == "eliminar_producto") {
    $id = $_GET['id'] ?? 0;
    $result = $objProducto->eliminarProducto($id);
    echo json_encode($result);
}

if ($tipo == "buscar_productos_venta") {
    $dato = $_POST['dato'] ?? '';
    $respuesta = array('status' => false, 'msg' => 'No se encontraron productos');
    $productos = $objProducto->BuscarProductoByNombreOrCodigo($dato);

       
        $respuesta = array('status' => true, 'msg' => 'producto eliminado', 'data' => $productos);
    echo json_encode($respuesta);
}
