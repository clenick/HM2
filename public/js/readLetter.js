fetch("getYearLetter").then(onResponse).then(yearJson);

function onResponse(response){
    return response.json();
}
function yearJson(json){
    //console.log(json);
    const form = document.querySelector("#read_letter_form");
    if(json.length>0){
        const label = document.createElement("label");
        label.textContent="Seleziona un anno";
        form.appendChild(label);
        const select = document.createElement("select");
        select.id="past_letter";
        form.appendChild(select);
        const button = document.createElement("input");
        button.type ="button";
        button.value="Leggi la letterina";
        button.id= "drop_button";
        form.appendChild(button);
    for(let i=0; i<json.length;i++)
    {   
        let option = document.createElement("option");
        option.text = json[i].Anno;
        option.value = json[i].Codice;
        select.appendChild(option);
    }
    button.addEventListener("click",function(){
        event.preventDefault();
        for(let i=0; i<json.length; i++)
        {
            if(json[i].Codice == select.value)
            {
                const div_letter = document.querySelector(".div_letter");
                div_letter.innerHTML="";
                //const div = document.createElement("div");
                const image = document.createElement("img");
                image.src = json[0].Immagine;
                const text = document.createElement("span");
                text.textContent = "Il tuo messaggio per Babbo Natale: ";
                const br = document.createElement("br");
                const message = document.createElement("span");
                message.textContent = json[0].Testo;

                div_letter.appendChild(text);
                div_letter.appendChild(br);
                div_letter.appendChild(message);
                div_letter.appendChild(image);
                //div_letter.appendChild(div);
            }
        }
        fetch("letter/id/"+select.value).then(onResponse).then(ToysJson);
    });
    }
    else{
        const section = document.querySelector(".div_letter");
        const text = document.createElement("span");
        text.textContent="Non hai ancora inviato una lettera a Babbo Natale!Scrivi la tua letterina.";
        section.appendChild(text);
        const a = document.createElement("a");
        a.href="letter";
        const button_write = document.createElement("input");
        button_write.type="button";
        button_write.classList.add("submit");
        button_write.value="Clicca qui";
        a.appendChild(button_write);
        section.appendChild(a);
    }
}

function ToysJson(json){
   // console.log(json);
    const div_letter = document.querySelector(".div_letter");
    const div = document.createElement("div");
    div.classList.add("div_toys");
    const text = document.createElement("span");
    text.textContent = "I tuoi giocattoli: ";
    const br = document.createElement("br");
    div_letter.appendChild(br);
    div_letter.appendChild(text);
    
    for(let i=0; i<json.length;i++){
        const div_toy = document.createElement("div");
        div_toy.classList.add("div_toy");
        const name  = document.createElement("span");
        const br = document.createElement("br");
        name.textContent=json[i].Nome;
        const immagine = document.createElement("img");
        immagine.src= json[i].Immagine;
        div_toy.appendChild(br);
        div_toy.appendChild(name);
        div_toy.appendChild(immagine);
        div.appendChild(div_toy);
    }
    div_letter.appendChild(div);
}