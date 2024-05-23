<?php
include "../php_func/conn.php";

if (isset($_GET['idroom'])) {
    $idroom = (int)$_GET['idroom'];
    
    $sql = "SELECT loaiphong.*, GROUP_CONCAT(DISTINCT hinhphong.Hinh) as Hinh, GROUP_CONCAT(DISTINCT tienich.Tienich) as Tienich 
            FROM loaiphong
            LEFT JOIN hinhphong ON loaiphong.IDLoaiphong = hinhphong.IDLoaiphong
            LEFT JOIN nhantienich ON loaiphong.IDLoaiphong = nhantienich.IDLoaiphong
            LEFT JOIN tienich ON nhantienich.IDTienich = tienich.IDTienich
            WHERE loaiphong.IDLoaiphong = ?
            GROUP BY loaiphong.IDLoaiphong";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idroom);
    $stmt->execute();
    $result = $stmt->get_result();
    $room = $result->fetch_assoc();

    echo json_encode($room);
} else {
    echo json_encode(['error' => 'Room ID not provided']);
}
?>