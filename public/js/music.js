document.querySelector("#music_form").addEventListener("submit", search);
function search(event)
{
    event.preventDefault();  
    const form = document.querySelector("#music_form");
    const input= form.track.value;
    fetch("music/track/"+encodeURIComponent(input)).then(onResponse).then(onJson);
}
function onResponse(response)
{  
    return response.json();
}

function onJson(json)
{  
    const music_section = document.querySelector("#music_section");
    music_section.innerHTML = '';
    let num_results = json.length; 
    if( num_results===0){
        const errore = document.createElement('p');
        errore.textContent= "Nessun risultato.";
        music_section.appendChild(errore);
    } 
    else{
        if(num_results>4){
            num_results = 4;
        }
        const music_album = document.createElement('div');
        music_album.id = "music_album";
        for(let i = 1; i<=num_results; i++){
            const title = document.createElement('h2');
            const link  = document.createElement('a');
            const artist = document.createElement('p');
            const add_playlist= document.createElement('input');
            add_playlist.type= "button";
            add_playlist.value ="Aggiungi alla tua playlist";
            add_playlist.classList.add("button");
            add_playlist.addEventListener('click',addToPlaylist);
            const music_box = document.createElement('div');
            music_box.classList = "music_box";

            title.textContent = json[i].name;
            artist.textContent = json[i].artist;
            link.href = json[i].url;
            link.target = "_blank";
            title.classList.add("title_m");
            artist.classList.add("text");

            link.appendChild(title);
            music_box.appendChild(link);
            music_box.appendChild(artist);
            music_box.appendChild(add_playlist);
            music_album.appendChild(music_box);
        }
        music_section.appendChild(music_album);
    }
}
function addToPlaylist(event){
    
    const button = event.currentTarget;
    const title_playlist = button.parentNode.firstChild.firstChild;
    title_playlist.classList.add("title_selected");
    const artist_playlist = button.parentNode.firstChild.nextSibling;
    artist_playlist.classList.add("artist_selected");
    const link_playlist = button.parentNode.firstChild;
    link_playlist.classList.add("link_selected");
    choosePlaylist();
    viewPlaylist();
}
function choosePlaylist(){
    fetch("feedPlaylist").then(onResponse).then(playlistJson);
}
function viewPlaylist(){
    const select_playlist =  document.querySelector("#select_playlist");
    select_playlist.classList.remove("hidden");
    const modale = document.createElement("div");
    modale.id="modale";
    select_playlist.style.top= window.pageYOffset + "px";
    select_playlist.appendChild(modale);
    document.body.classList.add("no-scroll");
}
function playlistJson(json){
    const title = document.createElement("h1");
    const modale = document.querySelector("#modale");
    const form = document.createElement("form");
    form.classList.add("form_modale");
    const title_form = document.createElement("h2");
    title_form.textContent = "Crea una nuova playlist";
    const label = document.createElement("label");
    label.textContent = "Nome: ";
    const title_playlist = document.createElement("input");
    title_playlist.type = "text";
    title_playlist.placeholder = "Inserisci il nome della playlist";
    const button_create = document.createElement("input");
    button_create.type = "button";
    button_create.value = "Crea";
    button_create.classList.add("button");
    button_create.addEventListener("click",function(){
        fetch("feedPlaylist/nome/"+title_playlist.value).then(onResponse).then(MessagePlaylistJson);
    });
    form.appendChild(title_form);
    form.appendChild(label);
    form.appendChild(title_playlist);
    form.appendChild(button_create);
    const button_exit = document.createElement("input");
    button_exit.type="button";
    button_exit.value="Torna indietro";
    button_exit.classList.add("button");
    button_exit.addEventListener("click",hidePlaylist);
    if(json.length>0){
        title.textContent= "Le tue playlist ";
        const label_select = document.createElement("label");
        label_select.textContent = "Seleziona una playlist";
        const select = document.createElement("select");
        select.name = "select";
        select.id = "select"
        for(let i=0; i<json.length;i++)
        {   
            let option = document.createElement("option");
            option.value = json[i].Id_numerico;
            option.text = json[i].Nome;
            select.appendChild(option); 
        } 
        const button = document.createElement("input");
        button.type="button";
        button.value="Aggiungi";
        button.classList.add("button");
        button.addEventListener("click",function(){
            const title = document.querySelector(".title_selected");
            const artist = document.querySelector(".artist_selected");
            const link = document.querySelector(".link_selected");
            fetch("createTrack/title/"+title.textContent+"/link/"+btoa(link.href)+"/artist/"+artist.textContent+"/playlist/"+select.value).then(onResponse).then(saveTrackJson);
            /*title.classList.remove("title_selected");
            artist.classList.remove("artist_selected");
            link.classList.remove("link_selected");*/
        });
        modale.appendChild(title);
        modale.appendChild(label_select);
        modale.appendChild(select);
        modale.appendChild(button);
    }
    else{
        title.textContent= "Non hai ancora creato nessuna playlist!";
        modale.appendChild(title);
    }
    modale.appendChild(form);
    modale.appendChild(button_exit);
}
function hidePlaylist(event){ 
    const title = document.querySelector(".title_selected");
    const artist = document.querySelector(".artist_selected");
    const link = document.querySelector(".link_selected");
    title.classList.remove("title_selected");
    artist.classList.remove("artist_selected");
    link.classList.remove("link_selected");
    const modale = event.currentTarget.parentNode;
    modale.innerHTML="";
    const select_playlist = modale.parentNode;
    select_playlist.classList.add("hidden");
    const message =  document.querySelector("#track_message");
    message.classList.add("hidden");
    document.body.classList.remove("no-scroll");
}
function saveTrackJson(json)
{   const message =  document.querySelector("#track_message");
    message.classList.remove("hidden");
    if(isNaN(json))
    {
        message.textContent = "Hai già salvato questo brano nella playlist ";
    }
    else
    {
        message.textContent= "Brano salvato!";
    }
    
}
function MessagePlaylistJson(json){
    const message =  document.querySelector("#track_message");
    message.classList.remove("hidden");
    if(isNaN(json))
    {
       message.textContent = "Hai già creato una playlist con questo nome";
    }
    else
    {
        message.textContent = "Playlist creata!";
    }
}






