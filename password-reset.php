<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <link rel="stylesheet" href="password-reset.css">
</head>
<body>
    <div class="container">
        <h1>Password Reset</h1>
        <form id="password-reset-form" method="POST" action="process-password-reset.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" name="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
