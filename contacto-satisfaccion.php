<?php
include 'includes/header.php';
require_once __DIR__ . '/includes/mail-config.php';
require_once __DIR__ . '/includes/email-templates/satisfaccion.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Guardar en log local como respaldo
    $logFile = __DIR__ . '/includes/form_submissions.log';
    $logData = date('Y-m-d H:i:s') . " - Formulario de Satisfacción: " . json_encode($_POST) . "\n";
    @file_put_contents($logFile, $logData, FILE_APPEND);
    
    // Enviar correo con PHPMailer
    $asunto = '📊 Nueva Encuesta de Satisfacción - ' . date('d/m/Y H:i');
    $cuerpoHTML = plantillaSatisfaccion($_POST);
    $resultado = enviarCorreo($asunto, $cuerpoHTML);
    
    if ($resultado['ok']) {
        $success = true;
    } else {
        $error = 'Tu encuesta se ha registrado pero hubo un problema al enviar la notificación por correo.';
    }
}
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Formulario de satisfacción</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Contacto</span>
            <span>/</span>
            <span>Formulario de satisfacción de servicios</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block" style="max-width: 800px; margin: 0 auto;">
                
                <div class="form-container" style="padding: 40px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md); background-color: var(--primary-color); color: white;">
                    <h2 style="text-align: center; margin-bottom: 30px; color: white;"><i class="fa fa-smile-o" style="color: var(--accent-color);"></i> Encuesta de Satisfacción de Usuarios</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert-message alert-success" style="margin-bottom: 30px; background-color: rgba(255,255,255,0.15); color: white; border: 1px solid rgba(255,255,255,0.3);">
                            <i class="fa fa-check-circle"></i> ¡Muchas gracias por tu participación! Tu valoración ha sido enviada y registrada correctamente.
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($error)): ?>
                        <div class="alert-message" style="margin-bottom: 30px; background-color: rgba(231,76,60,0.25); color: #ffcccc; border: 1px solid rgba(231,76,60,0.4);">
                            <i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post" style="color: white;">
                        
                        <!-- Bloque 1: Conocimiento del servicio -->
                        <div style="background-color: rgba(255, 255, 255, 0.08); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px;">
                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_1">1. ¿Conoces los servicios que ofrece COCEMFE Ceuta? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_1" id="q_1" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;">2. En caso afirmativo, ¿cómo nos has conocido? (Marca uno o varios)</label>
                                <div style="display: flex; flex-direction: column; gap: 8px; margin-top: 8px;">
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_2[]" value="A través de nuestra web"> <span style="color: white;">A través de nuestra web</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_2[]" value="A través de redes sociales (Instagram, Facebook...)"> <span style="color: white;">A través de redes sociales (Instagram, Facebook...)</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_2[]" value="A través de otras personas que han utilizado nuestros servicios"> <span style="color: white;">A través de otras personas que han utilizado nuestros servicios</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_2[]" value="A través de otras entidades"> <span style="color: white;">A través de otras entidades</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_2[]" value="A través de otras vías..."> <span style="color: white;">A través de otras vías...</span></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_3">3. ¿Has utilizado en algún momento algunos de los servicios que ofrece COCEMFE Ceuta? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_3" id="q_3" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;">4. En caso afirmativo, ¿Qué servicios has utilizado? (Marca uno o varios)</label>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 8px;">
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Transporte adaptado"> <span style="color: white;">Transporte adaptado</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Servicio de Integración laboral"> <span style="color: white;">Servicio de Integración laboral</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Centro de día"> <span style="color: white;">Centro de día</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Fisioterapia"> <span style="color: white;">Fisioterapia</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Terapia ocupacional"> <span style="color: white;">Terapia ocupacional</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Logopedia"> <span style="color: white;">Logopedia</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Psicología"> <span style="color: white;">Psicología</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Actividades de ocio y tiempo libre"> <span style="color: white;">Actividades de ocio y tiempo libre</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Hipoterapia"> <span style="color: white;">Hipoterapia</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_4[]" value="Hidroterapia"> <span style="color: white;">Hidroterapia</span></label>
                                </div>
                            </div>
                        </div>

                        <!-- Bloque 2: Satisfacción detallada -->
                        <div style="background-color: rgba(255, 255, 255, 0.08); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px;">
                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_5">5. ¿Cuánto tiempo lleva utilizando nuestros servicios? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_5" id="q_5" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Menos de un mes.">Menos de un mes.</option>
                                    <option value="Entre uno y seis meses.">Entre uno y seis meses.</option>
                                    <option value="Entre seis meses y un año.">Entre seis meses y un año.</option>
                                    <option value="Entre uno y tres años.">Entre uno y tres años.</option>
                                    <option value="Más de tres años.">Más de tres años.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_6">6. ¿Cuál es su grado de satisfacción general con los SERVICIOS utilizados? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_6" id="q_6" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Completamente satisfecho.">Completamente satisfecho.</option>
                                    <option value="Satisfecho">Satisfecho</option>
                                    <option value="Insatisfecho">Insatisfecho</option>
                                    <option value="Completamente insatisfecho.">Completamente insatisfecho.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_7">7. ¿Cuál es su grado de satisfacción general con el PERSONAL que trabaja en COCEMFE Ceuta? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_7" id="q_7" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Completamente satisfecho.">Completamente satisfecho.</option>
                                    <option value="Satisfecho.">Satisfecho.</option>
                                    <option value="Insatisfecho.">Insatisfecho.</option>
                                    <option value="Completamente insatisfecho.">Completamente insatisfecho.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_8">8. En comparación con otras alternativas que le hayan ofrecido, COCEMFE Ceuta es... <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_8" id="q_8" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Mucho mejor.">Mucho mejor.</option>
                                    <option value="Más o menos igual.">Más o menos igual.</option>
                                    <option value="Algo peor.">Algo peor.</option>
                                    <option value="Mucho peor.">Mucho peor.</option>
                                    <option value="No lo sé.">No lo sé.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_9">9. ¿Continuará usted utilizando los servicios que ofrece COCEMFE Ceuta? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_9" id="q_9" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Seguro que sí.">Seguro que sí.</option>
                                    <option value="Probablemente sí.">Probablemente sí.</option>
                                    <option value="Puede que sí, puede que no.">Puede que sí, puede que no.</option>
                                    <option value="Probablemente no.">Probablemente no.</option>
                                    <option value="Seguro que no.">Seguro que no.</option>
                                </select>
                            </div>
                        </div>

                        <!-- Bloque 3: Valoración de necesidades y opinión -->
                        <div style="background-color: rgba(255, 255, 255, 0.08); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px;">
                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_10">10. ¿Añadiría usted algún servicio a los que ya ofrecemos? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_10" id="q_10" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_11">11. En caso afirmativo, ¿qué servicio añadiría? (Escríbelo)</label>
                                <input type="text" name="q_11" id="q_11" class="form-input" style="background-color: white; color: var(--text-dark);" placeholder="Escribe el servicio...">
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_12">12. ¿Ha recomendado usted COCEMFE Ceuta a otras personas? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_12" id="q_12" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_13">13. En su opinión, ¿vale la pena utilizar los servicios que ofrece COCEMFE Ceuta? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_13" id="q_13" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Totalmente de acuerdo.">Totalmente de acuerdo.</option>
                                    <option value="De acuerdo.">De acuerdo.</option>
                                    <option value="En desacuerdo.">En desacuerdo.</option>
                                    <option value="Totalmente en desacuerdo.">Totalmente en desacuerdo.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_14">14. ¿Considera que los servicios cubren sus necesidades? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_14" id="q_14" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No / Son insuficientes">No / Son insuficientes</option>
                                    <option value="No sabe / No contesta">No sabe / No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_15">15. ¿Consideras que COCEMFE Ceuta ofrece servicios de calidad? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_15" id="q_15" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Totalmente de acuerdo.">Totalmente de acuerdo.</option>
                                    <option value="De acuerdo.">De acuerdo.</option>
                                    <option value="En desacuerdo.">En desacuerdo.</option>
                                    <option value="Totalmente en desacuerdo.">Totalmente en desacuerdo.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_16">16. ¿Consideras que los usuarios conocen bien los servicios de COCEMFE? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_16" id="q_16" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Totalmente de acuerdo.">Totalmente de acuerdo.</option>
                                    <option value="De acuerdo.">De acuerdo.</option>
                                    <option value="En desacuerdo.">En desacuerdo.</option>
                                    <option value="Totalmente en desacuerdo.">Totalmente en desacuerdo.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_17">17. ¿La oficina de atención al usuario atiende bien las necesidades de los usuarios? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_17" id="q_17" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Totalmente de acuerdo.">Totalmente de acuerdo.</option>
                                    <option value="De acuerdo.">De acuerdo.</option>
                                    <option value="En desacuerdo.">En desacuerdo.</option>
                                    <option value="Totalmente en desacuerdo.">Totalmente en desacuerdo.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_18">18. ¿Recomendaría usted COCEMFE Ceuta a otras personas? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_18" id="q_18" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Es muy probable.">Es muy probable.</option>
                                    <option value="Es probable.">Es probable.</option>
                                    <option value="No es probable.">No es probable.</option>
                                    <option value="Es muy improbable.">Es muy improbable.</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_19">19. ¿Ha tenido usted alguna incidencia con nuestros servicios? <span style="color: var(--accent-color);">*</span></label>
                                <select name="q_19" id="q_19" class="form-select" required style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_20">20. En caso afirmativo, ¿se resolvió dicha incidencia?</label>
                                <select name="q_20" id="q_20" class="form-select" style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_21">21. ¿Está satisfecho con la forma en la que se resolvió la incidencia?</label>
                                <select name="q_21" id="q_21" class="form-select" style="background-color: white; color: var(--text-dark);">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_22">22. De todos los servicios que ofrecemos, ¿Cuál es el más necesario para usted? <span style="color: var(--accent-color);">*</span></label>
                                <input type="text" name="q_22" id="q_22" class="form-input" required style="background-color: white; color: var(--text-dark);" placeholder="Escribe el servicio...">
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_23">23. ¿Tiene alguna sugerencia adicional sobre los servicios?</label>
                                <textarea name="q_23" id="q_23" class="form-input" style="background-color: white; color: var(--text-dark); min-height: 100px;" placeholder="Tu sugerencia..."></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" style="color: white;" for="q_24">24. En una escala del 1 al 10, ¿Cuál es tu nivel de satisfacción general hoy con COCEMFE Ceuta? <span style="color: var(--accent-color);">*</span></label>
                                <input type="number" name="q_24" id="q_24" class="form-input" required min="1" max="10" placeholder="De 1 a 10" style="background-color: white; color: var(--text-dark);">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-checkbox-item" for="form_accept">
                                <input type="checkbox" name="accept" id="form_accept" required>
                                <span style="color: white;">Acepto el tratamiento de mis datos personales para evaluar mi grado de satisfacción según la <a href="politica-privacidad.php" target="_blank" style="text-decoration: underline; color: var(--accent-color); font-weight: bold;">Política de Privacidad</a> <span style="color: var(--accent-color);">*</span></span>
                            </label>
                        </div>

                        <button type="submit" class="btn" style="width: 100%; background-color: var(--accent-color); color: white;">Enviar Encuesta de Satisfacción</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
