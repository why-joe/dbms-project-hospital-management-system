<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<?php
include 'db.php';

if(isset($_POST['submit'])){
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];

    $conn->query("INSERT INTO appointments (patient_id, doctor_id, appointment_date)
                  VALUES ($patient, $doctor, '$date')");

    echo "<script>alert('Appointment Added');</script>";
}
$patients = $conn->query("SELECT * FROM patients");
$departments = $conn->query("SELECT * FROM departments");
$doctors = $conn->query("SELECT * FROM doctors");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Appointment</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="patients.php">Patients</a>
    <a href="departments.php">Departments</a>
    <a href="add_appointment.php">Add Appointment</a>
<a href="appointments.php">Appointments</a>
<a href="add_billing.php">Add Billing</a>
<a href="billing.php">Billing</a>
    <a href="report.php">Report</a>
<a href="logout.php">Logout</a>
</div>

<div class="container">
<h2>Add Appointment</h2>

<form method="POST">

Patient:<br>
<select name="patient" required>
<?php while($row = $patients->fetch_assoc()) { ?>
<option value="<?php echo $row['patient_id']; ?>">
<?php echo $row['name']; ?>
</option>
<?php } ?>
</select><br><br>

Department:<br>
<select name="department" id="department" required onchange="loadDoctors()">
<option value="">Select Department</option>
<?php while($row = $departments->fetch_assoc()) { ?>
<option value="<?php echo $row['dept_id']; ?>">
<?php echo $row['dept_name']; ?>
</option>
<?php } ?>
</select><br><br>

Doctor:<br>
<select name="doctor" id="doctor" required>
<option value="">Select Doctor</option>
</select><br><br>

Date:<br>
<input type="date" name="date" required><br><br>

<input type="submit" name="submit" value="Add Appointment">

</form>
</div>
<script>
function loadDoctors() {
    var deptId = document.getElementById("department").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_doctors.php?dept_id=" + deptId, true);

    xhr.onload = function() {
        document.getElementById("doctor").innerHTML = this.responseText;
    };

    xhr.send();
}
</script>

</body>
</html>