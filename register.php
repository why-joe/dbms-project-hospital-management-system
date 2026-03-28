<?php
session_start();
include 'db.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $check = $conn->query("SELECT * FROM users WHERE username='$username'");

    if($check->num_rows > 0){
        echo "<script>alert('Username already exists!');</script>";
    } else {
        $conn->query("INSERT INTO users (username, password) 
                      VALUES ('$username', '$password')");
        echo "<script>alert('Account Created Successfully!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Create Account</h2>

<form method="POST">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="register" value="Register">
</form>

<br>
<a href="login.php">Back to Login</a>

</div>

</body>
</html>