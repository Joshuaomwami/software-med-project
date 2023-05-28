<!DOCTYPE html>
<html>
<head>
    <title>Enter New Password</title>
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .toggle-password {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    #toggle-label {
        margin-left: 10px;
        cursor: pointer;
        color: #999;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

    
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("new-password");
            var confirmInput = document.getElementById("confirm-password");
            var checkbox = document.getElementById("toggle-checkbox");
            var label = document.getElementById("toggle-label");

            if (checkbox.checked) {
                passwordInput.type = "text";
                confirmInput.type = "text";
                label.textContent = "Hide Password";
            } else {
                passwordInput.type = "password";
                confirmInput.type = "password";
                label.textContent = "Show Password";
            }
        }
    </script>
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
            <div class="toggle-password">
                <input type="checkbox" id="toggle-checkbox" onchange="togglePasswordVisibility()">
                <label for="toggle-checkbox" id="toggle-label">Show Password</label>
            </div>
            <button type="submit" name="submit">Change Password</button>
        </form>
    </div>
</body>
</html>
