    <?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    header('Content-Type: application/json');
    include "../php_func/conn.php";

    // $response = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idroom = (int)$_POST['IDPhong_Upd'];
            $name = $_POST['Tenphong_Upd'];
            $floor = $_POST['Sotang_Upd'];
            $date = $_POST['Ngaytao_Upd'];
            $idroomtype = $_POST['IDLoaiphong_Upd'];
        $sql = "UPDATE phong SET Tenphong = ?, Sotang = ?, Ngaytao = ?, IDLoaiphong = ? WHERE IDPhong = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sisii', $name, $floor, $date, $idroomtype, $idroom);
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Cập nhật thành công';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Cập nhật thất bại:'.$stmt->error;
        }
        echo json_encode($response);
    }else {
        $response['status'] = 'error';
        $response['message'] = 'Phương thức yêu cầu không hợp lệ.';
    }

    // header('Content-Type: application/json');
    // echo json_encode($response);
    ?>

