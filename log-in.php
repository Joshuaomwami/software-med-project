<!DOCTYPE html>
<html>

<head>
  <title>Website Login</title>
  <link rel="stylesheet" href="log-in.css">
</head>
<?php




?>

<body>
  <nav class="navbar">
    <ul>
      <li>
        <img src="med-images/medl.jpg" alt="Logo">
      </li>
      <li><a href="home.html">Home</a></li>
      <li><a href="about-us.html">About Us</a></li>
    </ul>
  </nav>

  <div class="container">
    <h1>Login</h1>
    <form id="login-form">
      <label for="email">Email:</label>
      <input type="email" id="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" required>
      <button type="submit">Login</button>
    
    <p>Don't have an account? <a href="sign-up.html">Sign up here</a></p>
    <p>Forgot your password? <a href="password-reset.html">Reset it here</a></p>
   </form>
  </div>
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user details from the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, redirect to the menu page
        header("Location: index.html");
        exit();
    } else {
        // User not found, display message and option to register
       // echo "<p>Invalid email or password. Please <a href='register.php'>register</a> to create an account.</p>";
    }
}

$conn->close();
?>

</body>

</html>
