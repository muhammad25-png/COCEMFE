<?php
include 'includes/header.php';
require_once __DIR__ . '/includes/mail-config.php';
require_once __DIR__ . '/includes/email-templates/contacto.php';

$success = false;
$error = '';
$form_data = [
    'name' => '',
    'lastname' => '',
    'email' => '',
    'phone' => '',
    'department' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data['name'] = htmlspecialchars(trim($_POST['name'] ?? ''));
    $form_data['lastname'] = htmlspecialchars(trim($_POST['lastname'] ?? ''));
    $form_data['email'] = htmlspecialchars(trim($_POST['email'] ?? ''));
    $form_data['phone'] = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $form_data['department'] = htmlspecialchars(trim($_POST['department'] ?? ''));
    $accept = isset($_POST['accept']) ? true : false;

    if (empty($form_data['name']) || empty($form_data['lastname']) || empty($form_data['email']) || empty($form_data['phone']) || empty($form_data['department'])) {
        $error = 'Todos los campos marcados con asterisco (*) son obligatorios.';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $error = 'Por favor, introduce una dirección de correo electrónico válida.';
    } elseif (!$accept) {
        $error = 'Debes aceptar la Política de Privacidad para enviar tu consulta.';
    } else {
        // Guardar en log local como respaldo
        $logFile = __DIR__ . '/includes/form_submissions.log';
        $logData = date('Y-m-d H:i:s') . " - Formulario de Contacto: " . json_encode($form_data) . "\n";
        @file_put_contents($logFile, $logData, FILE_APPEND);
        
        // Enviar correo con PHPMailer
        $asunto = '📩 Nueva Consulta de Contacto - ' . $form_data['name'] . ' ' . $form_data['lastname'];
        $cuerpoHTML = plantillaContacto($form_data);
        $resultado = enviarCorreo($asunto, $cuerpoHTML, null, null, $form_data['email'], trim($form_data['name'] . ' ' . $form_data['lastname']));
        
        if ($resultado['ok']) {
            $success = true;
            // Limpiar datos
            $form_data = array_map(function() { return ''; }, $form_data);
        } else {
            $error = 'Tu mensaje se ha registrado pero hubo un problema al enviar la notificación por correo. Por favor, contacta con nosotros directamente.';
        }
    }
}
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Formulario de contacto</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Contacto</span>
            <span>/</span>
            <span>Formulario de contacto</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block">
                <p style="text-align: center; margin-bottom: 40px; font-weight: 500; font-size: 1.05rem;">
                    <a href="#Ancla" style="color: var(--text-light); text-decoration: underline;"><i class="fa fa-info-circle"></i> Se recomienda a los interesados la lectura de la información básica de protección de datos antes de proporcionar sus datos personales. Pulse aquí para ver.</a>
                </p>

                <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 40px; align-items: start;">
                    
                    <!-- Formulario -->
                    <div class="form-container">
                        <h2>Formulario de Consulta</h2>
                        
                        <?php if ($success): ?>
                            <div class="alert-message alert-success">
                                <i class="fa fa-check-circle"></i> ¡Tu mensaje se ha enviado correctamente! Nos pondremos en contacto contigo lo antes posible.
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($error)): ?>
                            <div class="alert-message" style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
                                <i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post" novalidate>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_name">Nombre <span style="color: red;">*</span></label>
                                    <input type="text" name="name" id="form_name" class="form-input" required value="<?php echo htmlspecialchars($form_data['name']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_lastname">Apellidos <span style="color: red;">*</span></label>
                                    <input type="text" name="lastname" id="form_lastname" class="form-input" required value="<?php echo htmlspecialchars($form_data['lastname']); ?>">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_email">Correo electrónico <span style="color: red;">*</span></label>
                                    <input type="email" name="email" id="form_email" class="form-input" required value="<?php echo htmlspecialchars($form_data['email']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_phone">Número de teléfono <span style="color: red;">*</span></label>
                                    <input type="tel" name="phone" id="form_phone" class="form-input" required value="<?php echo htmlspecialchars($form_data['phone']); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="form_department">Departamento <span style="color: red;">*</span></label>
                                <select name="department" id="form_department" class="form-select" required>
                                    <option value="" disabled <?php echo empty($form_data['department']) ? 'selected' : ''; ?>>Selecciona un departamento</option>
                                    <option value="Centro de día" <?php echo $form_data['department'] == 'Centro de día' ? 'selected' : ''; ?>>Centro de día</option>
                                    <option value="Depto. Administrativo" <?php echo $form_data['department'] == 'Depto. Administrativo' ? 'selected' : ''; ?>>Depto. Administrativo</option>
                                    <option value="Depto. de at. al Cliente" <?php echo $form_data['department'] == 'Depto. de at. al Cliente' ? 'selected' : ''; ?>>Depto. de at. al Cliente</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-checkbox-item" for="form_accept">
                                    <input type="checkbox" name="accept" id="form_accept" required>
                                    <span>Acepto que se lleve a cabo el tratamiento de mis datos tal y como se detalla en la <a href="politica-privacidad.php" target="_blank" style="text-decoration: underline; color: var(--primary-color); font-weight: bold;">Política de Privacidad</a> <span style="color: red;">*</span></span>
                                </label>
                            </div>

                            <button type="submit" class="btn" style="width: 100%;">Enviar Consulta</button>
                        </form>
                    </div>

                    <!-- Imagen Ilustrativa -->
                    <div style="text-align: center;">
                        <img src="images/banners/contacto_0_0_00.jpg" alt="Contacto COCEMFE" style="border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md); width: 100%; display: inline-block;">
                    </div>
                </div>

                <!-- Políticas Básicas de Datos -->
                <div style="margin-top: 60px; background-color: var(--bg-light); padding: 35px; border-radius: var(--border-radius-lg); border: 1px solid var(--border-color);" id="Ancla">
                    <h3 style="color: var(--text-light); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 20px; border-bottom: 2px solid var(--border-color); padding-bottom: 8px;">Información Básica de Protección de Datos</h3>
                    <div style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div>
                            <p style="margin-bottom: 12px;"><strong>Responsable del tratamiento:</strong> Federación de Asociaciones de Personas con Discapacidad Física y Orgánica de Ceuta (COCEMFE Ceuta).</p>
                            <p style="margin-bottom: 12px;"><strong>Email del Responsable:</strong> <a href="mailto:silceuta@gmail.com" style="color: var(--primary-color);">silceuta@gmail.com</a></p>
                            <p style="margin-bottom: 12px;"><strong>Delegado de Protección de Datos:</strong> <a href="mailto:salvadorzotano@grupoecos.net" style="color: var(--primary-color);">salvadorzotano@grupoecos.net</a></p>
                            <p style="margin-bottom: 12px;"><strong>Finalidad:</strong> Responder a las consultas y/o proporcionar información de los servicios de la entidad.</p>
                        </div>
                        <div>
                            <p style="margin-bottom: 12px;"><strong>Legitimación:</strong> Consentimiento expreso del interesado prestado a través de la casilla habilitada al efecto.</p>
                            <p style="margin-bottom: 12px;"><strong>Destinatarios:</strong> No está prevista la cesión de datos a terceros, salvo obligación legal.</p>
                            <p style="margin-bottom: 12px;"><strong>Derechos:</strong> Acceder, rectificar, limitar, oponerse y suprimir los datos, así como la portabilidad de los mismos, comunicándolo al DPD.</p>
                            <p style="margin-bottom: 12px;"><strong>Retirada de consentimiento:</strong> Puede retirar su consentimiento en cualquier momento contactando a la dirección del DPD.</p>
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
