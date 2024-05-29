<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include "../php_func/conn.php";

ob_start();

$response = [];

try {
    if (isset($_GET['idPhong'])) {
        $idPhong = (int)$_GET['idPhong'];
        $idLoaiPhong = (int)$_GET['idLoaiPhong'];
        if ($idPhong <= 0) {
            throw new Exception('Invalid IDSK value');
        }

        $sql = "SELECT taikhoan.*, datphong.*, phong.IDLoaiPhong, loaiphong.TenloaiPhong 
                FROM taikhoan
                JOIN datphong ON taikhoan.IDTaiKhoan = datphong.IDTaiKhoan
                JOIN phong ON datphong.IDPhong = phong.IDPhong
                JOIN loaiphong ON phong.IDLoaiPhong = loaiphong.IDLoaiPhong
                WHERE datphong.IDDatphong = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }

        $stmt->bind_param('i', $idPhong);
        $stmt->execute();
        $result = $stmt->get_result();
        $room = [];
        if ($result->num_rows > 0) {
            if($row['PhuongthucTT'] == 0){
                $response['Payment'] = "Trực tiếp";
            }else{
                $response['Payment'] = "Tiền tuyến";
            }

            $row = $result->fetch_assoc();
            $response['TenloaiPhong'] = $row['TenloaiPhong'];
            $response['Ho'] = $row['Ho'];
            $response['Ten'] = $row['Ten'];
            $response['Sodt'] = $row['Sodt'];
            $response['Email'] = $row['Email'];
            $response['Tonggia'] = $row['Tonggia'];
            $response['PhuongthucTT'] = $row['PhuongthucTT'];
            $response['Ngaydat'] = $row['Ngaydat'];
            $response['IDDatphong'] = $row['IDDatphong'];

            ob_end_clean();
            echo json_encode($response);
            exit();
        } else {
            throw new Exception('No records found');
        }
    } else {
        throw new Exception('Room ID not provided');
    }
} catch (Exception $e) {
    if (ob_get_length()) {
        ob_end_clean();
    }
    $response['error'] = $e->getMessage();
    echo json_encode($response);
    exit();
}
?>
