<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "medmaster_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Email exists, initiate password reset process
        // Here, you can implement the logic to send a password reset email to the user
        // You can generate a unique reset token and save it in the database along with the user's email
        // Send an email to the user with a link containing the reset token
        // The link can point to a password reset page where the user can enter a new password

        // For demonstration purposes, let's assume the password reset email has been sent successfully
        echo "<script>alert('Password reset email has been sent to your email address. Please check your inbox.'); window.location.href = 'login.php';</script>";
        exit();
    } else {
        // Email does not exist in the database
        echo "<script>alert('Invalid email address. Please try again.'); window.location.href = 'password-reset.php';</script>";
        exit();
    }
}

$conn->close();
?>
