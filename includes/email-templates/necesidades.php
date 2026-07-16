<?php
/**
 * Plantilla de email - Cuestionario de Detección de Necesidades
 * Recibe: $data (array $_POST con todas las respuestas del cuestionario)
 */
function plantillaNecesidades($data) {
    $fecha = date('d/m/Y H:i');
    
    // Definir las preguntas y sus claves del formulario agrupadas por sección
    $secciones = [
        [
            'titulo' => '👤 Información General',
            'color' => '#003c68',
            'preguntas' => [
                'name' => 'Nombre completo',
                'email' => 'Correo electrónico',
                'q_ceuta' => '¿Eres de Ceuta?',
                'q_gender' => '¿Cuál es tu género?',
                'q_cocemfe_serv' => '¿Has utilizado servicios de COCEMFE?',
            ]
        ],
        [
            'titulo' => '♿ Discapacidad y Autonomía',
            'color' => '#ff9c33',
            'preguntas' => [
                'q_discapacidad' => '¿Tiene discapacidad reconocida (IMSERSO)?',
                'q_tipo_discapacidad' => 'Tipo de discapacidad',
                'q_ayudas_tecnicas' => '¿Utiliza ayuda técnica o apoyo personal?',
                'q_necesidad_ayudas' => '¿Necesitaría ayudas técnicas?',
                'q_dificultad_ayuda' => 'Nivel de dificultad con la ayuda técnica',
                'q_satisfaccion_apoyo' => '¿Los apoyos satisfacen sus necesidades?',
            ]
        ],
        [
            'titulo' => '💬 Comunicación y Asistencia',
            'color' => '#003c68',
            'preguntas' => [
                'q_dificultad_habla' => '¿Dificultad importante para hablar?',
                'q_conversacion' => 'Nivel de dificultad para conversar',
                'q_cuidados_externos' => '¿Recibe cuidados de persona no residente?',
                'q_procedencia_ayuda' => '¿De quién recibe asistencia?',
                'q_satisfaccion_asistencia' => '¿La ayuda satisface sus necesidades?',
                'q_necesidad_fuera' => '¿Necesita asistencia fuera del domicilio?',
            ]
        ],
        [
            'titulo' => '🏢 Dependencia e Integración Social',
            'color' => '#ff9c33',
            'preguntas' => [
                'q_dep_imserso' => '¿Dependencia reconocida (IMSERSO)?',
                'q_serv_imserso' => '¿Conoce los servicios del IMSERSO?',
                'q_asoc_ceuta' => '¿Conoce otras entidades en Ceuta?',
                'q_info_recursos' => '¿Necesita más información sobre recursos?',
                'q_empleo' => '¿Dificultades para encontrar trabajo?',
                'q_tics' => '¿Dificultades con las TIC?',
            ]
        ],
    ];
    
    // Generar las secciones HTML
    $seccionesHTML = '';
    foreach ($secciones as $seccion) {
        $seccionesHTML .= '
        <tr>
            <td style="background-color: #ffffff; padding: 20px 40px 10px 40px;">
                <p style="color: ' . $seccion['color'] . '; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">' . $seccion['titulo'] . '</p>
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #d1dbe5; border-radius: 8px; overflow: hidden;">';
        
        $rowIndex = 0;
        foreach ($seccion['preguntas'] as $key => $pregunta) {
            $valor = '';
            if (isset($data[$key])) {
                if (is_array($data[$key])) {
                    $valor = implode(', ', array_map('htmlspecialchars', $data[$key]));
                } else {
                    $valor = htmlspecialchars($data[$key]);
                }
            } else {
                $valor = '<span style="color: #95a5a6; font-style: italic;">Sin respuesta</span>';
            }
            
            $bgColor = ($rowIndex % 2 === 0) ? '' : ' background-color: #fafbfc;';
            $borderBottom = ($rowIndex < count($seccion['preguntas']) - 1) ? 'border-bottom: 1px solid #e8ecf1;' : '';
            
            $seccionesHTML .= '
                    <tr style="' . $bgColor . '">
                        <td style="padding: 11px 16px; ' . $borderBottom . ' color: #5a6c7d; font-size: 13px; font-weight: 600; width: 50%; vertical-align: top;">' . htmlspecialchars($pregunta) . '</td>
                        <td style="padding: 11px 16px; ' . $borderBottom . ' color: #2c3e50; font-size: 13px;">' . $valor . '</td>
                    </tr>';
            $rowIndex++;
        }
        
        $seccionesHTML .= '
                </table>
            </td>
        </tr>';
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
                    <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width: 600px; width: 100%;">
                        
                        <!-- HEADER -->
                        <tr>
                            <td style="background: linear-gradient(135deg, #003c68 0%, #002847 100%); padding: 30px 40px; border-radius: 16px 16px 0 0; text-align: center;">
                                <h1 style="color: #ffffff; font-size: 22px; margin: 0 0 6px 0; font-weight: 700; letter-spacing: 0.5px;">COCEMFE CEUTA</h1>
                                <p style="color: #ff9c33; font-size: 13px; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-weight: 600;">Federación de Asociaciones de Personas con Discapacidad</p>
                            </td>
                        </tr>
                        
                        <!-- BADGE -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 30px 40px 0 40px;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="background-color: #e6eff7; border-left: 4px solid #003c68; padding: 14px 20px; border-radius: 0 8px 8px 0;">
                                            <p style="margin: 0; color: #003c68; font-size: 16px; font-weight: 700;">📋 Cuestionario de Detección de Necesidades</p>
                                            <p style="margin: 4px 0 0 0; color: #5a6c7d; font-size: 12px;">Recibido el ' . $fecha . '</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        ' . $seccionesHTML . '
                        
                        <!-- FOOTER -->
                        <tr>
                            <td style="background-color: #002847; padding: 25px 40px; border-radius: 0 0 16px 16px; text-align: center; margin-top: 15px;">
                                <p style="color: #8ba8c4; font-size: 12px; margin: 0 0 6px 0;">Este cuestionario ha sido enviado desde el formulario web de COCEMFE Ceuta.</p>
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
