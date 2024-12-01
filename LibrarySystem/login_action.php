<?php
include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE Username='$username' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<script>alert('Login Successful'); window.location.href='main.php';</script>";
} else {
    echo "<script>alert('Username and password incorrect'); window.location.href='login.php';</script>";
}
$conn->close();
?>
