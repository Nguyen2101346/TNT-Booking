<?php
// Include file conn.php để thiết lập kết nối cơ sở dữ liệu
include "./conn.php";
include "./Utilities_func.php";

// Kiểm tra xem có yêu cầu hành động cụ thể nào không
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Nếu hành động là thêm mới, thì thực hiện việc thêm mới và trả về danh sách tiện ích sau khi đã thêm mới
    if ($action === 'add') {
        // Kiểm tra xem có dữ liệu được gửi từ form không
        if (isset($_POST['itemName'])) {
            $itemName = $_POST['itemName'];
            // Thêm tiện ích vào cơ sở dữ liệu
            addUtility($conn, $itemName);
        } else {
            echo 'Invalid action';
            exit(); // Kết thúc kịch bản nếu dữ liệu không hợp lệ
        }
    }
    // Nếu hành động là xóa, thì thực hiện việc xóa và trả về danh sách tiện ích sau khi đã xóa
    elseif ($action === 'delete') {
        // Kiểm tra xem có dữ liệu được gửi từ AJAX không
        if (isset($_POST['deleteItemId'])) {
            $itemId = $_POST['deleteItemId'];
            // Xóa tiện ích khỏi cơ sở dữ liệu
            deleteUtility($conn, $itemId);
        } else {
            echo 'Invalid action';
            exit(); // Kết thúc kịch bản nếu dữ liệu không hợp lệ
        }
    } else {
        echo 'Invalid action';
        exit(); // Kết thúc kịch bản nếu hành động không hợp lệ
    }
}

// Lấy lại danh sách tiện ích từ cơ sở dữ liệu và trả về dưới dạng HTML
$result = fetchUtilities($conn);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item" data-id="' . $row["IDTienich"] . '">';
        echo '<span class="title_20">' . $row["Tienich"] . '</span>';
        echo '<button class="remove-button">✖</button>';
        echo '</div>';
    }
} else {
    echo '<p class="title_20">No utilities found</p>';
}
?>
