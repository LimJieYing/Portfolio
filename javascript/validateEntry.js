let form = document.getElementById('addBlogForm');
let clearButton = document.getElementById('clear');
let previewButton = document.getElementById('preview');

//ffor previwe button, change the form action.
previewButton.addEventListener('click', function(event) {
    event.preventDefault();
    form.action = 'preview.php';
    form.submit();
}); 


// for event processing for clear button
//lets user confirm to clear
clearButton.addEventListener('click', function(event) {
    event.preventDefault();
    
    let confirmClear = confirm('Are you sure you want to clear the form?');

    if (confirmClear) {
        document.getElementById('title').value = '';
        document.getElementById('titleInput').style.backgroundColor = 'aquamarine';

        document.getElementById('content').value = '';
        document.getElementById('contentInput').style.backgroundColor = 'aquamarine';

    }

});

// for event processing for submit button
//prevents submitting if blank fields detected, highlights blank fields
form.addEventListener('submit', function(event) {
    event.preventDefault();

    document.getElementById('titleInput').style.backgroundColor = 'aquamarine';
    document.getElementById('contentInput').style.backgroundColor = 'aquamarine';

    let is_valid = true;
    
    let currentTitle = document.getElementById('title').value;
    
    let currentContent = document.getElementById('content').value;

    if (currentTitle === '') {
        document.getElementById('titleInput').style.backgroundColor = 'red';
        is_valid = false;
    }

    if (currentContent === '') {
        document.getElementById('contentInput').style.backgroundColor = 'red';
        is_valid = false;
    }

    if(is_valid)
    {
        form.submit();
    }
    else
        alert('Please fill in the required fields');
}); 

