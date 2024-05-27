<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../php_func/conn.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // In ra toàn bộ mảng POST và FILES để gỡ lỗi
    error_log(print_r($_POST, true));
    error_log(print_r($_FILES, true));

    $idroom = $_POST['idRoom'] ?? null;
    $RoomName = $_POST['RoomName'] ?? '';
    $RoomDes = $_POST['RoomDes'] ?? '';
    $RoomAdult = $_POST['RoomAdult'] ?? '';
    $RoomArea = $_POST['RoomArea'] ?? '';
    $RoomNum = $_POST['RoomNum'] ?? '';
    $RoomPrice = $_POST['RoomPrice'] ?? '';
    // $RoomConvenience = $_POST['RoomConvenience'] ?? '';

    $Imgroom = '';
    if (isset($_FILES['ImgRoom']) && $_FILES['ImgRoom']['error'] == UPLOAD_ERR_OK) {
        $Imgroom = basename($_FILES['ImgRoom']['name']);
        $target_path = '../img/' . $Imgroom;

        if (!move_uploaded_file($_FILES['ImgRoom']['tmp_name'], $target_path)) {
            $response['status'] = 'error';
            $response['message'] = 'Lỗi khi di chuyển tệp đã tải lên.';
            echo json_encode($response);
            exit();
        }
    } else {
        $sql = "SELECT AnhDD FROM loaiphong WHERE IDLoaiphong = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            $response['status'] = 'error';
            $response['message'] = 'Chuẩn bị truy vấn thất bại: ' . $conn->error;
            echo json_encode($response);
            exit();
        }
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
    if (!$stmt) {
        $response['status'] = 'error';
        $response['message'] = 'Chuẩn bị truy vấn thất bại: ' . $conn->error;
        echo json_encode($response);
        exit();
    }
    $stmt->bind_param('ssiisisi', $RoomName, $RoomDes, $RoomAdult, $RoomArea, $RoomNum, $RoomPrice, $Imgroom, $idroom);
    if ($stmt->execute()) {
        // $sql1 = "DELETE FROM nhantienich WHERE IDLoaiphong = ?";
        // $stmt1 = $conn->prepare($sql1);
        // if (!$stmt1) {
        //     $response['status'] = 'error';
        //     $response['message'] = 'Chuẩn bị truy vấn thất bại: ' . $conn->error;
        //     echo json_encode($response);
        //     exit();
        // }
        // $stmt1->bind_param('i', $idroom);
        // if ($stmt1->execute()) {
            // if (isset($_POST['IDTienich']) && is_array($_POST['IDTienich'])) {
            //     foreach ($_POST['IDTienich'] as $IDTienich) {
            //         $sql2 = "INSERT INTO nhantienich (IDLoaiphong, IDTienich) VALUES (?, ?)";
            //         $stmt2 = $conn->prepare($sql2);
            //         if (!$stmt2) {
            //             $response['status'] = 'error';
            //             $response['message'] = 'Chuẩn bị truy vấn thất bại: ' . $conn->error;
            //             echo json_encode($response);
            //             exit();
            //         }
            //         $stmt2->bind_param('ii', $idroom, $IDTienich);
            //         if (!$stmt2->execute()) {
            //             $response['status'] = 'error';
            //             $response['message'] = 'Lỗi khi chèn tiện ích: ' . $stmt2->error;
            //             echo json_encode($response);
            //             exit();
            //         }
            //     }
            // }
            
            // Xử lý tải lên nhiều ảnh cho img_detail
            $uploadedImages = [];
            if (isset($_FILES['ImgDetail'])) {
                $fileCount = count($_FILES['ImgDetail']['name']);
                for ($i = 0; $i < $fileCount; $i++) {
                    if ($_FILES['ImgDetail']['error'][$i] == UPLOAD_ERR_OK) {
                        $filename = basename($_FILES['ImgDetail']['name'][$i]);
                        $target_path = '../img/detail/' . $filename;

                        if (move_uploaded_file($_FILES['ImgDetail']['tmp_name'][$i], $target_path)) {
                            $uploadedImages[] = $filename;

                            // Chèn vào bảng ảnh chi tiết của bạn (điều chỉnh tên bảng và trường nếu cần)
                            $sql3 = "INSERT INTO hinhphong (IDLoaiphong, Hinh) VALUES (?, ?)";
                            $stmt3 = $conn->prepare($sql3);
                            if (!$stmt3) {
                                $response['status'] = 'error';
                                $response['message'] = 'Chuẩn bị truy vấn thất bại: ' . $conn->error;
                                echo json_encode($response);
                                exit();
                            }
                            $stmt3->bind_param('is', $idroom, $filename);
                            if (!$stmt3->execute()) {
                                $response['status'] = 'error';
                                $response['message'] = 'Lỗi khi chèn ảnh chi tiết: ' . $stmt3->error;
                                echo json_encode($response);
                                exit();
                            }
                        } else {
                            $response['status'] = 'error';
                            $response['message'] = 'Lỗi khi di chuyển tệp ảnh chi tiết đã tải lên.';
                            echo json_encode($response);
                            exit();
                        }
                    }
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
                // 'RoomConvenience' => $RoomConvenience,
                'ImgRoom' => $Imgroom,
                // 'IDTienich' => $_POST['IDTienich'] ?? [],
                'ImgDetail' => $uploadedImages
            ];
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Lỗi khi xóa các tiện ích: ' . $stmt3->error;
        }
    // } else {
    //     $response['status'] = 'error';
    //     $response['message'] = 'Lỗi khi cập nhật chi tiết phòng: ' . $stmt->error;
    // }    
} else {
    $response['status'] = 'error';
    $response['message'] = 'Phương thức yêu cầu không hợp lệ.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>