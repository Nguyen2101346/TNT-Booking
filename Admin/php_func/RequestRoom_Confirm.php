<?php
include "../php_func/conn.php";

if(isset($_POST['idDatphong'])){
    $idDatphong = $_POST['idDatphong'];
    $IDPhong = $_POST['IDPhong'];
    
    // Sử dụng Prepared Statements và tham số để tránh lỗi và tăng tính bảo mật
    $sql = "UPDATE datphong
            SET TrangThai = '2', IDPhong = ?
            WHERE IDDatphong = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $IDPhong, $idDatphong); // 'i' đại diện cho kiểu integer
    if ($stmt->execute()) {
        echo "Sự kiện đã được duyệt thành công";
        $sql = "UPDATE phong
                SET TrangThai = '1'
                WHERE IDPhong = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $IDPhong); // 'i' đại diện cho kiểu integer
        if ($stmt->execute()) {
            echo "Phòng đã được duyệt thành công";
        } else {
            echo "Có lỗi xảy ra khi duyệt Phòng: " . $stmt->error;
        }
    } else {
        // Xử lý lỗi nếu có
        echo "Có lỗi xảy ra khi duyệt Sự kiện: " . $stmt->error;
    }
} else {
    // Xử lý trường hợp không có ID phòng được gửi đến
    echo "Không có ID đơn đặt sự kiện được cung cấp";
}
?>

