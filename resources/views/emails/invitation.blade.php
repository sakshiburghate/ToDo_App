<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation</title>
</head>
<body>
    <p>You have been invited to join our system. Click the link below to register:</p>
    <a href="{{ url('accept/' . $token) }}">Register</a>
</body>
</html>
