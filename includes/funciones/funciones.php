<?php 

function obtenerPaginaActual(){
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace('.php', '', $archivo);
    return $pagina;
}

function navegacion(){
    $actual = obtenerPaginaActual();
    if($actual === 'index'){ ?>
        <a href="index.php">Inicio</a>
        <a href="carta.php">Nuestra Carta</a>
        <a href="#nosotros">Sobre Nosotros</a>
        <a href="#contacto">Contacto</a>
    <?php } else if($actual === 'carta'){ ?>
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
    <?php }
}

function obtenerContenido(){
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
            'id' => $eventos['id_contenido'],
            'tipo' => $eventos['nombre_tipo']
        );
        
        $comidas[$nombre_tipo][] = $evento; // Lo agrupamos por fecha
    } 
    return $comidas;
}