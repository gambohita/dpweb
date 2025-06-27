<?php
require_once "../config/config.php";
class Conexion{
    public static function connect(){
        $mysql = new mysqli(BD_HOST,BD_USER,BD_PASSWORD,BD_NAME);
        $mysql->set_charset(BD_CHARSET);
        date_default_timezone_set("america/lima");
        if (mysqli_connect_errno()) {
            echo "error d conexion:".mysqli_connect_errno();
            
        }else{
            echo "conexion exitosa";
        }
    }
}
        