<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register confirm link</title>
</head>
<body>
    <h1>Thank you for registering on Weibo APP</h1>
    <p>
        Please click the link to complete the registration:
        <a href="{{ route('confirm-email', $user->activation_token) }}">
            {{ route('confirm-email', $user->activation_token) }}
        </a>
    </p>
    <p>
        If it is not your own operation, please ignore this email.
    </p>
</body>
</html>
