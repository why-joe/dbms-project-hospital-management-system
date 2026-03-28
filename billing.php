<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'db.php';


if(isset($_GET['pay'])){
    $id = intval($_GET['pay']);

    $conn->query("UPDATE billing 
                  SET payment_status='Paid' 
                  WHERE bill_id=$id");

    header("Location: billing.php");
    exit();
}


$result = $conn->query("
    SELECT b.bill_id,
           b.appointment_id,
           p.name AS patient,
           d.name AS doctor,
           b.amount,
           b.payment_status
    FROM billing b
    JOIN appointments a ON b.appointment_id = a.appointment_id
    JOIN patients p ON a.patient_id = p.patient_id
    JOIN doctors d ON a.doctor_id = d.doctor_id
    ORDER BY b.bill_id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Billing</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="patients.php">Patients</a>
    <a href="departments.php">Departments</a>
    <a href="appointments.php">Appointments</a>
    <a href="billing.php">Billing</a>
    <a href="report.php">Report</a>
    <a href="logout.php" style="margin-left:auto;">Logout</a>
</div>

<div class="container">
<h2>Billing Records</h2>

<table>
<tr>
    <th>Bill ID</th>
    <th>Patient</th>
    <th>Doctor</th>
    <th>Amount</th>
    <th>Status</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['bill_id']; ?></td>
    <td><?php echo $row['patient']; ?></td>
    <td><?php echo $row['doctor']; ?></td>
    <td>₹ <?php echo $row['amount']; ?></td>

    <td>
    <?php if($row['payment_status'] == 'Pending'){ ?>
        <a href="billing.php?pay=<?php echo $row['bill_id']; ?>">
            <button>Mark as Paid</button>
        </a>
    <?php } else {
        echo "Paid";
    } ?>
    </td>

</tr>
<?php } ?>

</table>

</div>
</body>
</html>