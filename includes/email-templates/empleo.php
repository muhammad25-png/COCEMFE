<?php
/**
 * Plantilla de email - Formulario de Empleo (SIL)
 * Recibe: $data (array con name, lastname, email, zipcode, profile, message, cv)
 */
function plantillaEmpleo($data) {
    $fecha = date('d/m/Y H:i');
    $cvInfo = isset($data['cv']) && $data['cv'] !== 'Ninguno' 
        ? '<span style="background-color: #27ae60; color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">📎 ' . htmlspecialchars($data['cv']) . '</span>'
        : '<span style="color: #95a5a6; font-size: 13px;">No adjuntado</span>';
    
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
                                <p style="color: #ff9c33; font-size: 13px; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-weight: 600;">Servicio de Integración Laboral (SIL)</p>
                            </td>
                        </tr>
                        
                        <!-- BADGE -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 30px 40px 0 40px;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="background-color: #fef3e6; border-left: 4px solid #ff9c33; padding: 14px 20px; border-radius: 0 8px 8px 0;">
                                            <p style="margin: 0; color: #e07f16; font-size: 16px; font-weight: 700;">💼 Nueva Inscripción en Bolsa de Empleo</p>
                                            <p style="margin: 4px 0 0 0; color: #5a6c7d; font-size: 12px;">Recibido el ' . $fecha . '</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <!-- DATOS PERSONALES -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 25px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">👤 Datos del Candidato</p>
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #d1dbe5; border-radius: 8px; overflow: hidden;">
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 14px; font-weight: 600; width: 40%;">Nombre completo</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px; font-weight: 600;">' . htmlspecialchars($data['name']) . ' ' . htmlspecialchars($data['lastname']) . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 14px; font-weight: 600;">Email</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;"><a href="mailto:' . htmlspecialchars($data['email']) . '" style="color: #003c68; text-decoration: none;">' . htmlspecialchars($data['email']) . '</a></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #5a6c7d; font-size: 14px; font-weight: 600;">Código Postal</td>
                                        <td style="padding: 12px 16px; border-bottom: 1px solid #e8ecf1; color: #2c3e50; font-size: 14px;">' . (htmlspecialchars($data['zipcode']) ?: '<span style="color: #95a5a6;">No indicado</span>') . '</td>
                                    </tr>
                                    <tr style="background-color: #fafbfc;">
                                        <td style="padding: 12px 16px; color: #5a6c7d; font-size: 14px; font-weight: 600;">CV Adjunto</td>
                                        <td style="padding: 12px 16px; color: #2c3e50; font-size: 14px;">' . $cvInfo . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <!-- PERFIL PROFESIONAL -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 20px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">🎯 Perfil Profesional</p>
                                <div style="background-color: #f4f7f9; padding: 16px 20px; border-radius: 8px; border-left: 3px solid #4281A4;">
                                    <p style="margin: 0; color: #2c3e50; font-size: 14px; line-height: 1.6;">' . nl2br(htmlspecialchars($data['profile'])) . '</p>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- MENSAJE / PRESENTACIÓN -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 20px 40px 10px 40px;">
                                <p style="color: #003c68; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 12px 0; border-bottom: 2px solid #e6eff7; padding-bottom: 8px;">✉️ Carta de Presentación</p>
                                <div style="background-color: #f4f7f9; padding: 16px 20px; border-radius: 8px;">
                                    <p style="margin: 0; color: #2c3e50; font-size: 14px; line-height: 1.7;">' . nl2br(htmlspecialchars($data['message'])) . '</p>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- ACCIÓN RÁPIDA -->
                        <tr>
                            <td style="background-color: #ffffff; padding: 25px 40px; text-align: center;">
                                <a href="mailto:' . htmlspecialchars($data['email']) . '" style="display: inline-block; background-color: #ff9c33; color: #ffffff; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">↩️ Contactar al candidato</a>
                            </td>
                        </tr>
                        
                        <!-- FOOTER -->
                        <tr>
                            <td style="background-color: #002847; padding: 25px 40px; border-radius: 0 0 16px 16px; text-align: center;">
                                <p style="color: #8ba8c4; font-size: 12px; margin: 0 0 6px 0;">Este correo ha sido generado automáticamente desde el formulario de empleo del SIL de COCEMFE Ceuta.</p>
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
