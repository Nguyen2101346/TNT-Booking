<?php
include '../php_func/conn.php';
include '../php_func/Room_func.php';

header('Content-Type: application/json');

// Start output buffering to capture any unexpected output
ob_start();

// Enable detailed error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $discount_type = mysqli_real_escape_string($conn, $_POST['discount-type']);
    $discount_value = mysqli_real_escape_string($conn, $_POST['discount-value']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start-date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end-date']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room-type']);

    // Validate inputs
    if (empty($title)) {
        $response = ["type" => "error", "message" => "Name_nothing"];
    } else if (empty($start_date) || empty($end_date)) {
        $response = ["type" => "error", "message" => "Date_nothing"];
    } else {
        $today = date("Y-m-d");

        // Check if discount already exists
        $sql = "SELECT * FROM uudai WHERE Tieude = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $title);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $response = ["type" => "error", "message" => "Discount_exists"];
        } else {
            // Insert new discount
            $sql = "INSERT INTO uudai (Tieude, IDLoaiUD, Nhangiam, Donvi, Ngaybatdau, Ngayketthuc, IDLoaiphong)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('siiissi', $title, $discount_type, $discount_value, $unit, $start_date, $end_date, $room_type);

            if ($stmt->execute()) {
                $response = ["type" => "success", "message" => "Success"];
            } else {
                $response = ["type" => "error", "message" => "Database error"];
            }
        }
    }
} else {
    $response = ["type" => "error", "message" => "Invalid data!"];
}

// Clear the output buffer and return the JSON response
ob_end_clean();
echo json_encode($response);
