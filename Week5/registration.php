<?php
session_start();
header("location:login.php");

/* Kết nối database */
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, "login_demo");

/* Lấy dữ liệu từ form */
$username = $_POST['username'];
$password = $_POST['password'];
$mssv     = $_POST['mssv'];
$dob      = $_POST['dob'];
$country  = $_POST['country'];

/* Kiểm tra username có tồn tại chưa */
$s = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if ($num == 1) {
    echo "Username Exists";
} else {
    /* Thêm tài khoản mới với mật khẩu mã hóa MD5 */
    $reg = "INSERT INTO users (username, password, mssv, dob, country) 
            VALUES ('$username', MD5('$password'), '$mssv', '$dob', '$country')";
    mysqli_query($con, $reg);
    echo "registration successful";
}
?>
