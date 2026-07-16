<?php
// Determinar la página activa para resaltar en el menú
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!--
Si el script actual se encuentra en la URL https://ejemplo.com/modulos/noticias.php:
$_SERVER['PHP_SELF'] -> devolverá: /modulos/noticias.php
basename($_SERVER['PHP_SELF']) -> devolverá: noticias.php
-->
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>COCEMFE Ceuta - Asociación de Personas con Discapacidad</title>
    
    <!-- Metas SEO -->
    <meta name="description" content="COCEMFE Ceuta es una asociación sin ánimo de lucro dedicada a la defensa de los derechos y la mejora de la calidad de vida de las personas con discapacidad física y orgánica en Ceuta.">
    <meta name="keywords" content="discapacidad, ceuta, asociacion, cocemfe, servicios, centro de dia, integracion laboral, voluntariado, ocio adaptado">
    <meta name="robots" content="index, follow">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/headers/favicon.PNG" />
    
    <!-- Iconos FontAwesome 4.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Estilo Principal (con anti-caché) -->
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/honeycomb.css?v=<?php echo time(); ?>">
</head>
<body>

    <!-- CABECERA Y NAVEGACIÓN -->
    <header class="main-header">
        <div class="container">
            <!-- Logotipo -->
            <a href="index.php" class="logo">
                <img src="images/headers/LogoCeuta.PNG" alt="COCEMFE Ceuta Logo">
            </a>

            <!-- Botón Menú Móvil -->
            <button class="mobile-nav-toggle" aria-label="Abrir Menú">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Menú de Navegación -->
            <nav class="nav-menu">
                <button class="nav-close-btn" aria-label="Cerrar Menú">
                    <i class="fa fa-times"></i>
                </button>
                <ul class="nav-list">
                    <!-- Inicio -->
                    <li class="nav-item <?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">
                        <a href="index.php" class="nav-link">Inicio</a>
                    </li>

                    <!-- Quiénes somos -->
                    <?php 
                    $quienes_somos_active = in_array($current_page, ['quienes-somos-info.php', 'quienes-somos-personal.php', 'quienes-somos-mision.php', 'quienes-somos-transparencia.php']);
                    ?>
                    <li class="nav-item <?php echo $quienes_somos_active ? 'active' : ''; ?>">
                        <a href="#" class="nav-link">Quiénes somos <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="quienes-somos-info.php" class="dropdown-link">Información sobre la asociación</a></li>
                            <li><a href="quienes-somos-personal.php" class="dropdown-link">Personal</a></li>
                            <li><a href="quienes-somos-mision.php" class="dropdown-link">Misión, Visión y Valores</a></li>
                        </ul>
                    </li>

                    <!-- Servicios -->
                    <?php 
                    $servicios_active = in_array($current_page, ['servicios-centro-dia.php', 'servicios-atencion-integral.php', 'servicios-productos-apoyo.php', 'servicios-post-covid.php', 'servicios-integracion-laboral.php', 'servicios-transporte-adaptado.php']);
                    ?>
                    <li class="nav-item <?php echo $servicios_active ? 'active' : ''; ?>">
                        <a href="#" class="nav-link">Servicios <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="servicios-centro-dia.php" class="dropdown-link">Centro de día</a></li>
                            <li><a href="servicios-atencion-integral.php" class="dropdown-link">Servicios de atención integral</a></li>
                            <li><a href="servicios-productos-apoyo.php" class="dropdown-link">Productos de apoyo</a></li>
                            <li><a href="servicios-post-covid.php" class="dropdown-link">Post-Covid</a></li>
                            <li><a href="servicios-integracion-laboral.php" class="dropdown-link">Servicio de integración laboral</a></li>
                            <li><a href="servicios-transporte-adaptado.php" class="dropdown-link">Transporte adaptado</a></li>
                        </ul>
                    </li>

                    <!-- Actividades -->
                    <?php 
                    $actividades_active = in_array($current_page, ['actividades-fotos.php', 'actividades-ocio.php']);
                    ?>
                    <li class="nav-item <?php echo $actividades_active ? 'active' : ''; ?>">
                        <a href="#" class="nav-link">Actividades <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="actividades-fotos.php" class="dropdown-link">Fotos</a></li>
                            <li><a href="actividades-ocio.php" class="dropdown-link">Ocio y tiempo libre</a></li>
                        </ul>
                    </li>

                    <!-- Contacto -->
                    <?php 
                    $contacto_active = in_array($current_page, ['contacto-formulario.php', 'contacto-necesidades.php', 'contacto-satisfaccion.php', 'contacto-empleo.php', 'contacto-voluntariado.php']);
                    ?>
                    <li class="nav-item <?php echo $contacto_active ? 'active' : ''; ?>">
                        <a href="#" class="nav-link">Contacto <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="contacto-formulario.php" class="dropdown-link">Formulario de contacto</a></li>
                            <li><a href="contacto-necesidades.php" class="dropdown-link">Formulario de necesidades</a></li>
                            <li><a href="contacto-satisfaccion.php" class="dropdown-link">Formulario de satisfacción de servicios</a></li>
                            <li><a href="contacto-empleo.php" class="dropdown-link">¿Buscas empleo?</a></li>
                            <li><a href="contacto-voluntariado.php" class="dropdown-link">Formulario de voluntariado</a></li>
                        </ul>
                    </li>

                    <!-- Noticias -->
                    <li class="nav-item <?php echo ($current_page == 'noticias.php') ? 'active' : ''; ?>">
                        <a href="noticias.php" class="nav-link">Noticias</a>
                    </li>

                    <!-- Selector de Idioma (al lado de Noticias) -->
                    <li class="nav-item nav-item-language">
                        <div class="language-selector">
                            <div id="gt-wrapper-129" class="gtranslate_wrapper"></div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Scripts de idioma GTranslate (Se inician al principio para evitar fallos de carga) -->
    <script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" data-gt-orig-url="/" data-gt-orig-domain="cocemfeceuta.es" data-gt-widget-id="129" defer></script>
    <script>
        window.gtranslateSettings = window.gtranslateSettings || {};
        window.gtranslateSettings['129'] = {
            "default_language":"es",
            "languages":["en","fr","es"],
            "url_structure":"none",
            "wrapper_selector":"#gt-wrapper-129",
            "globe_size":24,
            "flag_size":20,
            "flag_style":"2d",
            "native_language_names":1,
            "select_language_label":"Idiomas",
            "detect_browser_language":0,
            "horizontal_position":"inline",
            "vertical_position":"inline"
        };
    </script>

