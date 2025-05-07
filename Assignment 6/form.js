document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    
    // Clear previous error messages
    clearErrors();
    
    // Get form values
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const age = document.getElementById('age').value;
    
    let isValid = true;
    
    // Name validation
    if (name === '') {
        displayError('nameError', 'Name is required');
        isValid = false;
    } else if (name.length < 3) {
        displayError('nameError', 'Name must be at least 3 characters');
        isValid = false;
    }
    
    // Email validation
    if (email === '') {
        displayError('emailError', 'Email is required');
        isValid = false;
    } else if (!isValidEmail(email)) {
        displayError('emailError', 'Please enter a valid email');
        isValid = false;
    }
    
    // Password validation
    if (password === '') {
        displayError('passwordError', 'Password is required');
        isValid = false;
    } else if (password.length < 6) {
        displayError('passwordError', 'Password must be at least 6 characters');
        isValid = false;
    }
    
    // Confirm Password validation
    if (confirmPassword === '') {
        displayError('confirmPasswordError', 'Please confirm your password');
        isValid = false;
    } else if (password !== confirmPassword) {
        displayError('confirmPasswordError', 'Passwords do not match');
        isValid = false;
    }
    
    // Age validation
    if (age === '') {
        displayError('ageError', 'Age is required');
        isValid = false;
    } else if (age < 18 || age > 100) {
        displayError('ageError', 'Age must be between 18 and 100');
        isValid = false;
    }
    
    // If form is valid
    if (isValid) {
        document.getElementById('successMessage').textContent = 'Form submitted successfully!';
        // Here you could also submit the form to a server
        // this.submit();
    }
});

function displayError(id, message) {
    const errorElement = document.getElementById(id);
    errorElement.textContent = message;
}

function clearErrors() {
    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => {
        element.textContent = '';
    });
    document.getElementById('successMessage').textContent = '';
}

function isValidEmail(email) {
    // Simple email validation regex
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}