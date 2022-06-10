<!DOCTYPE html>
<html>
<head>
    <title>We creation</title>
</head>
<body>
    <p>Beste {{ $user->name }}, via volgende link kan je je wachtwoord opnieuw instellen.</p>
    <a href="{{ $link }}">Wachtwoord opnieuw instellen</a>
</body>
</html>