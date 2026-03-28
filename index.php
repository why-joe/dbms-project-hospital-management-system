<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

// Fetch dashboard data
$totalPatients = $conn->query("SELECT COUNT(*) as count FROM patients")->fetch_assoc()['count'];
$totalDepartments = $conn->query("SELECT COUNT(*) as count FROM departments")->fetch_assoc()['count'];
$totalAppointments = $conn->query("SELECT COUNT(*) as count FROM appointments")->fetch_assoc()['count'];
$totalRevenue = $conn->query("SELECT SUM(amount) as total FROM billing")->fetch_assoc()['total'];

if($totalRevenue == null){
    $totalRevenue = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            background: #ffffff;
            padding: 20px;
            width: 220px;
            margin: 10px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin: 10px 0;
            color: #2c3e50;
        }

        .card p {
            font-size: 22px;
            font-weight: bold;
            color: #1abc9c;
        }
    </style>
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
    <h1>Hospital Management Dashboard</h1>

    <div class="dashboard">

        <div class="card">
            <h3>Total Patients</h3>
            <p><?php echo $totalPatients; ?></p>
        </div>

        <div class="card">
            <h3>Total Departments</h3>
            <p><?php echo $totalDepartments; ?></p>
        </div>

        <div class="card">
            <h3>Total Appointments</h3>
            <p><?php echo $totalAppointments; ?></p>
        </div>

        <div class="card">
            <h3>Total Revenue</h3>
            <p>₹ <?php echo $totalRevenue; ?></p>
        </div>

    </div>
</div>

</body>
</html>