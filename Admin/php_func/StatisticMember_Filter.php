<?php
include "../php_func/conn.php";

// Nhận các giá trị lọc từ yêu cầu Ajax
$filter1 = $_POST['filter1'];
$filter2 = $_POST['filter2']; // Bộ lọc giới tính
$filter3 = $_POST['filter3']; // Bộ lọc độ tuổi
$filter4 = $_POST['filter4']; // Thứ tự sắp xếp

// Bắt đầu xây dựng câu truy vấn dựa trên các bộ lọc
$sql = "WITH FilteredDatphong AS (
    SELECT phong.IDLoaiphong, datphong.Tonggia, datphong.IDPhong, datphong.IDTaikhoan
    FROM datphong
    JOIN phong ON phong.IDPhong = datphong.IDPhong
    WHERE datphong.Trangthai = 2
),
RevenueAndCount AS (
    SELECT 
        IDTaikhoan,
        SUM(Tonggia) AS Doanhthu,
        COUNT(IDPhong) AS Soluongdat
    FROM FilteredDatphong
    GROUP BY IDTaikhoan
)
SELECT 
    CONCAT(taikhoan.Ho, ' ', taikhoan.Ten) AS Tennguoidung,
    taikhoan.Avatar,
    COALESCE(RevenueAndCount.Doanhthu, 0) AS Tichluy,
    COALESCE(RevenueAndCount.Soluongdat, 0) AS Soluongdat,
    TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) AS Tuoi,
    taikhoan.Gioitinh
FROM taikhoan
LEFT JOIN RevenueAndCount ON taikhoan.IDTaikhoan = RevenueAndCount.IDTaikhoan
WHERE taikhoan.Tendangnhap <> 'admin'";

// Áp dụng bộ lọc giới tính
if ($filter2 !== 'all') {
    if ($filter2 == 'Nam') {
        $sql .= " AND taikhoan.Gioitinh = '0'";
    } elseif ($filter2 == 'Nữ') {
        $sql .= " AND taikhoan.Gioitinh = '1'";
    } elseif ($filter2 == 'Khác') {
        $sql .= " AND taikhoan.Gioitinh = '2'";
    }
}

// Áp dụng bộ lọc độ tuổi
if ($filter3 !== 'all') {
    if ($filter3 == '18 - 25') {
        $sql .= " AND TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) BETWEEN 18 AND 25";
    } elseif ($filter3 == '25 - 35') {
        $sql .= " AND TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) BETWEEN 25 AND 35";
    } elseif ($filter3 == '35 - 45') {
        $sql .= " AND TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) BETWEEN 35 AND 45";
    } elseif ($filter3 == '45 - 55') {
        $sql .= " AND TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) BETWEEN 45 AND 55";
    } elseif ($filter3 == '55 - 65') {
        $sql .= " AND TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) BETWEEN 55 AND 65";
    } elseif ($filter3 == '65 - 75') {
        $sql .= " AND TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) BETWEEN 65 AND 75";
    }
}

$sql .= "
GROUP BY taikhoan.IDTaikhoan, taikhoan.Ho, taikhoan.Ten, taikhoan.Avatar, taikhoan.Ngaysinh, taikhoan.Gioitinh";

// Áp dụng các bộ lọc khác
if ($filter1 !== 'all') {
    if ($filter1 == 'Tichluy') {
        $sql .= " ORDER BY Tichluy";
    } elseif ($filter1 == 'Soluongdat') {
        $sql .= " ORDER BY Soluongdat";
    }
}

if ($filter4 !== 'all') {
    if ($filter4 == 'desc') {
        $sql .= " DESC";
    } elseif ($filter4 == 'asc') {
        $sql .= " ASC";
    }
}

// Thực hiện truy vấn
$result = mysqli_query($conn, $sql);

// Xử lý kết quả trả về
$response = array();
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Avatar'] == '') {
        $row['Avatar'] = 'person.png';
    }
    if ($row['Gioitinh'] == '0') {
        $row['Gioitinh'] = 'Nam';
    } elseif ($row['Gioitinh'] == '1') {
        $row['Gioitinh'] = 'Nữ';
    } elseif ($row['Gioitinh'] == '2') {
        $row['Gioitinh'] = 'Khác';
    }
    $row['Tichluy'] = number_format($row['Tichluy'], 0, ',', '.'); // Định dạng doanh thu
    $response[] = $row;
}

// Trả về kết quả dưới dạng JSON
echo json_encode($response);
?>
