<?php
include 'conn.php';
include 'func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if(isset($_POST["re_username"]) && isset($_POST["re_password"]) && isset($_POST["rre_password"])) {
        $u = $_POST["re_username"];
        $p = $_POST["re_password"];
        $rp = $_POST["rre_password"];
        $re = check_account1($conn, $u);
        // Kiểm tra các điều kiện đăng ký (ví dụ: tài khoản đã tồn tại, mật khẩu ngắn, mật khẩu không trùng khớp)
        // Nếu hợp lệ, thêm tài khoản vào cơ sở dữ liệu
        // Trả về kết quả dưới dạng JSON
        if(mysqli_num_rows($re)> 0){
            echo json_encode(array("type" => "error", "message" => "username_exists"));
        }elseif (strlen($u) > 8){
            echo json_encode(array("type" => "error", "message" => "username_too_long"));
        }elseif (strlen($p) < 8) {
            echo json_encode(array("type" => "error", "message" => "password_too_short"));
        } elseif ($p != $rp) {
            echo json_encode(array("type" => "error", "message" => "password_mismatch"));    
        } else {
            add_account($conn, $u, $p);
            echo json_encode(array("success" => true, "message" => "Success"));
        }
    } else {
        // Nếu dữ liệu không được gửi đúng cách
        echo json_encode(array("type" => "error", "message" => "Dữ liệu không hợp lệ!"));
    }
} else {
    // Nếu không phải là phương thức POST
    echo json_encode(array("type" => "error", "message" => "Phương thức không được chấp nhận!"));
}
?>