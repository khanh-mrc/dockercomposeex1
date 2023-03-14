<?php
// Kết nối MySQL
$servername = "mysql";
$username = "admin";
$password = "admin";
$dbname = "ex1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Tìm kiếm người dùng trong cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Người dùng đã đăng nhập thành công
        echo "Đăng nhập thành công!";
    } else {
        // Sai tên đăng nhập hoặc mật khẩu
        echo "Sai tên đăng nhập hoặc mật khẩu.";
    }
}

mysqli_close($conn);
?>
