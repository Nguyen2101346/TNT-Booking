<?php
include "../php_func/conn.php";

if(isset($_POST['idDatphong'])){
    $idDatphong = $_POST['idDatphong'];
    
    // Sử dụng Prepared Statements và tham số để tránh lỗi và tăng tính bảo mật
    $sql = "UPDATE datphong
            SET TrangThai = '0'
            WHERE IDDatphong = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idDatphong); // 'i' đại diện cho kiểu integer
    if ($stmt->execute()) {
        echo "Sự kiện đã được duyệt thành công";
    } else {
        // Xử lý lỗi nếu có
        echo "Có lỗi xảy ra khi duyệt Sự kiện: " . $stmt->error;
    }
} else {
    // Xử lý trường hợp không có ID phòng được gửi đến
    echo "Không có ID đơn đặt sự kiện được cung cấp";
}
?>