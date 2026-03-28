<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users 
                            WHERE username='$username' 
                            AND password='$password'");

    if($result->num_rows > 0){
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
    background: #f4f7fa;
}

.container {
    max-width: 360px;
    width: 100%;
    padding: 2rem;
    margin: auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.container h2 {
    text-align: center;
    margin-bottom: 1.5rem;
}

.container form {
    display: flex;
    flex-direction: column;
}

.container label {
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #333;
}

.container input[type="text"],
.container input[type="password"] {
    padding: 0.75rem 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 1rem;
    transition: border-color 0.2s;
}

.container input[type="text"]:focus,
.container input[type="password"]:focus {
    border-color: #1abc9c;
    outline: none;
}

.container input[type="submit"] {
    background: #1abc9c;
    color: #fff;
    padding: 0.75rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.2s;
}

.container input[type="submit"]:hover {
    background: #16a085;
}
</style>
</head>
<body>

<div class="container">
<h2>Hospital Management Login</h2>

<form method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" name="login" value="Login">
</form>
</div>

</body>
</html>