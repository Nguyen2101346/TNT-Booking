<body>
    <div class="Sale_Container">
        <?php
        if($_GET['start_date'] == '' || $_GET['end_date'] == ''){
            $start_date = '0-0-0000';
            $end_date = '0-0-0000';
            $room_num = 1;
            $adults_num = 0;
            $discount_code ='';
        }
            include "./php/Searchbar.php";
        ?>
        <div class="body">
            <div class="body_container">
                <div class="Main_content">
                    <div class="Main title">
                        <h2>Chọn phòng</h2>
                    </div>
                    <div class="Main_component">
                        <div class="Component_left">
                            <div class="Main_item">
                                <div class="navbar">
                                    <?php
                                        $discount_code = isset($_GET['discount_code']) ? $_GET['discount_code'] : '';
                                        if (!empty($discount_code)) {
                                            echo '<h3 class="offersCheck content">Tìm kiếm theo ưu đãi</h3>';
                                        } else {
                                            echo '<h3 class="offersCheck content"></h3>';
                                        }
                                    ?>
                                    <h3 class="content">Đã chọn <span id="Numroom">0</span>/<span id="limit_room">1</span></h3>
                                </div>
                                <div class="Room_container">
                                    <?php
                                        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                                        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
                                        $room_num = isset($_GET['room_num']) ? $_GET['room_num'] : 1;
                                        $adults_num = isset($_GET['qua-adults']) ? $_GET['qua-adults'] : 1;
                                        $discount_code = isset($_GET['discount_code']) ? $_GET['discount_code'] : '';
                                        $min_adults = isset($_GET['min_adults']) ? $_GET['min_adults'] : 1;
                                    if(isset($discount_code)){ 
                                            $sql = "SELECT 
                                                    loaiphong.*, 
                                                    phong.*, 
                                                    uudai.Nhangiam,
                                                    loaiud.IDLoaiUD,
                                                    uudai.Donvi,
                                                    uudai.Tieude
                                                FROM 
                                                    loaiphong
                                                JOIN 
                                                    phong ON loaiphong.IDLoaiphong = phong.IDLoaiphong
                                                LEFT JOIN 
                                                    uudai ON loaiphong.IDLoaiphong = uudai.IDLoaiphong
                                                LEFT JOIN 
                                                    loaiud ON uudai.IDLoaiUD = loaiud.IDLoaiUD
                                                WHERE 
                                                     phong.TrangThai = '0' 
                                                    AND loaiphong.Trangthai = '1'
                                                    AND loaiphong.Songuoi >= '$min_adults'";
                                            if($discount_code == 1){
                                                $sql .=" AND loaiud.IDLoaiUD = '1' AND uudai.Trangthai = '1'";
                                            }else if($discount_code == 2){
                                                $sql .=" AND loaiud.IDLoaiUD = '2' AND uudai.Trangthai = '1'";
                                            }
                                            $sql .="GROUP BY 
                                                    loaiphong.IDLoaiphong";
                                            $re = mysqli_query($conn, $sql);
                                            $row = mysqli_num_rows($re);
                                            if ($row > 0) {
                                            while ($r = mysqli_fetch_array($re)) {
                                                $gia = $r['Gia'];
                                                $changenumber = number_format($gia, 0, ',', '.');
                                                $changeColor = '';
                                                if($r['Nhangiam'] > 0){
                                                    if($r['Donvi'] == 1){
                                                        $changeColor = 'red';
                                                        $originPrice = "<p class='originPrice' data-originPrice='".$gia."'>".$changenumber." VNĐ</p>";
                                                        $discount = "<p data-discount='".$r['Nhangiam'].":%'>Giảm: ".$r['Nhangiam']." %</p>";
                                                        $total = $gia - ($gia * $r['Nhangiam'] / 100);
                                                        $Totalformat = number_format($total, 0, ',', '.');
                                                        $TotalformatText = "<p class='content ".$changeColor."'> ".$Totalformat." </p>";
                                                    }else{
                                                        $changColor = 'red';
                                                        $originPrice = "<p class='originPrice' data-originPrice='".$gia."'>".$changenumber."</p>";
                                                        $discount = "<p data-discount='".$r['Nhangiam'].":VNĐ'>Giảm: ".$r['Nhangiam']." VNĐ</p>";
                                                        $total = $gia - $r['Nhangiam'];
                                                        $Totalformat= number_format($total, 0, ',', '.');
                                                        $TotalformatText = "<p class='content ".$changeColor."'> ".$Totalformat." </p>";
                                                    }
                                                }else{
                                                    $discount = $r['Tieude'];
                                                    $total = $gia;
                                                    $Totalformat = $changenumber;
                                                    $TotalformatText = "<p class='content ".$changeColor."'> ".$Totalformat." </p>";
                                                }
                                                echo '     
                                                <div class="room" data-idroom="'.$r['IDPhong'].'" data-id="'.$r['IDLoaiphong'].'" data-title="'.$r['Tenloaiphong'].'" data-price="'.$total.'" data-priceFormatted="'.$changenumber.'">
                                                    <div class="img">
                                                        <div class="sale-icon">
                                                            <img src="./img/sale_icon.png" alt="">
                                                        </div>
                                                        <img src="../Admin/img/'.$r["AnhDD"].'" alt="">
                                                    </div>
                                                    <div class="content">
                                                        <div class="title">'?>
                                                            <a href="index.php?page=Room&id=<?php echo $r['IDLoaiphong']; ?><?php if ($change == 1) echo '&go=1'; ?>">
                                                                <?php echo $r['Tenloaiphong']; ?>
                                                            </a>
                                                <?php echo'</div>
                                                        <div class="appraise">
                                                            <div class="content">'
                                                            ?>
                                                            <?php
                                                                 $re1 = get_averages($conn, $r['IDLoaiphong']); // Hàm để lấy bình luận từ cơ sở dữ liệu
                                                                 if(mysqli_num_rows($re1) > 0){
                                                                      $r1 = mysqli_fetch_array($re1);
                                                                      $average_rating = number_format(floor($r1['Trungbinh']),1);
                                                            ?>
                                                            <div class="rating">
                                                            <?php
                                                                 for ($i = 1; $i <= 5; $i++) {
                                                                      $selected = $i <= $average_rating ? 'selected' : '';
                                                                      echo '<span class="star_display ' . $selected . '">&#9733;</span>';
                                                                 }
                                                            ?>
                                                            </div>
                                                            <!-- <p class="sale-display"><?= $average_rating ?> / 5.0</p> -->
                                                            <?php
                                                                 }
                                                            ?>
                                                            <?php
                                                       echo '</div>
                                                        </div>
                                                        <div class="category">
                                                            <div class="content note">
                                                                <span>
                                                                    <i class="fa-solid fa-user"></i>
                                                                </span>
                                                                '.$r['Songuoi'].' Người</div>
                                                            <div class="content note"><span>
                                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                            </span>'. $r['Dientich'].' m&sup2</div>
                                                        </div>
                                                        <div class="prices">
                                                            <div class="prices_absolute">
                                                                <div class="discountsale">'?>
                                                                <?php
                                                                   echo $discount;
                                                                   if(isset($r['Nhangiam']  ) && $r['Nhangiam'] > 0){
                                                                    echo $originPrice;
                                                                   }
                                                                ?>     
                                                                <?php
                                                                echo'</div>
                                                                <div class="TotalPrice content" id="totalPrice">
                                                                   Giá: '.$TotalformatText.' VND
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="idroom" value="'.$r['IDPhong'].'">
                                                        <div class="Choose_btn">
                                                            <a href="#" class="medium_btn" onclick="chooseRoom(event, ' . $r['IDLoaiphong'] . ')">Chọn</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        } else {
                                            echo "Không tìm thấy phòng nào";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="Component_right">
                            <?php 
                                include "./php/MiniBill.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script>
          

document.addEventListener('DOMContentLoaded', function() {
    let selectedRooms = [];
    const limitRoom = <?php echo $_GET['rooms']; ?>;
    // console.log(limitRoom)
    const numRoomElement = document.getElementById('Numroom');
    const totalPriceElement = document.getElementById('TotalPrice');
    const continueButton = document.getElementById('continueButton');

    function chooseRoom(event, roomId) {
        event.preventDefault();
        if (selectedRooms.length >= limitRoom) {
            alert('Bạn đã chọn đủ số lượng phòng.');
            return;
        }

        const roomElement = document.querySelector(`.room[data-id='${roomId}']`);
        const roomData = {
            id: roomElement.getAttribute('data-id'),
            title: roomElement.querySelector('.title a').textContent,
            price: parseInt(roomElement.getAttribute('data-price')),
            priceFormatted: roomElement.querySelector('.prices_absolute .content').textContent,
            idroom: roomElement.getAttribute('data-idroom'),
            discount: roomElement.getAttribute('data-discount'),
        };

        selectedRooms.push(roomData);
        updateMiniBill();
        updateNumRoom();
        updateTotalPrice();
    }
    function updateNumRoom() {
        numRoomElement.textContent = selectedRooms.length;
        console.log(selectedRooms.length);
    }
    function updateMiniBill() {
        const roomContainer = document.querySelector('.room_container');
        roomContainer.innerHTML = ''; // Xóa nội dung trước đó

        selectedRooms.forEach((room, index) => {
            const roomMini = document.createElement('div');
            roomMini.classList.add('roomMini');
            roomMini.innerHTML = `
                <div class="RoomNum title_18">Phòng ${index + 1}</div>
                <div class="RoomTitle title_18 lighter">${room.title}</div>
                <input type="hidden" name="room${index}" value='${room.idroom}'>
                <input type="hidden" name="discount${index}" value='${room.discount}'>
                <div class="RoomPrice title_18 lighter">${room.priceFormatted}</div>
                <div class="RoomFix_btn">
                    <a href="#" class="mini_btn" onclick="removeRoom(${index})">Chỉnh sửa</a>
                </div>
            `;
            roomContainer.appendChild(roomMini);
        });
    }
    function updateTotalPrice() {
        let totalPrice = selectedRooms.reduce((sum, room) => {
            return sum + room.price;
        }, 0);

        totalPriceElement.textContent = 'Giá: ' + totalPrice.toLocaleString('vi-VN') + ' VND';
    }

    function removeRoom(index) {
        selectedRooms.splice(index, 1);
        updateMiniBill();
        updateNumRoom();
        updateTotalPrice();
    }

    document.querySelectorAll('.Choose_btn a').forEach(button => {
        button.addEventListener('click', function(event) {
            const roomElement = this.closest('.room');
            const roomId = roomElement.getAttribute('data-id');
            chooseRoom(event, roomId);
        });
    });

    window.removeRoom = removeRoom;
    console.log(start_date);
    console.log(end_date);
    continueButton.addEventListener('click', function(event) {
        event.preventDefault();
        if (selectedRooms.length === 0) {
            alert("Bạn phải chọn ít nhất một phòng để tiếp tục.");
            return;
        }
        if (selectedRooms.length > limitRoom) {
            alert("Số phòng đã chọn vượt quá giới hạn cho phép.");
            return;
        }
        const form = document.createElement('form');
        form.method = 'POST';
        var start_date = document.getElementById('start_date').value;
        var end_date = document.getElementById('end_date').value;
        if (start_date != "1" && end_date != "1 ") {
            if (change == 1) {
                 form.action = 'index.php?page=Payment&start_date=' + start_date + '&end_date=' + end_date + '&go=1';
            } else {
                alert('Bạn phải đăng nhập để sử dụng chức năng này!');
                return;
            }
        } else{
               var start_date = $('#startDate').val();
               var end_date = $('#endDate').val();
            if (change == 1) {
                form.action = 'index.php?page=Payment&start_date=' + start_date + '&end_date=' + end_date + '&go=1';
            } else {
                alert('Bạn phải đăng nhập để sử dụng chức năng này!');
                return;
            }
            if (start_date == "" || end_date == "") {
                alert('Bạn phải chọn ngày đến và ngày đi');
                return;
            }
        }
        selectedRooms.forEach((room, index) => {
            const roomInput = document.createElement('input');
            roomInput.type = 'hidden';
            roomInput.name = `room${index}`;
            roomInput.value = JSON.stringify(room);
            form.appendChild(roomInput);
        });
        document.body.appendChild(form);
        form.submit();
    });
    document.querySelectorAll('.rating').forEach(ratingDiv => {
        ratingDiv.querySelectorAll('.star_display').forEach(star => {
            if(star.classList.contains('selected')){
                star.style.color = 'gold';
            }else{
                star.style.color = 'gray';
            }
        });
    });
});
    

</script>
</body>
