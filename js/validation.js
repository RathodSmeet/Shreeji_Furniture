// validation.js

// Function to validate the name field
function validateName() {
    var nameInput = document.getElementById('name');
    var nameValue = nameInput.value;

    // Use a regular expression to allow only letters and spaces
    var validName = /^[A-Za-z\s]+$/.test(nameValue);

    if (!validName) {
        alert('Please enter a valid name with no special characters or numbers.');
        nameInput.focus();
        return false;
    }

    return true;
}

// Function to validate the email field
function validateEmail() {
    var emailInput = document.getElementById('email');
    var emailValue = emailInput.value;

    // Use a regular expression to check for a valid email format
    var validEmail = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(emailValue);

    if (!validEmail) {
        alert('Please enter a valid email address (e.g., yourname@example.com).');
        emailInput.focus();
        return false;
    }

    return true;
}

// Function to validate the entire form before submission
function validateForm() {
    return validateName() && validateEmail();
}

// Attach the validation functions to the form submission event
var form = document.querySelector('form');