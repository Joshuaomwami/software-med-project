<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="sign-up.css">
</head>
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
    <h1>Sign Up</h1>
    <form id="sign-up-form" method="POST" action="process-signup.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <button type="submit" name="submit">Sign Up</button>
        
        <?php
          if (isset($_POST['submit'])) {
              $password = $_POST['password'];
              $confirmPassword = $_POST['confirm-password'];
              if ($password !== $confirmPassword) {
                  echo "<p class='error'>Passwords do not match.</p>";
              }
         }
         ?>   
    <p>Already have an account? <a href="log-in.php">Login here</a></p>
  </form>
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
        echo "<script>alert('Sign up successful. Please log in.'); window.location.href = 'login.php';</script>";
        exit();
    } else {
        // Error occurred while inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>
