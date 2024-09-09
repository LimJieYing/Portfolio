let form = document.getElementById('registerForm');

//check if pw are same.
form.addEventListener('submit', function(event) {

    let isvalid = true;
    event.preventDefault();

    let password = document.getElementById('Password').value;
    let confirmPassword = document.getElementById('ConfirmPassword').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match');
        isvalid = false;
        document.getElementById('Password').style.backgroundColor = 'red';
        document.getElementById('ConfirmPassword').style.backgroundColor = 'red';
    }

    if (isvalid) {
        form.submit();
    }


});