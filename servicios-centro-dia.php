<?php
include 'includes/header.php';
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Centro de día</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Servicios</span>
            <span>/</span>
            <span>Centro de día</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block">
                <h2>Carta de Servicios - Centro de Estancia Diurna</h2>
                
                <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 30px; align-items: start; margin-bottom: 40px;">
                    <div>
                        <h3 style="color: var(--primary-color); margin-bottom: 15px; font-family: var(--font-heading); font-size: 1.4rem;">Introducción</h3>
                        <p style="text-align: justify; line-height: 1.7; color: var(--text-light);">
                            El Servicio de Centro de Día para personas mayores y personas con discapacidad en situación de dependencia ofrece atención integral durante el periodo diurno con el objetivo de mantener o mejorar el mayor nivel posible de autonomía personal mediante programas y terapias adaptadas a la situación específica de cada persona.
                        </p>
                        <p style="text-align: justify; line-height: 1.7; color: var(--text-light); margin-top: 15px;">
                            Este servicio está orientado a optimizar la calidad de vida tanto de la persona en situación de dependencia como de su entorno socio-familiar, favoreciendo la permanencia en su medio habitual de vida.
                        </p>
                    </div>
                    <div>
                        <img src="images/banners/discapacidad_1_001.jpg" alt="Centro de Día" style="border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm); width: 100%;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 50px;">
                    <!-- Requisitos Card -->
                    <div style="background-color: var(--bg-light); padding: 30px; border-radius: var(--border-radius-lg); border-top: 4px solid var(--accent-color); box-shadow: var(--shadow-sm);">
                        <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fa fa-info-circle" style="color: var(--accent-color);"></i> Requisitos de Acceso
                        </h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px; color: var(--text-dark);">
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-chevron-right" style="position: absolute; left: 0; top: 6px; color: var(--primary-color); font-size: 0.8rem;"></i>
                                Personas con situación de dependencia reconocida.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-chevron-right" style="position: absolute; left: 0; top: 6px; color: var(--primary-color); font-size: 0.8rem;"></i>
                                Derivación oficial por el IMSERSO.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-chevron-right" style="position: absolute; left: 0; top: 6px; color: var(--primary-color); font-size: 0.8rem;"></i>
                                Copago mensual establecido en función de las normativas del IMSERSO.
                            </li>
                        </ul>
                    </div>

                    <!-- Servicios Ofrecidos Card -->
                    <div style="background-color: var(--bg-light); padding: 30px; border-radius: var(--border-radius-lg); border-top: 4px solid var(--primary-color); box-shadow: var(--shadow-sm);">
                        <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fa fa-check-circle" style="color: var(--primary-color);"></i> Servicios Incluidos
                        </h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 10px; color: var(--text-dark); font-size: 0.95rem;">
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Transporte adaptado para ir y volver del centro.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Atención médica y Enfermería continuada.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Sesiones de Terapia Ocupacional y Fisioterapia.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Control y cuidado de alimentación e higiene personal.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Dinamización sociocultural y actividades recreativas.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Apoyo social, familiar y psicológico.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Servicios de Rehabilitación y Estimulación Cognitiva.
                            </li>
                            <li style="position: relative; padding-left: 25px;">
                                <i class="fa fa-check" style="position: absolute; left: 0; top: 5px; color: var(--accent-color);"></i>
                                Servicios opcionales (podología, etc.).
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Posters / Folletos -->
                <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.5rem; text-align: center; margin-bottom: 25px; border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">Carteles Informativos</h3>
                <div style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap;">
                    <div style="max-width: 45%; flex: 1; min-width: 300px;">
                        <!-- Cartel 1 -->
                        <img src="images/servicios/cartel_centro_dia.png" alt="Cartel Centro de Día" style="border-radius: var(--border-radius-md); box-shadow: var(--shadow-md); width: 100%;">
                    </div>
                    <div style="max-width: 45%; flex: 1; min-width: 300px;">
                        <!-- Cartel 2 -->
                        <img src="images/servicios/cartel_rehabi.png" alt="Cartel Rehabilitación Post-Covid" style="border-radius: var(--border-radius-md); box-shadow: var(--shadow-md); width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
