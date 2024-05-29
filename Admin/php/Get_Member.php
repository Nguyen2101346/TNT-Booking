<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include "../php_func/conn.php";

ob_start();

if (isset($_GET['iduser'])) {
    $id = (int)$_GET['iduser'];

    $sql = "SELECT *
            FROM taikhoan
            WHERE IDTaikhoan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
            $member = $result->fetch_assoc();
            if($row['Gioitinh'] == 0){
                $row['Gioitinh'] = 'Nam';
            }else if($row['Gioitinh'] == 1){
                $row['Gioitinh'] = 'Nữ';
            }else{
                $row['Gioitinh'] = 'Khác';
            }
            $row['Ngaytao'] = date('d/m/Y', strtotime($row['Ngaytao']));
            $row['Ngaysinh'] = date('d/m/Y', strtotime($row['Ngaysinh']));
        ob_end_clean();
        echo json_encode($member);
    } else {
        ob_end_clean();
    }
} else {
    ob_end_clean();
    echo json_encode(['error' => 'Room ID not provided']);
}
?>