<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include "../php_func/conn.php";

ob_start();

if (isset($_GET['idroom'])) {
    $idroom = (int)$_GET['idroom'];

    $sql = "SELECT phong.*, loaiphong.AnhDD 
            FROM loaiphong, phong 
            WHERE loaiphong.IDLoaiphong = phong.IDLoaiphong
             AND phong.IDPhong = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idroom);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
            $row['Ngaytao'] = date('d/m/Y', strtotime($row['Ngaytao']));
            $room = $result->fetch_assoc();
        ob_end_clean();
        echo json_encode($room);
    } else {
        ob_end_clean();
    }
} else {
    ob_end_clean();
    echo json_encode(['error' => 'Room ID not provided']);
}
?>
