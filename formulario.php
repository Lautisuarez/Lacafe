    <?php include_once "includes/templates/header.php"; ?>
    
    <!-- VARIABLES -->
    <?php 
        $resultado = $_POST;
        $nombre = filter_var($resultado['nombre'], FILTER_SANITIZE_STRING);
        $tel = $resultado['telefono'];
        $correo = $resultado['correo'];
        $mensaje = filter_var($resultado['mensaje'], FILTER_SANITIZE_STRING);
        $flag = FALSE;
    ?>
    <main class="formulario-main">
        <?php 
            if(isset($_POST['mensaje'])){
                $nuevo_mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
                if(strlen($nuevo_mensaje) < 1){ ?>
                    <div class="formulario-mensaje">
                        <h3 style="color: red;">Mensaje vacío, por favor regrese y complete el mensaje</h3>
                    </div>
                <?php  } else {
                    $flag = TRUE;
                }
            }
        ?>
        <?php 
            if($flag){
                try {
                    require_once('includes/funciones/db_connect.php');
                    $sql = "INSERT INTO `contacto` (`id_contacto`, `nombre_contacto`, `telefono_contacto`, `correo_contacto`, `mensaje`) VALUES (NULL, '$nombre', '$tel', '$correo', '$mensaje'); ";

                    $resultado = $conn->query($sql);

                    echo "<h3 style='color: green;'>Mensaje envíado correctamente!</h3>";
                } catch(\Exception $e) {
                    echo $e->getMessage();
                }
            }
        ?>
    </main>

    <?php include_once "includes/templates/footer.php"; ?>