<?php
include "../php_func/conn.php";
?>

<form class="filter-container" method="post">
    <select class="filter-select value">
        <option data-search-value-1="all">Tất cả</option>
        <option data-search-value-1="Tichluy">Giá trị tích lũy</option>
        <option data-search-value-1="Soluongdat">Số lượng đặt</option>
    </select>
    <select class="filter-select gender">
        <option data-search-value-2="all">Tất cả</option>
        <option data-search-value-2="Nam">Nam</option>
        <option data-search-value-2="Nữ">Nữ</option>
        <option data-search-value-2="Khác">Khác</option>
    </select>
    <select class="filter-select">
        <option data-search-value-3="all">Tất cả</option>
        <option data-search-value-3="18 - 25">18 - 25 tuổi</option>
        <option data-search-value-3="25 - 35">25 - 35 tuổi</option>
        <option data-search-value-3="35 - 45">35 - 45 tuổi</option>
        <option data-search-value-3="45 - 55">45 - 55 tuổi</option>
        <option data-search-value-3="55 - 65">55 - 65 tuổi</option>
        <option data-search-value-3="65 - 75">65 - 75 tuổi</option>
    </select>
    <select class="filter-select">
        <option data-search-value-4="all">Tất cả</option>
        <option data-search-value-4="asc">Tăng dần</option>
        <option data-search-value-4="desc">Giảm dần</option>
    </select>
    <button class="filter-button" type="submit">Lọc</button>
</form>

<div class="room-listing">
    <div class="result">
        <?php 
            $sql = "SELECT Count(*) FROM taikhoan WHERE Tendangnhap <> 'admin'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            echo "Tìm kiếm được: " . $row['Count(*)'] . " kết quả";
        ?>
    </div>
    <div class="members">
        <?php 
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
                taikhoan.Gioitinh,
                COALESCE(RevenueAndCount.Doanhthu, 0) AS Tichluy,
                COALESCE(RevenueAndCount.Soluongdat, 0) AS Soluongdat,
                TIMESTAMPDIFF(YEAR, taikhoan.Ngaysinh, CURDATE()) AS Tuoi
            FROM taikhoan
            LEFT JOIN RevenueAndCount ON taikhoan.IDTaikhoan = RevenueAndCount.IDTaikhoan
            WHERE taikhoan.Tendangnhap <> 'admin'
            GROUP BY taikhoan.IDTaikhoan, taikhoan.Ho, taikhoan.Ten, taikhoan.Avatar, taikhoan.Ngaysinh, taikhoan.Gioitinh";
            
            $result = mysqli_query($conn, $sql);
            $rankImages = array("gold.jpg", "silver.jpg", "bronze.jpg", "four.jpg", "five.jpg");
            $counter = 0;
            while($row = mysqli_fetch_array($result)) {
                if($counter < 5){
                    $rankImage = '<div class="room-rank"><img src="./img/'.$rankImages[$counter].'" alt=""></div>';
                }
                if($row['Avatar'] == ''){
                    $row['Avatar'] = 'person.png';
                }
                if($row['Gioitinh'] == '0'){
                    $row['Gioitinh'] = 'Nam';
                }elseif($row['Gioitinh'] == '1'){
                    $row['Gioitinh'] = 'Nữ';
                }elseif($row['Gioitinh'] == '2'){
                    $row['Gioitinh'] = 'Khác';
                }
                echo '<div class="member">
                        <div class="member-image">
                            <img src="../Front_end/img_members/'.$row['Avatar'].'" alt="Room Image">
                        </div>
                        <div class="member-details">
                            <p class="title">'.$row['Tennguoidung'].'</p>
                            <p>Thông tin: '.$row['Gioitinh'].', '.$row['Tuoi'].' tuổi</p>
                            <p>Số lượng đặt: '.$row['Soluongdat'].'</p>
                            <p>Giá trị tích lũy: '.$row['Tichluy'].'</p>
                        </div>
                        '.$rankImage.'
                    </div>';
                $counter++;
            }
        ?>
    </div>
</div>

<script>
document.querySelector('.filter-container').addEventListener('submit', function(event) {
    // Ngăn chặn việc gửi form mặc định
    event.preventDefault();

    // Lấy giá trị lọc từ các thẻ select
    var filter1 = document.querySelector('.filter-select.value option:checked').getAttribute('data-search-value-1');
    var filter2 = document.querySelector('.filter-select.gender option:checked').getAttribute('data-search-value-2');
    var filter3 = document.querySelector('.filter-select:nth-of-type(3) option:checked').getAttribute('data-search-value-3');
    var filter4 = document.querySelector('.filter-select:nth-of-type(4) option:checked').getAttribute('data-search-value-4');

    // Gửi yêu cầu AJAX
    $.ajax({
        url: './php_func/StatisticMember_Filter.php',
        method: 'POST',
        data: {filter1: filter1, filter2: filter2, filter3: filter3, filter4: filter4},
        dataType: 'json',
        success: function(response){
            // Kiểm tra xem response có phải là một mảng không
            if (Array.isArray(response) && response.length > 0) {
                document.querySelector('.members').innerHTML = '';
                var counter = 0;
                response.forEach(function (member) {
                    var rankImages = ["gold.jpg", "silver.jpg", "bronze.jpg", "four.jpg", "five.jpg"];
                    var rankImage = '';
                    if (counter < 5) {
                        rankImage = '<div class="room-rank"><img src="./img/' + rankImages[counter] + '" alt=""></div>';
                    }
                    var roomHTML = `
                        <div class="member">
                            <div class="member-image">
                                <img src="../Front_end/img_members/${member['Avatar']}" alt="Room Image">
                            </div>
                            <div class="member-details">
                                <p class="title">${member['Tennguoidung']}</p>
                                <p>Thông tin: ${member['Gioitinh']}, ${member['Tuoi']} tuổi</p>
                                <p>Số lượng đặt: ${member['Soluongdat']}</p>
                                <p>Giá trị tích lũy: ${member['Tichluy']}</p>
                            </div>
                            ${rankImage}
                        </div>`;
                    document.querySelector('.members').innerHTML += roomHTML;
                    counter++;
                });
            } else {
                document.querySelector('.members').innerHTML = '<p class="title">Không có thống kê nào</p>';
                // console.log('Response is not an array:', response);
            }
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi trong yêu cầu AJAX
            console.error('AJAX Error:', status, error);
        }
    });
});
</script>
