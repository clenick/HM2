<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Playlist</title>
    <link rel="stylesheet" href='{{ url("css/music.css")}}'/>
    <script src='{{ url("js/playlist.js")}}' defer></script> 
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
    <header id= "playlist_header">
        <h1>Ascolta le tue playlist</h1>
        <div class="overlay"></div>
    </header>
    <div class="playlist">
        <a href='{{ url("music")}}'><input type='button' class="submit" value="Cerca nuovi brani"></a>
    </div>
    <form id="playlist_form"> 
      <!--  <input type='hidden' name='_token' value='{{ csrf_token() }}'> -->
        <h2>Crea una nuova playlist</h2>
        <label for="playlist_title">Dai un nome alla tua playlist</label>
        <input type="text" id="playlist_title" name="playlist_title" placeholder="Inserisci il nome della playlist">
        <input type='submit' class="submit" value="Crea">
    </form>  
    
    <div id="select_track" class="hidden"></div>
    <div id="playlist_message" class="hidden"></div>
    <section id=playlist_section> </section>
    <footer>
        <p>Christmas village- 325 S. Santa Claus Lane North Pole, AK 99705- santaclaus@gmail.com
        <br />Clelia Agata Nicotra O46002019</p>
    </footer>
    </body>
</html>
