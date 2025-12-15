<?php
require_once("../library/conexion.php");
class ProductoModel
{
    
    private $conexion;

    function __construct()
    {
       
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    //

      public function existeCodigo($codigo)
    {
        $codigo = $this->conexion->real_escape_string($codigo);
        $consulta = "SELECT id FROM producto WHERE codigo='$codigo' LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }

    public function existeCategoria($nombre)
    {
        $consulta = "SELECT * FROM producto WHERE nombre ='$nombre'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }

    public function registrar($codigo, $nombre, $detalle, $precio, $stock, $fecha_vencimiento, $imagen, $id_categoria, $id_proveedor)
    {
        $codigo = $this->conexion->real_escape_string($codigo);
        $nombre = $this->conexion->real_escape_string($nombre);
        $detalle = $this->conexion->real_escape_string($detalle);
        $precio = $this->conexion->real_escape_string($precio);
        $stock = $this->conexion->real_escape_string($stock);
        $fecha_vencimiento = $this->conexion->real_escape_string($fecha_vencimiento);
        $imagen = $this->conexion->real_escape_string($imagen);
        $id_categoria = $this->conexion->real_escape_string($id_categoria);
        $id_proveedor = $this->conexion->real_escape_string($id_proveedor);
        $consulta = "INSERT INTO producto (codigo, nombre, detalle, precio, stock, fecha_vencimiento, imagen, id_categoria, id_proveedor) VALUES ('$codigo', '$nombre', '$detalle', '$precio', '$stock', '$fecha_vencimiento', '$imagen', '$id_categoria', '$id_proveedor')";
        $sql = $this->conexion->query($consulta);
        if($sql){
            return $this->conexion->insert_id;
        }
        return 0;

    }

   public function verProductos()
    {
    $arr_categorias = array();
    $consulta = "SELECT * FROM producto";
    $sql = $this->conexion->query($consulta);
    while ($objeto = $sql->fetch_object()) {
        array_push($arr_categorias, $objeto);
    }
    return $arr_categorias;
    }

    public function ver($id)
    {
        $consulta = "SELECT * FROM producto WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function actualizarProducto($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $id_proveedor, $imagen = null)
{
    $id_producto = $this->conexion->real_escape_string($id_producto);
    $codigo = $this->conexion->real_escape_string($codigo);
    $nombre = $this->conexion->real_escape_string($nombre);
    $detalle = $this->conexion->real_escape_string($detalle);
    $precio = floatval($precio);
    $stock = intval($stock);
    $id_categoria = intval($id_categoria);
    $fecha_vencimiento = $this->conexion->real_escape_string($fecha_vencimiento);
    $id_proveedor = intval($id_proveedor);
    
    $consulta = "UPDATE producto SET codigo='$codigo', nombre='$nombre', detalle='$detalle', precio=$precio, stock=$stock, id_categoria=$id_categoria, fecha_vencimiento='$fecha_vencimiento', id_proveedor=$id_proveedor";

    if (!empty($imagen)) {
        $imagen = $this->conexion->real_escape_string($imagen);
        $consulta .= ", imagen='$imagen'";
    }
    
    $consulta .= " WHERE id=$id_producto";
    $sql = $this->conexion->query($consulta);
    return $sql;
}

    public function eliminarProducto($id)
    {
        $consulta = "DELETE FROM producto WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    // Buscar productos por nombre o código
    public function BuscarProductoByNombreOrCodigo($dato){
        $arr_productos = array();
        $consulta = "SELECT * FROM producto WHERE codigo LIKE '%$dato%' OR nombre LIKE '%$dato%' OR detalle LIKE '%$dato%'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_productos, $objeto);
        }

        return $arr_productos;
    }
}