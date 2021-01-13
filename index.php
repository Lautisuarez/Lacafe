<?php include 'includes/templates/header.php'; ?>
    <!-- HERO -->
    <main id="inicio" class="hero parallax">
        <h1>Vení a disfrutar de buena comida en LACÁFE.</h1>
    </main>

    <!-- PHP AND MYSQL -->
	<?php 
		try {
			require_once('includes/funciones/db_connect.php');
			$sql = 'SELECT * FROM `comidas` ';

			$resultado = $conn->query($sql);
		} catch(\Exception $e) {
			echo $e->getMessage();
		}
	?>
	<?php  
		$comidas = array();
		// Muestra los resultados de la consulta SQL
		while ($eventos = $resultado->fetch_assoc()) {
			$evento = array(
                'url_img' => $eventos['url_imagen'],
				'titulo' => $eventos['titulo_imagen'],
				'descripcion' => $eventos['descripcion_imagen'],
				'id' => $eventos['id_comida']
			);
			
            $comidas[] = $evento; // Lo agrupamos por fecha
		} 
	?>

    <!-- NOSOTROS -->
    <section class="site-nosotros" id="nosotros">
        <div class="contenedor">
            <h2 class="separador">Sobre Nosotros</h2>
            <div class="comidas">
                <?php foreach($comidas as $comida){ ?>
                        <a href="#" class="comida">
                            <div class="imagen" style="background-image: url(<?php echo $comida['url_img']; ?>); background-position: center center;"></div>
                            <h3><?php echo $comida['titulo']; ?></h3>
                            <p><?php echo $comida['descripcion']; ?></p>
                        </a>
					<?php } ?>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="site-nosotros" id="contacto">
        <form action="formulario.php" method="post">
            <h2 class="separador">Contacto</h2>
            <legend>Contactános llenando todos los campos</legend>
            <div class="contenedor-campo">
                <div>
                    <div class="campo">
                        <label for="nombre">Nombre Completo: 
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                        </label>
                    </div>
                    <div class="campo">
                        <label for="telefono">Teléfono:
                            <input type="tel" name="telefono" id="telefono" placeholder="Teléfono" required>
                        </label>
                    </div>
                    <div class="campo">
                        <label for="correo">Correo:
                            <input type="email" name="correo" id="correo" placeholder="Correo" required>
                        </label>
                    </div>
                    <div class="campo">
                        <label for="mensaje">Mensaje:
                            <textarea name="mensaje" rows="8" cols="40" id="mensaje"></textarea>
                        </label>
                    </div>
                </div>
                <div class="btn-form">
                    <input type="submit" value="Enviar" class="btn">
                </div>
            </div>
        </form>
    </section>

    <?php include_once "includes/templates/footer.php"; ?>