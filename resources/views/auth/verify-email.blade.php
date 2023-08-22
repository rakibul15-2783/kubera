<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Click this button to verify email.</p>
    <a href="{{ route('verify.email',$user->remember_token) }}">Verify this email</a>
</body>
</html>
