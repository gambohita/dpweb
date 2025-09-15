<?php
require_once("../library/conexion.php");

class ProductoModel {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    // 👉 Registrar producto
    public function registrar($codigo, $nombre, $detalle, $precio, $stock, $fecha_vencimiento, $tipo) {
        $consulta = "INSERT INTO producto (codigo, nombre, detalle, precio, stock, fecha_vencimiento) 
                     VALUES ('$codigo', '$nombre', '$detalle', '$precio', '$stock', '$fecha_vencimiento', '$tipo')";
        $sql = $this->conexion->query($consulta);

        if ($sql) {
            $sql = $this->conexion->insert_id; // Devuelve el id insertado
        } else {
            $sql = 0;
        }
        return $sql;
    }

    // 👉 Validar si ya existe un producto con el mismo código
    public function existeProducto($codigo) {
        $consulta = "SELECT * FROM producto WHERE codigo ='$codigo'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }

    // 👉 Obtener todos los productos
    public function obtenerProductos() {
        $consulta = "SELECT * FROM producto ORDER BY id DESC";
        $sql = $this->conexion->query($consulta);
        $data = [];
        while ($fila = $sql->fetch_assoc()) {
            $data[] = $fila;
        }
        return $data;
    }
}
