<?php
/**
 * Plantilla de email - Encuesta de Satisfacción de Usuarios
 * Recibe: $data (array $_POST con q_1 a q_24 y opciones)
 */
function plantillaSatisfaccion($data) {
    $fecha = date('d/m/Y H:i');
    
    // Mapear preguntas con sus claves
    $preguntas = [
        'q_1'  => '¿Conoces los servicios de COCEMFE?',
        'q_2'  => '¿Cómo nos has conocido?',
        'q_3'  => '¿Has utilizado nuestros servicios?',
        'q_4'  => '¿Qué servicios has utilizado?',
        'q_5'  => '¿Cuánto tiempo llevas utilizándolos?',
        'q_6'  => 'Satisfacción general con los SERVICIOS',
        'q_7'  => 'Satisfacción general con el PERSONAL',
        'q_8'  => 'Comparación con otras alternativas',
        'q_9'  => '¿Continuará utilizando los servicios?',
        'q_10' => '¿Añadiría algún servicio?',
        'q_11' => '¿Qué servicio añadiría?',
        'q_12' => '¿Ha recomendado COCEMFE a otros?',
        'q_13' => '¿Vale la pena utilizar los servicios?',
        'q_14' => '¿Los servicios cubren sus necesidades?',
        'q_15' => '¿COCEMFE ofrece servicios de calidad?',
        'q_16' => '¿Los usuarios conocen bien los servicios?',
        'q_17' => '¿La oficina atiende bien las necesidades?',
        'q_18' => '¿Recomendaría COCEMFE a otras personas?',
        'q_19' => '¿Ha tenido incidencias con los servicios?',
        'q_20' => '¿Se resolvió la incidencia?',
        'q_21' => '¿Satisfecho con la resolución?',
        'q_22' => 'Servicio más necesario para usted',
        'q_23' => 'Sugerencias adicionales',
        'q_24' => 'Nivel de satisfacción general (1-10)',
    ];
    
    // Generar filas de la tabla
    $filasHTML = '';
    $rowIndex = 0;
    foreach ($preguntas as $key => $pregunta) {
        $valor = '';
        if (isset($data[$key])) {
            if (is_array($data[$key])) {
                $items = array_map('htmlspecialchars', $data[$key]);
                $valor = '<ul style="margin: 0; padding-left: 16px;">';
                foreach ($items as $item) {
                    $valor .= '<li style="margin-bottom: 2px;">' . $item . '</li>';
                }
                $valor .= '</ul>';
            } else {
                $respuesta = htmlspecialchars($data[$key]);
                // Colorear respuestas de satisfacción
                if (in_array($key, ['q_6', 'q_7', 'q_13', 'q_15', 'q_17'])) {
                    if (strpos(strtolower($respuesta), 'completamente satisfecho') !== false || strpos(strtolower($respuesta), 'totalmente de acuerdo') !== false) {
                        $valor = '<span style="color: #27ae60; font-weight: 600;">✅ ' . $respuesta . '</span>';
                    } elseif (strpos(strtolower($respuesta), 'satisfecho') !== false || strpos(strtolower($respuesta), 'de acuerdo') !== false) {
                        $valor = '<span style="color: #2ecc71;">👍 ' . $respuesta . '</span>';
                    } elseif (strpos(strtolower($respuesta), 'insatisfecho') !== false || strpos(strtolower($respuesta), 'desacuerdo') !== false) {
                        $valor = '<span style="color: #e74c3c; font-weight: 600;">⚠️ ' . $respuesta . '</span>';
                    } else {
                        $valor = $respuesta;
                    }
                } elseif ($key === 'q_24') {
                    $nota = intval($respuesta);
                    $colorNota = $nota >= 8 ? '#27ae60' : ($nota >= 5 ? '#f39c12' : '#e74c3c');
                    $valor = '<span style="display: inline-block; background-color: ' . $colorNota . '; color: white; width: 36px; height: 36px; line-height: 36px; text-align: center; border-radius: 50%; font-size: 18px; font-weight: 700;">' . $respuesta . '</span>';
                } else {
                    $valor = $respuesta;
                }
            }
        } else {
            $valor = '<span style="color: #bdc3c7; font-style: italic;">Sin respuesta</span>';
        }
        
        $bgColor = ($rowIndex % 2 === 0) ? '' : ' background-color: #fafbfc;';
        $numPregunta = str_replace('q_', '', $key);
        
        $filasHTML .= '
                    <tr style="' . $bgColor . '">
                        <td style="padding: 11px 10px; border-bottom: 1px solid #e8ecf1; color: #003c68; font-size: 12px; font-weight: 700; text-align: center; width: 8%;">' . $numPregunta . '</td>
                        <td style="padding: 11px 12px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 500; width: 46%;">' . htmlspecialchars($pregunta) . '</td>
                        <td style="padding: 11px 12px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 13px; width: 46%;">' . $valor . '</td>
                    </tr>';
        $rowIndex++;
    }
    
    return '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="margin: 0; padding: 0; background-color: #f4f7f9; font-family: Arial, Helvetica, sans-serif;">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f7f9; padding: 30px 0;">
            <tr>
                <td align="center">
                    <table role="presentation" width="650" cellspacing="0" cellpadding="0" style="max-width: 650px; width: 100%;">
                        
                        <!-- HEADER con color especial para satisfacción -->
                        <tr>
                            <td style="background: linear-gradient(135deg, #003c68 0%, #002847 100%); padding: 30px 40px; border-radius: 16px 16px 0 0; text-align: center;">
                                <h1 style="color: #ffffff; font-size: 22px; margin: 0 0 6px 0; font-weight: 700; letter-spacing: 0.5px;">COCEMFE CEUTA</h1>
                                <p style="color: #ff9c33; font-size: 13px; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-weight: 600;">Encuesta de Satisfacción de Usuarios</p>
                            </td>
                        </tr>
                        
                        <!-- BADGE -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 30px 40px 0 40px;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="background-color: #eafaf1; border-left: 4px solid #27ae60; padding: 14px 20px; border-radius: 0 8px 8px 0;">
                                            <p style="margin: 0; color: #27ae60; font-size: 16px; font-weight: 700;">📊 Nueva Encuesta de Satisfacción Recibida</p>
                                            <p style="margin: 4px 0 0 0; color: #5a6c7d; font-size: 12px;">Recibido el ' . $fecha . '</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <!-- TABLA DE RESPUESTAS -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 25px 40px;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #d1dbe5; border-radius: 8px; overflow: hidden;">
                                    <tr style="background-color: #003c68;">
                                        <td style="padding: 10px 10px; color: #ffffff; font-weight: 600; font-size: 12px; text-align: center; text-transform: uppercase;">Nº</td>
                                        <td style="padding: 10px 12px; color: #ffffff; font-weight: 600; font-size: 12px; text-transform: uppercase;">Pregunta</td>
                                        <td style="padding: 10px 12px; color: #ffffff; font-weight: 600; font-size: 12px; text-transform: uppercase;">Respuesta</td>
                                    </tr>
                                    ' . $filasHTML . '
                                </table>
                            </td>
                        </tr>
                        
                        <!-- FOOTER -->
                        <tr>
                            <td style="background-color: #002847; padding: 25px 40px; border-radius: 0 0 16px 16px; text-align: center;">
                                <p style="color: #8ba8c4; font-size: 12px; margin: 0 0 6px 0;">Encuesta enviada desde el formulario web de COCEMFE Ceuta.</p>
                                <p style="color: #5a7a96; font-size: 11px; margin: 0;">© ' . date('Y') . ' COCEMFE Ceuta · C/ Sargento Mena, 5 · 51001 Ceuta</p>
                            </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>';
}
