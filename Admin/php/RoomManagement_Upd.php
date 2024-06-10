<?php
// Enable error reporting for debugging (uncomment during development)
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
include "../php_func/conn.php";

$response = [];

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $idroom = isset($_POST['IDPhong_Upd']) ? (int)$_POST['IDPhong_Upd'] : null;
    $name = isset($_POST['Tenphong_Upd']) ? trim($_POST['Tenphong_Upd']) : null;
    $floor = isset($_POST['Sotang_Upd']) ? (int)$_POST['Sotang_Upd'] : null;
    $idroomtype = isset($_POST['IDLoaiphong_Upd']) ? (int)$_POST['IDLoaiphong_Upd'] : null;
    $trangthai = 0;  // Default value as per original code

    // Validate required fields
    if ($idroom && $name && $floor && $idroomtype) {
        // Prepare SQL statement
        $sql = "UPDATE phong SET Tenphong = ?, Sotang = ?, IDLoaiphong = ?, Trangthai = ? WHERE IDPhong = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sisii', $name, $floor, $idroomtype, $trangthai, $idroom);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Cập nhật thành công';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Cập nhật thất bại: ' . $stmt->error;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Thiếu dữ liệu yêu cầu';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Phương thức yêu cầu không hợp lệ';
}

// Return JSON response
echo json_encode($response);
?>
