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
        // Email exists, redirect to the password reset page
        header("Location: new-password.php?email=" . urlencode($email));
        exit();
    } else {
        // Email does not exist in the database
        echo "<script>alert('Invalid email address. Please try again.'); window.location.href = 'password-reset.php';</script>";
        exit();
    }
}

$conn->close();
?>
