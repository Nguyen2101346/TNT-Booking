<?php
include "../php_func/conn.php";

$type = isset($_GET['type']) ? mysqli_real_escape_string($conn, $_GET['type']) : 'all'; // Sanitize input

$sql = "SELECT datphong.*, loaiphong.AnhDD, loaiphong.IDLoaiphong, loaiphong.Tenloaiphong, phong.IDPhong, taikhoan.Ho, taikhoan.Ten 
        FROM datphong
        JOIN phong ON datphong.IDPhong = phong.IDPhong
        JOIN loaiphong ON phong.IDLoaiPhong = loaiphong.IDLoaiPhong
        JOIN taikhoan ON datphong.IDTaiKhoan = taikhoan.IDTaiKhoan";

$conditions = [];
if ($type != 'all') {
    switch ($type) {
        case 'typeRoom':
            $conditions[] = "datphong.IDLoaiPhong = '1'";
            break;
        case 'wedding':
            $conditions[] = "sukien.IDsukien = '2'";
            break;
        case 'community':
            $conditions[] = "sukien.IDsukien = '3'";
            break;
        case 'waiting':
            $conditions[] = "datphong.Trangthai = '1'";
            break;
        case 'confirm':
            $conditions[] = "datphong.Trangthai = '2'";
            break;
        case 'cancel':
            $conditions[] = "datphong.Trangthai = '0'";
            break;
    }
}

if (!empty($conditions)) {
    $sql .= " WHERE " . implode(' AND ', $conditions);
}

$sql .= " GROUP BY datphong.IDDatphong 
          ORDER BY (CASE datphong.Trangthai WHEN '1' THEN 1 
                                            WHEN '2' THEN 2 
                                            WHEN '0' THEN 3 
                       END) ASC, datphong.Trangthai DESC";

$result = mysqli_query($conn, $sql);
$output = '';

while ($row = mysqli_fetch_assoc($result)) {
    // Đặt múi giờ
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    // Mảng chứa các tên thứ trong tuần bằng tiếng Việt
    $daysOfWeek = array(
        'Sunday' => 'Chủ nhật',
        'Monday' => 'Thứ hai',
        'Tuesday' => 'Thứ ba',
        'Wednesday' => 'Thứ tư',
        'Thursday' => 'Thứ năm',
        'Friday' => 'Thứ sáu',
        'Saturday' => 'Thứ bảy'
    );

    // Định dạng ngày tháng năm
    $date = new DateTime($row['Ngaydat']);
    $dayOfWeekInVietnamese = $daysOfWeek[$date->format('l')];
    $Ngaydat = $dayOfWeekInVietnamese . ', ' . $date->format('d/m/Y');

    $status = $row['Trangthai'] == '1' ? 'Đang chờ' : ($row['Trangthai'] == '2' ? 'Đã xác nhận' : 'Đã Hủy bỏ');

    $Tonggia = number_format($row['Tonggia'], 0, ',', '.');
    $PhuongthucTT = $row['PhuongthucTT'] == '0' ? 'Trực tiếp' : 'Trực tuyến';

    // Set CSS classes based on status
    $detailDisabled = '';
    $disabledClass = '';
    $agreeDisabled = '';
    $deleteDisabled = '';
    if ($status == 'Đã xác nhận') {
        $agreeDisabled = 'disabled';
    } elseif ($status == 'Đã Hủy bỏ') {
        $disabledClass = 'disabled';
        $agreeDisabled = 'disabled';
        $deleteDisabled = 'disabled';
        $detailDisabled = '';
    }

    $output .= '
    <div class="Request '. $disabledClass.'" data-id="'. $row['IDDatphong'].'" data-idtyperoom="'. $row['IDLoaiphong'].'">
        <div class="Img_Request">
            <img src="./img/'. $row['AnhDD'].'">
        </div>
        <div class="Request_content">
            <h3>Loại phòng : <span class="lighter">'. $row['Tenloaiphong'].'</span> </h3>
            <h3>Tên khách hàng : <span class="lighter">'. $row['Ho'].' '.$row['Ten'].'</span></h3>
            <h3>Ngày đặt : <span class="lighter">'. $Ngaydat.'</span></h3>
            <h3>Thành tiền : <span class="lighter">'. $Tonggia.' VND</span></h3>
            <h3>Phương thức thanh toán : <span class="lighter">'. $PhuongthucTT.'</span></h3>
            <h3 class="absolute_text status'. $row['Trangthai'].'"><span class="lighter">'. $status.'</span></h3>
            <div class="request BasicEdit">
                <div class="request Detail_btn" data-id="'. $row['IDDatphong'].'" data-idtyperoom="'. $row['IDLoaiphong'].'">
                    <a href="#" class="btn">Chi tiết</a>
                </div>
                <div class="request Delet_btn '. $deleteDisabled.'" data-id="'. $row['IDDatphong'].'">
                    <a href="#" class="btn">Hủy bỏ</a>
                </div>
            </div>
        </div>
    </div>';
}

echo $output;
?>

