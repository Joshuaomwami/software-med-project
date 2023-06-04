
<!DOCTYPE html>
<html>
<head>
  <title>Medication List</title>
  <link rel="stylesheet" href="#">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    .no-data {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <h1>Medication List</h1>

  <?php

    session_start();

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

    // Retrieve the user ID from the session variable
    $userID = $_SESSION['user_id'];

    // Fetch medication data from the database
    $sql = "SELECT * FROM medication WHERE user_id = '$userID'";
    $sql = "SELECT * FROM medication";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr><th>Medication Name</th><th>Dosage</th><th>Frequency</th><th>Start Date</th><th>End Date</th></tr>";

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['medication_name'] . "</td>";
        echo "<td>" . $row['dosage'] . "</td>";
        echo "<td>" . $row['frequency'] . "</td>";
        echo "<td>" . $row['begin_date'] . "</td>";
        echo "<td>" . $row['end_date'] . "</td>";
        echo "</tr>";
      }

      echo "</table>";
    } else {
      echo "<div class='no-data'>No medication data available.</div>";
    }

    mysqli_close($conn);
  ?>

</body>
</html>
