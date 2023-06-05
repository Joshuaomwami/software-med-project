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
    $tableName = str_replace ("@","",$email);
    $tableName = str_replace (".","",$tableName);


    // Check if the user already exists in the database
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // User with the same username or email already exists
       // Error occurred while inserting data
        echo "<p class='error'>User with the same username or email already exists. Redirecting to sign-up page...</p>";
        echo "<script>setTimeout(function() { window.location.href = 'sign-up.php'; }, 2500);</script>";
    } else {
    $sql2 = "CREATE TABLE $tableName (med_id INT(11) NOT NULL AUTO_INCREMENT , Medication_name VARCHAR(100), DOSAGE VARCHAR (10),frequency VARCHAR (15),begin_date date,end_date date,primary key (med_id)) ENGINE =InnoDB;";

        // Insert user details into the database
        $sql = "INSERT INTO users (username, email, passwod) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            if ($conn->query($sql2) === TRUE) {
            // Successful sign-
            echo "<div class='success'>Sign up successful. Redirecting to log-in page...</div>";
            echo "<script>setTimeout(function() { window.location.href = 'log-in.php'; }, 2500);</script>";
            exit();
            }
            else{
                echo"table not created " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Error occurred while inserting data
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
}

$conn->close();
?>

