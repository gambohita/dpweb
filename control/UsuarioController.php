<?php
require_once("../model/UsuarioModel.php");
$objPersona = new UsuarioModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
     //print_r($_POST);
     $nro_identidad = $_POST['nro_identidad'];
     $razon_social = $_POST['razon_social'];
     $telefono = $_POST['telefono'];
     $correo = $_POST['correo'];
     $departamento = $_POST['departamento'];
     $provincia = $_POST['provincia'];
     $distrito = $_POST['distrito'];
     $cod_postal = $_POST['cod_postal'];
     $direccion = $_POST['direccion'];
     $rol = $_POST['rol'];
     //ENCRIPTANDO nro_identidad PARA UTILIZAR COMO CONTRASEÑA
     $password = password_hash($nro_identidad, PASSWORD_DEFAULT);

     if (
          $nro_identidad == "" || $razon_social == "" ||  $telefono == "" || $correo  == "" || $departamento == "" || $provincia = "" ||
          $distrito == "" || $cod_postal == "" || $direccion == "" ||  $rol == ""
     ) {
          $arrResponse = array('status' => false, 'msg' => 'Error,campos vacios');
     } else {
          //validacion si existe persona con el mismo dni
          $existePersona = $objPersona->existePersona($nro_identidad);
          if ($existePersona > 0) {
               $arrResponse = array('status' => false, 'msg' => 'Error, nro de documento ya existe');
          } else {

               $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);
               if ($respuesta) {
                    $arrResponse = array('status' => true, 'msg' => 'Registrado Correctamente');
               } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
               }
          }
     }
     echo json_encode($arrResponse);
}
if ($tipo == "iniciar_sesion") {
     $nro_identidad = $_POST['username'];
     $password = $_POST['password'];

     if ($nro_identidad == "" || $password == "") {
          $respuesta = array('status' => false, 'msg' => 'Error, campos vacios');
     } else {
          $existePersona = $objPersona->existePersona($nro_identidad);


          if (!$existePersona) {
               $arrResponse = array('status' => false, 'msg' => 'Error, usuario no registrado');
          } else {
               $persona = $objPersona->buscarPesonaPorNroIdentidad($nro_identidad);
               if (password_verify($password, $persona->password)) {
                    session_start();
                    $_SESSION['ventas_id'] = $persona->id;
                    $_SESSION['ventas_usuario'] = $persona->razon_social;
                    $respuesta = array('status' => true, 'msg' => 'ok');
               } else {
                    $respuesta = array('status' => false, 'msg' => 'Error, contaseña encorrecta');
               }
          }
     }
     echo json_encode($respuesta);
}
if ($tipo == "ver_usuario") {
     $usuario = $objPersona->verUsuario();
     header('Content-Type: application/json');
     echo json_encode($usuario);
}
if ($tipo == "ver") {
     //print_r($_POST);
     $respuesta = array('status' => false, 'msg' => 'error');
     $id_persona = $_POST['id_persona'];
     $usuario = $objPersona->ver($id_persona);
     if ($usuario) {
          $respuesta['status'] = true;
          $respuesta['data'] = $usuario;
     } else {
          $respuesta['msg'] = ' Error, usuario no existe';
     }
     echo json_encode($respuesta);
}
if ($tipo == "actualizar") {
     //print_r($_POST);
     $id_persona = $_POST['id_persona'];
     $nro_identidad = $_POST['nro_identidad'];
     $razon_social = $_POST['razon_social'];
     $telefono = $_POST['telefono'];
     $correo = $_POST['correo'];
     $departamento = $_POST['departamento'];
     $provincia = $_POST['provincia'];
     $distrito = $_POST['distrito'];
     $cod_postal = $_POST['cod_postal'];
     $direccion = $_POST['direccion'];
     $rol = $_POST['rol'];
     if (
          $id_persona == "" || $nro_identidad == "" ||    $razon_social == "" ||  $telefono == "" || $correo  == "" || $departamento == "" || $provincia = "" ||
          $distrito == "" || $cod_postal == "" || $direccion == "" ||  $rol == ""
     ) {
          $arrResponse = array('status' => false, 'msg' => 'Error,campos vacios');
     }
     $existeID = $objPersona->ver($id_persona);
     if (!$existeID) {
          //devolver mensaje
          $arrResponse = array('status' => false, 'msg' => 'Error,usuario no existe en BD');
          echo json_encode($arrResponse);
          exit;
          //cerrar funcion

     } else {
          //actualizar
          $actualizar = $objPersona->actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol);
          if ($actualizar) {
               $arrResponse = array('status' => true, 'msg'=>"actualizado correctamente");

          }else{
               $arrResponse = array('status' => false, 'msg'=> $actualizar);
          }
          echo json_encode($arrResponse);
          exit;

     }
}
if ($tipo=="eliminar") {
     //print_r($_POST);
     $id_persona = $_POST['id_persona'];
     $usuario = $objPersona-> eliminar($id_persona);
     if ($usuario) {
          $respuesta = array('status' => true, 'msg' => 'Eliminado');
     }else {
         $respuesta = array('status' => false, 'msg' => $eliminar); 
     }
     echo json_encode($respuesta);
     


}
if ($tipo == "ver_clients") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $usuarios = $objPersona->verClientes();
    if (count($usuarios)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
    }
    echo json_encode($respuesta);
}

if ($tipo == "ver_proveedor") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $usuarios = $objPersona->verProveedores();
    if (count($usuarios)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
    }
    echo json_encode($respuesta);
}
