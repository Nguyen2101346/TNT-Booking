<?php

header('Content-Type: application/json');
$response = ['success' => false, 'message' => ''];

include '../php_func/conn.php';
include '../php_func/Room_func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if (isset($_POST["Tenphong"]) && isset($_POST["Ngaytao"]) && isset($_POST["Sotang"])) {
        $roomname = $_POST["Tenphong"];
        $sotang = $_POST["Sotang"];
        $DayCre = $_POST["Ngaytao"];
        
        if (empty($roomname)) { 
            echo json_encode(array("type" => "error", "message" => "Name_nothing"));
        } else if (empty($DayCre)) {
            echo json_encode(array("type" => "error", "message" => "Date_nothing"));
        } else if (empty($sotang)) {
            echo json_encode(array("type" => "error", "message" => "Sotang_nothing"));
        } else {
            $today = date("Y-m-d");
            $sql = "SELECT * FROM phong WHERE Tenphong = '$roomname'";
            $re  = mysqli_query($conn, $sql);

            if (mysqli_num_rows($re) > 0) {
                echo json_encode(array("type" => "error", "message" => "Roomname_exists"));
            } elseif ($DayCre != $today) {
                echo json_encode(array("type" => "error", "message" => "Date_not_today"));
            }elseif($sotang < 1 || $sotang > 5){
                echo json_encode(array("type" => "error", "message" => "Sotang_not_1_to_5"));
            } else {
                if (add_MiniRoom($conn, $IDLoaiphong, $roomname, $DayCre, $sotang)) {
                    $response['success'] = true;
                    $response['message'] = 'Success';
                } else {
                    $response['message'] = 'Error_inserting_room';
                    $response['message'] = $roomname;
                    // $response['message'] = $DayCre;
                    // $response['message'] = $sotang;
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