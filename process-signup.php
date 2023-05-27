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

    // Check if the user already exists in the database
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // User with the same username or email already exists
        echo "<p class='error'>User with the same username or email already exists. Please try a different username or email.</p>";
    } else {
        // Insert user details into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            // Successful sign-
            echo "<div class='success'>Sign up successful. Redirecting to log-in page...</div>";
            echo "<script>setTimeout(function() { window.location.href = 'log-in.php'; }, 3000);</script>";
            exit();
        } else {
            // Error occurred while inserting data
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

