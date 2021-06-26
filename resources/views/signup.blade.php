<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Christmas Village - Registrazione</title>
        <script src='{{ url("js/register.js")}}' defer></script>
        <link rel="stylesheet" href='{{ url("css/signup.css")}}'>
        <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    </head>
    <body>
        <form name = 'signup_form' method='POST'>
            <input type='hidden' name='_token' value='{{ csrf_token() }}'>
            <h1>Registrati</h1>
            <div class = "signup_name">
                <label for= 'name'>Nome</label></br>
                <input type= 'text' name= 'name' id= "name_input"></br>
                <span class="hidden">Inserisci un nome</span>
            </div>
            <div class = "signup_name">
                <label for= 'surname'>Cognome</label></br>
                <input type= 'text' name= 'surname' id= "surname_input"></br>
                <span class="hidden">Inserisci un cognome</span>
            </div>
            <div class = "signup_age">
                <label for= 'age'>Età</label></br>
                <input type= 'number' name= 'age' id= "age_input" min="0"></br>
                <span class="hidden">Inserisci la tua età</span>
            </div>
            <div class = "signup_name">
                <label for= 'address'>Indirizzo</label></br>
                <input type= 'text' name= 'address' id= "address_input"></br>
                <span class="hidden">Inserisci un indirizzo</span>
            </div>
            <div class = "signup_email">
                <label for= 'email'>E-mail</label></br>
                <input type= 'text' name= 'email' id= "email_input"></br>
                <span class="hidden">Inserisci un'email valida</span>
            </div>
            <div class = "signup_username">
                <label for ='username'>Username</label></br>
                <input type= 'text' name= 'username' id= "username_input"></br>
                <span class="hidden" id="span_username"></span>
            </div>
            <div class = "signup_password">
                <label for= 'password'>Password</label></br>
                <input type= 'password' name= 'password' id= "password_input"></br>
                <span class="hidden">Inserisci almeno 8 caratteri, </br> maiuscole e numeri</span>
            </div>
            <div class = "signup_psw_confirm">
                <label for= 'psw_confirm'>Ripeti password</label></br>
                <input type= 'password' name= 'psw_confirm' id= "psw_confirm_input"></br>
                <span class="hidden">Password diverse</span>
            </div>
            <input type= 'submit' class="submit" value='REGISTRATI'>
        </form>
        <div class="div_button">
            <a class="button" href='{{ url("login")}}'>Ho già un account</a>
        </div>
    </body>
</html>