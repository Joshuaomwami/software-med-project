<?php
if (isset($_POST['submit'])) {
  $medicationName = $_POST['medication-name'];
  $dosage = $_POST['dosage'];
  $frequency = $_POST['frequency'];
  $startDate = $_POST['begin-date'];
  $endDate = $_POST['end-date'];
  
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
  
  // Insert medication details into the database
  $sql = "INSERT INTO medication (medication_name, dosage, frequency, begin_date, end_date) 
  VALUES ('$medicationName', '$dosage', '$frequency', '$beginDate', '$endDate')";
  if ($conn->query($sql) === TRUE) {
    // Successful medication addition
    header("Location: medication-list.html");
    exit();
  } else {
    // Error occurred while inserting data
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}
?>
