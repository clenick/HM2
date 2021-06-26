fetch("toyCategory").then(onResponse).then(onJson);

function onResponse(response)
{
    return response.json();
}

function onJson(json)
{  
    const select = document.querySelector("#select_toy_category");
    fetch("toy/category/"+json[0].categoria).then(onResponse).then(toyJson);
    for(let i=0; i<json.length;i++)
    {   
        let option = document.createElement("option");
        option.value = json[i].categoria;
        option.text = json[i].categoria;
        select.appendChild(option); 
    }
    const button = document.querySelector("#inspiration_button");
    button.addEventListener("click",function(){
        fetch("toy/category/"+select.value).then(onResponse).then(toyJson);
    });
}
function toyJson(json)
{
    const album = document.querySelector("#album_toys");
    album.innerHTML ="";
    for(let i=0; i<json.length; i++)
    {   const div = document.createElement("div");
        div.classList.add("toy");
        const title = document.createElement("h3");
        title.textContent = json[i].Nome;
        const immagine = document.createElement("img");
        immagine.src = json[i].Immagine;
        div.appendChild(title);
        div.appendChild(immagine);
        album.appendChild(div);
    }
}
