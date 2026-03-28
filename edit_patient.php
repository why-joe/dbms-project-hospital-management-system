<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM patients WHERE patient_id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];

    $conn->query("UPDATE patients 
                  SET name='$name', gender='$gender', age='$age', phone='$phone' 
                  WHERE patient_id=$id");

    header("Location: patients.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
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
    <h2>Edit Patient</h2>

    <form method="POST">
        Name:<br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        Gender:<br>
        <select name="gender">
            <option <?php if($row['gender']=='Male') echo 'selected'; ?>>Male</option>
            <option <?php if($row['gender']=='Female') echo 'selected'; ?>>Female</option>
            <option <?php if($row['gender']=='Other') echo 'selected'; ?>>Other</option>
        </select><br><br>

        Age:<br>
        <input type="number" name="age" value="<?php echo $row['age']; ?>" required><br><br>

        Phone:<br>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>

        <input type="submit" name="update" value="Update Patient">
    </form>
</div>

</body>
</html>