<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Music</title>
    <link rel="stylesheet" href='{{ url("css/music.css")}}'/>
    <script src='{{ url("js/music.js")}}'defer></script>   
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Assistant:wght@200;400&family=Cormorant+Garamond:wght@300;500&family=DM+Serif+Display&family=Merriweather+Sans:ital,wght@0,600;1,800&family=Volkhov&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Assistant:wght@200;400&family=Cormorant+Garamond:wght@300&family=Merriweather+Sans:ital,wght@0,600;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <a href='{{ url("home")}}' class="esterno">Home</a>
        <a href ='{{ url("letter")}}'>Scrivi la letterina</a>
        <a href='{{ url("readLetter")}}'>Leggi le letterine</a>
        <a href='{{ url("music")}}'>Ascolta musica</a>
        <a href='{{ url("logout")}}' class="esterno">Logout</a>
        <div id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
    <header id= "music_header">
        <h1>Cerca un brano</h1>
        <!--<div class="overlay"></div>-->
    </header>

    <form id="music_form"> 
    <!--  <input type='hidden' name='_token' value='{{ csrf_token() }}'> -->
        <input type="text" name="track" id="search_music" placeholder="Inserisci il titolo del brano">
        <input type='submit' class="submit" value="Cerca">
    </form>
    <div class=playlist>
        <a href='{{ url("playlist")}}'><input type='button' class="submit" value="Le mie playlist" id="playlist_button"> </a>
    </div> 
    <div id="select_playlist" class="hidden">
        <span id="track_message" class="hidden">
    </div>
    <section id="music_section">
        <div class="blank_space"></div>
    </section>
         
    <footer>
        <p>Christmas village- 325 S. Santa Claus Lane North Pole, AK 99705- santaclaus@gmail.com
        <br />Clelia Agata Nicotra O46002019</p>
    </footer>
</body>

</html>