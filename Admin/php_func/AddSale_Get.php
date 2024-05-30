<?php

include '../php_func/Conn.php';

if (isset($_GET['IDUudai'])) {
    $IDUudai = (int)$_GET['IDUudai'];
    
    $sql = "SELECT uudai.*, Loaiphong.Tenloaiphong, Loaiud.TenUD
    FROM uudai
    JOIN Loaiud ON Uudai.IDLoaiud = Loaiud.IDLoaiud
    JOIN Loaiphong ON Uudai.IDLoaiphong = Loaiphong.IDLoaiphong
    WHERE IDUudai = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $IDUudai);
    $stmt->execute();
    $result = $stmt->get_result();
    $room = $result->fetch_assoc();

    echo json_encode($room);
} else {
    echo json_encode(['error' => 'IDUudai not provided']);
}


?>