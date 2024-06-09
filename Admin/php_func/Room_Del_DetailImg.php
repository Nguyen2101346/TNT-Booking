<?php
// Room_Del_DetailImg.php

// Kết nối với cơ sở dữ liệu
include '../php_func/conn.php';

// Kiểm tra xem yêu cầu có chứa id của hình ảnh không
if (isset($_POST['idimage'])) {
    $idimage = $_POST['idimage'];

    // Thực hiện truy vấn xóa hình ảnh từ cơ sở dữ liệu
    $sql = "DELETE FROM hinhphong WHERE IDHinh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idimage);
    
    if ($stmt->execute()) {
        echo "Hình đã được xóa thành công."; // Trả về thông báo thành công
    } else {
        echo "Có lỗi xảy ra khi xóa hình."; // Trả về thông báo lỗi
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Không có id hình ảnh."; // Trả về thông báo khi không có id hình ảnh
}
?>
