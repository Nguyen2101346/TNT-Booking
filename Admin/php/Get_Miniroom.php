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
            AND loaiphong.IDLoaiphong = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        ob_end_clean();
        echo json_encode(['error' => 'Failed to prepare SQL statement']);
        exit;
    }

    $stmt->bind_param('i', $idroom);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rooms = [];

        while ($row = $result->fetch_assoc()) {
            $row['Ngaytao'] = date('d/m/Y', strtotime($row['Ngaytao']));
            $row['TrangThai'] = $row['TrangThai'] == '0' ? 'Còn trống' : 'Đang được sử dụng';
            
            $rooms[] = [
                'IDPhong' => $row['IDPhong'],
                'AnhDD' => $row['AnhDD'],
                'Tenphong' => $row['Tenphong'],
                'Ngaytao' => $row['Ngaytao'],
                'Sotang' => $row['Sotang'],
                'TrangThai' => $row['TrangThai']
            ];
        }

        ob_end_clean();
        echo json_encode($rooms);
    } else {
        ob_end_clean();
        echo json_encode([]);
    }
} else {
    ob_end_clean();
    echo json_encode(['error' => 'Room ID not provided']);
}
?>
