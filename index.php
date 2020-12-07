<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacáfe</title>
    
    <!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- ICONO -->
    <link rel="manifest" href="site.webmanifest">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- NORMALIZE -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="footer-fijo">
    <!-- HEADER -->
    <header class="site-header">
        <div class="contenedor header">
            <a href="index.php"><img src="img/logo.jpg" alt="Logotipo"></a>
            <nav class="nav">
                <a href="index.php">Inicio</a>
                <a href="carta.php">Nuestra Carta</a>
                <a href="#nosotros">Sobre Nosotros</a>
                <a href="#contacto">Contacto</a>
            </nav>
        </div>
    </header>
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
                            <h3><?php echo $comdia['titulo']; ?></h3>
                            <p><?php echo $comida['descripcion']; ?></p>
                        </a>
					<?php } ?>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="contacto" id="contacto">
        <div class="contenedor">
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
        </div>
    </section>

    <?php include_once "includes/templates/footer.php"; ?>