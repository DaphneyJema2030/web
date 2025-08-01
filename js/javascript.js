//Signup page
const form = document.getElementById('signup-form');
const firstname_input = document.getElementById('firstname-input');
const lastname_input = document.getElementById('lastname-input');
const email_input = document.getElementById('email-input');
const tel_input = document.getElementById('tel-input');
const username_input = document.getElementById('username-input');
const password_input = document.getElementById('password-input');
const confirm_password_input = document.getElementById('confirm-password-input');
const error_message = document.getElementById('error-message');


form.addEventListener ('submit', (e) => {

    let errors =[];

        errors = getSignupFormErrors(firstname_input.value.trim, lastname_input.value.trim, email_input.value,tel_input.value.trim, username_input.value.trim, password_input.value, confirm_password_input.value);

    if(errors.length > 0){
        e.preventDefault();
        error_message.innerText = errors.join('. ') + '.';
    }
    else{
        alert("Form submitted successfully!")
    }
});
function getSignupFormErrors(firstname, lastname, email, tel, username, password, confirm_password){
    let errors = [];

    clearAllErrors();

    if(!firstname){
        errors.push('Firstname is Required');
        firstname_input.parentElement.classList.add('incorrect');
    }
    if(!lastname){
        errors.push('Lastname is Required');
        lastname_input.parentElement.classList.add('incorrect');
    }
    if(!email){
        errors.push('Email is Required');
        email_input.parentElement.classList.add('incorrect');
    }
    if(!tel){
        errors.push('Telephone is Required');
        tel_input.parentElement.classList.add('incorrect');
    }
    if(!username){
        errors.push('Username is Required');
        username_input.parentElement.classList.add('incorrect');
    if(!password){
        errors.push('Password is Required');
        password_input.parentElement.classList.add('incorrect');
    }
    else if(password.length < 8){
        errors.push('Password must have atleast 8 characters');
        password_input.parentElement.classList.add('incorrect');
    }
    if(password !== confirm_password){
        errors.push('Password does not match previous password');
        confirm_password_input.parentElement.classList.add('incorrect');
        password_input.parentElement.classList.add('incorrect');
        
    }

    return errors;
}


function clearAllErrors() {
  [firstname_input, lastname_input, email_input, password_input, confirm_password_input].forEach(input => {
    input.parentElement.classList.remove('incorrect');
  });
  error_message.innerText = '';
}
};