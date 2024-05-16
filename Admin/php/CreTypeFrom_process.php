<?php
include '../php_func/conn.php';
include '../php_func/Room_func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if(isset($_POST["CreType_Tenloaiphong"]) && isset($_POST["CreType_Ngaytao"])) {
        if(empty($_POST['CreType_Tenloaiphong'])){
            echo json_encode(array("type" => "error", "message" => "Name_nothing"));
        }else if(empty($_POST['CreType_Ngaytao'])){
            echo json_encode(array("type" => "error", "message" => "Name_nothing"));
        }else{
            $today = date("Y-m-d");
            $roomname = $_POST["CreType_Tenloaiphong"];
            $DayCre = $_POST["CreType_Ngaytao"];
            $sql = "SELECT * FROM loaiphong";
            $re  = mysqli_query($conn,$sql);
            if(mysqli_num_rows($re)> 0){
                echo json_encode(array("type" => "error", "message" => "TypeRoomname_exists"));
            }elseif ($DayCre != $today) {
                echo json_encode(array("type" => "error", "message" => "Date_not_today"));
            } else {
                add_TypeRoom($conn, $roomname, $DayCre);
                echo json_encode(array("success" => true, "message" => "Success"));
            }
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