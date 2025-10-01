<?php 
require_once("../model/ProductoModel.php");
require_once("../model/CategoriaModel.php");
require_once("../model/UsuarioModel.php");

$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();
$objPersona   = new UsuarioModel();

$tipo = $_GET['tipo'] ?? '';

if ($tipo == 'registrar') {
    $codigo          = $_POST['codigo'] ?? '';
    $nombre          = $_POST['nombre'] ?? '';
    $detalle         = $_POST['detalle'] ?? '';
    $precio          = $_POST['precio'] ?? '';
    $stock           = $_POST['stock'] ?? '';
    $id_categoria    = $_POST['id_categoria'] ?? '';
    $fecha_vencimiento = $_POST['fecha_vencimiento'] ?? '';
    $id_proveedor    = $_POST['id_proveedor'] ?? '';

    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "" || $id_proveedor == "") {
        echo json_encode(['status' => false, 'msg' => 'Error, campos vacíos']);
        exit;
    }

    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'msg' => 'Error, imagen no recibida']);
        exit;
    }

    if ($objProducto->existeCodigo($codigo) > 0) {
        echo json_encode(['status' => false, 'msg' => 'Error, el código ya existe']);
        exit;
    }

    $file = $_FILES['imagen'];
    $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $extPermitidas)) {
        echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
        exit;
    }

    if ($file['size'] > 5 * 1024 * 1024) {
        echo json_encode(['status' => false, 'msg' => 'La imagen supera 5MB']);
        exit;
    }

    $carpetaUploads = "../uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }

    $nombreUnico  = uniqid('prod_') . '.' . $ext;
    $rutaFisica   = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;

    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
        exit;
    }

    $id = $objProducto->registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $rutaRelativa, $id_proveedor);

    if ($id > 0) {
        echo json_encode(['status' => true, 'msg' => 'Registrado correctamente', 'id' => $id, 'img' => $rutaRelativa]);
    } else {
        @unlink($rutaFisica);
        echo json_encode(['status' => false, 'msg' => 'Error, falló en registro']);
    }
    exit;
}

if ($tipo == "mostrar_productos") {
    $productos = $objProducto->mostrarProductos();
    $arrProduct = [];

    if (count($productos)) {
        foreach ($productos as $producto){
            $categoria = $objCategoria->ver($producto->id_categoria);
            $producto->categoria = ($categoria && property_exists($categoria, 'nombre')) ? $categoria->nombre : "Sin categoria";

            $proveedor = $objPersona->ver($producto->id_proveedor);
            $producto->proveedor = ($proveedor && property_exists($proveedor, 'razon_social')) ? $proveedor->razon_social : "Sin proveedor";

            array_push($arrProduct, $producto);
        }
        $respuesta = ['status' => true, 'msg' => '', 'data' => $arrProduct];
    } else {
        $respuesta = ['status' => false, 'msg' => 'No hay productos'];
    }

    header('Content-Type: application/json');
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "ver") {
    $id_producto = $_POST['id_producto'] ?? 0;
    $producto = $objProducto->ver($id_producto);
    if ($producto) {
        echo json_encode(['status' => true, 'data' => $producto]);
    } else {
        echo json_encode(['status' => false, 'msg' => "Error, producto no existe"]);
    }
    exit;
}

if ($tipo == "actualizar") {
    $id_producto     = $_POST['id_producto'] ?? '';
    $codigo          = $_POST['codigo'] ?? '';
    $nombre          = $_POST['nombre'] ?? '';
    $detalle         = $_POST['detalle'] ?? '';
    $precio          = $_POST['precio'] ?? '';
    $stock           = $_POST['stock'] ?? '';
    $id_categoria    = $_POST['id_categoria'] ?? '';
    $fecha_vencimiento = $_POST['fecha_vencimiento'] ?? '';
    $id_proveedor    = $_POST['id_proveedor'] ?? '';

    if ($id_producto == "" || $codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "" || $id_proveedor == "") {
        echo json_encode(['status' => false, 'msg' => 'Error, campos vacios']);
        exit;
    }

    $existeID = $objProducto->ver($id_producto);
    if (!$existeID) {
        echo json_encode(['status' => false, 'msg' => 'Error, producto no existe']);
        exit;
    }

    $actualizar = $objProducto->actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $id_proveedor);
    if ($actualizar) {
        echo json_encode(['status' => true, 'msg' => 'Actualizado correctamente']);
    } else {
        echo json_encode(['status' => false, 'msg' => 'Error al actualizar']);
    }
    exit;
}

if ($tipo == "eliminar") {
    $id_producto = $_POST['id_producto'] ?? '';
    if ($id_producto == "") {
        echo json_encode(['status' => false, 'msg' => 'Error, id vacío']);
        exit;
    }

    $eliminar = $objProducto->eliminar($id_producto);
    if ($eliminar) {
        echo json_encode(['status' => true, 'msg' => 'Producto eliminado']);
    } else {
        echo json_encode(['status' => false, 'msg' => 'Error al eliminar producto']);
    }
    exit;
}
?>
