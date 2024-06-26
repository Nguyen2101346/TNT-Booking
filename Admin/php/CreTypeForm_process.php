<?php
include '../php_func/conn.php';
include '../php_func/Room_func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if (isset($_POST["CreType_Tenloaiphong"])) {
        $roomname = $_POST["CreType_Tenloaiphong"];
        
        if (empty($roomname)) {
            echo json_encode(array("type" => "error", "message" => "Name_nothing"));
        } else {
            $today = date("Y-m-d");
            $sql = "SELECT * FROM loaiphong WHERE Tenloaiphong = '$roomname'";
            $re  = mysqli_query($conn, $sql);

            if (mysqli_num_rows($re) > 0) {
                echo json_encode(array("type" => "error", "message" => "TypeRoomname_exists"));
            } else {
                // if (add_TypeRoom($conn, $roomname, $DayCre)) {
                //     echo json_encode(array("success" => true, "message" => "Success"));
                // } else {
                //     echo json_encode(array("type" => "error", "message" => "Database_error"));
                // }
                add_TypeRoom($conn,$roomname);
                echo json_encode(array("success" => true, "message" => "Success"));
            }
        }
    } else {
        // Nếu dữ liệu không được gửi đúng cách
        echo json_encode(array("type" => "error", "message" => "Invalid data!"));
    }
} else {
    // Nếu không phải là phương thức POST
    echo json_encode(array("type" => "error", "message" => "Method not accepted!"));
}
?>