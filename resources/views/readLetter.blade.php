<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Letter to Santa</title>
    <link rel="stylesheet" href='{{ url("css/letter.css")}}' />
    <script src='{{ url("js/readLetter.js")}}' defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <a href='{{ url("home")}}' class="esterno">Home</a>
        <a href = '{{ url("letter")}}'>Scrivi la letterina</a>
        <a href='{{ url("readLetter")}}'>Leggi le letterine</a>
        <a href='{{ url("music")}}'>Ascolta musica</a>
        <a href='{{ url("logout")}}' class="esterno">Logout</a>
        <div id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
    <header id="read_letter_header">
        <h1>Leggi le tue letterine</h1>
        <div class="overlay"></div>
    </header>
        <form id="read_letter_form">
           <!-- <input type='hidden' name='_token' value='{{ csrf_token() }}'> -->
        </form>
    <section id="read_letter_section">
        <div class= "div_letter"></div>
        <div class="blank_space"></div>
    </section>
    <footer>
        <p>Christmas village- 325 S. Santa Claus Lane North Pole, AK 99705- santaclaus@gmail.com
            <br />Clelia Agata Nicotra O46002019</p>
    </footer>
</body>

</html>