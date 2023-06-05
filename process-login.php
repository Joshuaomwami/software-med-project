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
    $password = $_POST['password'];

    // Retrieve user details from the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, redirect to the desired page
        header("Location: add_medication.php");
        exit();
    } else {
        // User not found or invalid credentials, redirect back to login with error notification
        header("Location: login.php?error=invalid")
        {
            echo "<p class='error'>Invalid email or password. Please try again.</p>";
        }
        exit();
    }
}

$conn->close();
?>
