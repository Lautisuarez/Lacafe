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
            <h1>Carta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Carta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja la carta en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      try {
                        $sql = 'SELECT * FROM contenido ';
                        $resultado = $conn->query($sql);
                        $conn->close();
                      } catch(Exception $e){
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while($carta = $resultado->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $carta['titulo']; ?></td>
                          <td><?php echo $carta['precio']; ?></td>
                          <td><?php echo $carta['descripcion']; ?></td>
                          <td>
                            <a href="editar-carta.php?id=<?php echo $carta['id_contenido']; ?>" class="btn btn-success">
                                <i class="fas fa-pencil-alt "></i>
                            </a>
                            <a href="#" data-id="<?php echo $carta['id_contenido']; ?>" data-tipo="carta" class="btn btn-danger borrar_registro">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        </tr>
                      <?php }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php include_once 'templates/footer.php'; ?>
