    <?php include_once "includes/templates/header.php"; ?>
    
    <?php 
        $resultado = $_POST;
        $nombre = filter_var($resultado['nombre'], FILTER_SANITIZE_STRING);
        $tel = $resultado['telefono'];
        $correo = $resultado['correo'];
        $mensaje = filter_var($resultado['mensaje'], FILTER_SANITIZE_STRING);
    ?>

    <!-- PHP AND MYSQL -->
    <?php 
        try {
            require_once('includes/funciones/db_connect.php');
            $sql = "INSERT INTO `contacto` (`id_contacto`, `nombre_contacto`, `telefono_contacto`, `correo_contacto`, `mensaje`) VALUES (NULL, '$nombre', '$tel', '$correo', '$mensaje'); ";

            $resultado = $conn->query($sql);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    ?>

    <?php include_once "includes/templates/footer.php"; ?>