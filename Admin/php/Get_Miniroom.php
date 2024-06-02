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
            $disabledClass = '';
            if($row['TrangThai'] == 0){
                $row['TrangThai'] = 'Còn trống';
            }else if($row['TrangThai'] == 1){
                $row['TrangThai'] = 'Đang được sử dụng';
            }else{
                $row['TrangThai'] = 'Đã bị hủy';
                $disabledClass = 'disabled';
            }
            
            $rooms[] = [
                'IDPhong' => $row['IDPhong'],
                'AnhDD' => $row['AnhDD'],
                'Tenphong' => $row['Tenphong'],
                'Ngaytao' => $row['Ngaytao'],
                'Sotang' => $row['Sotang'],
                'TrangThai' => $row['TrangThai'],
                'display' => $display,
                'disabledClass' => $disabledClass
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
