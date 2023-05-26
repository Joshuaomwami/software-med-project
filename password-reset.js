// Attach event listener to the form
var passwordResetForm = document.getElementById('passwordResetForm');
passwordResetForm.addEventListener('submit', handleFormSubmission);

// Function to handle form submission
function handleFormSubmission(event) {
  event.preventDefault(); // Prevent form submission

  var emailOrUsername = document.getElementById('email').value;

  // Perform additional validation or data manipulation if required

  // Simulating password reset request
  var success = true; // Set this to false if the password reset request fails

  if (success) {
    displaySuccessMessage();
    redirectToConfirmationPage();
  } else {
    displayErrorMessage();
  }
}

// Function to display success message
function displaySuccessMessage() {
  var successMessage = document.getElementById('successMessage');
  successMessage.style.display = 'block';
}

// Function to display error message
function displayErrorMessage() {
  var errorMessage = document.getElementById('errorMessage');
  errorMessage.style.display = 'block';
}

// Function to redirect to confirmation page
function redirectToConfirmationPage() {
  // Replace 'confirmation.html' with the actual URL of your confirmation page
  window.location.href = 'confirmation.html';
}
