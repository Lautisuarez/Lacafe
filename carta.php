<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lacáfe</title>
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
	<!-- COLORBOX -->
	<link rel="stylesheet" href="css/colorbox.css">
	<!-- NORMALIZE -->
	<link rel="stylesheet" href="css/normalize.css">
	<!-- CSS -->
	<link rel="stylesheet" href="css/main.css">
</head>

<body class="footer-fijo body-carta">
	<!-- HEADER -->
	<header class="site-header">
		<div class="header">
			<a href="index.php"><img src="img/logo.jpg" alt="Logotipo"></a>
			<nav class="nav nav-carta">
				<div class="ocultar" id="primero">
					<a href="index.php">Inicio</a>
					<a href="#panificacion">Panificación</a>
					<a href="#dulces">Dulces</a>
					<a href="#cafeteria">Cafetería</a>
					<a href="#segundo" class="flecha"><i class="far fa-arrow-alt-circle-right"></i></a>
				</div>
				<div class="ocultar" id="segundo">
					<a href="#primero" class="flecha"><i class="far fa-arrow-alt-circle-left"></i></a>
					<a href="#desayuno">Desayuno/Merienda</a>
					<a href="#cena">Almuerzo/Cena</a>
					<a href="#tercero" class="flecha"><i class="far fa-arrow-alt-circle-right"></i></a>
				</div>
				<div class="ocultar" id="tercero">
					<a href="#segundo" class="flecha"><i class="far fa-arrow-alt-circle-left"></i></a>
					<a href="#sandwich">Sandwiches</a>
					<a href="#promos">Promociones</a>
					<a href="#bebidas">Bebidas</a>
				</div>
			</nav>
		</div>
	</header>

	<!-- PHP AND MYSQL -->
	<?php 
		try {
			require_once('includes/funciones/db_connect.php');
			$sql = 'SELECT id_contenido, titulo, descripcion, precio, nombre_tipo FROM contenido ';
			$sql .= ' INNER JOIN tipo_seccion ';
			$sql .= ' ON contenido.id_seccion = tipo_seccion.id_tipo ';
			$sql .= 'ORDER BY id_contenido ';

			$resultado = $conn->query($sql);
		} catch(\Exception $e) {
			echo $e->getMessage();
		}
	?>
	<?php  
		$comidas = array();
		// Muestra los resultados de la consulta SQL
		while ($eventos = $resultado->fetch_assoc()) {
			$nombre_tipo = $eventos['nombre_tipo'];
			$evento = array(
				'titulo' => $eventos['titulo'],
				'descripcion' => $eventos['descripcion'],
				'precio' => $eventos['precio'],
				'id' => $eventos['id_contenido']
			);
			
			$comidas[$nombre_tipo][] = $evento; // Lo agrupamos por fecha
		} 
	?>


	<!-- CONTENIDO PRINCIPAL -->
	<section id="panificacion" class="contenido-carta fondo-carta" style="background-image: url(img/foto2.jpeg);">
		<div class="seccion panificacion">
			<h2>Panificación</h2>
			<div class="contenido-principal">
				<?php foreach($comidas['Panificación'] as $comida){ ?>
						<p><?php echo $comida['titulo']; ?> <span>$<?php echo $comida['precio']; ?></span> </p>
					<?php } ?>
			</div>
		</div>
		<div id="dulces" class="seccion dulces">
			<h2>Dulces y Antojos</h2>
			<div class="contenido-principal">
				<?php foreach($comidas['Dulces'] as $comida){ ?>
						<p><?php echo $comida['titulo']; ?> <span>$<?php echo $comida['precio']; ?></span> </p>
					<?php } ?>
			</div>
		</div>
		<div id="cafeteria" class="seccion cafeteria">
			<h2>Cafetería</h2>
			<div class="contenido-principal">
				<?php foreach($comidas['Cafetería'] as $comida){ ?>
						<p><?php echo $comida['titulo']; ?> <span>$<?php echo $comida['precio']; ?></span> </p>
					<?php } ?>
			</div>
		</div>
	</section>

	<!-- DESAYUNO/MERIENDA -->
	<section id="desayuno" class="contenido-carta" style="background-color: #d1a064;">
		<div class="desayuno">
			<h2>Desayuno y Merienda</h2>
			<div class="contenido-desayuno">
				<?php 
					$i = 0;
					foreach($comidas['Desayuno/Merienda'] as $comida){ 
						if($i%2==0){ ?>
							<ul>
								<a class="comida-info" href="#comida<?php echo $comida['id']; ?>">
									<li class="primario">
										<h4><?php echo $comida['titulo']; ?></h4>
										<span>$<?php echo $comida['precio']; ?></span>
									</li>
								</a>
							</ul>
						<?php } else { ?>
							<ul>
								<a class="comida-info" href="#comida<?php echo $comida['id']; ?>">
									<li class="secundario">
										<h4><?php echo $comida['titulo']; ?></h4>
										<span>$<?php echo $comida['precio']; ?></span>
									</li>
								</a>
							</ul>
						<?php } $i++; ?>
						<div style="display: none;">
							<div class="comida-info" id="comida<?php echo $comida['id']; ?>">
								<h4><?php echo $comida['titulo']; ?></h4>
								<p><?php echo $comida['descripcion']; ?></p>
								<span>$<?php echo $comida['precio']; ?></span>
							</div>
						</div>
					<?php } ?>
			</div>
		</div>
	</section>

	<!-- ALMUERZO/CENA -->
	<section id="cena" class="contenido-carta cena">
		<h2>Almuerzo y cena</h2>
		<div class="contenido-cena">
			<img src="img/pizzaEdit.png" alt="">
			<a class="comida-info" href="#comidapizza">
				<ul class="secundario">
					<li><h4>Pizzas</h4></li>
				</ul>
			</a>
			<div style="display: none;">
				<div class="comida-info" id="comidapizza">
					<ul class="pizza">
						<li><h4>Pizzas</h4> <span>Enteras</span><span>Medias</span></li>
						<li>Especial(muzza, jamón y morrón) <span>$340</span> <span>$200</span></li>
						<li>Muzzarella con roquefort <span>$380</span> <span>$230</span></li>
						<li>Muzzarella con jamón <span>$420</span> <span>$250</span></li>
						<li>Muzzarella con anchoas <span>$440</span><span>$260</span></li>
						<li>Muzzarella con huevo <span>$360</span> <span>$220</span></li>
						<li>Muzzarella con rúcula y jamón crudo <span>$400</span><span>$240</span></li>
						<li>Palmitas(muzza, jamón y oliva negra) <span>$440</span><span>$260</span></li>
						<li>Fugazzeta <span>$360</span> <span>$220</span></li>
					</ul>
				</div>
			</div>
			<?php 
				$i = 0;
				foreach($comidas['Almuerzo/Cena'] as $comida){ 
					if($i%2==0){ ?>
						<a class="comida-info" href="#comida<?php echo $comida['id']; ?>">
							<ul class="terciario">
								<li><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio'] ?></span> </li>
							</ul>
						</a>
					<?php } else { ?>
						<a class="comida-info" href="#comida<?php echo $comida['id']; ?>">
							<ul class="secundario">
								<li><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio'] ?></span> </li>
							</ul>
						</a>
					<?php } $i++; ?>
					<div style="display: none;">
						<div class="comida-info" id="comida<?php echo $comida['id']; ?>">
							<h4><?php echo $comida['titulo']; ?></h4>
							<p><?php echo $comida['descripcion']; ?></p>
							<span>$<?php echo $comida['precio']; ?></span>
						</div>
					</div>
				<?php } ?>
		</div>
	</section>

	<!-- Sandwiches -->
	<section id="sandwich" class="contenido-carta sandwich">
		<h2>Sandwiches</h2>
		<div class="contenido-sandwich">
			<?php 
				$i = 0;
				foreach($comidas['Sandwiches'] as $comida){ 
					if($i%2==0){ ?>
						<a class="comida-info" href="#comida<?php echo $comida['id']; ?>">
							<ul class="terciario">
								<li><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio'] ?></span> </li>
							</ul>
						</a>
					<?php } else { ?>
						<a class="comida-info" href="#comida<?php echo $comida['id']; ?>">
							<ul class="primario">
								<li><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio'] ?></span> </li>
							</ul>
						</a>
					<?php } $i++; ?>
					<div style="display: none;">
						<div class="comida-info" id="comida<?php echo $comida['id']; ?>">
							<h4><?php echo $comida['titulo']; ?></h4>
							<p><?php echo $comida['descripcion']; ?></p>
							<span>$<?php echo $comida['precio']; ?></span>
						</div>
					</div>
				<?php } ?>
		</div>
	</section>

	<!-- PROMOS -->
	<section id="promos" class="contenido-carta promos fondo-carta">
		<div class="contenido-promo">
			<h2>PROMOCIONES DE COMIDA</h2>
			<div class="promociones">
				<?php foreach($comidas['Promociones'] as $comida){ ?>
						<ul class="pequenio">
							<li><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio']; ?></span> </li>
						</ul>
					<?php } ?>
			</div>
		</div>
	</section>

	<!-- BEBIDAS -->
	<section id="bebidas" class="contenido-bebidas contenido-carta fondo-carta">
		<div class="bebidas">
			<div class="sin-alcohol">
				<h2>BEBIDAS</h2>
				<h3>Sin alcohol</h3>
				<?php $k=0;
					foreach($comidas['BebidasSinAlcohol'] as $comida){ 
						if($k%2==0){ ?>
							<ul>
								<li class="right"><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio']; ?></span> </li>
							</ul>
						<?php } else {?>
							<ul>
								<li><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio']; ?></span> </li>
							</ul>
					<?php } $k++;
					} ?>
				
			</div>
			<div class="con-alcohol">
				<h3>Con Alcohol</h3>
				<?php foreach($comidas['BebidasConAlcohol'] as $comida){ ?>
						<ul class="pequenio">
							<li><h4><?php echo $comida['titulo']; ?></h4> <span>$<?php echo $comida['precio']; ?></span> </li>
						</ul>
					<?php } ?>
			</div>
		</div>
	</section>

	<?php 
		$conn->close();
	?>

<?php include_once 'includes/templates/footer.php' ?>