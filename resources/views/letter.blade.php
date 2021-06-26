<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Letter to Santa</title>
    <link rel="stylesheet" href='{{ url("css/letter.css")}}' />
    <script src='{{ url("js/letter.js")}}' defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <a href='{{ url("home")}}'class="esterno">Home</a>
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
    <header>
        <h1>Scrivi la tua letterina</h1>
        <div class="overlay"></div>
    </header>
    <div id="letter_message" class="hidden"></div>
    <section id="letter_section">
    <form id="letter_form" >
      <!--  <input type='hidden' name='_token' value='{{ csrf_token() }}'> -->
        <label>Seleziona i giocattoli che vuoi ricevere</label></br>
        <div id= "checkbox"></div></br> 
        <label for="message">Scrivi il tuo messaggio per Babbo Natale:</label>
        <input type="text" placeholder="Caro Babbo Natale..." id="message" name="message"></br> 
        <div id="text_image">
            <span id = "change_text">Aggiungi un'immagine alla letterina</span>
        </div> 
        <input type="button" id="images_button"value="Mostra immagini">
        <input type="submit" class="submit" id="letter_submit" value="Invia">   
    </form>
    </section>
    <footer>
        <p>Christmas village- 325 S. Santa Claus Lane North Pole, AK 99705- santaclaus@gmail.com
            <br />Clelia Agata Nicotra O46002019</p>
    </footer>
</body>

</html>