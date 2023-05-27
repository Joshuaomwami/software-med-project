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
    $medicationName = $_POST["medication_name"];
    $dosage = $_POST["dosage"];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];

    // Insert the medication data into the database
    $sql = "INSERT INTO medication_table (medication_name, dosage, start_date, end_date) VALUES ('$medicationName', '$dosage', '$startDate', '$endDate')";

    if ($conn->query($sql) === TRUE) {
        // Medication data inserted successfully, redirect to the medication list page
        header("Location: medication-list.html");
        exit();
    } else {
        // Error occurred while inserting data, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
