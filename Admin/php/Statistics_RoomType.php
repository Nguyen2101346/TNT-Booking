<?php
    include "../php_func/conn.php";
?>

    <form class="filter-container" method="post">
        <select class="filter-select">
            <option data-search-value1="all">Tất cả</option>
            <option data-search-value1="Doanhthu">Doanh thu</option>
            <option data-search-value1="Sosao">Đánh giá</option>
            <option data-search-value1="Soluongdat">Số lượng đặt</option>
            <!-- Other options can be added here -->
        </select>
        <input class="filter-select" id="StartDate" value="Khoảng đầu">
        <input class="filter-select" id="EndDate" value="Khoảng cuối">
            <!-- <option data-search-value2="all">Tất cả</option>
            <option data-search-value2="day">Hằng ngày</option>
            <option data-search-value2="month">Hằng tháng</option>
            <option data-search-value2="year">Hằng năm</option> -->
            <!-- Other options can be added here -->
        </input>
        <select class="filter-select">
            <option data-search-value3="desc">Giảm dần</option>
            <option data-search-value3="asc">Tăng dần</option>
            <!-- Other options can be added here -->
        </select>
        <button type="submit" class="filter-button">Lọc</button>
    </form>

    <div class="room-listing">
        <div class="revenue">
            <?php
                $sql = "SELECT SUM(Tonggia) FROM datphong WHERE Trangthai = 2";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_row($result);
                $totalRevenue = $row[0];
                $totalRevenue = number_format($totalRevenue, 0, ',', '.');
                echo "<p class='total-revenue'>Tổng doanh thu: $totalRevenue VNĐ</p>";
            ?>
        </div>
        <div class="quantity">
            <?php
                $sql = "SELECT COUNT(*) FROM datphong WHERE Trangthai = 2";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_row($result);
                echo "<p class='total-quantity'>Số lượng đặt: $row[0] lượt</p>";
            ?>
        </div>
        <span class="total-rooms absolute">
            <?php
                $sql = "SELECT COUNT(*) FROM phong";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_row($result);
                echo "<p class='total-room'>Tổng số phòng: $row[0]</p>";
            ?>
            <?php
                $sql = "SELECT COUNT(*) FROM loaiphong";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_row($result);
                echo "<p class='total-room'>Tổng số loại phòng: $row[0]</p>";
            ?>
        </span>
        <div class="rooms">
            <?php
                $sql = "WITH FilteredDatphong AS (
                        SELECT phong.IDLoaiphong, datphong.Tonggia, datphong.IDPhong
                        FROM datphong
                        JOIN phong ON phong.IDPhong = datphong.IDPhong
                        WHERE datphong.Trangthai = 2
                        ),
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
                    ROUND(AVG(danhgia.Sosao)) AS Sosao,
                    COALESCE(RevenueAndCount.Doanhthu, 0) AS Doanhthu,
                    COALESCE(RevenueAndCount.Soluongdat, 0) AS Soluongdat
                FROM loaiphong
                LEFT JOIN RevenueAndCount ON loaiphong.IDLoaiphong = RevenueAndCount.IDLoaiphong
                LEFT JOIN danhgia ON danhgia.IDLoaiphong = loaiphong.IDLoaiphong
                GROUP BY loaiphong.IDLoaiphong, loaiphong.Tenloaiphong, loaiphong.AnhDD
                ORDER BY Soluongdat DESC;";
                $result = mysqli_query($conn, $sql);
                $rankImages = array("gold.jpg", "silver.jpg", "bronze.jpg", "four.jpg", "five.jpg");
                $counter = 0;
                while($row = mysqli_fetch_assoc($result)){
                    if($row['Sosao'] == null){
                        $row['Sosao'] = '0';
                    }
                    $Doanhthu = number_format($row['Doanhthu'], 0, ',', '.');
                    if($counter < 5){
                        $rankImage = '<div class="room-rank"><img src="./img/'.$rankImages[$counter].'" alt=""></div>';
                    }
                    echo '
                    <div class="room">
                        <div class="room-image">
                            <img src="./img/'.$row['AnhDD'].'" alt="Room Image">
                        </div>
                        <div class="room-details">
                            <p class="title">'.$row['Tenloaiphong'].'</p>
                            <p>Đánh giá: '.$row['Sosao'].'.0 / 5.0</p>
                            <p>Số lượng đặt: '.$row['Soluongdat'].'</p>
                            <p>Doanh thu: '.$Doanhthu.'</p>
                        </div>
                        <div class="room-rank">
                            '.$rankImage.'
                        </div>
                    </div>
                    ';
                    $counter++; // Tăng biến đếm
                }
            ?>
        </div>
    </div>
</div>

<script>
        flatpickr("#StartDate", {
            dateFormat: "Y-m-d",
            locale: "vn",
            onChange: function(selectedDates, dateStr, instance) {
                // Lấy ngày đã chọn trên thành phần thứ nhất
                var selectedDate = selectedDates[0];

                // Cập nhật giá trị minDate của thành phần thứ hai
                flatpickr("#EndDate", {
                    minDate: selectedDate,
                    dateFormat: "Y-m-d",
                    locale: "vn"
                    
                });
            }
        });

        // Khởi tạo thành phần thứ hai
        flatpickr("#EndDate", {
            dateFormat: "Y-m-d",
            locale: "vn"
        });
  // Lắng nghe sự kiện khi form được submit
document.querySelector('.filter-container').addEventListener('submit', function(event) {
    // Ngăn chặn việc gửi form mặc định
    event.preventDefault();

    function isValidDate(dateString) {
    var regex = /^\d{4}-\d{2}-\d{2}$/; // Định dạng ngày tháng yyyy-mm-dd
    if(!regex.test(dateString)) {
        return false;
    }
    var date = new Date(dateString);
    return date instanceof Date && !isNaN(date);
}
    // Lấy giá trị lọc từ các thẻ select
    var filter1 = document.querySelector('.filter-select:nth-of-type(1) option:checked').getAttribute('data-search-value1');
    var StartDate = document.querySelector('#StartDate').value;
    var EndDate = document.querySelector('#EndDate').value;
    var filter3 = document.querySelector('.filter-select:nth-of-type(2) option:checked').getAttribute('data-search-value3');

        if(!isValidDate(StartDate)) {
        StartDate = 0;
        }

        if(!isValidDate(EndDate)) {
            EndDate = 0;
        }

    console.log(StartDate)
    console.log(EndDate)
    // Gửi yêu cầu AJAX
    $.ajax({
        url: './php_func/StatisticRoom_Filter.php',
        method: 'POST',
        data: {filter1: filter1, start_date: StartDate,end_date: EndDate , filter3: filter3},
        dataType: 'json',
        success: function(response){
            // Kiểm tra xem response có phải là một mảng không
            if (Array.isArray(response)) {
                document.querySelector('.rooms').innerHTML = '';
                var counter = 0;
                response.forEach(function (room) {
                    var rankImages = ["gold.jpg", "silver.jpg", "bronze.jpg", "four.jpg", "five.jpg"];
                    var rankImage = '';
                    if (counter < 5) {
                        rankImage = '<div class="room-rank"><img src="./img/' + rankImages[counter] + '" alt=""></div>';
                    }
                    var roomHTML = `
                        <div class="room">
                            <div class="room-image">
                                <img src="./img/${room['AnhDD']}" alt="Room Image">
                            </div>
                            <div class="room-details">
                                <p class="title">${room['Tenloaiphong']}</p>
                                <p>Đánh giá: ${room['Sosao']}.0 / 5.0</p>
                                <p>Số lượng đặt: ${room['Soluongdat']}</p>
                                <p>Doanh thu: ${room['Doanhthu']}</p>
                            </div>` +
                            rankImage + `
                        </div>`;
                    document.querySelector('.rooms').innerHTML += roomHTML;
                    counter++;
                });
                } else {
                    document.querySelector('.rooms').innerHTML = '<p class="title">Không có thống kê nào</p>';
                    console.log('Response is not an array:', response);
                }
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi trong yêu cầu AJAX
            console.error('AJAX Error:', status, error);
        }
    });
});


</script>

