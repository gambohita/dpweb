<?php
require_once("../library/conexion.php");

class ProductoModel {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    // 👉 Registrar producto (con columna tipo)
    public function registrar($codigo, $nombre, $detalle, $precio, $stock,  $id_categoria, $fecha_vencimiento) {
        $consulta = "INSERT INTO producto (codigo, nombre, detalle, precio, stock, id_categoria, fecha_vencimiento) 
        VALUES ('$codigo', '$nombre', '$detalle', '$precio', '$stock', '$id_categoria', '$fecha_vencimiento')";
        $sql = $this->conexion->query($consulta);

        if ($sql) {
            return $this->conexion->insert_id; // Devuelve el id insertado
        } else {
            //$sql = 0;
            error_log("Error MySQL: " . $this->conexion->error);
        }
        return $sql;
    }

    // 👉 Validar si ya existe un producto con el mismo código
    public function existeProducto($codigo) {
        $consulta = "SELECT * FROM producto WHERE codigo ='$codigo'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }

    public function buscarProductoPorCodigo($codigo){
        $consulta = "SELECT id, codigo FROM producto WHERE codigo='$codigo' LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function mostrarProductos() {
        $arr_productos = array();
        $consulta = "SELECT * FROM producto";
        $sql = $this->conexion->query($consulta);
        if (!$sql) {
            error_log("Error en query(): " . $this->conexion->error);
            return $arr_productos;
        }
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_productos, $objeto);
        }
        return $arr_productos;
    }
    

    public function ver($id){
        $consulta = "SELECT * FROM producto WHERE id = '$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento){
        $consulta = "UPDATE producto SET codigo='$codigo', nombre='$nombre', detalle='$detalle', precio='$precio', stock='$stock', id_categoria='$id_categoria', fecha_vencimiento='$fecha_vencimiento' WHERE id='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    public function eliminar($id_producto){
        $consulta = "DELETE FROM producto WHERE id='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
}

