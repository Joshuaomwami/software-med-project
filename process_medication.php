<?php
session_start();

$medicationName = $_POST['medication_name'];
$dosage = $_POST['dosage'];
$frequency = $_POST['frequency'];
$startDate = $_POST['start-date'];
$endDate = $_POST['end-date'];

// Retrieve the user ID from the session variable
if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "medmaster_db";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert medication details into the database
    $sql = "INSERT INTO medication (medication_name, dosage, frequency, begin_date, end_date, user_id) 
            VALUES ('$medicationName', '$dosage', '$frequency', '$startDate', '$endDate', '$userID')";

    if (mysqli_query($conn, $sql)) {
        echo "Successful medication addition";
        header("Location: medication-list.php");
        exit();
    } else {
        echo "Error occurred while inserting data";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "User ID not found in the session. Make sure you have logged in before adding medication.";
}
?>
