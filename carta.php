<?php include 'includes/templates/header.php'; ?>

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
	<main id="panificacion" class="main fondo-fijo" style="background-image: url(img/foto2.jpeg);">
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
	</main>

	<!-- DESAYUNO/MERIENDA -->
	<section id="desayuno" class="contenido-carta" style="background-color: #d1a064;">
		<h2>Desayuno y Merienda</h2>
		<div class="seccion contenido">
			<?php 
				$i = 0;
				foreach($comidas['Desayuno/Merienda'] as $comida){ 
					if($i%2==0){ ?>
						<ul class="opciones">
							<li class="primario">
								<h4><?php echo $comida['titulo']; ?></h4>
								<span>$<?php echo $comida['precio']; ?></span>
								<?php if($comida['descripcion'] != ""){ ?>
								<p><?php echo $comida['descripcion'] ?></p>
								<?php } ?>
							</li>
						</ul>
					<?php } else { ?>
						<ul class="opciones">
							<li class="secundario">
								<h4><?php echo $comida['titulo']; ?></h4>
								<span>$<?php echo $comida['precio']; ?></span>
								<?php if($comida['descripcion'] != ""){ ?>
								<p><?php echo $comida['descripcion'] ?></p>
								<?php } ?>
							</li>
						</ul>
					<?php } $i++; ?>
				<?php } ?>
		</div>
	</section>

	<!-- ALMUERZO/CENA -->
	<section id="cena" class="contenido-carta" style="background-color: white;">
		<h2>Almuerzo y cena</h2>
		<div class="seccion contenido">
			<!--
			<ul class="secundario pizza">
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
			-->
			<?php 
				$i = 0;
				foreach($comidas['Almuerzo/Cena'] as $comida){ 
					if($i%2==0){ ?>
						<ul class="opciones">
							<li class="terciario">
								<h4><?php echo $comida['titulo']; ?></h4> 
								<span>$<?php echo $comida['precio'] ?></span>
								<?php if($comida['descripcion'] != ""){ ?>
									<p><?php echo $comida['descripcion'] ?></p>
								<?php } ?> 
							</li>
						</ul>
					<?php } else { ?>
						<ul class="opciones">
							<li class="secundario">
								<h4><?php echo $comida['titulo']; ?></h4> 
								<span>$<?php echo $comida['precio'] ?></span>
								<?php if($comida['descripcion'] != ""){ ?>
									<p><?php echo $comida['descripcion'] ?></p>
								<?php } ?> 
							</li>
						</ul>
					<?php } $i++; ?>
				<?php } ?>
		</div>
	</section>

	<!-- Sandwiches -->
	<section id="sandwich" class="contenido-carta" style="background-color: rgb(61,35,22);">
		<h2>Sandwiches</h2>
		<div class="seccion contenido">
			<?php 
				$i = 0;
				foreach($comidas['Sandwiches'] as $comida){ 
					if($i%2==0){ ?>
						<ul class="opciones">
							<li class="terciario">
								<h4><?php echo $comida['titulo']; ?></h4> 
								<span>$<?php echo $comida['precio'] ?></span> 
								<?php if($comida['descripcion'] != ""){ ?>
									<p><?php echo $comida['descripcion'] ?></p>
								<?php } ?>
							</li>
							
						</ul>
					<?php } else { ?>
						<ul class="opciones">
							<li class="primario">
								<h4><?php echo $comida['titulo']; ?></h4> 
								<span>$<?php echo $comida['precio'] ?></span>
								<?php if($comida['descripcion'] != ""){ ?>
									<p><?php echo $comida['descripcion'] ?></p>
								<?php } ?>
							</li>
						</ul>
					<?php } $i++; ?>
				<?php } ?>
		</div>
	</section>

	<!-- PROMOS -->
	<section id="promos" class="contenido-carta fondo-fijo" style="background-image: url(img/foto5.jpeg);">
		<div class="seccion promociones">
			<h2>PROMOCIONES DE COMIDA</h2>
			<?php foreach($comidas['Promociones'] as $comida){ ?>
				<ul class="opciones">
					<li>
						<h4><?php echo $comida['titulo']; ?></h4> 
						<span>$<?php echo $comida['precio']; ?></span> 
					</li>
				</ul>
			<?php } ?>
		</div>
	</section>

	<!-- BEBIDAS -->
	<section id="bebidas" class="contenido-carta fondo-fijo" style="background-image: url(img/licuado.jpeg);">
		<div class="seccion bebidas sin-alcohol">
			<h2>BEBIDAS</h2>
			<h3>Sin alcohol</h3>
			<div>
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
			
		</div>
		<div class="seccion bebidas con-alcohol">
			<h3>Con Alcohol</h3>
			<div>
				<?php foreach($comidas['BebidasConAlcohol'] as $comida){ ?>
						<ul>
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