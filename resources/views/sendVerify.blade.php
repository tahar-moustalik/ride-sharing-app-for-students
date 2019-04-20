<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifier Email</title>
</head>
<body>
    <h4>Pour Verifier Votre Email Cliquez Ici:</h4>
<a href = "{{route('sendEmailDone',["email" => $user->email,"verifyToken" => $user->verifyToken], true)}}">click to verify email</a>
</body>
</html>