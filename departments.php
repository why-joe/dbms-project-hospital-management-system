<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

$departments = $conn->query("SELECT * FROM departments");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Departments</title>
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
<a href="add_billing.php">Add Billing</a>
<a href="billing.php">Billing</a>
    <a href="report.php">Report</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
<h2>Departments & Doctors</h2>

<?php while($dept = $departments->fetch_assoc()) { ?>

    <div style="margin-bottom:25px;">
        <h3><?php echo $dept['dept_name']; ?></h3>

        <ul>
        <?php
        $doctors = $conn->query("SELECT * FROM doctors WHERE dept_id=".$dept['dept_id']);
        while($doc = $doctors->fetch_assoc()) {
            echo "<li>".$doc['name']." (".$doc['specialization'].")</li>";
        }
        ?>
        </ul>
    </div>

<?php } ?>

</div>

</body>
</html>