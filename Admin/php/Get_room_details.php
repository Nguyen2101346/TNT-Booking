<?php
    include "../php_func/conn.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT loaiphong.*, hinhphong.Hinh, tienich.Tienich 
        FROM loaiphong
        LEFT JOIN hinhphong ON loaiphong.IDLoaiphong = hinhphong.IDLoaiphong
        LEFT JOIN nhantienich ON loaiphong.IDLoaiphong = nhantienich.IDLoaiphong
        LEFT JOIN tienich ON nhantienich.IDTienich = tienich.IDTienich
        WHERE loaiphong.IDLoaiphong = $id";
        $re = mysqli_query($conn, $sql);
        if ($re && $row = mysqli_num_rows($result) > 0) {
            $room = mysqli_fetch_assoc($re);
            // Kiểm tra và đặt giá trị mặc định nếu trống
            $imgDetail = !empty($room['Hinh']) ? explode(',', $room['Hinh']) : [];
            $tienichList = !empty($room['Tienich']) ? explode(',', $room['Tienich']) : [];
            $response = [
                'success' => true,
                'data' => [
                    'Tenloaiphong' => $room['Tenloaiphong'],
                    'SoPhong' => $room['SoPhong'],
                    'DienTich' => $room['DienTich'],
                    'NgayTao' => $room['NgayTao'],
                    'Tienich' => $room['Tienich'],
                    'Mota'    => $room['Mota'],
                    'ImgRoom' => $room['AnhDD'], // URL ảnh đại diện
                    'ImgDetail' => $imgDetail, // Danh sách URL các ảnh khác
                    'TienichList' => $tienichList // Danh sách ID tiện ích
                ]
            ];
        } else {
            $response = ['success' => false, 'message' => 'Loại phòng không tồn tại.'];
        }

        echo json_encode($response);
    }
?>