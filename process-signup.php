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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert user details into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        // Successful sign-up
        echo "<div class='success'>Sign up successful. Redirecting to log-in page...</div>";
        echo "<script>setTimeout(function() { window.location.href = 'log-in.php'; }, 3000);</script>";
        exit();
    } else {
        // Error occurred while inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
