<?php 
include_once 'funciones/sesiones.php';
require_once 'funciones/funciones.php';
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
if($descripcion == ''){
    $descripcion = NULL;
}
$id_registrado = $_POST['id_registro'];
$id_seccion = $_POST['seccion_carta'];

if($_POST['registro'] == 'nuevo'){
    try {
        $stmt = $conn->prepare("INSERT INTO `contenido` (titulo, descripcion, precio, id_seccion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $titulo, $descripcion, $precio, $id_seccion);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if($_POST['registro'] == 'actualizar'){
    try {
        $stmt = $conn->prepare('UPDATE contenido SET titulo=?, descripcion=?, precio=? WHERE id_contenido=? ');
        $stmt->bind_param('ssii', $titulo, $descripcion, $precio, $id_registrado);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM contenido WHERE id_contenido = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}
?>