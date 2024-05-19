<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin người dùng và phòng đã chọn từ form
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $payment_method = $_POST['Payment'];

    // Xử lý thông tin phòng đã chọn
    $selectedRooms = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'room') === 0) {
            $selectedRooms[] = json_decode($value, true);
        }
    }

    // Thực hiện các bước xử lý thanh toán (ví dụ: lưu vào cơ sở dữ liệu, gửi email xác nhận, v.v.)
    // ...

    // Chuyển hướng sau khi xử lý thanh toán thành công
    header('Location: success.php');
    exit;
}
?>