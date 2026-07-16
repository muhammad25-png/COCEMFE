<?php
include 'includes/header.php';
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Rehabilitación Post-Covid</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Servicios</span>
            <span>/</span>
            <span>Post-Covid</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block">
                <h2>Programa de Prevención y Recuperación Post-Covid</h2>
                
                <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 40px; align-items: start; margin-bottom: 40px;">
                    <div>
                        <p style="font-size: 1.15rem; line-height: 1.8; color: var(--text-dark); text-align: justify; margin-bottom: 20px;">
                            Este programa consiste en ofrecer <strong>intervención directa para la prevención y recuperación</strong> por parte de un equipo integrado por un <strong>fisioterapeuta y un logopeda</strong>.
                        </p>
                        <p style="text-align: justify; color: var(--text-light); line-height: 1.7; margin-bottom: 20px;">
                            Trabajamos de manera multidisciplinar, conjunta y coordinada para garantizar la mayor recuperación físico-funcional y cognitiva de la persona que haya superado la enfermedad del COVID-19 y que presente secuelas crónicas o temporales (COVID persistente).
                        </p>
                        <p style="text-align: justify; color: var(--text-light); line-height: 1.7;">
                            Estas secuelas pueden agravar una discapacidad preexistente o predisponer a sufrir a corto y largo plazo limitaciones funcionales o respiratorias, impactando negativamente en la calidad de vida.
                        </p>
                    </div>

                    <!-- Cuadro Destinatarios -->
                    <div style="background-color: var(--bg-light); padding: 30px; border-radius: var(--border-radius-lg); border-top: 4px solid var(--accent-color); box-shadow: var(--shadow-sm);">
                        <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                            <i class="fa fa-users" style="color: var(--accent-color);"></i> ¿A quién va dirigido?
                        </h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px; color: var(--text-dark); font-size: 0.95rem;">
                            <li style="position: relative; padding-left: 20px; font-weight: 500;">
                                <i class="fa fa-angle-right" style="position: absolute; left: 0; top: 3px; color: var(--accent-color); font-weight: bold;"></i>
                                Personas que hayan superado la COVID-19 y presenten secuelas físicas, respiratorias o cognitivas.
                            </li>
                            <li style="position: relative; padding-left: 20px; font-weight: 500;">
                                <i class="fa fa-angle-right" style="position: absolute; left: 0; top: 3px; color: var(--accent-color); font-weight: bold;"></i>
                                De manera preferente, personas derivadas por servicios sanitarios o entidades vinculadas al tratamiento de la enfermedad.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Galería de fotos del servicio -->
                <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.4rem; text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    Imágenes del Servicio de Terapia y Rehabilitación
                </h3>
                
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div style="height: 250px; border-radius: var(--border-radius-md); overflow: hidden; box-shadow: var(--shadow-sm);">
                        <img src="images/servicios/273900326_7678299802195841_963678228708757019_n.jpg" alt="Rehabilitación 1" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                    </div>
                    <div style="height: 250px; border-radius: var(--border-radius-md); overflow: hidden; box-shadow: var(--shadow-sm);">
                        <img src="images/servicios/242036602_4664704310215007_1523701100132887704_n.jpg" alt="Rehabilitación 2" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                    </div>
                    <div style="height: 250px; border-radius: var(--border-radius-md); overflow: hidden; box-shadow: var(--shadow-sm);">
                        <img src="images/servicios/277784420_7931116046914214_8736928304198927283_n.jpg" alt="Rehabilitación 3" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
