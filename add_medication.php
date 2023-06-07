<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User not logged in, redirect to login page
    header("Location: log-in.php");
    exit();
}

// Get the user ID from the session
$userID = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $medicationName = $_POST['medication_name'];
    $dosage = $_POST['dosage'];
    $frequency = $_POST['frequency'];
    $startDate = $_POST['start-date'];
    $endDate = $_POST['end-date'];

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
    $sql = "INSERT INTO medication (user_id, medication_name, dosage, frequency, begin_date, end_date) 
            VALUES ('$userID', '$medicationName', '$dosage', '$frequency', '$startDate', '$endDate')";

    if (mysqli_query($conn, $sql)) {
        echo "Successful medication addition";
        header("Location: medication-list.php");
        exit();
    } else {
        echo "Error occurred while inserting data";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>MedMaster Reminder</title>
  <link rel="stylesheet" href="add_medication.css">
</head>
<body>
  <nav class="navbar">
    <ul>
      <li>
        <img src="med-images/logo.jpg" alt="Logo">
      </li>
      <li><a href="index.html">Home</a></li>
      <li><a href="medication-list.php">Medication List</a></li>
      <li><a href="about-us.html">About Us</a></li>
    </ul>
  </nav>
  <div class="container">
    <h1>MedMaster Reminder</h1>
    <form id="form" method="POST" action="add_medication.php">
      <div class="form-group">
        <label for="medication-name">Medication Name</label>
        <input type="text" id="medication-name" name="medication_name" required>
      </div>
      <div class="form-group">
        <label for="dosage">Dosage</label>
        <input type="text" id="dosage" name="dosage" required>
      </div>
      <div class="form-group">
        <label for="frequency">Frequency</label>
        <select id="frequency" name="frequency" required>
          <option value="once">Once a day</option>
          <option value="twice">Twice a day</option>
          <option value="thrice">Thrice a day</option>
        </select>
      </div>
      <div class="form-group">
        <label for="start-date">Begin Date</label>
        <input type="date" id="start-date" name="start-date" required>
      </div>
      <div class="form-group">
        <label for="end-date">End Date</label>
        <input type="date" id="end-date" name="end-date" required>
      </div>
    
      <button type="submit" id="add-medication" name="submit">Add Medication</button>
    </form>
  </div>
</body>
</html>