<?php 
include "../conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ trường nhập trong yêu cầu POST
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $room_num = $_POST["room_num"];
    $adults_num = $_POST["adults_num"];
    $sql = 'SELECT * FROM loaiphong WHERE Songuoi = "$adults_num"';
    $re = mysqli_query($conn,$sql);
    $r = mysqli_fetch_array($re);
    // Ví dụ: Trả về một phản hồi JSON với thông tin tìm kiếm
    $response = [
        "start_date" => $start_date,
        "end_date" => $end_date,
        "room_num" => $room_num,
        "adults_num" => $adults_num,
        // Các thông tin khác có thể được thêm vào tại đây sau khi thực hiện xử lý
    ];

    // Trả về phản hồi dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Nếu không có dữ liệu POST, trả về một phản hồi lỗi
    http_response_code(400);
    echo json_encode(["error" => "Không có dữ liệu gửi"]);
}
?>