<?php
require_once("../model/CategoriaModel.php");
$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
    } else {
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, nombre de categoría ya existe');
        } else {
            $respuesta = $objCategoria->registrar($nombre, $detalle);
            $arrResponse = $respuesta
                ? array('status' => true, 'msg' => 'Registrado correctamente')
                : array('status' => false, 'msg' => 'Error, fallo en registro');
        }
    }
    echo json_encode($arrResponse);
    exit;
}

if ($tipo == "mostrar_categorias") {
    $categorias = $objCategoria->mostrarCategorias();
    header('Content-Type: application/json');
    echo json_encode($categorias);
    exit;
}

if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_categoria = $_POST['id_categoria'];
    $categoria = $objCategoria->ver($id_categoria);
    if ($categoria) {
        $respuesta['status'] = true;
        $respuesta['data'] = $categoria;
    } else {
        $respuesta['msg'] = "Error, categoría no existe";
    }
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "actualizar") {
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($id_categoria == "" || $nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
    } else {
        $existeID = $objCategoria->ver($id_categoria);
        if (!$existeID) {
            $arrResponse = array('status' => false, 'msg' => 'Error, categoría no existe');
        } else {
            $actualizar = $objCategoria->actualizar($id_categoria, $nombre, $detalle);
            $arrResponse = $actualizar
                ? array('status' => true, 'msg' => 'Actualizado correctamente')
                : array('status' => false, 'msg' => 'Error al actualizar');
        }
    }
    echo json_encode($arrResponse);
    exit;
}

if ($tipo == "eliminar") {
    $id_categoria = $_POST['id_categoria'];
    if ($id_categoria == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, id vacío');
    } else {
        $eliminar = $objCategoria->eliminar($id_categoria);
        $arrResponse = $eliminar
            ? array('status' => true, 'msg' => 'Categoría eliminada')
            : array('status' => false, 'msg' => 'Error al eliminar categoría');
    }
    echo json_encode($arrResponse);
    exit;
}
?>
