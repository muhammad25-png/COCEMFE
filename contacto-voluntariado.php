<?php
include 'includes/header.php';
require_once __DIR__ . '/includes/mail-config.php';
require_once __DIR__ . '/includes/email-templates/voluntariado.php';

$success = false;
$error = '';
$form_data = [
    'name' => '',
    'lastname1' => '',
    'lastname2' => '',
    'dni' => '',
    'age' => '',
    'birthdate' => '',
    'disability_percent' => '',
    'disability_type' => '',
    'address' => '',
    'zipcode' => '',
    'province' => '',
    'phone_fixed' => '',
    'phone_mobile' => '',
    'email' => '',
    'interest_areas' => [],
    'availability_days' => '',
    'availability_hours' => '',
    'has_training' => '',
    'experience_detail' => '',
    'has_experience' => '',
    'motivations' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data['name'] = htmlspecialchars(trim($_POST['name'] ?? ''));
    $form_data['lastname1'] = htmlspecialchars(trim($_POST['lastname1'] ?? ''));
    $form_data['lastname2'] = htmlspecialchars(trim($_POST['lastname2'] ?? ''));
    $form_data['dni'] = htmlspecialchars(trim($_POST['dni'] ?? ''));
    $form_data['age'] = htmlspecialchars(trim($_POST['age'] ?? ''));
    $form_data['birthdate'] = htmlspecialchars(trim($_POST['birthdate'] ?? ''));
    $form_data['disability_percent'] = htmlspecialchars(trim($_POST['disability_percent'] ?? ''));
    $form_data['disability_type'] = htmlspecialchars(trim($_POST['disability_type'] ?? ''));
    $form_data['address'] = htmlspecialchars(trim($_POST['address'] ?? ''));
    $form_data['zipcode'] = htmlspecialchars(trim($_POST['zipcode'] ?? ''));
    $form_data['province'] = htmlspecialchars(trim($_POST['province'] ?? ''));
    $form_data['phone_fixed'] = htmlspecialchars(trim($_POST['phone_fixed'] ?? ''));
    $form_data['phone_mobile'] = htmlspecialchars(trim($_POST['phone_mobile'] ?? ''));
    $form_data['email'] = htmlspecialchars(trim($_POST['email'] ?? ''));
    $form_data['interest_areas'] = $_POST['interest_areas'] ?? [];
    $form_data['availability_days'] = htmlspecialchars(trim($_POST['availability_days'] ?? ''));
    $form_data['availability_hours'] = htmlspecialchars(trim($_POST['availability_hours'] ?? ''));
    $form_data['has_training'] = htmlspecialchars(trim($_POST['has_training'] ?? ''));
    $form_data['experience_detail'] = htmlspecialchars(trim($_POST['experience_detail'] ?? ''));
    $form_data['has_experience'] = htmlspecialchars(trim($_POST['has_experience'] ?? ''));
    $form_data['motivations'] = htmlspecialchars(trim($_POST['motivations'] ?? ''));
    
    $accept = isset($_POST['accept']) ? true : false;

    // Validación simplificada
    if (empty($form_data['name']) || empty($form_data['lastname1']) || empty($form_data['dni']) || empty($form_data['age']) || empty($form_data['birthdate']) || empty($form_data['address']) || empty($form_data['zipcode']) || empty($form_data['phone_mobile'])) {
        $error = 'Todos los campos obligatorios marcados con asterisco (*) deben rellenarse.';
    } elseif (!$accept) {
        $error = 'Debes aceptar la Política de Privacidad para enviar tu solicitud de voluntariado.';
    } else {
        // Guardar en log local como respaldo
        $logFile = __DIR__ . '/includes/form_submissions.log';
        $logData = date('Y-m-d H:i:s') . " - Formulario Voluntariado: " . json_encode($form_data) . "\n";
        @file_put_contents($logFile, $logData, FILE_APPEND);
        
        // Enviar correo con PHPMailer
        $asunto = '🤝 Nueva Solicitud de Voluntariado - ' . $form_data['name'] . ' ' . $form_data['lastname1'];
        $cuerpoHTML = plantillaVoluntariado($form_data);
        $resultado = enviarCorreo($asunto, $cuerpoHTML, null, null, $form_data['email'], trim($form_data['name'] . ' ' . $form_data['lastname1']));
        
        if ($resultado['ok']) {
            $success = true;
            // Reiniciar campos
            $form_data = [
                'name' => '', 'lastname1' => '', 'lastname2' => '', 'dni' => '', 'age' => '', 'birthdate' => '',
                'disability_percent' => '', 'disability_type' => '', 'address' => '', 'zipcode' => '', 'province' => '',
                'phone_fixed' => '', 'phone_mobile' => '', 'email' => '', 'interest_areas' => [],
                'availability_days' => '', 'availability_hours' => '', 'has_training' => '',
                'experience_detail' => '', 'has_experience' => '', 'motivations' => ''
            ];
        } else {
            $error = 'Tu solicitud se ha registrado pero hubo un problema al enviar la notificación por correo. Por favor, contacta con nosotros directamente.';
        }
    }
}
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Formulario de voluntariado</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Contacto</span>
            <span>/</span>
            <span>Formulario de voluntariado</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block" style="max-width: 850px; margin: 0 auto;">
                
                <div class="form-container" style="padding: 40px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md); border-top: 4px solid var(--accent-color);">
                    <h2 style="text-align: center; margin-bottom: 30px;"><i class="fa fa-handshake-o" style="color: var(--accent-color);"></i> Ficha de Inscripción de Voluntariado</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert-message alert-success" style="margin-bottom: 30px;">
                            <i class="fa fa-check-circle"></i> ¡Ficha enviada con éxito! Nos pondremos en contacto contigo para concretar una entrevista. ¡Gracias por querer formar parte de COCEMFE!
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($error)): ?>
                        <div class="alert-message" style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; margin-bottom: 30px;">
                            <i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post" novalidate>
                        
                        <!-- Bloque 1: Datos Personales -->
                        <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px; border-left: 4px solid var(--primary-color);">
                            <h3 style="color: var(--primary-color); font-size: 1.15rem; margin-bottom: 20px; font-family: var(--font-heading);"><i class="fa fa-user"></i> 1. Datos Identificativos</h3>
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_name">Nombre <span style="color: red;">*</span></label>
                                    <input type="text" name="name" id="form_name" class="form-input" required value="<?php echo htmlspecialchars($form_data['name']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_lastname1">Primer Apellido <span style="color: red;">*</span></label>
                                    <input type="text" name="lastname1" id="form_lastname1" class="form-input" required value="<?php echo htmlspecialchars($form_data['lastname1']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_lastname2">Segundo Apellido</label>
                                    <input type="text" name="lastname2" id="form_lastname2" class="form-input" value="<?php echo htmlspecialchars($form_data['lastname2']); ?>">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_dni">DNI / NIE / Pasaporte <span style="color: red;">*</span></label>
                                    <input type="text" name="dni" id="form_dni" class="form-input" required value="<?php echo htmlspecialchars($form_data['dni']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_age">Edad <span style="color: red;">*</span></label>
                                    <input type="number" name="age" id="form_age" class="form-input" required min="16" max="100" value="<?php echo htmlspecialchars($form_data['age']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_birthdate">Fecha de Nacimiento <span style="color: red;">*</span></label>
                                    <input type="text" name="birthdate" id="form_birthdate" class="form-input" required placeholder="DD/MM/AAAA" value="<?php echo htmlspecialchars($form_data['birthdate']); ?>">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_disability_percent">% Discapacidad (Si aplica)</label>
                                    <input type="number" name="disability_percent" id="form_disability_percent" class="form-input" min="0" max="100" placeholder="Ej: 33" value="<?php echo htmlspecialchars($form_data['disability_percent']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_disability_type">Tipo de Discapacidad</label>
                                    <input type="text" name="disability_type" id="form_disability_type" class="form-input" placeholder="Ej: Física, Ninguna..." value="<?php echo htmlspecialchars($form_data['disability_type']); ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Bloque 2: Dirección y Contacto -->
                        <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px; border-left: 4px solid var(--accent-color);">
                            <h3 style="color: var(--primary-color); font-size: 1.15rem; margin-bottom: 20px; font-family: var(--font-heading);"><i class="fa fa-envelope"></i> 2. Dirección y Contacto</h3>

                            <div style="display: grid; grid-template-columns: 1.5fr 0.5fr 1fr; gap: 15px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_address">Domicilio <span style="color: red;">*</span></label>
                                    <input type="text" name="address" id="form_address" class="form-input" required value="<?php echo htmlspecialchars($form_data['address']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_zipcode">C.P. <span style="color: red;">*</span></label>
                                    <input type="text" name="zipcode" id="form_zipcode" class="form-input" required value="<?php echo htmlspecialchars($form_data['zipcode']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_province">Provincia <span style="color: red;">*</span></label>
                                    <input type="text" name="province" id="form_province" class="form-input" required value="<?php echo htmlspecialchars($form_data['province'] ?: 'Ceuta'); ?>">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_phone_fixed">Teléfono Fijo</label>
                                    <input type="tel" name="phone_fixed" id="form_phone_fixed" class="form-input" value="<?php echo htmlspecialchars($form_data['phone_fixed']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_phone_mobile">Teléfono Móvil <span style="color: red;">*</span></label>
                                    <input type="tel" name="phone_mobile" id="form_phone_mobile" class="form-input" required value="<?php echo htmlspecialchars($form_data['phone_mobile']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_email">Email</label>
                                    <input type="email" name="email" id="form_email" class="form-input" value="<?php echo htmlspecialchars($form_data['email']); ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Bloque 3: Preferencias y Disponibilidad -->
                        <div style="background-color: var(--bg-light); padding: 25px; border-radius: var(--border-radius-md); margin-bottom: 30px; border-left: 4px solid var(--primary-color);">
                            <h3 style="color: var(--primary-color); font-size: 1.15rem; margin-bottom: 20px; font-family: var(--font-heading);"><i class="fa fa-calendar-check-o"></i> 3. Preferencias de Voluntariado</h3>

                            <div class="form-group">
                                <label class="form-label">Áreas de participación de interés <span style="color: red;">*</span></label>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 8px;">
                                    <label class="form-checkbox-item"><input type="checkbox" name="interest_areas[]" value="Ocio y tiempo libre" <?php echo in_array('Ocio y tiempo libre', $form_data['interest_areas']) ? 'checked' : ''; ?>> <span>Ocio y tiempo libre</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="interest_areas[]" value="Acompañamiento social" <?php echo in_array('Acompañamiento social', $form_data['interest_areas']) ? 'checked' : ''; ?>> <span>Acompañamiento social</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="interest_areas[]" value="Apoyo en talleres" <?php echo in_array('Apoyo en talleres', $form_data['interest_areas']) ? 'checked' : ''; ?>> <span>Apoyo en talleres de Centro de Día</span></label>
                                    <label class="form-checkbox-item"><input type="checkbox" name="interest_areas[]" value="Administración / Apoyo de oficina" <?php echo in_array('Administración / Apoyo de oficina', $form_data['interest_areas']) ? 'checked' : ''; ?>> <span>Administración y oficina</span></label>
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_availability_days">Días disponibles <span style="color: red;">*</span></label>
                                    <input type="text" name="availability_days" id="form_availability_days" class="form-input" required placeholder="Ej: Lunes, Miércoles..." value="<?php echo htmlspecialchars($form_data['availability_days']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_availability_hours">Horas disponibles <span style="color: red;">*</span></label>
                                    <input type="text" name="availability_hours" id="form_availability_hours" class="form-input" required placeholder="Ej: De 10:00 a 13:00..." value="<?php echo htmlspecialchars($form_data['availability_hours']); ?>">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_training">¿Tienes formación relacionada? <span style="color: red;">*</span></label>
                                    <select name="has_training" id="form_training" class="form-select" required>
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="Sí" <?php echo $form_data['has_training'] === 'Sí' ? 'selected' : ''; ?>>Sí</option>
                                        <option value="No" <?php echo $form_data['has_training'] === 'No' ? 'selected' : ''; ?>>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_experience">¿Tiene experiencia en voluntariado? <span style="color: red;">*</span></label>
                                    <select name="has_experience" id="form_experience" class="form-select" required>
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="Sí" <?php echo $form_data['has_experience'] === 'Sí' ? 'selected' : ''; ?>>Sí</option>
                                        <option value="No" <?php echo $form_data['has_experience'] === 'No' ? 'selected' : ''; ?>>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="form_experience_detail">Si has respondido sí a alguna de las anteriores, expón brevemente tu experiencia:</label>
                                <textarea name="experience_detail" id="form_experience_detail" class="form-input" style="min-height: 80px;"><?php echo htmlspecialchars($form_data['experience_detail']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="form_motivations">Motivaciones y expectativas <span style="color: red;">*</span></label>
                                <textarea name="motivations" id="form_motivations" class="form-input" required style="min-height: 100px;" placeholder="¿Por qué te gustaría hacer voluntariado con nosotros?"><?php echo htmlspecialchars($form_data['motivations']); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-checkbox-item" for="form_accept">
                                <input type="checkbox" name="accept" id="form_accept" required>
                                <span>Acepto que se lleve a cabo el tratamiento de mis datos de carácter voluntario tal y como se detalla en la <a href="politica-privacidad.php" target="_blank" style="text-decoration: underline; color: var(--primary-color); font-weight: bold;">Política de Privacidad</a> <span style="color: red;">*</span></span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">Enviar Solicitud de Voluntariado</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
