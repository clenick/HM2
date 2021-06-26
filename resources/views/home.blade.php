<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Christmas village</title>
    <script src='{{ url("js/home.js")}}' defer></script>
    <link rel="stylesheet" href='{{ url("css/home.css")}}' />  
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chango&family=Noto+Serif:ital,wght@1,700&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
</head>
<body>
<nav>
    <a href='{{ url("home")}}' class="esterno">Home</a>
    <a href ='{{ url("letter")}}'>Scrivi la letterina</a>
    <a href='{{ url("readLetter")}}'>Leggi le letterine</a>
    <a href='{{ url("music")}}'>Ascolta musica</a>
    <a href='{{ url("logout")}}'class="esterno">Logout</a>
    <div id="hamburger">
        <div></div>
        <div></div>
        <div></div>
    </div>
</nav>
<header>
        <h1>Christmas Village</h1>
        <img src="img/luci-natale.png">
        <h3>Benvenuto, {{$Nome}} !</h3>
        <img src="img/unnamed-removebg-preview.png" id="ribbon">
        <div class="overlay"></div>
</header>

<section>
    <div class="box" id="inspiration">
        <h1>Lasciati ispirare per la tua letterina</h1>
        <p>Seleziona una categoria di giocattoli</p>  
        <select id="select_toy_category">
        <input type='button' class="submit" id="inspiration_button" value="Seleziona">
        <div id="album_toys"></div>
    </div>
    <div class="box" id="box_write">  
        <img src="img/box1.jpg">
        <div class="testo">
            <h1>Babbo Natale ti aspetta:</h1>
            <h2>Scrivi la tua letterina!</h2>
            <p>Ogni anno milioni di bambini scrivono una lettera.</br> Adesso anche tu puoi esprimere i tuoi desideri.</p>
            <a class="button" href='{{ url("letter")}}'>Clicca qui</a>
        </div>
    </div>
  <!--  <div class="box">  
            <img src="img/letter.png">
            <div class="testo">
                <h2>Vuoi leggere le tue vecchie lettere?</h2>
                <p>Puoi scegliere l'anno di cui desideri leggere la tua lettera!</br>Conserviamo con cura tutti i tuoi ricordi.</p>
                <a class="button"  href='{{ url("readLetter")}}'>Clicca qui</a>
            </div>
        </div> 
        <div class="box">  
            <img src="img/music.png">
            <div class="testo">
                <h2>Intrattieniti insieme a noi</h2>
                <p>Puoi cercare tutta la tua musica che vuoi!</p>
                <a class="button"  href='{{ url("music")}}'>Clicca qui</a>
                <p>Non dimenticarti di salvare i tuoi brani preferiti nelle tue playlist.</p>
                <a class="button"  href='{{ url("playlist")}}'>Vai alle mie playlist!</a>
            </div>
        </div>-->
    <div class="music_div">
        <h1>Intrattieniti insieme a noi</h1>
        <div class="music_box">
            <div class = "testo">
               <img src="img/radio.png">
                <p>Puoi cercare tutta la tua musica che vuoi!</p>
                <a class="button"  href='{{ url("music")}}'>Clicca qui</a>
            </div>
            <div class = "testo">
                <img src="img/music.png">
                <p>Salva i tuoi brani preferiti nelle tue playlist.</p>
                <a class="button"  href='{{ url("playlist")}}'>Clicca qui</a>
            </div>
        </div>
    </div>
    </section>

    <footer>
        <p>Christmas village- 325 S. Santa Claus Lane North Pole, AK 99705- santaclaus@gmail.com
            <br />Clelia Agata Nicotra O46002019</p>
    </footer>
</body>
</html>