<?php 
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/navegacion.php';
include_once 'templates/barra.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Crear Menú - <small>Llena el formulario para crear un menú</small></h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-md-8">
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Menú</h3>
                </div>
                <div class="card-body">
                    <!-- form start -->
                    <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-carta.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="titulo">Titulo: </label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese titulo" value="<?php echo $carta['titulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio: </label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese precio" value="<?php echo $carta['precio']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion: </label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion" value="<?php echo $carta['descripcion']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="seccion">Seccion: </label>
                                <select name="seccion_carta" class="form-control">
                                    <option value="0">-- SELECCIONAR --</option>
                                    <?php
                                        try {
                                            $sql = 'SELECT * FROM tipo_seccion ';
                                            $resultado = $conn->query($sql);
                                            while($seccion = $resultado->fetch_assoc()){?>
                                                <option value="<?php echo $seccion['id_tipo']; ?>">
                                                    <?php echo $seccion['nombre_tipo']; ?>
                                                </option>
                                            <?php }
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="submit" class="btn btn-primary" id="crear-registro-admin">Agregar</button>
                        </div>
                        </form>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>