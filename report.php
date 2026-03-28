<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

$result = $conn->query("
SELECT 
    a.appointment_id,
    p.name AS Patient,
    dept.dept_name AS Department,
    d.name AS Doctor,
    a.appointment_date,
    IFNULL(b.amount, 0) AS amount,
    IFNULL(b.payment_status, 'Not Generated') AS payment_status
FROM appointments a
JOIN patients p ON a.patient_id = p.patient_id
JOIN doctors d ON a.doctor_id = d.doctor_id
JOIN departments dept ON d.dept_id = dept.dept_id
LEFT JOIN billing b ON a.appointment_id = b.appointment_id
ORDER BY a.appointment_id DESC
");

if(!$result){
    die("Query Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospital Report</title>
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
<h2>Hospital Report</h2>

<table>
<tr>
    <th>Appointment ID</th>
    <th>Patient</th>
    <th>Department</th>
    <th>Doctor</th>
    <th>Date</th>
    <th>Amount</th>
    <th>Status</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['appointment_id']; ?></td>
    <td><?php echo $row['Patient']; ?></td>
    <td><?php echo $row['Department']; ?></td>
    <td><?php echo $row['Doctor']; ?></td>
    <td><?php echo $row['appointment_date']; ?></td>
    <td>₹ <?php echo $row['amount']; ?></td>
    <td><?php echo $row['payment_status']; ?></td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>