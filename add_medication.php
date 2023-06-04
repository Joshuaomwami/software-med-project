<!DOCTYPE html>
<html>
<head>
  <title>MedMaster Reminder</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <nav class="navbar">
    <ul>
      <li>
        <img src="med-images/logo.jpg" alt="Logo">
      </li>
      <li><a href="home.html">Home</a></li>
      <li><a href="medication-list.html">Medication List</a></li>
      <li><a href="about-us.html">About Us</a></li>
    </ul>
  </nav>
  <div class="container">
    <h1>MedMaster Reminder</h1>
    <form id="form" method="POST" action="process_medication.php">
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
        <label for="start-date">Start Date</label>
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