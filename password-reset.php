<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's email from the form
    $email = $_POST['email'];

    // Generate a unique token for password reset (can use a library like `ramsey/uuid`)
    $token = uniqid();

    // Store the token in your database or any other persistence mechanism
    // Associate the token with the user's email or user ID for verification

    // Send the password reset email
    $to = $email;
    $subject = 'Password Reset';
    $message = 'Click the following link to reset your password: http://example.com/reset-password.php?token=' . $token;
    $headers = 'From: your_email@example.com' . "\r\n" .
        'Reply-To: your_email@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        // Redirect the user back to the original page with a success message
        $redirect = $_POST['redirect'];
        header("Location: $redirect?success=1");
        exit();
    } else {
        // Redirect the user back to the original page with an error message
        $redirect = $_POST['redirect'];
        header("Location: $redirect?error=1");
        exit();
    }
}
?>
