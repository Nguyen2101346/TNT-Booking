<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include "../php_func/conn.php";

ob_start();

$response = [];

try {
    if (isset($_GET['idsk'])) {
        $idsk = (int)$_GET['idsk'];

        if ($idsk <= 0) {
            throw new Exception('Invalid IDSK value');
        }

        $sql = "SELECT taikhoan.*, datsk.* FROM taikhoan
                JOIN datsk ON taikhoan.IDTaiKhoan = datsk.IDTaiKhoan
                WHERE datsk.IDDatsk = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }

        $stmt->bind_param('i', $idsk);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $room = $result->fetch_assoc();
            ob_end_clean();
            echo json_encode($room);
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
