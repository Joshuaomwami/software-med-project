// Get form and add event listener for form submission
var signUpForm = document.getElementById('sign-up-form');
signUpForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission
  
  // Get form inputs
  var username = document.getElementById('username').value;
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var confirmPassword = document.getElementById('confirm-password').value;

  // Perform validation and create user in the database
  if (password === confirmPassword) {
    // Create user in the database with the entered details
    // You can send an HTTP request to your server to handle the database operations
    // Example: fetch('/create-user', { method: 'POST', body: JSON.stringify({ username, email, password }) });
    
    // Display success message or redirect to a confirmation page
    window.location.href = 'confirmation.html';
  } else {
    // Display error message
    alert('Password and confirm password do not match');
  }
});
