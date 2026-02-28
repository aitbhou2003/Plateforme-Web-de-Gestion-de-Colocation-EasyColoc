<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inviter - EasyColoc</title>
</head>

<body style="background: #0a0f1a; color: white; font-family: Arial; padding: 50px;">
    <div style="max-width: 400px; margin: 0 auto;">
        <h1>Inviter un membre</h1>

        <form method="POST" action="{{ route('invitations.store') }}">
            @csrf

            <label>Email :</label><br>
            <input type="email" name="email" required
                style="width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: none;"><br>

            <button type="submit"
                style="background: #10b981; color: black; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Envoyer l'invitation
            </button>
        </form>

        <br>
        <a href="{{ route('collocation.index') }}" style="color: #6b7280;">← Retour</a>
    </div>
</body>

</html>
