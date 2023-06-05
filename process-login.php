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
    $pass = $_POST['password'];

    // Retrieve user details from the database
    $sql = "SELECT * FROM users WHERE email='$email' AND passwod='$pass'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($result->num_rows == 1) {
        // User found, redirect to the desired page
        session_start();
        $_SESSION['user_id'] = $row['users_id'];
        header("Location: add_medication.php");
        exit();
    } else {
        // User not found or invalid credentials, redirect back to login with error notification
        header("Location: login.php");
        exit();
    }
}

$conn->close();
?>
