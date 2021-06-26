<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Christmas Village - Login</title>
    <link rel="stylesheet" href='{{ url("css/login.css")}}'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
</head>
<body>
<h1>Accedi</h1>
@if(isset($old_username))
<span class='errore'>Credenziali non valide</span>
@endif

<form id = 'signin_form' method='POST'>
    <input type="hidden" name="_token" value='{{$csrf_token}}'>
    <label for= "username">Username</label>
    <input type ="text" name="username" id="username" value='{{$old_username}}'>
    <label for="password">Password</label>
    <input type ="password" name="password" id="password">
    <input type="submit" class="submit" value="Accedi">
</form>
    <div>
         <a class="button" href='{{ url("signup")}}'>Crea un nuovo account</a>
    </div>
</body>
</html>