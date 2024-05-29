<?php
include "../conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $iduser = $_POST['iduser'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $payment_method = $_POST['payment_method'];
    $idrooms = $_POST['idrooms'];
    $prices = $_POST['prices'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $conn->begin_transaction();

    try {

        $start_date = DateTime::createFromFormat('d/m/Y', $start_date)->format('Y-m-d');
        $end_date = DateTime::createFromFormat('d/m/Y', $end_date)->format('Y-m-d');

        $insert_query = "INSERT INTO datphong (IDTaikhoan, IDPhong, Ngaybatdau, Ngayketthuc, Tonggia, PhuongthucTT, Trangthai) VALUES (?, ?, ?, ?, ?, ?, 1)";
        $insert_stmt = $conn->prepare($insert_query);

        // Chèn dữ liệu từ mỗi phòng vào cơ sở dữ liệu
        foreach ($idrooms as $index => $room_id) {
            $insert_stmt->bind_param('iisssi', $iduser, $room_id, $start_date, $end_date, $prices[$index], $payment_method);
            $insert_stmt->execute();
        }

        $conn->commit();
        echo json_encode(array('success' => true, 'message' => 'Dữ liệu đã được cập nhật thành công'));
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(array('success' => false, 'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()));
    }

    $conn->close();
    exit;
}
?>
