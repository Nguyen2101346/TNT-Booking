<?php
    include "../php_func/conn.php";
?>

<div class="filter-container">
        <select class="filter-select value">
            <option data-search-value-1="all">Tất cả</option>
            <option data-search-value-1="Tichluy">Giá trị tích lũy</option>
            <option data-search-value-1="Soluongdat">Số lượng đặt</option>
            <!-- Other options can be added here -->
        </select>
        <select class="filter-select gender">
            <option data-search-value-2="all">Tất cả</option>
            <option data-search-value-2="Nam">Nam</option>
            <option data-search-value-2="Nữ">Nữ</option>
            <!-- Other options can be added here -->
        </select>
        <select class="filter-select">
            <option data-search-value-3="all">Tất cả</option>
            <option data-search-value-3="18 - 25">18 - 25 tuổi</option>
            <option data-search-value-3="25 - 35">25 - 35 tuổi</option>
            <option data-search-value-3="35 - 45">35 - 45 tuổi</option>
            <option data-search-value-3="45 - 55">45 - 55 tuổi</option>
            <option data-search-value-3="55 - 65">55 - 65 tuổi</option>
            <option data-search-value-3="65 - 75">65 - 75 tuổi</option>
            <!-- Other options can be added here -->
        </select>
        <select class="filter-select">
            <option data-search-value-4="all">Tất cả</option>
            <option data-search-value-4="asc">Tăng dần</option>
            <option data-search-value-4="desc">Giảm dần</option>
            <!-- Other options can be added here -->
        </select>
        <button class="filter-button">Lọc</button>
    </div>

    <div class="room-listing">
        <div class="result">
            <?php 
                $sql = "SELECT Count(*) FROM taikhoan";
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
                    CONCAT(taikhoan.Ho, taikhoan.Ten) AS Tennguoidung,
                    taikhoan.Avatar,
                    COALESCE(RevenueAndCount.Doanhthu, 0) AS Tichluy,
                    COALESCE(RevenueAndCount.Soluongdat, 0) AS Soluongdat
                FROM taikhoan
                LEFT JOIN RevenueAndCount ON taikhoan.IDTaikhoan = RevenueAndCount.IDTaikhoan
                WHERE taikhoan.Tendangnhap <> 'admin'
                GROUP BY taikhoan.IDTaikhoan, taikhoan.Ho, taikhoan.Ten, taikhoan.Avatar";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                echo '<div class="member">
                        <div class="member-image">
                            <img src="../Front_end/img_members/'.$row['Avatar'].'" alt="Room Image">
                        </div>
                        <div class="room-details">
                            <p class="title">'.$row['Tennguoidung'].'</p>
                            <p>Thông tin: Nam, 20 tuổi</p>
                            <p>Số lượng đặt: '.$row['Soluongdat'].'</p>
                            <p>Giá trị tích lũy: '.$row['Tichluy'].'</p>
                        </div>
                    </div>';
            }
            ?>
            <div class="member">
                <div class="member-image">
                    <img src="../Front_end/img_members/avatar.jpg" alt="Room Image">
                </div>
                <div class="room-details">
                    <p class="title">Phạm Hoàng Huy Tính</p>
                    <p>Thông tin: Nam, 20 tuổi</p>
                    <p>Số lượng đặt: 3</p>
                    <p>Giá trị tích lũy: 50.000.000</p>
                </div>
                <div class="room-rank gold">
                    <img src="./img/gold.jpg" alt="">
                </div>
            </div>
            <div class="room">
                <div class="member-image">
                    <img src="../Front_end/img_members/avatar.jpg" alt="Room Image">
                </div>
                <div class="room-details">
                    <p class="title">Deluxe 2 Giường Đơn</p>
                    <p>Thông tin: Nam, 20 tuổi</p>
                    <p>Số lượng đặt: 3</p>
                    <p>Giá trị tích lũy: 50.000.000</p>
                </div>
                <div class="room-rank silver">
                    <img src="./img/silver.jpg" alt="">
                </div>
            </div>
            <div class="room">
                <div class="member-image">
                    <img src="../Front_end/img_members/avatar.jpg" alt="Room Image">
                </div>
                <div class="room-details">
                    <p class="title">Deluxe 2 Giường Đơn</p>
                    <p>Thông tin: Nam, 20 tuổi</p>
                    <p>Số lượng đặt: 3</p>
                    <p>Giá trị tích lũy: 50.000.000</p>
                </div>
                <div class="room-rank bronze">
                    <img src="./img/bronze.jpg" alt="">
                </div>
            </div>
        </div>
    </div>