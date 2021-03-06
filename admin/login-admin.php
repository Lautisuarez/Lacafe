<?php
include_once 'funciones/funciones.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];

if(isset($_POST['login-admin'])){
    try {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $password_admin);
        if($stmt->affected_rows){
            $existe = $stmt->fetch();
            if($existe){
                if(password_verify($password, $password_admin)){
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['id'] = $id;
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'usuario' => $usuario_admin
                    );
                }else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        }else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e){
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}