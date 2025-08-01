// Signin page
const form = document.getElementById('signin-form');
const username_input = document.getElementById('username-input');
const password_input = document.getElementById('password-input');
const error_message = document.getElementById('error-message');

form.addEventListener('submit', (e) => {
  let errors = [];

  errors = getSigninFormErrors(
    email_input.value.trim(),
    password_input.value
  );

  if (errors.length > 0) {
    e.preventDefault();
    error_message.innerText = errors.join('. ') + '.';
  } else {
    const storedUser = localStorage.getItem('user_' + username_input.value.trim());
    if (!storedUser) {
      e.preventDefault();
      error_message.innerText = 'No account found with this username.';
      email_input.parentElement.classList.add('incorrect');
      return;
    }

    const user = JSON.parse(storedUser);
    if (user.password !== password_input.value) {
      e.preventDefault();
      error_message.innerText = 'Incorrect password. Please try again.';
      password_input.parentElement.classList.add('incorrect');
      return;
    }

    localStorage.setItem('loggedInUser', username_input.value.trim());

    alert(`Welcome back, ${user.username || 'user'}!`);
    window.location.href = 'index.html';
  }
});

function getSigninFormErrors(username, password) {
  let errors = [];

  clearSigninErrors();

  if (!username) {
    errors.push('Please enter your username');
    username_input.parentElement.classList.add('incorrect');
  }

  if (!password) {
    errors.push('Please enter your password');
    password_input.parentElement.classList.add('incorrect');
  }

  return errors;
}

function clearSigninErrors() {
  [username_input, password_input].forEach(input => {
    input.parentElement.classList.remove('incorrect');
  });
  error_message.innerText = '';
}


[username_input, password_input].forEach(input => {
  input.addEventListener('input', () => {
    if (input.parentElement.classList.contains('incorrect')) {
      input.parentElement.classList.remove('incorrect');
      error_message.innerText = '';
    }
  });
});
