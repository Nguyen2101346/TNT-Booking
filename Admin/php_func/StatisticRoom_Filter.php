<?php
include "../php_func/conn.php";

// Nhận các giá trị lọc từ yêu cầu Ajax
$filter1 = $_POST['filter1'];
$filter2 = $_POST['filter2']; // This will be the date string
$filter3 = $_POST['filter3'];

// Bắt đầu xây dựng câu truy vấn dựa trên các bộ lọc
$sql = "WITH FilteredDatphong AS (
    SELECT phong.IDLoaiphong, datphong.Tonggia, datphong.IDPhong, datphong.Ngaydat
    FROM datphong
    JOIN phong ON phong.IDPhong = datphong.IDPhong
    WHERE datphong.Trangthai = 2
";

// Áp dụng bộ lọc ngày nếu có
if ($filter2 !== '') {
    $sql .= " AND DATE(datphong.Ngaydat) = '$filter2'";
}

$sql .= "),
RevenueAndCount AS (
    SELECT 
        IDLoaiphong,
        SUM(Tonggia) AS Doanhthu,
        COUNT(IDPhong) AS Soluongdat
    FROM FilteredDatphong
    GROUP BY IDLoaiphong
)
SELECT 
loaiphong.Tenloaiphong,
loaiphong.AnhDD,
danhgia.Sosao,
FilteredDatphong.Ngaydat,
COALESCE(RevenueAndCount.Doanhthu, 0) AS Doanhthu,
COALESCE(RevenueAndCount.Soluongdat, 0) AS Soluongdat
FROM loaiphong
LEFT JOIN RevenueAndCount ON loaiphong.IDLoaiphong = RevenueAndCount.IDLoaiphong
LEFT JOIN danhgia ON danhgia.IDLoaiphong = loaiphong.IDLoaiphong
LEFT JOIN FilteredDatphong ON loaiphong.IDLoaiphong = FilteredDatphong.IDLoaiphong
GROUP BY loaiphong.IDLoaiphong, loaiphong.Tenloaiphong, loaiphong.AnhDD";

// Áp dụng các bộ lọc khác
if ($filter1 !== 'all') {
    if ($filter1 == 'Doanhthu') {
        $sql .= " ORDER BY Doanhthu";
    } elseif ($filter1 == 'Sosao') {
        $sql .= " ORDER BY Sosao";
    } elseif ($filter1 == 'Soluongdat') {
        $sql .= " ORDER BY Soluongdat";
    }
}

if ($filter3 !== 'all') {
    if ($filter3 == 'desc') {
        $sql .= " DESC";
    } elseif ($filter3 == 'asc') {
        $sql .= " ASC";
    }
}

// Thực hiện truy vấn
$result = mysqli_query($conn, $sql);

// Xử lý kết quả trả về
$response = array();
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Sosao'] == null) {
        $row['Sosao'] = '0';
    }
    $row['Doanhthu'] = number_format($row['Doanhthu'], 0, ',', '.'); // Format doanh thu
    $response[] = $row;
}

// Trả về kết quả dưới dạng JSON
echo json_encode($response);
?>
