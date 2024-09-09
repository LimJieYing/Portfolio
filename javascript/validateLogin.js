let form = document.getElementById('loginForm');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    let is_valid = true;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if(email === ''){
        document.getElementById('emailInput').style.backgroundColor = 'red';
     is_valid = false;
    }

    if(password === ''){
        document.getElementById('passwordInput').style.backgroundColor = 'red';
     is_valid = false;
    }

    if (is_valid){
        form.submit();
    }

});