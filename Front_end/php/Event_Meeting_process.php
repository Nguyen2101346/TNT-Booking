<?php

session_start();
include '../conn.php'; // Đảm bảo rằng bạn đã kết nối đến cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['userID'])) {
        echo "User chưa đăng nhập.";
        exit;
    }
    $userID = $_SESSION['userID'];
    $company = $_POST["company"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $note = $_POST["note"];
    if ( empty($name) || empty($email) || empty($phone) || empty($note)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit;
    }
    $stmt = $conn->prepare("INSERT INTO datsk (IDTaikhoan, IDSukien, Congty, TenKH, Email, Sodt, Ghichu) VALUES (?, '1', ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $userID, $company, $name, $email, $phone, $note);

    if ($stmt->execute()) {
        $response = "Thành công - UserID: " . $userID . ", Công ty: " . $company . ", Tên: " . $name . ", Email: " . $email . ", Số điện thoại: " . $phone . ", Ghi chú: " . $note;
        echo $response;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>