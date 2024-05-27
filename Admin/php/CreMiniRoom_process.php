<?php

header('Content-Type: application/json');
$response = ['success' => false, 'message' => ''];

include '../php_func/conn.php';
include '../php_func/Room_func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if (isset($_POST["IDLoaiphong"]) && isset($_POST["Tenphong"]) && isset($_POST["Ngaytao"]) && isset($_POST["Sotang"])) {
        $IDLoaiphong = $_POST["IDLoaiphong"];
        $roomname = $_POST["Tenphong"];
        $sotang = $_POST["Sotang"];
        $DayCre = $_POST["Ngaytao"];
        
        if (empty($roomname)) { 
            $response['message'] = "Name_nothing";
        } else if (empty($DayCre)) {
            $response['message'] = "Date_nothing";
        } else if (empty($sotang)) {
            $response['message'] = "Sotang_nothing";
        } else {
            $today = date("Y-m-d");
            $sql = "SELECT * FROM phong WHERE Tenphong = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $roomname);
            $stmt->execute();
            $re = $stmt->get_result();

            if ($re->num_rows > 0) {
                $response['message'] = "Loại phòng này đã tồn tại!";
            } elseif ($DayCre != $today) {
                $response['message'] = "Ngày tạo phải là hôm nay!";
            } elseif ($sotang < 1 || $sotang > 5) {
                $response['message'] = "Khách sạn nhỏ lắm bớt chọn tầng cao !";
            } else {
                if (add_MiniRoom($conn, $IDLoaiphong, $roomname, $DayCre, $sotang)) {
                    $response['success'] = true;
                    $response['message'] = 'Success';
                }
            }
        }
    } else {
         // If data is not sent correctly
         $response['message'] = 'Invalid data!';
    }
} else {
    // Nếu không phải là phương thức POST
    $response['message'] = 'Method not accepted!';
}
echo json_encode($response);
?>
