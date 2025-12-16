<?php
require_once("../model/UsuarioModel.php");

$objPersona = new UsuarioModel();
$tipo = $_GET['tipo'];

if ($tipo == 'registrar') {
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
   $password = password_hash($nro_identidad, PASSWORD_DEFAULT);
   if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
      $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
   } else {
   
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
   if ($nro_identidad == "" || $password == "" ) {
      $respuesta = array('status' => false, 'msg' => 'Error, campos vacios');
   }else {
      $existePersona = $objPersona->existePersona($nro_identidad);
      if (!$existePersona) {
         $respuesta = array('status' => false, 'msg' => 'Error, usuario no registrado');
      }else {
         $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad);
         if (password_verify($password,$persona->password)) {
            session_start();
            $_SESSION['ventas_id']= $persona->id;
            $_SESSION['ventas_usuario']=$persona->razon_social;
            $respuesta = array('status' => true, 'msg' => 'ok');
         }else {
            $respuesta = array('status' => false, 'msg' => 'Error, contraseña incorecta');
         }

      }
   }
   echo json_encode($respuesta);
}


if ($tipo == "ver_usuarios") {
   $usuarios = $objPersona->verUsuarios();
   echo json_encode($usuarios);
}

if ($_GET['tipo'] == 'obtener_usuario') {
    header('Content-Type: application/json');

    $id = $_GET['id'];

    require_once '../model/UsuarioModel.php';

    $modelo = new UsuarioModel();
    $usuario = $modelo->obtenerUsuarioPorId($id);

    echo json_encode($usuario);
    exit;
   }

// actualizar
if ($tipo == "actualizar_usuario") {
    $data = $_POST;
    $modelo = new UsuarioModel();

    $nro = $data['nro_identidad'];
    $id_actual = $data['id_persona'];

    $verificar = $modelo->buscarPorDocumento($nro);

    if ($verificar && $verificar['id'] != $id_actual) {
        echo json_encode(['status' => false, 'msg' => 'Este número de documento ya está registrado con otro usuario.']);
      } else {
         $actualizado = $modelo->actualizarPersona($data);
        echo json_encode(['status' => $actualizado, 'msg' => $actualizado ? 'Usuario actualizado correctamente' : 'Error al actualizar']);
      }
}

// eliminar usuario
if ($tipo == "eliminar_usuario") {
    $id = $_GET['id'] ?? 0;
    $result = $objPersona->eliminarUsuario($id);
    echo json_encode($result);
   }


// cargar proveedor
   $tipo = $_GET['tipo'] ?? '';
ini_set('display_errors',1); ini_set('display_startup_errors',1); error_reporting(E_ALL);
$objUsuario = new UsuarioModel();

 if ($tipo=="ver_proveedores") {
  $proveedores = $objUsuario->verProveedores();
  $respuesta = ['status'=>false,'data'=>[]];
  if (count($proveedores)>0) $respuesta=['status'=>true,'data'=>$proveedores];
  header('Content-Type: application/json');
  echo json_encode($respuesta);
  exit;
}

// ver cliente
if ($tipo == "ver_clientes") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $usuarios = $objPersona->verClientes();
    if (count($usuarios)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
    }
    echo json_encode($respuesta);
}
// ver proveeddor detallado

if ($tipo == "ver_proveedores_detallados") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $usuarios = $objPersona->verProveedoresDetallados();
    if (count($usuarios)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
    }
    echo json_encode($respuesta);
}

if ($tipo == "cerrar_sesion") {
    session_start();
    session_destroy();
    $respuesta = array('status' => true, 'msg' => 'Sesión cerrada correctamente');
    echo json_encode($respuesta);
}
if ($tipo == "buscar_por_dni") {
   header('Content-Type: application/json');

   $dni = $_POST['dni'] ?? '';

   $respuesta = [
       'status' => false,
       'msg' => 'No se encontró el DNI'
   ];

   if ($dni !== '') {
       $usuario = $objPersona->buscarPersonaPorNroIdentidad($dni);
       if ($usuario) {
           $respuesta = [
               'status' => true,
               'msg' => 'DNI encontrado',
               'data' => $usuario
           ];
       }
   }

   echo json_encode($respuesta);
   exit;
}
