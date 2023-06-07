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
      <li><a href="index.html">Home</a></li>
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
    <form id="login-form" method="POST" action="process-login.php">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit" name="submit">Login</button>
    
    <p>Don't have an account? <a href="sign-up.php">Sign up here</a></p>
    <p>Forgot your password? <a href="password-reset.php">Reset it here</a></p>
    </form>
  </div>

</body>

</html>
