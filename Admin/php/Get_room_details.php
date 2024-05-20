<?php
    include "../php_func/conn.php";

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Chuyển đổi thành số nguyên để tránh SQL injection
        $sql = "SELECT loaiphong.*, GROUP_CONCAT(DISTINCT hinhphong.Hinh) as Hinh, GROUP_CONCAT(DISTINCT tienich.Tienich) as Tienich 
                FROM loaiphong
                LEFT JOIN hinhphong ON loaiphong.IDLoaiphong = hinhphong.IDLoaiphong
                LEFT JOIN nhantienich ON loaiphong.IDLoaiphong = nhantienich.IDLoaiphong
                LEFT JOIN tienich ON nhantienich.IDTienich = tienich.IDTienich
                WHERE loaiphong.IDLoaiphong = $id
                GROUP BY loaiphong.IDLoaiphong";
        
        $re = mysqli_query($conn, $sql);
    
        if ($re && mysqli_num_rows($re) > 0) {
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
                    'Mota' => $room['Mota'],
                    'AnhDD' => $room['AnhDD'], // URL ảnh đại diện
                    'ImgDetail' => $imgDetail, // Danh sách URL các ảnh khác
                    'TienichList' => $tienichList // Danh sách ID tiện ích
                ]
            ];
        } else {
            $response = ['success' => false, 'message' => 'Loại phòng không tồn tại.'];
        }
    
        header('Content-Type: application/json'); // Đặt Content-Type là application/json
        echo json_encode($response);
    }
?>