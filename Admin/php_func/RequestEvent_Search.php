<?php
include "../php_func/conn.php";

$type = $_GET['type'];
$sql = "SELECT datsk.*, sukien.AnhDD, sukien.IDSukien FROM datsk, sukien, taikhoan 
        WHERE sukien.IDSukien = datsk.IDSukien 
        AND datsk.IDTaiKhoan = taikhoan.IDTaiKhoan ";

if ($type != 'all') {
    if ($type == 'meeting') {
        $sql .= "AND sukien.IDsukien = '1' ";
    } elseif ($type == 'wedding') {
        $sql .= "AND sukien.IDsukien = '2' ";
    } elseif ($type == 'community') {
        $sql .= "AND sukien.IDsukien = '3' ";
    } elseif ($type == 'waiting') {
        $sql .= "AND datsk.Trangthai = '1' ";
    } elseif ($type == 'agree') {
        $sql .= "AND datsk.Trangthai = '2' ";
    } elseif ($type == 'cancel') {
        $sql .= "AND datsk.Trangthai = '0' ";
    }
}

$sql .= "GROUP BY datsk.IDDatsk 
         ORDER BY (CASE datsk.Trangthai WHEN '1' THEN 1 
         WHEN '2' THEN 2 
         WHEN '0' THEN 3 
         END )ASC, datsk.Trangthai DESC";

$result = mysqli_query($conn, $sql);
$output = '';

while ($row = mysqli_fetch_assoc($result)) {
    $status = $row['Trangthai'] == '1' ? 'Đang chờ' : ($row['Trangthai'] == '2' ? 'Đã xác nhận' : 'Đã Hủy bỏ');

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
    <div class="Request ' . $disabledClass . '" data-id="' . $row['IDDatsk'] . '"> 
        <div class="Img_Request">
            <img src="../Front_end/img/' . $row['AnhDD'] . '">
        </div> 
        <div class="Request_content">
            <h3>Tên khách hàng: <span class="lighter">' . $row['TenKH'] . '</span> </h3>
            <h3>Số điện thoại: <span class="lighter">' . $row['Sodt'] . '</span></h3>
            <h3>Email: <span class="lighter">' . $row['Email'] . '</span></h3>
            <h3>Công ty: <span class="lighter">' . $row['Congty'] . '</span></h3>
            <h3>Tình trạng: <span class="lighter">' . $status . '</span></h3>
            <div class="request BasicEdit">
                <div class="request Agree_btn ' . $agreeDisabled . '" data-id="' . $row['IDDatsk'] . '">
                    <a href="#" class="btn">Đồng ý</a>
                </div>
                <div class="request Detail_btn ' . $detailDisabled . '" style="z-index: 1999;" data-id="' . $row['IDDatsk'] . '">
                    <a href="#" class="btn">Chi tiết</a>
                </div>
                <div class="request Delet_btn ' . $deleteDisabled . '" data-id="' . $row['IDDatsk'] . '">
                    <a href="#" class="btn">Hủy bỏ</a>
                </div>
            </div>
        </div>
    </div>';
}

echo $output;
?>
