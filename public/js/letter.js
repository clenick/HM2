let toys = new Array();

fetch("toy").then(searchResponse).then(toysJson);

function toysJson(json){
    const form = document.querySelector("#checkbox");
    for(let i = 0; i<json.length; i++){
        const div = document.createElement("div");
        const div_check = document.createElement("div");
        div_check.classList.add("div_check");
        div.classList.add("checkbox_content");
        const label = document.createElement("label");
        label.textContent = json[i].Nome;
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.value = json[i].Codice;
        const desc = document.createElement("p");
        desc.textContent = json[i].Descrizione;
        desc.classList.add("hidden");
        const immagine = document.createElement("img");
        immagine.src = json[i].Immagine;
        const button_details = document.createElement("input");
        button_details.type = "button";
        button_details.value = "Mostra dettagli";
        button_details.classList.add("show_details");
        button_details.addEventListener("click", showDetails);

        div_check.appendChild(checkbox);
        div_check.appendChild(label);
        div.appendChild(div_check);
        div.appendChild(immagine);
        div.appendChild(button_details);
        div.appendChild(desc);
        form.appendChild(div);
        checkbox.addEventListener('change', function() {
            if(this.checked) {
                toys.push(this.value);
            }
            else {
                for(let i = 0; i < toys.length; i++){ 
                    if (toys[i] === this.value) { 
                        toys.splice(i, 1); 
                    }
                }
            }
        });
        
    }

}

function showDetails(event) {
    const button = event.currentTarget;
    button.value= "Nascondi dettagli";
    const desc = button.nextSibling;
    desc.classList.remove("hidden");
    desc.classList.add("visible");
    button.removeEventListener("click", showDetails);
    button.addEventListener("click", hideDetails);
}
function hideDetails(event) {
    const button = event.currentTarget;
    button.value= "Mostra dettagli";
    const desc = button.nextSibling;
    desc.classList.remove("visible");
    desc.classList.add("hidden");
    button.removeEventListener("click", hideDetails);
    button.addEventListener("click", showDetails);
}
const images_button = document.querySelector('#images_button');
images_button.addEventListener('click',search);
function search(event){
    fetch("image").then(searchResponse).then(searchJson);
    event.preventDefault();
}
function searchResponse(response){
    return response.json();
}
function searchJson(json){
    images_button.remove();
    const submit = document.querySelector(".submit");
    submit.remove();
    const text = document.querySelector("#change_text");
    text.textContent = "Clicca su un'immagine per selezionarla:";
    const form = document.querySelector('#letter_form');
    const album_images = document.createElement('div');
    album_images.id = "album_images";
    let i;
    let counter = 0;
    for(i = counter; i< counter + 4; i++){
        const image = document.createElement('img');
       // image.id = i;
        image.addEventListener('click', selectImage);
        image.classList.add("imagesOfDiv");
        image.src = json[i].preview;
        album_images.appendChild(image);
    }
    counter = i;
    const button = document.createElement('input');
    button.type = "button";
    button.id= "more";
    button.value= "Mostra altre immagini";
    form.appendChild(button);
    
    button.addEventListener('click',function(){
        for(i = counter; i< counter + 4; i++){
            const image = document.createElement('img');
           // image.id = i;
            image.addEventListener('click', selectImage);
            image.classList.add("imagesOfDiv");
            image.src = json[i].preview;
            album_images.appendChild(image);  
        }
        counter = i;
    });
    form.appendChild(album_images);
    const send = document.createElement('input');
    send.type= "submit";
    send.value="Invia";
    send.id="letter_submit";
    send.classList.add("submit");
    form.appendChild(send);
}
let image_selected;
function selectImage(event)
{   
    const image = event.currentTarget;
    const image_url = image.src;
    const div = document.querySelector("#text_image");
    div.appendChild(image);
    const images = document.querySelectorAll(".imagesOfDiv");
    for(im of images){ 
        im.removeEventListener('click', selectImage);
    }
    image.addEventListener('click', removeImage);
    const button_more = document.querySelector("#more");
    button_more.classList.add("hidden");
    image_selected=image_url;
}
function removeImage(event)
{
    const image = event.currentTarget;
    const album = document.querySelector("#album_images");
    image.removeEventListener('click', removeImage);
    album.appendChild(image);
    const images = document.querySelectorAll(".imagesOfDiv");
    for(ima of images){
        ima.addEventListener('click', selectImage);
    }
    const button_more = document.querySelector("#more");
    button_more.classList.remove("hidden");

}
const letter_submit = document.querySelector("#letter_form");
letter_submit.addEventListener("submit",send_letter);

function send_letter(){
    const message = document.querySelector("#message");
    event.preventDefault();
    if(message.value.length>0)
    {
            fetch("letter/message/"+message.value+"/image/"+btoa(image_selected)).then(searchResponse).then(JsonLetter); 
            viewLetterMessage();
    }
    else{
        viewLetterMessage();
        viewErrorMessage();
    }
}
function viewLetterMessage()
{
    const letter_message =  document.querySelector("#letter_message");
    letter_message.classList.remove("hidden");
    const modale = document.createElement("div");
    modale.id="modale_letter_message";
    letter_message.style.top= window.pageYOffset + "px";
    letter_message.appendChild(modale);
    document.body.classList.add("no-scroll");
    letter_message.addEventListener("click",hideLetterMessage);
}
function viewErrorMessage(){
    const modale = document.querySelector("#modale_letter_message");
    const message = document.createElement("span");
    message.textContent = "Scrivi un messaggio";
    modale.appendChild(message);
}
function JsonLetter(json)
{   const modale = document.querySelector("#modale_letter_message");
    const message = document.createElement("span");
    if(isNaN(json))
    {
        message.textContent = "Hai già inviato una letterina quest'anno!";
    }
    else
    {   message.textContent = "Letterina inviata!";
        send_request();
    }
    modale.appendChild(message);
}
function hideLetterMessage(event){ 
    const modale = event.currentTarget.firstChild;
    modale.innerHTML="";
    const letter_message = event.currentTarget;
    letter_message.classList.add("hidden");
    document.body.classList.remove("no-scroll");
}
function send_request(){
    for(let i=0; i<toys.length; i++){
        fetch("request/toy/"+toys[i]);
    }
}




