<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

// Handle form submission
if(isset($_POST['submit'])){

    $appointment = intval($_POST['appointment']);
    $amount = floatval($_POST['amount']);
    $status = $_POST['status'];

    $sql = "INSERT INTO billing (appointment_id, amount, payment_status)
            VALUES ($appointment, $amount, '$status')";

    if($conn->query($sql)){
        echo "<script>alert('Billing Added Successfully'); window.location='billing.php';</script>";
        exit();
    } else {
        die("Insert Error: " . $conn->error);
    }
}

// Fetch appointments that do NOT already have billing
$appointments = $conn->query("
    SELECT a.appointment_id, p.name
    FROM appointments a
    LEFT JOIN billing b ON a.appointment_id = b.appointment_id
    JOIN patients p ON a.patient_id = p.patient_id
    WHERE b.appointment_id IS NULL
");

if(!$appointments){
    die("Fetch Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Billing</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="patients.php">Patients</a>
    <a href="departments.php">Departments</a>
    <a href="add_appointment.php">Add Appointment</a>
    <a href="appointments.php">Appointments</a>
    <a href="billing.php">Billing</a>
    <a href="report.php">Report</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
<h2>Add Billing</h2>

<?php if($appointments->num_rows == 0){ ?>
    <p>All appointments already have billing.</p>
<?php } else { ?>

<form method="POST">

Appointment:<br>
<select name="appointment" required>
<?php while($row = $appointments->fetch_assoc()) { ?>
<option value="<?php echo $row['appointment_id']; ?>">
Appointment #<?php echo $row['appointment_id']; ?> - <?php echo $row['name']; ?>
</option>
<?php } ?>
</select><br><br>

Amount:<br>
<input type="number" name="amount" required><br><br>

Payment Status:<br>
<select name="status">
<option value="Paid">Paid</option>
<option value="Pending">Pending</option>
</select><br><br>

<input type="submit" name="submit" value="Add Billing">

</form>

<?php } ?>

</div>

</body>
</html>