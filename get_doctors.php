<?php
include 'db.php';

$dept_id = $_GET['dept_id'];

$result = $conn->query("SELECT * FROM doctors WHERE dept_id = $dept_id");

echo "<option value=''>Select Doctor</option>";

while($row = $result->fetch_assoc()) {
    echo "<option value='".$row['doctor_id']."'>".$row['name']."</option>";
}
?>