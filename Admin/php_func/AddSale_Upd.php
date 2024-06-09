
<?php
include "../php_func/conn.php";

if(isset($_POST['IDUudai'])){
    $IDUudai = $_POST['IDUudai'];
    $title = $_POST['title'];
    $discount_type = $_POST['discount-type'];
    $discount_value = $_POST['discount-value'];
    $unit = $_POST['unit'];
    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'];
    $room_type = $_POST['room-type'];
    $trangthai = 1;

    // Sử dụng Prepared Statements và tham số để tránh lỗi và tăng tính bảo mật
    $sql = "UPDATE uudai 
    SET Tieude = ?, 
    IDLoaiUD = ?, 
    Nhangiam = ?, 
    Donvi = ?, 
    Ngaybatdau = ?, 
    Ngayketthuc = ?, 
    IDLoaiphong = ?,
    Trangthai = ?
    WHERE IDUudai = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param('siiissiii', $title, 
        $discount_type, 
        $discount_value, 
        $unit, 
        $start_date, 
        $end_date, 
        $room_type,
        $trangthai, // Assuming status is always 1 when approving
        $IDUudai);
        
        // Execute statement
        if ($stmt->execute()) {
            echo "Sự kiện đã được duyệt thành công";
        } else {
            // Xử lý lỗi nếu có
            echo "Có lỗi xảy ra khi duyệt Sự kiện: " . $stmt->error;
        }
        // Đóng statement
        $stmt->close();
    } else {
        echo "Có lỗi xảy ra khi chuẩn bị truy vấn: " . $conn->error;
    }
    // Đóng kết nối
    $conn->close();
} else {
    // Xử lý trường hợp không có ID ưu đãi được gửi đến
    echo "Không có ID ưu đãi được cung cấp";
}
?>

