<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include "../php_func/conn.php";

ob_start();

$response = [];

try {
    if(isset($_GET['idLoaiPhong'])){
            $idLoaiPhong = $_GET['idLoaiPhong'];

            $sql1 = 'SELECT * FROM phong WHERE IDLoaiPhong = ? AND TrangThai = 0';
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param('i', $idLoaiPhong);
            $stmt1->execute();
            $result1 = $stmt1->get_result();
           
            $room = [];
            while($row1 = $result1->fetch_assoc()){
                $room[] = [
                    'Tenphong' => $row1['Tenphong'],
                    'IDPhong' => $row1['IDPhong'],
                ];
            }
            echo json_encode($room);
        }else {
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

