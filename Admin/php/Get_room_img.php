<?php
include "../php_func/conn.php";

if (isset($_GET['idroom'])) {
    $idroom = (int)$_GET['idroom'];

    $sql = "SELECT Hinh FROM hinhphong WHERE IDLoaiphong = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idroom);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['Hinh'];
    }

    echo json_encode($images);
} else {
    echo json_encode(['error' => 'Room ID not provided']);
}
?>