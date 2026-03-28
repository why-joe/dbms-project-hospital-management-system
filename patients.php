<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<?php
include 'db.php';

// Delete 
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM patients WHERE patient_id=$id");
    header("Location: patients.php");
    exit();
}

$result = $conn->query("SELECT * FROM patients");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patients - Hospital Management System</title>
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
</div>

<div class="container">

<h2>Patient List</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Phone</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['patient_id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td>
        <a class="action-btn edit-btn" 
           href="edit_patient.php?id=<?php echo $row['patient_id']; ?>">
           Edit
        </a>

        <a class="action-btn delete-btn" 
           href="patients.php?delete=<?php echo $row['patient_id']; ?>" 
           onclick="return confirm('Are you sure you want to delete this patient?')">
           Delete
        </a>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>