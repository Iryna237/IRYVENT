<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmation de demande</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f9fafb; padding:20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; padding:20px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td>
                            <h2 style="color:#111827; font-size:20px;">Bonjour {{ $user->name }}</h2>
                            <p style="color:#374151; font-size:16px;">
                                Nous avons bien reçu votre demande de creation de compte 
                                <strong>Creator</strong>.
                            </p>
                            <p style="color:#374151; font-size:16px;">
                                Elle est actuellement en statut :
                                <strong>{{ ucfirst($user->status) }}</strong>.
                            </p>
                            <p style="color:#374151; font-size:16px;">
                                La verification d'identite peut aller jusqu'a 48h
                            </p>
                            <p style="color:#374151; font-size:16px;">
                               vous allez recevoir un email de confimation d'ici peut
                            </p>
                            <br>
                            <p style="color:#6b7280; font-size:14px;">
                                Cordialement,<br>
                                <strong>L’équipe Support IRIVENT</strong>
                            </p>
                            <br>
                            <a href="{{ url('/') }}" 
                               style="display:inline-block; background:#2563eb; color:#ffffff; padding:10px 20px; border-radius:6px; text-decoration:none; font-size:16px;">
                                visiter l'app
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
