<?php
include "../php_func/conn.php";

if (isset($_GET['idroom'])) {
    $idroom = $_GET['idroom'];

    // Truy vấn tất cả tiện ích
    $allConveniencesSql = "SELECT * FROM tienich";
    $allConveniencesResult = $conn->query($allConveniencesSql);
    $allConveniences = array();
    while ($row = $allConveniencesResult->fetch_assoc()) {
        $allConveniences[] = $row;
    }

    // Truy vấn tiện ích của phòng cụ thể
    $roomConveniencesSql = "SELECT IDTienich FROM nhantienich WHERE IDLoaiphong = ?";
    $stmt = $conn->prepare($roomConveniencesSql);
    $stmt->bind_param('i', $idroom);
    $stmt->execute();
    $roomConveniencesResult = $stmt->get_result();
    if($roomConveniencesResult->num_rows > 0){
        $roomConveniences = array();
        while ($row = $roomConveniencesResult->fetch_assoc()) {
            $roomConveniences[] = $row['IDTienich'];
        }
         // Kết hợp kết quả và đánh dấu tiện ích nào đã có cho phòng
        $response = array();
        foreach ($allConveniences as $convenience) {
            $convenience['checked'] = in_array($convenience['IDTienich'], $roomConveniences);
            $response[] = $convenience;
        }

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($response);
    }else{
        $roomConveniences[] = 0;
        echo json_encode($roomConveniences);
    }
   

   
} else {
    echo json_encode(array('error' => 'No idroom parameter provided'));
}
?>