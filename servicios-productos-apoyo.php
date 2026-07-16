<?php
include 'includes/header.php';
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Productos de apoyo</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Servicios</span>
            <span>/</span>
            <span>Productos de apoyo</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block">
                <h2>Préstamo de Productos de Apoyo</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: var(--text-dark); margin-bottom: 40px; text-align: justify;">
                    Este programa consiste en el <strong>préstamo temporal de productos de apoyo</strong> a personas con discapacidad física y/u orgánica con movilidad reducida, o personas que se encuentran en estado de movilidad reducida temporal. Nuestro objetivo es facilitar la autonomía personal, la accesibilidad y mejorar la calidad de vida diaria y la integración comunitaria.
                </p>

                <!-- Product Grid -->
                <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 25px; border-bottom: 2px solid var(--accent-color); padding-bottom: 10px;">
                    Catálogo de Productos disponibles para Préstamo
                </h3>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; margin-bottom: 40px;">
                    <!-- Silla de ruedas -->
                    <div style="background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); text-align: center;">
                        <div style="height: 220px; overflow: hidden; background-color: white; display: flex; align-items: center; justify-content: center; padding: 15px;">
                            <img src="images/productapoyo/0_sillaruedas.jpg" alt="Silla de ruedas" style="max-height: 100%; object-fit: contain;">
                        </div>
                        <div style="padding: 20px;">
                            <h4 style="color: var(--primary-color); font-family: var(--font-heading); margin-bottom: 8px;">Sillas de ruedas</h4>
                            <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.4;">Sillas de ruedas manuales, ligeras y plegables, adaptadas para facilitar el traslado y autopropulsión.</p>
                        </div>
                    </div>

                    <!-- Muletas -->
                    <div style="background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); text-align: center;">
                        <div style="height: 220px; overflow: hidden; background-color: white; display: flex; align-items: center; justify-content: center; padding: 15px;">
                            <img src="images/productapoyo/1_muleta.jpg" alt="Muletas" style="max-height: 100%; object-fit: contain;">
                        </div>
                        <div style="padding: 20px;">
                            <h4 style="color: var(--primary-color); font-family: var(--font-heading); margin-bottom: 8px;">Muletas</h4>
                            <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.4;">Bastones ingleses (muletas) regulables en altura con empuñadura ergonómica para facilitar la marcha.</p>
                        </div>
                    </div>

                    <!-- Andador -->
                    <div style="background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); text-align: center;">
                        <div style="height: 220px; overflow: hidden; background-color: white; display: flex; align-items: center; justify-content: center; padding: 15px;">
                            <img src="images/productapoyo/2_andador.jpg" alt="Andador" style="max-height: 100%; object-fit: contain;">
                        </div>
                        <div style="padding: 20px;">
                            <h4 style="color: var(--primary-color); font-family: var(--font-heading); margin-bottom: 8px;">Andadores</h4>
                            <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.4;">Andadores con ruedas, frenos en manetas, asiento y cesta portaobjetos, idóneos para interiores y exteriores.</p>
                        </div>
                    </div>

                    <!-- Silla de baño -->
                    <div style="background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); text-align: center;">
                        <div style="height: 220px; overflow: hidden; background-color: white; display: flex; align-items: center; justify-content: center; padding: 15px;">
                            <img src="images/productapoyo/3_silladucha.jpg" alt="Silla de baño" style="max-height: 100%; object-fit: contain;">
                        </div>
                        <div style="padding: 20px;">
                            <h4 style="color: var(--primary-color); font-family: var(--font-heading); margin-bottom: 8px;">Sillas de baño / ducha</h4>
                            <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.4;">Sillas de ducha con ruedas e inodoro incorporado, con materiales inoxidables y seguras para el aseo diario.</p>
                        </div>
                    </div>

                    <!-- Anfibuggy -->
                    <div style="background-color: var(--bg-light); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); text-align: center;">
                        <div style="height: 220px; overflow: hidden; background-color: white; display: flex; align-items: center; justify-content: center; padding: 15px;">
                            <img src="images/productapoyo/4_anfibuggy.png" alt="Anfibuggy" style="max-height: 100%; object-fit: contain;">
                        </div>
                        <div style="padding: 20px;">
                            <h4 style="color: var(--primary-color); font-family: var(--font-heading); margin-bottom: 8px;">Anfibuggy (Silla Anfibia)</h4>
                            <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.4;">Silla adaptada para el baño en playas y piscinas, que facilita la accesibilidad y disfrute en el medio acuático.</p>
                        </div>
                    </div>
                </div>

                <!-- Condiciones de Préstamo -->
                <div style="background-color: var(--primary-light); padding: 30px; border-radius: var(--border-radius-lg); border-top: 4px solid var(--primary-color); margin-top: 30px;">
                    <h3 style="color: var(--primary-color); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 15px;">¿Cómo solicitar un Producto de Apoyo?</h3>
                    <p style="color: var(--primary-dark); line-height: 1.6; margin-bottom: 15px;">
                        Para solicitar el préstamo de cualquiera de nuestros productos de apoyo disponibles, puedes ponerte en contacto con nuestro departamento de administración o acudir a nuestra sede social. 
                    </p>
                    <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 8px; color: var(--primary-dark); font-weight: 500;">
                        <li><i class="fa fa-phone" style="color: var(--accent-color); margin-right: 8px;"></i> Teléfono: <strong>956 52 20 91</strong></li>
                        <li><i class="fa fa-envelope" style="color: var(--accent-color); margin-right: 8px;"></i> Email: <strong>silceuta@gmail.com</strong></li>
                        <li><i class="fa fa-clock-o" style="color: var(--accent-color); margin-right: 8px;"></i> Horario de Atención: <strong>Lunes a Viernes de 10:00 a 13:00</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
