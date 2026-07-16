<?php
// Incluir la cabecera
include 'includes/header.php';
?>

<!-- 1. SLIDESHOW HERO -->
<section class="hero-slider">
    <!-- Patrones SVG de fondo para la estética original -->
    <div class="slider-patterns-left">
        <svg viewBox="0 0 349 477" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 24L73.6122 66.5V151.5L0 194L-73.6122 151.5V66.5L0 24Z" class="base-pattern-3"/>
            <path d="M110 99L140.311 116.5V151.5L110 169L79.6891 151.5V116.5L110 99Z" class="base-pattern-3"/>
            <path d="M76 158L106.311 175.5V210.5L76 228L45.6891 210.5V175.5L76 158Z" class="base-pattern-2"/>
            <path d="M187 133L260.612 175.5V260.5L187 303L113.388 260.5V175.5L187 133Z" class="base-pattern-1"/>
            <path d="M55 407L85.3109 424.5V459.5L55 477L24.6891 459.5V424.5L55 407Z" class="base-pattern-1"/>
            <path d="M264 0L337.612 42.5V127.5L264 170L190.388 127.5V42.5L264 0Z" class="base-pattern-2"/>
            <path d="M298 158L328.311 175.5V210.5L298 228L267.689 210.5V175.5L298 158Z" class="base-pattern-3"/>
        </svg>
    </div>
    <div class="slider-patterns-right">
        <svg viewBox="0 0 673 403" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M671 213L744.612 255.5V340.5L671 383L597.388 340.5V255.5L671 213Z" class="base-pattern-2"/>
            <path d="M594 80L667.612 122.5V207.5L594 250L520.388 207.5V122.5L594 80Z" class="base-pattern-1"/>
            <path d="M561 239L591.311 256.5V291.5L561 309L530.689 291.5V256.5L561 239Z" class="base-pattern-3"/>
            <path d="M626 22L656.311 39.5V74.5L626 92L595.689 74.5V39.5L626 22Z" class="base-pattern-3"/>
            <path d="M593.5 0L608.655 8.75V26.25L593.5 35L578.345 26.25V8.75L593.5 0Z" class="base-pattern-2"/>
        </svg>
    </div>

    <!-- Slides -->
    <div class="slide active">
        <img src="images/carrusel/0_dic3.jpg" alt="Día internacional de la discapacidad">
        <div class="slide-content">
            <h2>3 DE DICIEMBRE</h2>
            <p>Día internacional de las personas con discapacidad</p>
        </div>
    </div>
    <div class="slide">
        <img src="images/carrusel/3_aguaterapia.png" alt="Hidroterapia">
        <div class="slide-content">
            <h2>HIDROTERAPIA</h2>
            <p>La hidroterapia se basa en la utilización del agua con fines terapéuticos para prevenir y tratar diferentes tipos de dolencias musculares.</p>
        </div>
    </div>
    <div class="slide">
        <img src="images/carrusel/2_solidaria.png" alt="Frase de motivación">
        <div class="slide-content">
            <h2>MOTIVACIÓN</h2>
            <p>“El miedo es la más grande discapacidad de todas” - Nick Vujicic</p>
        </div>
    </div>
    <div class="slide">
        <img src="images/carrusel/4_app.jpg" alt="App oficial">
        <div class="slide-content">
            <h2>APP OFICIAL</h2>
            <p>Descárgate la app de la página oficial de COCEMFE para mantenerte informado.</p>
        </div>
    </div>

    <!-- Navegación Slider -->
    <button class="slider-arrow slider-arrow-prev"><i class="fa fa-angle-left"></i></button>
    <button class="slider-arrow slider-arrow-next"><i class="fa fa-angle-right"></i></button>
    <div class="slider-dots"></div>
</section>

<!-- 2. SECCIÓN MANIFIESTO -->
<section class="manifesto-section section-padding">
    <div class="container">
        <div class="manifesto-grid">
            <!-- Ficha Presidenta -->
            <div class="president-card">
                <img src="images/quienesomos/Presidenta.jpg" alt="Mª del Carmen Nieto Segovia">
                <h3 class="president-name">Mª del Carmen Nieto Segovia</h3>
                <span class="president-title">Presidenta</span>
            </div>

            <!-- Manifiesto -->
            <div class="manifesto-text">
                <h2>El manifiesto</h2>
                <div class="manifesto-content">
                    <p>Este año 2024, COCEMFE Ceuta cumplió 25 años, por ello quiero manifestar en mi nombre y en el de todo el equipo que forma parte de COCEMFE Ceuta el agradecimiento al motor de toda nuestra entidad.</p>
                    <p>En todos estos años hemos tenido el placer de disfrutar de personas maravillosas que nos brindan su amor incondicional: Nuestras personas usuarias. No seríamos nada sin ellos, una sonrisa de cada uno de ellos hace que todo lo malo merezca la pena.</p>
                    <p>Agradeciendo todos estos años de apoyo, porque el camino es arduo pero vale la pena, porque prometemos seguir luchando, si en 25 años hemos conseguido todo esto, imaginaros si nos dejáis 25 años más….</p>
                    <p>Seguimos mirando hacia el horizonte… gracias por tanto, os queremos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. CUADRÍCULA DE FOTOS INTERMEDIA -->
<section class="section-padding" style="padding-top: 0;">
    <div class="container">
        <!-- Fila superior: 2 fotos grandes -->
        <div class="photos-grid">
            <div class="photo-item">
                <img src="images/tablon/co1.jpg" alt="Tablón COCEMFE 1">
            </div>
            <div class="photo-item">
                <img src="images/tablon/co3.jpg" alt="Tablón COCEMFE 2">
            </div>
        </div>
        <!-- Fila inferior: 3 fotos pequeñas -->
        <div class="photos-subgrid-3">
            <div class="photo-item">
                <img src="images/tablon/co2.jpg" alt="Tablón COCEMFE 3">
            </div>
            <div class="photo-item">
                <img src="images/tablon/co4.jpg" alt="Tablón COCEMFE 4">
            </div>
            <div class="photo-item">
                <img src="images/tablon/co5.jpg" alt="Tablón COCEMFE 5">
            </div>
        </div>
    </div>
</section>

<!-- 4. SECCIÓN INSTALACIONES (Efecto Panal Hexagonal) -->
<section class="installations-section section-padding">
    <div class="container">
        <h2 class="section-title">Instalaciones</h2>
        
        <div class="hex-grid-container">
            <!-- <div class="hex-grid formateado"> -->
                
                <ul class="honeycomb" lang="es">

                    <!--
                    <li class="honeycomb-cell">
                        <img class="honeycomb-cell__image" src="images/0-imagen.jpg" alt="imagen">
                        <div class="honeycomb-cell__title">imagen</div>
                    </li>
                    -->
                    
                    <?php
                    // 1. Define la ruta de tu carpeta
                    $ruta_carpeta = 'images/Instalaciones/'; 

                    if (is_dir($ruta_carpeta)) {
                        $archivos = scandir($ruta_carpeta);
                        
                        // ORDENACIÓN NATURAL: Ordena correctamente '2-texto' antes que '12-texto'
                        natsort($archivos);
                        
                        foreach ($archivos as $archivo) {
                            // Saltar directorios especiales del sistema
                            if ($archivo === '.' || $archivo === '..') {
                                continue;
                            }

                            $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                                
                                $nombre_sin_ext = pathinfo($archivo, PATHINFO_FILENAME);
                                
                                // ELIMINAR ORDEN: Borra los dígitos iniciales y el guion medio (Ej: '1-', '10-', '100-')
                                $nombre_filtrado = preg_replace('/^\d+-/', '', $nombre_sin_ext);
                                
                                // LIMPIAR TEXTO: Reemplaza los guiones bajos restantes por espacios
                                $nombre_final = str_replace('_', ' ', $nombre_filtrado);

                                // CORRECCIÓN: Cada imagen debe ser su propia celda de la estructura
                                ?> 
                                <li class="honeycomb-cell">
                                    <img class="honeycomb-cell__image" src="<?php echo htmlspecialchars($ruta_carpeta . $archivo . '?t=' . time()); ?>" alt="<?php echo htmlspecialchars($nombre_final); ?>"/>
                                    <div class="honeycomb-cell__title"><?php echo htmlspecialchars($nombre_final); ?></div>
                                </li>
                                <?php
                            }
                        }
                    } else {
                        ?> <span>Error: La carpeta especificada no existe.</span> <?php
                    }
                    ?>

                    <li class="honeycomb-cell honeycomb__placeholder"></li>
                </ul>

            <!-- </div> -->
        </div>
    </div>
</section>

<!-- 5. SECCIÓN REDES SOCIALES -->
<section class="feeds-section section-padding">
    <div class="container">
        <h2 class="section-title">Nuestras redes</h2>
        <div class="feeds-grid">
            <!-- Facebook Feed -->
            <div class="feed-box">
                <h3><i class="fa fa-facebook"></i> Facebook</h3>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCocemfeCE%2F%3Flocale%3Des_ES&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>

            <!-- Instagram Feed Alternative -->
            <div class="feed-box instagram-box">
                <h3><i class="fa fa-instagram"></i> Instagram</h3>
                <div class="instagram-cta">
                    <div class="instagram-icon-wrapper">
                        <i class="fa fa-instagram"></i>
                    </div>
                    <h4>@cocemfe_ceuta</h4>
                    <p>Descubre nuestro día a día, noticias y eventos de primera mano en nuestro perfil oficial de Instagram.</p>
                    <a href="https://www.instagram.com/cocemfe_ceuta/" target="_blank" class="btn-instagram-link">Ver Perfil en Instagram</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. SECCIÓN DÓNDE ENCONTRARNOS / MAPAS -->
<section class="maps-section section-padding">
    <div class="container">
        <h2 class="section-title">Dónde encontrarnos</h2>
        <div class="maps-grid">
            <!-- Google Map -->
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d808.1323685564919!2d-5.3405292304410885!3d35.88504598483882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0ca3d868e3a75f%3A0x93c2f81e5996576d!2sC. Capit%C3%A1n Claudio V%C3%A1zquez%2C 16%2C 51002 Ceuta%2C NULL!5e0!3m2!1ses!2ses!4v1712223281068!5m2!1ses!2ses" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- Google Street View -->
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1712223388062!6m8!1m7!1sJ0Ig4xTM-5VSh-_R5CVd6g!2m2!1d35.88495989658486!2d-5.33991371244995!3f190.82!4f-9.400000000000006!5f0.5970117501821992" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<?php
// Incluir el pie de página
include 'includes/footer.php';
?>
