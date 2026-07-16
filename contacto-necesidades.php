<?php
include 'includes/header.php';
require_once __DIR__ . '/includes/mail-config.php';
require_once __DIR__ . '/includes/email-templates/necesidades.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Guardar en log local como respaldo
    $logFile = __DIR__ . '/includes/form_submissions.log';
    $logData = date('Y-m-d H:i:s') . " - Formulario de Necesidades: " . json_encode($_POST) . "\n";
    @file_put_contents($logFile, $logData, FILE_APPEND);
    
    // Enviar correo con PHPMailer
    $asunto = '📋 Nuevo Cuestionario de Necesidades - ' . date('d/m/Y H:i');
    $cuerpoHTML = plantillaNecesidades($_POST);
    $email_usuario = $_POST['email'] ?? null;
    $nombre_usuario = $_POST['name'] ?? null;
    $resultado = enviarCorreo($asunto, $cuerpoHTML, null, null, $email_usuario, $nombre_usuario);
    
    if ($resultado['ok']) {
        $success = true;
    } else {
        $error = 'Tu cuestionario se ha registrado pero hubo un problema al enviar la notificación por correo.';
    }
}
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Formulario de necesidades</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Contacto</span>
            <span>/</span>
            <span>Formulario de necesidades</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block" style="max-width: 800px; margin: 0 auto;">
                
                <div class="form-container" style="padding: 40px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                    <h2 style="text-align: center; margin-bottom: 30px;"><i class="fa fa-clipboard" style="color: var(--accent-color);"></i> Cuestionario de Detección de Necesidades</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert-message alert-success" style="margin-bottom: 30px;">
                            <i class="fa fa-check-circle"></i> ¡Muchas gracias! Tu cuestionario ha sido enviado y registrado correctamente. Evaluaremos tus respuestas para seguir mejorando nuestros servicios.
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($error)): ?>
                        <div class="alert-message" style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; margin-bottom: 30px;">
                            <i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post">
                        
                        <!-- Bloque 1: Perfil General -->
                        <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px; border-left: 4px solid var(--primary-color);">
                            <h3 style="color: var(--primary-color); font-size: 1.15rem; margin-bottom: 20px; font-family: var(--font-heading);"><i class="fa fa-user"></i> 1. Información General</h3>
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_name">Nombre completo <span style="color: red;">*</span></label>
                                    <input type="text" name="name" id="form_name" class="form-input" required placeholder="Ej: Juan Pérez">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_email">Correo electrónico <span style="color: red;">*</span></label>
                                    <input type="email" name="email" id="form_email" class="form-input" required placeholder="Ej: juan@ejemplo.com">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_ceuta">¿Eres de Ceuta? <span style="color: red;">*</span></label>
                                <select name="q_ceuta" id="q_ceuta" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_gender">¿Cuál es tu género? <span style="color: red;">*</span></label>
                                <select name="q_gender" id="q_gender" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                    <option value="No binario">No binario</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_cocemfe_serv">¿Has utilizado en algún momento algunos de los servicios que ofrece COCEMFE Ceuta? <span style="color: red;">*</span></label>
                                <select name="q_cocemfe_serv" id="q_cocemfe_serv" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Bloque 2: Discapacidad y Ayudas Técnicas -->
                        <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px; border-left: 4px solid var(--accent-color);">
                            <h3 style="color: var(--primary-color); font-size: 1.15rem; margin-bottom: 20px; font-family: var(--font-heading);"><i class="fa fa-wheelchair"></i> 2. Discapacidad y Autonomía</h3>

                            <div class="form-group">
                                <label class="form-label" for="q_discapacidad">¿Tiene algún tipo de discapacidad reconocida por el IMSERSO? <span style="color: red;">*</span></label>
                                <select name="q_discapacidad" id="q_discapacidad" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">En caso afirmativo, ¿Qué tipo de discapacidad tiene reconocida?</label>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 8px;">
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_tipo_discapacidad[]" value="Física/Orgánica"> <span>Física / Orgánica</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_tipo_discapacidad[]" value="Intelectual"> <span>Intelectual</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_tipo_discapacidad[]" value="Mental"> <span>Mental</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_tipo_discapacidad[]" value="Auditiva"> <span>Auditiva</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_tipo_discapacidad[]" value="Visual"> <span>Visual</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_tipo_discapacidad[]" value="Sensorial"> <span>Sensorial</span></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_ayudas_tecnicas">¿Utiliza algún tipo de ayuda técnica o apoyo personal? <span style="color: red;">*</span></label>
                                <select name="q_ayudas_tecnicas" id="q_ayudas_tecnicas" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Ayuda técnica">Ayuda técnica</option>
                                    <option value="Apoyo personal">Apoyo personal</option>
                                    <option value="Ambas">Ambas</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_necesidad_ayudas">En caso negativo, ¿Considera que necesitaría recibir ayudas técnicas para cubrir sus necesidades?</label>
                                <select name="q_necesidad_ayudas" id="q_necesidad_ayudas" class="form-select">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_dificultad_ayuda">En caso afirmativo, ¿Qué nivel de dificultad tiene cuando utiliza esa ayuda técnica?</label>
                                <select name="q_dificultad_ayuda" id="q_dificultad_ayuda" class="form-select">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sin dificultad">Sin dificultad</option>
                                    <option value="Con poca dificultad">Con poca dificultad</option>
                                    <option value="Dificultad moderada">Dificultad moderada</option>
                                    <option value="Gran dificultad">Gran dificultad</option>
                                    <option value="No puede realizar la actividad por sí mismo.">No puede realizar la actividad por sí mismo.</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_satisfaccion_apoyo">¿Considera que los apoyos personales o ayudas técnicas que recibe actualmente satisfacen sus necesidades? <span style="color: red;">*</span></label>
                                <select name="q_satisfaccion_apoyo" id="q_satisfaccion_apoyo" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No, son insuficientes">No, son insuficientes</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>
                        </div>

                        <!-- Bloque 3: Comunicación y Cuidados -->
                        <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px; border-left: 4px solid var(--primary-color);">
                            <h3 style="color: var(--primary-color); font-size: 1.15rem; margin-bottom: 20px; font-family: var(--font-heading);"><i class="fa fa-comments"></i> 3. Comunicación y Asistencia</h3>

                            <div class="form-group">
                                <label class="form-label" for="q_dificultad_habla">Por problemas de salud o discapacidad, ¿tiene una dificultad importante para hablar de manera comprensible sin ayudas externas? <span style="color: red;">*</span></label>
                                <select name="q_dificultad_habla" id="q_dificultad_habla" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_conversacion">¿Con qué nivel de dificultad diría que puede mantener una conversación a través del lenguaje hablado, escrito u otro? <span style="color: red;">*</span></label>
                                <select name="q_conversacion" id="q_conversacion" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sin dificultad">Sin dificultad</option>
                                    <option value="Con dificultad moderada">Con dificultad moderada</option>
                                    <option value="Con gran dificultad">Con gran dificultad</option>
                                    <option value="No puede realizar la actividad">No puede realizar la actividad</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_cuidados_externos">Debido a su discapacidad, ¿recibe asistencia o cuidados personales de alguna persona que no reside en su hogar? <span style="color: red;">*</span></label>
                                <select name="q_cuidados_externos" id="q_cuidados_externos" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">¿De qué persona o personas recibe asistencia o cuidados personales? (Señala varias opciones se aplica) <span style="color: red;">*</span></label>
                                <div style="display: grid; grid-template-columns: 1fr; gap: 8px; margin-top: 8px;">
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Pareja"> <span>De mi pareja (marido, mujer, ...)</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Padre/Madre"> <span>De mi padre/madre</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Hijos/Hijas"> <span>De mis hijos/hijas</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Otros familiares"> <span>De otros familiares</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Empleado del hogar"> <span>De una persona empleada en el hogar</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Profesional sociosanitario"> <span>De un profesional sociosanitario</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Asistente personal"> <span>De un asistente personal</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="Otras personas"> <span>De otras personas que no residen en el hogar</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="q_procedencia_ayuda[]" value="No sabe/No contesta"> <span>No sabe / No contesta</span></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_satisfaccion_asistencia">¿Considera que la ayuda que recibe de esa/s persona/s satisface sus necesidades? <span style="color: red;">*</span></label>
                                <select name="q_satisfaccion_asistencia" id="q_satisfaccion_asistencia" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No, es insuficiente">No, es insuficiente</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_necesidad_fuera">¿Considera que necesita asistencia o cuidados personales fuera de su domicilio debidos a su/s discapacidades? <span style="color: red;">*</span></label>
                                <select name="q_necesidad_fuera" id="q_necesidad_fuera" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No, es insuficiente">No, es insuficiente</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>
                        </div>

                        <!-- Bloque 4: Dependencia y Entorno -->
                        <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px; border-left: 4px solid var(--accent-color);">
                            <h3 style="color: var(--primary-color); font-size: 1.15rem; margin-bottom: 20px; font-family: var(--font-heading);"><i class="fa fa-building"></i> 4. Dependencia e Integración Social</h3>

                            <div class="form-group">
                                <label class="form-label" for="q_dep_imserso">¿Tiene reconocida la situación de dependencia por parte del IMSERSO? <span style="color: red;">*</span></label>
                                <select name="q_dep_imserso" id="q_dep_imserso" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_serv_imserso">¿Conoce los servicios que ofrece el IMSERSO a las personas con un grado de dependencia reconocida? <span style="color: red;">*</span></label>
                                <select name="q_serv_imserso" id="q_serv_imserso" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_asoc_ceuta">¿Conoces más entidades en Ceuta que trabajan en favor de las personas con discapacidad como COCEMFE Ceuta? <span style="color: red;">*</span></label>
                                <select name="q_asoc_ceuta" id="q_asoc_ceuta" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí, alguna conozco">Sí, alguna conozco</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_info_recursos">¿Necesita más información sobre los recursos que se ofrecen relacionados con la discapacidad? <span style="color: red;">*</span></label>
                                <select name="q_info_recursos" id="q_info_recursos" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_empleo">En la actualidad y a causa de su discapacidad, ¿encuentra dificultades para encontrar trabajo? <span style="color: red;">*</span></label>
                                <select name="q_empleo" id="q_empleo" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sí">Sí</option>
                                    <option value="No">No</option>
                                    <option value="No sabe/No contesta">No sabe/No contesta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="q_tics">¿Encuentra dificultades para utilizar con normalidad las TIC (móvil, ordenador, cajeros automáticos, etc.)? <span style="color: red;">*</span></label>
                                <select name="q_tics" id="q_tics" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Sin dificultad">Sin dificultad</option>
                                    <option value="Con dificultad moderada">Con dificultad moderada</option>
                                    <option value="Con gran dificultad">Con gran dificultad</option>
                                    <option value="No puede realizar la actividad">No puede realizar la actividad</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-checkbox-item" for="form_accept">
                                <input type="checkbox" name="accept" id="form_accept" required>
                                <span>Acepto de forma expresa el tratamiento de mis datos de carácter personal para este cuestionario según la <a href="politica-privacidad.php" target="_blank" style="text-decoration: underline; color: var(--primary-color); font-weight: bold;">Política de Privacidad</a> <span style="color: red;">*</span></span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">Enviar Respuestas</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
