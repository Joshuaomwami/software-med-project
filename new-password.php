<!DOCTYPE html>
<html>
<head>
    <title>Enter New Password</title>
    <link rel="stylesheet" href="enter-new-password.css">
</head>
<body>
    <div class="container">
        <h1>Enter New Password</h1>
        <form id="new-password-form" method="POST" action="process-new-password.php">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
            <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" name="submit">Change Password</button>
        </form>
    </div>
</body>
</html>
