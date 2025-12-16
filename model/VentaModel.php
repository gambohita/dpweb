<?php
require_once("../library/conexion.php");
class VentaModel
{

    private $conexion;
    private $lastError = "";

    function __construct()
    {

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrar_temporal($id_producto, $precio, $cantidad)
    {
        $consulta = "INSERT INTO temporal_venta (id_producto, precio, cantidad) 
      VALUES ('$id_producto', '$precio', '$cantidad')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return $this->conexion->insert_id;
        }
        return 0;
    }
    public function actualizarCantidadTemporal($id_producto, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad='$cantidad' WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function  actualizarCantidadTemporalByid($id, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad = '$cantidad' WHERE id = '$id'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function buscarTemporales()
    {
        $arr_temporal = array();
        $consulta = "SELECT tv.*, p.nombre FROM temporal_venta tv INNER JOIN producto p ON tv.id_producto = p.id";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_temporal, $objeto);
        }
        return $arr_temporal;
    }


    public function buscarTemporal($id_producto)
    {
        $consulta = "SELECT * FROM temporal_venta WHERE id_producto= '$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
        
        
    }
    public function eliminarTemporal($id)
    {
        $consulta ="DELETE FROM temporal_venta WHERE id= '$id'"; 
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function eliminarTemporales()
    {
        $consulta ="DELETE FROM temporal_venta"; 
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    //---------------ventas registradas (oficiales)-------------------
    public function buscar_ultima_venta(){
        $consulta = "SELECT codigo FROM venta ORDER BY id DESC LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    public function registrar_venta($correlativo, $fecha_venta, $id_cliente, $id_vendedor){
        // Calcular total a partir de los temporales
        $consulta_total = "SELECT IFNULL(SUM(precio * cantidad), 0) AS total FROM temporal_venta";
        $sql_total = $this->conexion->query($consulta_total);
        if (!$sql_total) {
            $this->lastError = $this->conexion->error;
            return false;
        }
        $obj_total = $sql_total->fetch_object();
        $total = isset($obj_total->total) ? $obj_total->total : 0;

        // Normalizar fecha (datetime-local -> MySQL DATETIME)
        if (!empty($fecha_venta)) {
            $fecha_venta = str_replace('T', ' ', $fecha_venta);
            if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/', $fecha_venta)) {
                $fecha_venta .= ':00';
            }
        }

        // Obtener columnas existentes en tabla 'venta'
        $cols_present = array();
        $res_cols = $this->conexion->query("SHOW COLUMNS FROM venta");
        if ($res_cols) {
            while ($row = $res_cols->fetch_assoc()) {
                $cols_present[] = $row['Field'];
            }
        } else {
            $this->lastError = $this->conexion->error;
            return false;
        }

        // Columnas candidatas y valores
        $candidate_cols = array(
            'codigo' => "'$correlativo'",
            'id_cliente' => "'$id_cliente'",
            'id_vendedor' => "'$id_vendedor'",
            'total_venta' => "'$total'",
        );

        // Determinar nombre de columna de fecha (si existe)
        $fecha_col = null;
        if (in_array('fecha_venta', $cols_present)) $fecha_col = 'fecha_venta';
        elseif (in_array('fecha', $cols_present)) $fecha_col = 'fecha';

        if ($fecha_col !== null && !empty($fecha_venta)) {
            $candidate_cols[$fecha_col] = "'$fecha_venta'";
        }

        // Construir arrays reales según columnas que existan
        $cols = array();
        $vals = array();
        foreach ($candidate_cols as $c => $v) {
            if (in_array($c, $cols_present)) {
                $cols[] = $c;
                $vals[] = $v;
            }
        }

        // Asegurar que al menos 'codigo' exista
        if (!in_array('codigo', $cols_present)) {
            $this->lastError = "Missing required column 'codigo' in table venta";
            return false;
        }

        $consulta = "INSERT INTO venta (" . implode(',', $cols) . ") VALUES (" . implode(',', $vals) . ")";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return $this->conexion->insert_id;
        }

        // Si falla y hay error por columnas desconocidas, intentar eliminar 'total_venta' si fue incluido
        $error = $this->conexion->error;
        if (stripos($error, "Unknown column 'total_venta'") !== false) {
            // Reintentar sin total_venta
            $cols2 = array_filter($cols, function($col){ return $col !== 'total_venta'; });
            $vals2 = array_values(array_filter($vals, function($idx) use ($cols) {
                // helper not available here; re-build simpler
                return true;
            }));
            // rebuild vals matched to cols2
            $vals2 = array();
            foreach ($cols2 as $colname) {
                if ($colname == 'codigo') $vals2[] = "'$correlativo'";
                elseif ($colname == 'id_cliente') $vals2[] = "'$id_cliente'";
                elseif ($colname == 'id_vendedor') $vals2[] = "'$id_vendedor'";
                elseif ($colname == 'fecha' || $colname == 'fecha_venta') $vals2[] = (!empty($fecha_venta) ? "'$fecha_venta'" : 'NULL');
            }
            $consulta2 = "INSERT INTO venta (" . implode(',', $cols2) . ") VALUES (" . implode(',', $vals2) . ")";
            $sql2 = $this->conexion->query($consulta2);
            if ($sql2) return $this->conexion->insert_id;
        }

        $this->lastError = $this->conexion->error;
        return false;
    }

    public function registrar_detalle_venta($id_venta, $id_producto, $precio, $cantidad){
        $consulta = "INSERT INTO detalle_venta (id_venta, id_producto, precio, cantidad) 
        VALUES ('$id_venta', '$id_producto', '$precio', '$cantidad')";
        $sql = $this->conexion->query($consulta);
        if (!$sql) {
            $this->lastError = $this->conexion->error;
            return false;
        }
        return true;
    }

    // Transacciones y errores
    public function beginTransaction(){
        if (method_exists($this->conexion, 'begin_transaction')) {
            $this->conexion->begin_transaction();
        } else {
            $this->conexion->autocommit(false);
        }
    }

    public function commit(){
        $this->conexion->commit();
        if (method_exists($this->conexion, 'autocommit')) {
            $this->conexion->autocommit(true);
        }
    }

    public function rollback(){
        $this->conexion->rollback();
        if (method_exists($this->conexion, 'autocommit')) {
            $this->conexion->autocommit(true);
        }
    }

    public function getLastError(){
        return $this->lastError;
    }



}