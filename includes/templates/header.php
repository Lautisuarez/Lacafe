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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;700&family=Oswald:wght@200;400;600&family=Sansita+Swashed:wght@300;500&display=swap" rel="stylesheet">
	<!-- NORMALIZE -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- SWEEET ALERT -->
    <link rel="stylesheet" href="css/sweetalert2.min.css">
	<!-- CSS -->
	<link rel="stylesheet" href="css/main.css">
</head>

<body class="footer-fijo">
    <!-- HEADER -->
    <header class="site-header">
        <div class="contenedor header">
            <a href="index.php"><img src="img/logo.jpg" alt="Logotipo"></a>
            <?php 
            include 'includes/funciones/funciones.php';  
            if(obtenerPaginaActual() === 'carta'){ ?>
                <nav class="nav nav-carta">
                    <?php navegacion(); ?>
                </nav>
            <?php } else if (obtenerPaginaActual() === 'index') {?>
            <nav class="nav">
                <?php navegacion(); ?>
            </nav>
            <?php } else { ?>
                <nav class="nav">
                    <?php navegacion(); ?>
                </nav>
            <?php } ?>
        </div>
    </header>