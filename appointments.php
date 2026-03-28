<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<?php
include 'db.php';

$result = $conn->query("
    SELECT a.appointment_id,
           p.name AS patient,
           d.name AS doctor,
           dept.dept_name AS department,
           a.appointment_date
    FROM appointments a
    JOIN patients p ON a.patient_id = p.patient_id
    JOIN doctors d ON a.doctor_id = d.doctor_id
    JOIN departments dept ON d.dept_id = dept.dept_id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="patients.php">Patients</a>
    <a href="departments.php">Departments</a>
    <a href="add_patient.php">Add Patient</a>
    <a href="add_appointment.php">Add Appointment</a>
    <a href="appointments.php">Appointments</a>
    <a href="report.php">Report</a>
<a href="logout.php">Logout</a>
</div>

<div class="container">
<h2>Appointments</h2>

<table>
<tr>
    <th>ID</th>
    <th>Patient</th>
    <th>Department</th>
    <th>Doctor</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['appointment_id']; ?></td>
    <td><?php echo $row['patient']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['doctor']; ?></td>
    <td><?php echo $row['appointment_date']; ?></td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>