<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px;">
    <div style="max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px;">
        <h2>Invitation EasyColoc</h2>

        <p><strong>{{ $ownerName }}</strong> vous invite à rejoindre sa collocation.</p>

        <p>Cliquez sur le lien ci-dessous pour accepter :</p>

        <a href="{{ route('invitations.accept', $token) }}"
            style="background: #10b981; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 20px 0;">
            Rejoindre la collocation
        </a>

        <p style="color: #666; font-size: 12px;">Ce lien est valable 7 jours.</p>
    </div>
</body>

</html>
