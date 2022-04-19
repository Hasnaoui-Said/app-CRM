let submit = document.querySelector('button');
let email = document.querySelector('#email');
let username = document.querySelector('#name');
let messageErrEmail = document.querySelector('.invalidEmail');
let messageErrUsername = document.querySelector('.invalidUsername');
let regexEmail = /(?:[a-z0-9!#$%&'*+\=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/
let regexUsername = /^[a-z0-9A-Zéçàèù\.\$\-\_]{3,}+$/;
let regexPhone = /^[\+][0-9]{12}+$/;
email.addEventListener('keyup', ()=>{
    if(regexEmail.test(email.value)){
        messageErrEmail.textContent = '';
        messageErrEmail.classList.remove('border','border-danger','px-2', 'mx-2')
        email.classList.remove('border', 'border-danger')
    }else{
        messageErrEmail.textContent = 'Field is required.';
        messageErrEmail.classList.add('border','rounded-2','border-danger','px-2', 'mx-2')
        email.classList.add('border', 'border-danger')
    }
});
username.addEventListener('keyup', ()=>{
    if(regexUsername.test(username.value)){
        messageErrUsername.textContent = '';
        messageErrUsername.classList.remove('border','border-danger','px-2', 'mx-2')
        username.classList.remove('border', 'border-danger')
    }else{
        messageErrUsername.textContent = 'Field is required.';
        messageErrUsername.classList.add('border','rounded-2','border-danger','px-2', 'mx-2')
        username.classList.add('border', 'border-danger')
    }
});
submit.addEventListener('click', (e)=>{
    if(!regexPass.test(pass.value) || !regexEmail.test(email.value) ||
        username.value == '' || phone.value == '' ||
        !regexUsername.test(username.value) 
        ){
        statusErr.textContent = 'Champs obligatoire (*)'
        e.preventDefault();
    }
});