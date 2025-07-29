//Shared DOM references
const form = document.getElementById('signup-form');
const firstname_input = document.getElementById('firstname-input');
const lastname_input = document.getElementById('lastname-input');
const email_input = document.getElementById('email-input');
const password_input = document.getElementById('password-input');
const confirm_password_input = document.getElementById('confirm-password-input');
const error_message = document.getElementById('error-message');


form.addEventListener ('submit', (e) => {

    let errors =[];
    if(firstname_input){
        errors = getSignupFormErrors(firstname_input.value, lastname_input.value, email_input.value, password_input.value, confirm_password_input.value);
    }
    else{
        errors = getSigninFormErrors(email_input.value, password_input.value);
    }
    if(errors.length > 0){
        e.preventDefault();
        error_message.innerText = errors.join(". ");
    }
    else{
        alert("Form submitted successfully!")
    }
});
function getSignupFormErrors(firstname, lastname, email, password, confirm_password){
    let errors = [];

    if(firstname === '' || firstname == null){
        errors.push('Firstname is Required');
        firstname_input.parentElement.classList.add('incorrect');
    }
    if(lastname === '' || lastname == null){
        errors.push('Lastname is Required');
        lastname_input.parentElement.classList.add('incorrect');
    }
    if(email === '' || email == null){
        errors.push('Email is Required');
        email_input.parentElement.classList.add('incorrect');
    }
    if(password === '' || password == null){
        errors.push('Password is Required');
        password_input.parentElement.classList.add('incorrect');
    }
    if(password.length < 8){
        errors.push('Password must have atleast 8 characters');
        password_input.parentElement.classList.add('incorrect');
    }
    if(password !== confirm_password){
        errors.push('Password does not match repeated password');
        password_input.parentElement.classList.add('incorrect');
        confirm_password_input.parentElement.classList.add('incorrect');
    }

    return errors;
}


function getSigninFormErrors(email, password) {
    let errors = [];
    if(email === '' || email == null) {
        errors.push('Email is Required');
        document.getElementById('email').parentElement.classList.add('incorrect');
    }
    if(password === '' || password == null){
        errors.push('Password is Required');
        document.getElementById('password').parentElement.classList.add('incorrect');
    }


    return errors;
    
}

const allInputs = [firstname_input, lastname_input, email_input, password_input, confirm_password_input].filter(input => input != null);
allInputs.forEach(input => {
    input.addEventListener('input', () => {
        if (input.parentElement.classList.contains('incorrect')){
            input.parentElement.classList.remove('incorrect');
            error_message.innerText = '';
        }

    });
});