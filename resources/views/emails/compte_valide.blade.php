<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Validation de votre compte</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f3f4f6; padding:20px; margin:0;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" 
                       style="background:#ffffff; border-radius:12px; padding:30px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="text-align:center;">
                            <h2 style="color:#111827; font-size:24px; margin-bottom:20px;">
                                Bonjour {{ $creator->name }},
                            </h2>
                            <p style="color:#374151; font-size:16px; line-height:1.6; margin-bottom:15px;">
                                Votre compte a été validé avec succès.
                            </p>
                            <p style="color:#374151; font-size:16px; line-height:1.6; margin-bottom:20px;">
                                vous avez maintenant le statut de: 
                                <strong>Creator</strong>.
                            </p>
                            <p style="color:#374151; font-size:16px; line-height:1.6; margin-bottom:25px;">
                                Vous pouvez dès à présent vous connecter.
                            </p>
                            <a href="{{ url('/') }}" 
                               style="display:inline-block; background:#2563eb; color:#ffffff; padding:12px 25px; border-radius:8px; text-decoration:none; font-size:16px; font-weight:bold;">
                                Se connecter
                            </a>
                            <p style="color:#6b7280; font-size:14px; margin-top:30px; line-height:1.5;">
                                Cordialement,<br>
                                <strong>L’équipe Support IRIVENT</strong>
                            </p>
                        </td>
                    </tr>
                </table>
                <p style="color:#9ca3af; font-size:12px; margin-top:15px;">
                    Si vous n’avez pas fait cette demande, veuillez ignorer cet email.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
