<?php
session_start();

/* Kết nối database */
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, "login_demo");

/* Lấy dữ liệu từ form */
$username = $_POST['username'];
$password = $_POST['password'];

/* Kiểm tra tài khoản */
$s = "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION['username'] = $username;
    header('location:home.php');
    exit();
} else {
    header('location:login.php');
    exit();
}
?>
