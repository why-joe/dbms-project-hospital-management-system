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
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO patients (name, gender, age, phone)
            VALUES ('$name', '$gender', '$age', '$phone')";

    if($conn->query($sql)){
        echo "<script>alert('Patient Added Successfully!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
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
    <h2>Add New Patient</h2>

    <form method="POST">
        Name:<br>
        <input type="text" name="name" required><br><br>

        Gender:<br>
        <select name="gender">
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select><br><br>

        Age:<br>
        <input type="number" name="age" required><br><br>

        Phone:<br>
        <input type="text" name="phone" required><br><br>

        <input type="submit" name="submit" value="Add Patient">
    </form>
</div>

</body>
</html>