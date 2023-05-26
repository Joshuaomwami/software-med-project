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
    <form id="sign-up-form" method="POST" action="log-in.php">
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
        <?php
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            if ($password !== $confirmPassword) {
                echo "<p class='error'>Passwords do not match.</p>";
            }
        }
        ?>
        <button type="submit" name="submit">Sign Up</button>
   
    
    <p>Already have an account? <a href="log-in.php">Login here</a></p>
    <p>Forgot your password? <a href="password-reset.html">Reset it here</a></p>
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if user already exists in the database
    $checkSql = "SELECT * FROM users WHERE email='$email'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // User already exists, display message and option to login
        echo "<p>User with this email already exists. Please <a href='login.php'>login</a> to your account.</p>";
    } else {
        // Insert user details into the database
        $insertSql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($insertSql) === TRUE) {
            // User registered successfully, redirect to login page
            header("Location: log-in.php");
            exit();
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
</body>
</html>
