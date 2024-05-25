<?php

include "../php_func/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['convenience']) && isset($_POST['room_id'])) {
        $room_id = $_POST['room_id']; 
        
        $conn->begin_transaction();
        try {
            $insert_query = "INSERT INTO nhantienich (IDLoaiphong, IDTienich) VALUES (?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param('ii', $room_id, $convenience_id);
            $delete_query = "DELETE FROM nhantienich WHERE IDLoaiphong = ?";
            $delete_stmt = $conn->prepare($delete_query);
            $delete_stmt->bind_param('i', $room_id);
            $delete_stmt->execute();

            foreach ($_POST['convenience'] as $convenience_id) {
                $insert_stmt->execute();
            }

            $conn->commit();
            echo json_encode(array('success' => true, 'message' => 'Dữ liệu đã được cập nhật thành công'));
        } catch (Exception $e) {
            $conn->rollback();
            echo json_encode(array('success' => false, 'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()));
        }

        $conn->close();
    } else {
        echo json_encode(array('success' => false, 'message' => 'Dữ liệu không hợp lệ'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Yêu cầu không hợp lệ'));
}
?>
