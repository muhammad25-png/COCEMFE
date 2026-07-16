<?php
include 'includes/header.php';
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Últimas noticias</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Noticias</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block">
                <h2>Actualidad y Novedades de COCEMFE Ceuta</h2>
                <p style="margin-bottom: 40px; color: var(--text-light);">Mantente informado de las últimas actividades, jornadas de sensibilización y acontecimientos relacionados con nuestra federación y las personas con discapacidad en Ceuta.</p>

                <!-- Grid de Noticias -->
                <div style="display: flex; flex-direction: column; gap: 30px; margin-bottom: 50px;">
                    
                    <!-- Noticia 1 -->
                    <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px; background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); transition: transform 0.3s ease;">
                        <div style="height: 220px; overflow: hidden; padding: 15px;">
                            <img src="images/noticias/0_reclamacion.png" alt="COCEMFE Ceuta Reclamaciones" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                        </div>
                        <div style="padding: 30px; display: flex; flex-direction: column; justify-content: center;">
                            <div style="font-size: 0.85rem; color: var(--accent-dark); font-weight: bold; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Sensibilización y Accesibilidad</div>
                            <h3 style="margin-bottom: 12px; font-family: var(--font-heading); font-size: 1.4rem; color: var(--primary-color);">
                                COCEMFE Ceuta: "Queremos más información, servicios adaptados e infraestructuras accesibles"
                            </h3>
                            <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 20px; text-align: justify;">
                                Reclamamos mejoras sustanciales en la accesibilidad urbana, el acceso a información adaptada y la provisión de recursos específicos que permitan una participación plena en igualdad de condiciones para todos los ciudadanos.
                            </p>
                            <a href="https://elpueblodeceuta.es/art/99218/cocemfe-ceuta-queremos-mas-informacion-servicios-adaptados-e-infraestructuras-accesibles" target="_blank" class="btn btn-primary" style="align-self: flex-start; padding: 8px 20px; font-size: 0.9rem;">Leer noticia completa <i class="fa fa-external-link" style="margin-left: 5px;"></i></a>
                        </div>
                    </div>

                    <!-- Noticia 2 -->
                    <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px; background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); transition: transform 0.3s ease;">
                        <div style="height: 220px; overflow: hidden; background-color: white; display: flex; align-items: center; justify-content: center; padding: 15px;">
                            <img src="images/noticias/1_redes.png" alt="Reconoce" style="max-height: 100%; object-fit: contain; border-radius: 10px;">
                        </div>
                        <div style="padding: 30px; display: flex; flex-direction: column; justify-content: center;">
                            <div style="font-size: 0.85rem; color: var(--accent-dark); font-weight: bold; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Voluntariado y Educación</div>
                            <h3 style="margin-bottom: 12px; font-family: var(--font-heading); font-size: 1.4rem; color: var(--primary-color);">
                                Red Reconoce: Ha llegado el momento de EVOLUCIONAR
                            </h3>
                            <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 20px; text-align: justify;">
                                Continuamos con nuestro compromiso y actitud de mejora analizando cómo avanzar en los procesos y servicios que ofrecemos. Siempre con el objetivo de facilitar el trabajo de las entidades de la Red Reconoce y multiplicar el impacto del aprendizaje no formal.
                            </p>
                            <a href="https://youtu.be/yTFjr1johgI?si=6nCtQopKU9dt8m98" target="_blank" class="btn btn-primary" style="align-self: flex-start; padding: 8px 20px; font-size: 0.9rem;">Ver video en YouTube <i class="fa fa-play-circle" style="margin-left: 5px;"></i></a>
                        </div>
                    </div>

                    <!-- Noticia 3 -->
                    <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px; background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); transition: transform 0.3s ease;">
                        <div style="height: 220px; overflow: hidden; padding: 15px;">
                            <img src="images/noticias/2_turismo.jpg" alt="Turismo Inclusivo" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                        </div>
                        <div style="padding: 30px; display: flex; flex-direction: column; justify-content: center;">
                            <div style="font-size: 0.85rem; color: var(--accent-dark); font-weight: bold; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Inclusión Social</div>
                            <h3 style="margin-bottom: 12px; font-family: var(--font-heading); font-size: 1.4rem; color: var(--primary-color);">
                                Turismo Inclusivo en Ceuta
                            </h3>
                            <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 20px; text-align: justify;">
                                42 usuarios de la Confederación Española de Personas con Discapacidad Física y Orgánica (COCEMFE) realizarán diversas actividades turísticas y culturales durante siete días en la ciudad autónoma de Ceuta.
                            </p>
                            <a href="https://elfarodeceuta.es/turismo-inclusivo-42-usuarios-cocemfe-visitaran-ciudad/" target="_blank" class="btn btn-primary" style="align-self: flex-start; padding: 8px 20px; font-size: 0.9rem;">Leer noticia completa <i class="fa fa-external-link" style="margin-left: 5px;"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
