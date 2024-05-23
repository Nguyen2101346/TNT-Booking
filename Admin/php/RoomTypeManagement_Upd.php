<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../php_func/conn.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idroom = $_POST['idRoom'] ?? null;
    $RoomName = $_POST['RoomName'] ?? '';
    $RoomDes = $_POST['RoomDes'] ?? '';
    $RoomAdult = $_POST['RoomAdult'] ?? '';
    $RoomArea = $_POST['RoomArea'] ?? '';
    $RoomNum = $_POST['RoomNum'] ?? '';
    $RoomPrice = $_POST['RoomPrice'] ?? '';
    $RoomConvenience = $_POST['RoomConvenience'] ?? '';

    $Imgroom = '';
    if (!empty($_FILES['ImgRoom']['name'])) {
        $Imgroom = $_FILES['ImgRoom']['name'];
        move_uploaded_file($_FILES['ImgRoom']['tmp_name'], './img' . $Imgroom);
    } else {
        $sql = "SELECT AnhDD FROM loaiphong WHERE IDLoaiphong = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $idroom);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $Imgroom = $row['AnhDD'] ?? '';
    }

    $sql = "UPDATE loaiphong 
            SET Tenloaiphong = ?, Mota = ?, Songuoi = ?, DienTich = ?, SoPhong = ?, Gia = ?, AnhDD = ? 
            WHERE IDLoaiphong = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssiisisi', $RoomName, $RoomDes, $RoomAdult, $RoomArea, $RoomNum, $RoomPrice, $Imgroom, $idroom);
    if ($stmt->execute()) {
        $sql1 = "DELETE FROM nhantienich WHERE IDLoaiphong = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('i', $idroom);
        if ($stmt1->execute()) {
            if (isset($_POST['IDTienich']) && is_array($_POST['IDTienich'])) {
                foreach ($_POST['IDTienich'] as $IDTienich) {
                    $sql2 = "INSERT INTO nhantienich (IDLoaiphong, IDTienich) VALUES (?, ?)";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bind_param('ii', $idroom, $IDTienich);
                    $stmt2->execute();
                }
            }
            $response['status'] = 'success';
            $response['data'] = [
                'idRoom' => $idroom,
                'RoomName' => $RoomName,
                'RoomDes' => $RoomDes,
                'RoomAdult' => $RoomAdult,
                'RoomArea' => $RoomArea,
                'RoomNum' => $RoomNum,
                'RoomPrice' => $RoomPrice,
                'RoomConvenience' => $RoomConvenience,
                'ImgRoom' => $Imgroom,
                'IDTienich' => $_POST['IDTienich'] ?? []
            ];
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error deleting conveniences.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error updating room details.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
