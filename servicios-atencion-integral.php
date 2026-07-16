<?php
include 'includes/header.php';
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Servicios de atención integral</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Servicios</span>
            <span>/</span>
            <span>Servicios de atención integral</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block">
                <h2>Servicios de Atención Integral (SAI)</h2>
                
                <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                    <!-- Requisitos Box -->
                    <div style="background-color: var(--bg-light); padding: 30px; border-radius: var(--border-radius-lg); border-left: 5px solid var(--accent-color); box-shadow: var(--shadow-sm);">
                        <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 20px;">Requisitos de Acceso</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="position: relative; padding-left: 25px; color: var(--text-dark); font-weight: 500;">
                                <i class="fa fa-chevron-right" style="position: absolute; left: 0; top: 6px; color: var(--accent-color);"></i>
                                Certificado de discapacidad física y/u orgánica.
                            </li>
                            <li style="position: relative; padding-left: 25px; color: var(--text-dark); font-weight: 500;">
                                <i class="fa fa-chevron-right" style="position: absolute; left: 0; top: 6px; color: var(--accent-color);"></i>
                                Ser mayor de 18 años (o cumplir la edad mínima de acceso).
                            </li>
                            <li style="position: relative; padding-left: 25px; color: var(--text-dark); font-weight: 500;">
                                <i class="fa fa-chevron-right" style="position: absolute; left: 0; top: 6px; color: var(--accent-color);"></i>
                                Ser residente empadronado en la Ciudad Autónoma de Ceuta.
                            </li>
                        </ul>
                    </div>

                    <!-- Recursos Box -->
                    <div style="background-color: var(--primary-light); padding: 30px; border-radius: var(--border-radius-lg); border-left: 5px solid var(--primary-color); box-shadow: var(--shadow-sm);">
                        <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 20px;">Recursos Profesionales</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 10px;">
                            <li style="display: flex; align-items: center; gap: 10px; color: var(--primary-dark); font-weight: 600;">
                                <i class="fa fa-circle" style="font-size: 0.6rem; color: var(--primary-color);"></i> Terapia Ocupacional
                            </li>
                            <li style="display: flex; align-items: center; gap: 10px; color: var(--primary-dark); font-weight: 600;">
                                <i class="fa fa-circle" style="font-size: 0.6rem; color: var(--primary-color);"></i> Psicología Clínica
                            </li>
                            <li style="display: flex; align-items: center; gap: 10px; color: var(--primary-dark); font-weight: 600;">
                                <i class="fa fa-circle" style="font-size: 0.6rem; color: var(--primary-color);"></i> Enfermería (D.U.E)
                            </li>
                            <li style="display: flex; align-items: center; gap: 10px; color: var(--primary-dark); font-weight: 600;">
                                <i class="fa fa-circle" style="font-size: 0.6rem; color: var(--primary-color);"></i> Atención Sociosanitaria
                            </li>
                            <li style="display: flex; align-items: center; gap: 10px; color: var(--primary-dark); font-weight: 600;">
                                <i class="fa fa-circle" style="font-size: 0.6rem; color: var(--primary-color);"></i> Transporte Adaptado
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Servicios que reciben las personas usuarias -->
                <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 25px; border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    Servicios que reciben las personas usuarias
                </h3>

                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--primary-color); margin-bottom: 8px; font-size: 1.2rem;"><i class="fa fa-brain" style="color: var(--accent-color); margin-right: 8px;"></i> Servicio de estimulación cognitiva</h4>
                        <p style="color: var(--text-light); text-align: justify;">Con ello se evita el deterioro neuronal y se propicia la autonomía intelectual de las personas usuarias.</p>
                    </div>

                    <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--primary-color); margin-bottom: 8px; font-size: 1.2rem;"><i class="fa fa-wheelchair" style="color: var(--accent-color); margin-right: 8px;"></i> Servicio de fisioterapia y terapia ocupacional</h4>
                        <p style="color: var(--text-light); text-align: justify;">Se trabaja continuamente para evitar el deterioro físico y la inmovilidad motora, propiciando el movimiento autónomo.</p>
                    </div>

                    <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--primary-color); margin-bottom: 8px; font-size: 1.2rem;"><i class="fa fa-heartbeat" style="color: var(--accent-color); margin-right: 8px;"></i> Servicio de atención sanitaria y psicológica</h4>
                        <p style="color: var(--text-light); text-align: justify;">Se promueven estilos de vida y actividades saludables. Se realizan seguimientos médicos sistemáticos, enseñando hábitos de higiene corporal y mental, así como la importancia del autocuidado.</p>
                    </div>

                    <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--primary-color); margin-bottom: 8px; font-size: 1.2rem;"><i class="fa fa-user-circle-o" style="color: var(--accent-color); margin-right: 8px;"></i> Servicio de atención personal</h4>
                        <p style="color: var(--text-light); text-align: justify;">A través de talleres de vida diaria (AVD), se ofrecen cuidados básicos de higiene, aseo personal, alimentación, acompañamiento social y apoyo general.</p>
                    </div>

                    <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                        <h4 style="color: var(--primary-color); margin-bottom: 8px; font-size: 1.2rem;"><i class="fa fa-users" style="color: var(--accent-color); margin-right: 8px;"></i> Actividades de Ocio y Tiempo Libre</h4>
                        <p style="color: var(--text-light); text-align: justify;">Fomento de la inclusión mediante la recreación comunitaria, excursiones adaptadas, salidas socioculturales y dinámicas de grupo.</p>
                    </div>
                </div>

                <p style="margin-top: 30px; text-align: center; font-weight: 600; color: var(--primary-color); font-size: 1.1rem; font-style: italic;">
                    De este modo las necesidades más cruciales de nuestras personas usuarias están totalmente cubiertas.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
