<?php
include "../php_func/conn.php";

if(isset($_POST['room_id'])){
    $idroom = $_POST['room_id'];
    
    // Sử dụng Prepared Statements và tham số để tránh lỗi và tăng tính bảo mật
    $sql = "UPDATE phong SET TrangThai = '2' WHERE IDPhong = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idroom); // 'i' đại diện cho kiểu integer
    if ($stmt->execute()) {
        echo "Phòng đã được xóa thành công";
    } else {
        // Xử lý lỗi nếu có
        echo "Có lỗi xảy ra khi xóa phòng: " . $stmt->error;
    }
} else {
    // Xử lý trường hợp không có ID phòng được gửi đến
    echo "Không có ID phòng được cung cấp";
}
?>

