<?php
// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medmaster_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert the user details into the users table
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
