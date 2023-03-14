<?php
	// Kết nối cơ sở dữ liệu
	$servername = "mysql";
	$username = "admin";
	$password = "admin";
	$dbname = "ex1";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Kiểm tra kết nối
	if ($conn->connect_error) {
		die("Kết nối thất bại: " . $conn->connect_error);
	}

	// Xử lý đăng ký
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
	}
		// Kiểm tra mật khẩu và xác nhận mật khẩu
		if ($password != $confirm_password) {
			echo "Mật khẩu và xác nhận mật khẩu không khớp.";
		} else {
			// Thực hiện truy vấn SQL để chèn dữ liệu vào cơ sở dữ liệu
			$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
			if ($conn->query($sql) === TRUE) {
				echo "Đăng ký thành công.";
			} 
			else {
				echo "Lỗi: " . $sql . "<br>" . $conn->error;
			}
		}
		
	?>
