const form = document.getElementById('signupform');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmpassword = document.getElementById('confirmpassword');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDispaly = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = () => {
   /* const { firstname, lastname, email, password, confirm_password } = inputs;*/

    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const confirmpasswordValue = confirmpassword.value.trim();

    if(firstnameValue=== ''){
        setError(firstname, 'Firstname is Required');
    }
    else {
        setSuccess(firstname);
    }
    if(lastnameValue=== ''){
        setError(lastname, 'Lastname is Required');
    }
    else {
        setSuccess(lastname);
    }
    if(emailValue=== ''){
        setError(email, 'Email is Required');
    }
    else {
        setSuccess(email);
    }
    if(passwordValue=== ''){
        setError(password, 'Password is Required');
    }
    else if (passwordValue.length < 8 ){
        setError(password, 'Password must be atleast 8 characters');
    }
    else {
        setSuccess(password);
    }
    if(confirmpasswordValue=== ''){
        setError(confirm_password, 'Firstname is Required');
    }
    else if (confirmpasswordValue !== passwordValue)
        setError(confirm_password, "Passwords doesn't match");
    else {
        setSuccess(confirm_password);
    }

};