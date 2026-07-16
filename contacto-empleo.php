<?php
include 'includes/header.php';
require_once __DIR__ . '/includes/mail-config.php';
require_once __DIR__ . '/includes/email-templates/empleo.php';

$success = false;
$error = '';
$form_data = [
    'name' => '',
    'lastname' => '',
    'email' => '',
    'zipcode' => '',
    'profile' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data['name'] = htmlspecialchars(trim($_POST['name'] ?? ''));
    $form_data['lastname'] = htmlspecialchars(trim($_POST['lastname'] ?? ''));
    $form_data['email'] = htmlspecialchars(trim($_POST['email'] ?? ''));
    $form_data['zipcode'] = htmlspecialchars(trim($_POST['zipcode'] ?? ''));
    $form_data['profile'] = htmlspecialchars(trim($_POST['profile'] ?? ''));
    $form_data['message'] = htmlspecialchars(trim($_POST['message'] ?? ''));
    $accept = isset($_POST['accept']) ? true : false;

    if (empty($form_data['name']) || empty($form_data['lastname']) || empty($form_data['email']) || empty($form_data['profile']) || empty($form_data['message'])) {
        $error = 'Todos los campos marcados con asterisco (*) son obligatorios.';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $error = 'Por favor, introduce una dirección de correo electrónico válida.';
    } elseif (!$accept) {
        $error = 'Debes aceptar la Política de Privacidad para continuar.';
    } else {
        // Manejar subida de archivo CV opcional
        $cv_uploaded = 'Ninguno';
        $adjuntoPath = null;
        $adjuntoNombre = null;
        if (isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] === UPLOAD_ERR_OK) {
            $cv_name = htmlspecialchars($_FILES['cv_file']['name']);
            $cv_uploaded = 'Subido: ' . $cv_name;
            $adjuntoPath = $_FILES['cv_file']['tmp_name'];
            $adjuntoNombre = $_FILES['cv_file']['name'];
        }

        $form_data['cv'] = $cv_uploaded;

        // Guardar en log local como respaldo
        $logFile = __DIR__ . '/includes/form_submissions.log';
        $logData = date('Y-m-d H:i:s') . " - Formulario Empleo (SIL): " . json_encode($form_data) . "\n";
        @file_put_contents($logFile, $logData, FILE_APPEND);
        
        // Enviar correo con PHPMailer
        $asunto = '💼 Nueva Inscripción SIL - ' . $form_data['name'] . ' ' . $form_data['lastname'];
        $cuerpoHTML = plantillaEmpleo($form_data);
        $resultado = enviarCorreo($asunto, $cuerpoHTML, $adjuntoPath, $adjuntoNombre, $form_data['email'], trim($form_data['name'] . ' ' . $form_data['lastname']));
        
        if ($resultado['ok']) {
            $success = true;
            $form_data = array_map(function() { return ''; }, $form_data);
        } else {
            $error = 'Tu inscripción se ha registrado pero hubo un problema al enviar la notificación por correo. Por favor, contacta con nosotros directamente.';
        }
    }
}
?>

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>¿Buscas empleo?</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Contacto</span>
            <span>/</span>
            <span>¿Buscas empleo?</span>
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
                    
                    <!-- Formulario de Empleo -->
                    <div class="form-container" style="box-shadow: var(--shadow-md); border-top: 4px solid var(--accent-color);">
                        <h2>Inscripción en el SIL</h2>
                        <p style="margin-bottom: 25px; color: var(--text-light); font-size: 0.95rem;">Rellena el siguiente formulario para darte de alta en la bolsa de empleo del Servicio de Integración Laboral (SIL) de COCEMFE Ceuta.</p>
                        
                        <?php if ($success): ?>
                            <div class="alert-message alert-success">
                                <i class="fa fa-check-circle"></i> ¡Inscripción enviada con éxito! Tu perfil profesional ha quedado registrado en nuestra base de datos.
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($error)): ?>
                            <div class="alert-message" style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
                                <i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post" enctype="multipart/form-data" novalidate>
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

                            <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 20px;">
                                <div class="form-group">
                                    <label class="form-label" for="form_email">Correo electrónico <span style="color: red;">*</span></label>
                                    <input type="email" name="email" id="form_email" class="form-input" required value="<?php echo htmlspecialchars($form_data['email']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="form_zipcode">Código Postal</label>
                                    <input type="text" name="zipcode" id="form_zipcode" class="form-input" value="<?php echo htmlspecialchars($form_data['zipcode']); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="form_profile">Perfil Profesional <span style="color: red;">*</span></label>
                                <textarea name="profile" id="form_profile" class="form-input" required style="min-height: 80px;" placeholder="Ej: Auxiliar administrativo, Conductor, Cuidador sociosanitario..."><?php echo htmlspecialchars($form_data['profile']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="form_message">Mensaje / Presentación (máx. 250 palabras) <span style="color: red;">*</span></label>
                                <textarea name="message" id="form_message" class="form-input" required style="min-height: 120px;" placeholder="Describe brevemente tu trayectoria, motivación y tipo de jornada buscada..."><?php echo htmlspecialchars($form_data['message']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="form_cv">Adjuntar Currículum Vitae (PDF/Word - Opcional)</label>
                                <input type="file" name="cv_file" id="form_cv" class="form-input" style="padding: 8px;">
                            </div>

                            <div class="form-group">
                                <label class="form-checkbox-item" for="form_accept">
                                    <input type="checkbox" name="accept" id="form_accept" required>
                                    <span>Acepto que se lleve a cabo el tratamiento de mis datos tal y como se detalla en la <a href="politica-privacidad.php" target="_blank" style="text-decoration: underline; color: var(--primary-color); font-weight: bold;">Política de Privacidad</a> <span style="color: red;">*</span></span>
                                </label>
                            </div>

                            <button type="submit" class="btn" style="width: 100%;">Registrarme en el SIL</button>
                        </form>
                    </div>

                    <!-- Cuadro informativo -->
                    <div style="background-color: var(--primary-light); padding: 35px; border-radius: var(--border-radius-lg); border-left: 5px solid var(--primary-color);">
                        <h3 style="color: var(--primary-color); font-family: var(--font-heading); margin-bottom: 20px; font-size: 1.3rem;"><i class="fa fa-info-circle"></i> Bolsa de Empleo Activa</h3>
                        <p style="color: var(--primary-dark); line-height: 1.7; margin-bottom: 20px; text-align: justify;">
                            Al registrarte en el Servicio de Integración Laboral de COCEMFE Ceuta, tu currículum entra a formar parte de nuestra base de datos confidencial y especializada en empleo para personas con discapacidad física y orgánica.
                        </p>
                        <p style="color: var(--primary-dark); line-height: 1.7; margin-bottom: 20px; text-align: justify;">
                            Cuando surjan ofertas de trabajo de empresas colaboradoras en Ceuta que encajen con tu perfil y tus aptitudes profesionales, nuestro orientador se pondrá en contacto contigo para realizar la preselección y derivación al puesto.
                        </p>
                        <div style="background-color: white; padding: 20px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                            <h4 style="color: var(--primary-color); margin-bottom: 10px; font-size: 1rem;"><i class="fa fa-phone"></i> ¿Prefieres visitarnos en persona?</h4>
                            <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.5;">Puedes traer tu CV impreso y tu certificado de discapacidad oficial a nuestra oficina de administración de Lunes a Viernes de 10:00 a 13:00.</p>
                        </div>
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
                            <p style="margin-bottom: 12px;"><strong>Finalidad:</strong> Responder a las solicitudes de empleo y gestionar la bolsa de trabajo interna del SIL.</p>
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
