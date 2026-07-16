<?php
/**
 * Plantilla de email - Ficha de Inscripción de Voluntariado
 * Recibe: $data (array con todos los datos del voluntario)
 */
function plantillaVoluntariado($data) {
    $fecha = date('d/m/Y H:i');
    
    // Áreas de interés
    $areasHTML = '';
    if (!empty($data['interest_areas']) && is_array($data['interest_areas'])) {
        foreach ($data['interest_areas'] as $area) {
            $areasHTML .= '<span style="display: inline-block; background-color: #ff9c33; color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; margin: 2px 4px 2px 0;">' . htmlspecialchars($area) . '</span>';
        }
    } else {
        $areasHTML = '<span style="color: #95a5a6; font-style: italic;">No seleccionadas</span>';
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
                                <p style="color: #ff9c33; font-size: 13px; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-weight: 600;">Programa de Voluntariado</p>
                            </td>
                        </tr>
                        
                        <!-- BADGE -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 30px 40px 0 40px;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="background-color: #fef3e6; border-left: 4px solid #ff9c33; padding: 14px 20px; border-radius: 0 8px 8px 0;">
                                            <p style="margin: 0; color: #e07f16; font-size: 16px; font-weight: 700;">🤝 Nueva Solicitud de Voluntariado</p>
                                            <p style="margin: 4px 0 0 0; color: #5a6c7d; font-size: 12px;">Recibido el ' . $fecha . '</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <!-- DATOS IDENTIFICATIVOS -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 25px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">👤 Datos Identificativos</p>
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #d1dbe5; border-radius: 8px; overflow: hidden;">
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600; width: 40%;">Nombre completo</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px; font-weight: 600;">' . htmlspecialchars($data['name']) . ' ' . htmlspecialchars($data['lastname1']) . ' ' . htmlspecialchars($data['lastname2'] ?? '') . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">DNI / NIE</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['dni']) . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">Edad</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['age']) . ' años</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">Fecha de nacimiento</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['birthdate']) . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">% Discapacidad</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . (htmlspecialchars($data['disability_percent'] ?? '') ?: '<span style="color: #95a5a6;">No aplica</span>') . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; color: #5a6c7d; font-size: 13px; font-weight: 600;">Tipo discapacidad</td>
                                        <td style="padding: 12px 16px; color: #2c3e50; font-size: 14px;">' . (htmlspecialchars($data['disability_type'] ?? '') ?: '<span style="color: #95a5a6;">No indicado</span>') . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <!-- DIRECCIÓN Y CONTACTO -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 20px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">📍 Dirección y Contacto</p>
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #d1dbe5; border-radius: 8px; overflow: hidden;">
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600; width: 40%;">Domicilio</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['address']) . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">C.P. / Provincia</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['zipcode']) . ' - ' . htmlspecialchars($data['province'] ?? 'Ceuta') . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">Teléfono fijo</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . (htmlspecialchars($data['phone_fixed'] ?? '') ?: '<span style="color: #95a5a6;">No indicado</span>') . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">Teléfono móvil</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px; font-weight: 600;">' . htmlspecialchars($data['phone_mobile']) . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 12px 16px; color: #5a6c7d; font-size: 13px; font-weight: 600;">Email</td>
                                        <td style="padding: 12px 16px; color: #2c3e50; font-size: 14px;">' . (isset($data['email']) && !empty($data['email']) ? '<a href="mailto:' . htmlspecialchars($data['email']) . '" style="color: #003c68; text-decoration: none;">' . htmlspecialchars($data['email']) . '</a>' : '<span style="color: #95a5a6;">No indicado</span>') . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <!-- PREFERENCIAS DE VOLUNTARIADO -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 20px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">🎯 Preferencias de Voluntariado</p>
                                
                                <!-- Áreas de interés como badges -->
                                <p style="color: #5a6c7d; font-size: 13px; font-weight: 600; margin: 0 0 8px 0;">Áreas de participación:</p>
                                <div style="margin-bottom: 16px;">' . $areasHTML . '</div>
                                
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #d1dbe5; border-radius: 8px; overflow: hidden;">
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600; width: 40%;">Días disponibles</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['availability_days'] ?? '') . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">Horas disponibles</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['availability_hours'] ?? '') . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 13px; font-weight: 600;">¿Formación relacionada?</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['has_training'] ?? '') . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; color: #5a6c7d; font-size: 13px; font-weight: 600;">¿Experiencia en voluntariado?</td>
                                        <td style="padding: 12px 16px; color: #2c3e50; font-size: 14px;">' . htmlspecialchars($data['has_experience'] ?? '') . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <!-- EXPERIENCIA Y MOTIVACIONES -->
                        ' . (!empty($data['experience_detail']) ? '
                        <tr>
                            <td style="background-color: #ffffff; padding: 20px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">📝 Experiencia previa</p>
                                <div style="background-color: #f4f7f9; padding: 16px 20px; border-radius: 8px; border-left: 3px solid #4281A4;">
                                    <p style="margin: 0; color: #2c3e50; font-size: 14px; line-height: 1.6;">' . nl2br(htmlspecialchars($data['experience_detail'])) . '</p>
                                </div>
                            </td>
                        </tr>' : '') . '
                        
                        ' . (!empty($data['motivations']) ? '
                        <tr>
                            <td style="background-color: #ffffff; padding: 20px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">💡 Motivaciones y Expectativas</p>
                                <div style="background-color: #fef3e6; padding: 16px 20px; border-radius: 8px; border-left: 3px solid #ff9c33;">
                                    <p style="margin: 0; color: #2c3e50; font-size: 14px; line-height: 1.6;">' . nl2br(htmlspecialchars($data['motivations'])) . '</p>
                                </div>
                            </td>
                        </tr>' : '') . '
                        
                        <!-- ACCIÓN RÁPIDA -->
                        ' . (!empty($data['email']) ? '
                        <tr>
                            <td style="background-color: #ffffff; padding: 25px 40px; text-align: center;">
                                <a href="mailto:' . htmlspecialchars($data['email']) . '" style="display: inline-block; background-color: #ff9c33; color: #ffffff; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">↩️ Contactar al voluntario</a>
                            </td>
                        </tr>' : '') . '
                        
                        <!-- FOOTER -->
                        <tr>
                            <td style="background-color: #002847; padding: 25px 40px; border-radius: 0 0 16px 16px; text-align: center;">
                                <p style="color: #8ba8c4; font-size: 12px; margin: 0 0 6px 0;">Ficha de voluntariado enviada desde el formulario web de COCEMFE Ceuta.</p>
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
