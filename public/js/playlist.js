document.querySelector("#playlist_form").addEventListener("submit",savePlaylist);
function savePlaylist(event){
    event.preventDefault();
    const title_input= document.querySelector("#playlist_title");
    fetch("feedPlaylist/nome/"+title_input.value).then(onResponse).then(createPlaylistJson);
    event.currentTarget.removeEventListener;
    viewMessage();
}
function viewMessage(){
    const playlist_message =  document.querySelector("#playlist_message");
    playlist_message.classList.remove("hidden");
    const modale = document.createElement("div");
    modale.id="modale_playlist_message";
    playlist_message.style.top= window.pageYOffset + "px";
    playlist_message.appendChild(modale);
    document.body.classList.add("no-scroll");
    playlist_message.addEventListener("click",hidePlaylistMessage);
}
function createPlaylistJson(json)
{   console.log(json);
    const modale = document.querySelector("#modale_playlist_message");
    const message = document.createElement("span");
    if(isNaN(json))
    {
       message.textContent = "Hai già creato una playlist con questo nome";
    }
    else
    {
        message.textContent = "Playlist creata!";
        location.reload();
    }
    modale.appendChild(message);
}

function hidePlaylistMessage(event){ 
    const modale = event.currentTarget.firstChild;
    modale.innerHTML="";
    const playlist_message = event.currentTarget;
    playlist_message.classList.add("hidden");
    document.body.classList.remove("no-scroll");
}
fetch('feedPlaylist').then(onResponse).then(onJson);
function onResponse(response)
{   
    return response.json();
}
function onJson(json){
   const sec= document.querySelector("#playlist_section");
    if(json.length ==0){
        const span = document.createElement("span");
        span.textContent= "Non hai ancora creato nessuna playlist!";
        sec.appendChild(span);
    }
    else{
        const section_h1 = document.createElement("h1");
        section_h1.textContent = "Le tue playlist:";
        sec.appendChild(section_h1);
        const div = document.createElement("div");
        div.id = "playlist_list";
        for(let i=0;i<json.length;i++)
        {   const box = document.createElement("div");
            box.classList.add("box_playlist");
            const title = document.createElement("h2");
            title.textContent= json[i].Nome;
            title.classList.add("title_playlist");
            const image = document.createElement("img");
            image.src = "img/icon_playlist.png";
            const n_track = document.createElement("span");
            n_track.textContent= "Numero di canzoni: "+json[i].Num_canzoni;
            const id_playlist= json[i].Id_numerico;
            const button = document.createElement("input");
            button.type ="button";
            button.value="Mostra canzoni";
            button.classList.add("button_box");
            button.addEventListener("click", function(){
                fetch("getTrack/playlist/"+id_playlist).then(onResponse).then(TrackJson);
                viewTrack();
            });
            /*const button_delete = document.createElement("input");
            button_delete.type ="button";
            button_delete.value="Elimina playlist";
            button_delete.classList.add("button_box");*/
            const div_title = document.createElement("div");
            div_title.classList.add("div_title_playlist");
            const delete_playlist_icon = document.createElement("img");
            delete_playlist_icon.src ="img/icon_delete_playlist-removebg-preview.png";
            delete_playlist_icon.classList.add("icon");
            delete_playlist_icon.addEventListener("click", function(){
                fetch("deletePlaylist/codice/"+id_playlist);
                location.reload();
            });
            div_title.appendChild(title);
            div_title.appendChild(delete_playlist_icon);
            box.appendChild(div_title);
            box.appendChild(image);
            box.appendChild(n_track);
            box.appendChild(button);
           // box.appendChild(button_delete);
            div.appendChild(box);
        }
        sec.appendChild(div);
    }
}

function viewTrack(){
    const select_track =  document.querySelector("#select_track");
    select_track.classList.remove("hidden");
    const modale = document.createElement("div");
    modale.id="modale_track";
    select_track.style.top= window.pageYOffset + "px";
    select_track.appendChild(modale);
    document.body.classList.add("no-scroll");
}
function hideTrack(event){ 
    const modale = event.currentTarget.parentNode;
    modale.innerHTML="";
    const select_track = modale.parentNode;
    select_track.classList.add("hidden");
    document.body.classList.remove("no-scroll");
}
function TrackJson(json){
    const modale =  document.querySelector("#modale_track");
    if(json.length>0){
    const modale_h1 = document.createElement("h1");
    modale_h1.textContent = "Seleziona una canzone della tua playlist per ascoltarla: ";
    const br = document.createElement("br");
    const select = document.createElement("select");
    select.name = "select";
    select.id = "select";
    for(let i=0; i<json.length;i++)
    {  
        let option = document.createElement("option");
        option.value = json[i].Codice;
        option.text = decodeURI(json[i].titolo);
        select.appendChild(option);
    } 
    const div_track = document.createElement("div");
    const button_search = document.createElement("input");
    button_search.type = "button";
    button_search.value = "Ascolta";
    button_search.classList.add("button");
    button_search.addEventListener("click",function(){
       div_track.innerHTML= "";
       for(let i=0; i<json.length;i++){
           if(json[i].Codice == select.value){    
               const title = document.createElement("h2");
               title.textContent = json[i].titolo;
               const link = document.createElement("a");
               link.href = json[i].url;
               link.target = "_blank";
               const image = document.createElement("img");
               image.src ="img/icon_track.png";
               const delete_track_icon = document.createElement("img");
               delete_track_icon.src = "img/icon_delete_track-removebg-preview.png";
               delete_track_icon.classList.add("icon");
               const div_track_title = document.createElement("div");
               div_track_title.classList.add("div_title_playlist");
               /*const button_delete = document.createElement("input");
               button_delete.type= "button";
               button_delete.value = "Rimuovi brano";
               button_delete.classList.add("button");*/
               delete_track_icon.addEventListener("click",function(){
                   
                    fetch("deleteTrack/codice/"+json[i].Codice);
                    location.reload();
               });
               link.appendChild(title);
               div_track_title.appendChild(link);
               div_track_title.appendChild(delete_track_icon);
               div_track.appendChild(div_track_title);
               div_track.appendChild(image);
               div_track.classList.add("box_playlist");
           }
       }
    });
    modale.appendChild(modale_h1);
    modale.appendChild(br);
    modale.appendChild(select);
    modale.appendChild(button_search);
    modale.appendChild(div_track);
}
else{
    const modale_h1 = document.createElement("h1");
    modale_h1.textContent = "Non hai ancora aggiunto nessuna canzone a questa playlist";
    modale.appendChild(modale_h1);
    const a = document.createElement("a");
    a.href="music";
    const button = document.createElement("input");
    button.type="button";
    button.value="Scegli un nuovo brano";
    button.classList.add("button");
    a.appendChild(button);
    modale.appendChild(a);
    }
const button_exit = document.createElement("input");
button_exit.type="button";
button_exit.value="Torna indietro";
button_exit.classList.add("button");
button_exit.addEventListener("click",hideTrack);
modale.appendChild(button_exit);
}

