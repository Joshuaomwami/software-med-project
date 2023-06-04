<!DOCTYPE html>
<html>

<head>
  <title>Website Login</title>
  <link rel="stylesheet" href="log-in.css">
</head>


<body>
  <nav class="navbar">
    <ul>
      <li>
        <img src="med-images/logo.jpg" alt="Logo">
      </li>
      <li><a href="home.html">Home</a></li>
      <li><a href="about-us.html">About Us</a></li>
    </ul>
  </nav>
  <div class="container">
  <h1>Login</h1>
  <?php
// Check if there is an error query parameter
if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
    echo "<p class='error'>Invalid email or password. Please try again.</p>";
}
?>

  <form id="login-form" method="POST" action="add_medication.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit" name="submit">Login</button>
 
  <p>Don't have an account? <a href="sign-up.php">Sign up here</a></p>
  <p>Forgot your password? <a href="password-reset.php">Reset it here</a></p>
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

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user details from the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, redirect to the index.html page
        header("Location: add_medication.php");
        exit();
    } else {
        // User not found or invalid credentials, display an error message
        echo "<p class='error'>Invalid email or password. Please try again.</p>";
    }
}

$conn->close();
?>

</body>

</html>
