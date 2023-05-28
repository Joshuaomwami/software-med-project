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
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($newPassword == $confirmPassword) {
        // Update the password in the database
        $sql = "UPDATE users SET password='$newPassword' WHERE email='$email'";
        $conn->query($sql);

        echo "<script>alert('Password has been successfully reset.'); window.location.href = 'login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Passwords do not match. Please try again.'); window.location.href = 'enter-new-password.php?email=" . urlencode($email) . "';</script>";
        exit();
    }
}

$conn->close();
?>
