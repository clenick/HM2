function validateName(event) {
    const input = event.currentTarget; 
    const div_name = input.parentNode;
    const span = input.nextElementSibling.nextElementSibling;
    if(input.value == 0){
        span.classList.remove("hidden");
        div_name.classList.add("error");  
    }
    else{
        div_name.classList.remove("error");
        span.classList.add("hidden");
    } 
}

function onJson(json) {
    const div_name = document.querySelector(".signup_username");
    const span = document.querySelector("#span_username");
    if (json.exists === true) {
        span.innerHTML = "";
        span.textContent="Username non disponibile"
        span.classList.remove("hidden");
        div_name.classList.add("error");  
    } 
    else {
        div_name.classList.remove("error");
        span.classList.add("hidden");
    }
}
function onResponse(response){
    return response.json();
}
function checkUsername(event){
    const input = event.currentTarget;
    if(input.value.length>0){
        fetch("signup/username/"+encodeURIComponent(input.value)).then(onResponse).then(onJson);
    }
    else{
        const span = document.querySelector("#span_username");
        span.innerHTML = "";
        span.textContent = "Inserisci un'username";
        span.classList.remove("hidden");
        const div_name = document.querySelector(".signup_username");
        div_name.classList.add("error"); 
    }
}
function validateEmail(event) 
{   const input = event.currentTarget;
    const div_name = input.parentNode;
    const span = input.nextElementSibling.nextElementSibling;
    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(input.value))
    {   span.classList.remove("hidden");
        div_name.classList.add("error");  
    }
   else{
    div_name.classList.remove("error");
    span.classList.add("hidden");
   }
}
function checkPassword(event){
    const input = event.currentTarget;
    const div_name = input.parentNode;
    const span = input.nextElementSibling.nextElementSibling;
    if(/[A-Z]/.test(input.value) && /[a-z]/.test(input.value) && /[0-9]/.test(input.value) && input.value.length>7 && input.value.length<15 )
    {   div_name.classList.remove("error");
        span.classList.add("hidden");
    }
    else{
       span.classList.remove("hidden");
        div_name.classList.add("error");
    }
      
}
function checkConfirmPassword(event){
    const input = event.currentTarget;
    const div_name = input.parentNode;
    const span = input.nextElementSibling.nextElementSibling;
    const psw =  document.querySelector("#password_input")
    if(input.value !== psw.value){
        span.classList.remove("hidden");
        div_name.classList.add("error"); 
    }
    else{
        div_name.classList.remove("error");
        span.classList.add("hidden");
    }
}
const name_input = document.querySelector('#name_input');
name_input.addEventListener('blur', validateName);
const surname_input = document.querySelector('#surname_input');
surname_input.addEventListener('blur', validateName);
const address_input = document.querySelector('#address_input');
address_input.addEventListener('blur', validateName);
const age_input = document.querySelector('#age_input');
age_input.addEventListener('blur', validateName);
const email_input = document.querySelector('#email_input');
email_input.addEventListener('blur', validateEmail);
const username_input = document.querySelector('#username_input');
username_input.addEventListener('blur', checkUsername);
const password_input = document.querySelector('#password_input');
password_input.addEventListener('blur', checkPassword);
const psw_confirm = document.querySelector('#psw_confirm_input');
psw_confirm.addEventListener('blur', checkConfirmPassword);