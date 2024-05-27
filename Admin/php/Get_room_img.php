<?php
include "../php_func/conn.php";

if (isset($_GET['idroom'])) {
    $idroom = (int)$_GET['idroom'];

    $sql = "SELECT hinhphong.Hinh, hinhphong.IDHinh FROM hinhphong, loaiphong   
     WHERE loaiphong.IDLoaiphong = hinhphong.IDLoaiphong AND loaiphong.IDLoaiphong = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idroom);
    $stmt->execute();
    $result = $stmt->get_result();


    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = [
            'Hinh' => $row['Hinh'],
            'IDHinh' => $row['IDHinh']
        ];
    }
    if (count($images) == 0) {
        $images = 'Default.jpg';
    }
    echo json_encode($images);
    // echo json_encode($idiamge);
} else {
    echo json_encode(['error' => 'Room ID not provided']);
}
?>