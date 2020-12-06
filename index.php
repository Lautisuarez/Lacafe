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
            <a href="index.html"><img src="img/logo.jpg" alt="Logotipo"></a>
            <nav class="nav">
                <a href="#inicio">Inicio</a>
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

    <!-- NOSOTROS -->
    <section class="site-nosotros" id="nosotros">
        <div class="contenedor">
            <h2 class="separador">Sobre Nosotros</h2>
            <div class="comidas">
                <a href="#" class="comida">
                    <div class="imagen" style="background-image: url(img/torta.jpeg); background-position: center top;">
                    </div>
                    <h3>Torta</h3>
                    <p>Quien no se tienta para comer un pedazo de torta!? Vení probala.</p>
                </a>
                <a href="#" class="comida">
                    <div class="imagen" style="background-image: url(img/sandwich.jpeg);"></div>
                    <h3>Sandwich</h3>
                    <p>Excelentes sandwiches para todos los gustos!.</p>
                </a>
                <a href="#" class="comida">
                    <div class="imagen" style="background-image: url(img/delicias.jpeg);"></div>
                    <h3>Delicias</h3>
                    <p>Variedades de delicias para acompañarlas con tu merienda o desayuno!.</p>
                </a>
                <a href="#" class="comida">
                    <div class="imagen"
                        style="background-image: url(img/cafe.png); background-position: center bottom;"></div>
                    <h3>Café</h3>
                    <p>Nuestro mayor fuerte, el café! Quien quiere uno?.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="contacto" id="contacto">
        <div class="contenedor">
            <form action="#">
                <h2 class="separador">Contacto</h2>
                <legend>Contactános llenando todos los campos</legend>
                <div class="contenedor-campo">
                    <div class="campo">
                        <label>Nombre: </label>
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="campo">
                        <label>Teléfono:</label>
                        <input type="tel" name="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="campo">
                        <label>Correo:</label>
                        <input type="mail" name="correo" placeholder="Correo" required>
                    </div>
                    <div class="campo">
                        <label>Mensaje:</label>
                        <textarea></textarea>
                    </div>
                </div>
                <div class="clearfix">
                    <input type="submit" value="Enviar" class="btn">
                </div>
            </form>
        </div>
    </section>

    <?php include_once "includes/templates/footer.php"; ?>