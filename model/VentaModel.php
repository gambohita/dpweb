<?php
require_once("../library/conexion.php");

class VentaModel
{
    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
        
        // Verificar conexión
        if (!$this->conexion) {
            throw new Exception("Error al conectar con la base de datos");
        }
    }

    public function registrar_temporal($id_producto, $precio, $cantidad)
    {
        // Usar prepared statements para evitar SQL injection
        $consulta = "INSERT INTO temporal_venta (id_producto, precio, cantidad) 
                     VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);
        
        if (!$stmt) {
            error_log("Error en prepare: " . $this->conexion->error);
            return 0;
        }
        
        $stmt->bind_param("idd", $id_producto, $precio, $cantidad);
        
        if ($stmt->execute()) {
            return $this->conexion->insert_id;
        }
        
        error_log("Error en execute: " . $stmt->error);
        return 0;
    }

    public function actualizarCantidadTemporal($id_producto, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad = ? WHERE id_producto = ?";
        $stmt = $this->conexion->prepare($consulta);
        
        if (!$stmt) {
            return false;
        }
        
        $stmt->bind_param("di", $cantidad, $id_producto);
        return $stmt->execute();
    }

    public function actualizarCantidadTemporalByid($id, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);
        
        if (!$stmt) {
            return false;
        }
        
        $stmt->bind_param("di", $cantidad, $id);
        return $stmt->execute();
    }

    public function buscarTemporales()
    {
        $arr_temporal = array();
        $consulta = "SELECT tv.*, p.nombre FROM temporal_venta tv 
                     INNER JOIN producto p ON tv.id_producto = p.id";
        $sql = $this->conexion->query($consulta);
        
        if (!$sql) {
            error_log("Error en buscarTemporales: " . $this->conexion->error);
            return $arr_temporal;
        }
        
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_temporal, $objeto);
        }
        return $arr_temporal;
    }

    public function buscarTemporal($id_producto)
    {
        $consulta = "SELECT * FROM temporal_venta WHERE id_producto = ?";
        $stmt = $this->conexion->prepare($consulta);
        
        if (!$stmt) {
            return null;
        }
        
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object();
    }

    public function eliminarTemporal($id)
    {
        $consulta = "DELETE FROM temporal_venta WHERE id = ?";
        $stmt = $this->conexion->prepare($consulta);
        
        if (!$stmt) {
            return false;
        }
        
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function eliminarTemporales()
    {
        $consulta = "DELETE FROM temporal_venta";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    // --------------- ventas registradas (oficiales) -------------------
    public function buscar_ultima_venta()
    {
        $consulta = "SELECT codigo FROM venta ORDER BY id DESC LIMIT 1";
        $sql = $this->conexion->query($consulta);
        
        if (!$sql) {
            return null;
        }
        
        return $sql->fetch_object();
    }

    // 🔴 CORREGIDO: Aquí estaba el error principal
    public function registrar_venta($correlativo, $fecha_venta, $id_cliente, $id_vendedor)
    {
        // Calcular el total desde los temporales
        $total = 0;
        $temporales = $this->buscarTemporales();
        foreach ($temporales as $temporal) {
            $total += $temporal->precio * $temporal->cantidad;
        }
        
        // SQL CORREGIDO - antes tenía una coma extra y faltaba el valor de total_venta
        $consulta = "INSERT INTO venta (codigo, id_cliente, fecha_venta, id_vendedor, total_venta) 
                     VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexion->prepare($consulta);
        
        if (!$stmt) {
            error_log("Error en prepare venta: " . $this->conexion->error);
            return 0;
        }
        
        $stmt->bind_param("sisid", $correlativo, $id_cliente, $fecha_venta, $id_vendedor, $total);
        
        if ($stmt->execute()) {
            return $this->conexion->insert_id;
        }
        
        error_log("Error en execute venta: " . $stmt->error);
        return 0;
    }

    public function registrar_detalle_venta($id_venta, $id_producto, $precio, $cantidad)
    {
        $consulta = "INSERT INTO detalle_venta (id_venta, id_producto, precio, cantidad) 
                     VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conexion->prepare($consulta);
        
        if (!$stmt) {
            error_log("Error en prepare detalle: " . $this->conexion->error);
            return false;
        }
        
        $stmt->bind_param("iidd", $id_venta, $id_producto, $precio, $cantidad);
        return $stmt->execute();
    }
}