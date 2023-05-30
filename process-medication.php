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
    $medicationName = $_POST["medication-name"];
    $dosage = $_POST["dosage"];
    $frequency = $_POST["frequency"];
    $startDate = $_POST["start-date"];
    $endDate = $_POST["end-date"];

    // Insert the medication data into the database
    $sql = "INSERT INTO medication (medication_name, dosage, frequency, begin_date, end_date) VALUES ($medicationName,$dosage,$frequency,$startDate,$endDate )";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("isssss", $userId, $medicationName, $dosage, $frequency, $startDate, $endDate);

    // Get the user ID from session or wherever you have stored it
    $userId = 1; // Replace with the actual user ID

    // Execute the statement
    if ($stmt->execute()) {
        // Medication data inserted successfully, redirect to the medication list page
        header("Location: medication-list.html");
        exit();
    } else {
        // Error occurred while inserting data, display an error message
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

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
    $medicationName = $_POST['medication-name'];
    $dosage = $_POST['dosage'];
    $frequency = $_POST['frequency'];
    $startDate = $_POST['start-date'];
    $endDate = $_POST['end-date'];

    // Insert medication details into the database
    $sql = "INSERT INTO medication (medication_name, dosage, frequency, begin_date, end_date) VALUES ('$medicationName', '$dosage', '$frequency', '$startDate', '$endDate')";
    if ($conn->query($sql) === TRUE) {
        // Successful insertion
        echo "<script>alert('Medication added successfully.'); window.location.href = 'medication-list.html';</script>";
        exit();
    } else {
        // Error occurred while inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

