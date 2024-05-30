<body>
    <div class="Sale_Container">
        <?php
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

                                        $sql = "SELECT * 
                                                FROM loaiphong, phong
                                                WHERE loaiphong.IDLoaiphong = phong.IDLoaiphong 
                                                AND phong.TrangThai = '0' 
                                                AND loaiphong.Songuoi >= '$min_adults'
                                                GROUP BY loaiphong.IDLoaiphong";
                                        $re = mysqli_query($conn, $sql);
                                        $row = mysqli_num_rows($re);
                                        if ($row > 0) {
                                            while ($r = mysqli_fetch_array($re)) {
                                                $gia = $r['Gia'];
                                                $changenumber = number_format($gia, 0, ',', '.');
                                                echo '     
                                                <div class="room" data-idroom="'.$r['IDPhong'].'" data-id="'.$r['IDLoaiphong'].'" data-title="'.$r['Tenloaiphong'].'" data-price="'.$r['Gia'].'" data-priceFormatted="'.$changenumber.'">
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
                                                                      echo '<span class="star-display ' . $selected . '">&#9733;</span>';
                                                                 }
                                                            ?>
                                                                 <!-- <span class="star">&#9733;</span>
                                                                 <span class="star">&#9733;</span>
                                                                 <span class="star">&#9733;</span>
                                                                 <span class="star">&#9733;</span>
                                                                 <span class="star">&#9733;</span> -->
                                                            </div>
                                                            <p><?= $average_rating ?> / 5.0</p>
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
                                                                    $discount = mysqli_fetch_array(check_discount($conn, $r['IDLoaiphong']));
                                                                    if (isset($discount['Nhangiam']) && $discount['Nhangiam'] > 0) {
                                                                        if (isset($discount['Donvi']) && $discount['Donvi'] == 1) {
                                                                            echo "Giảm: ".$discount['Nhangiam']." %";
                                                                        } else {
                                                                            echo "Giảm: ".$discount['Nhangiam']." VNĐ";
                                                                        }
                                                                    } else {
                                                                        if (isset($discount['Tieude']) && $discount['Tieude'] != "") {
                                                                            echo $discount['Tieude'];
                                                                        }
                                                                    }
                                                                ?>     
                                                                <?php
                                                                echo'</div>
                                                                <div class="content">
                                                                    '.$changenumber.' VND
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
            idroom: roomElement.getAttribute('data-idroom')
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
                <div class="RoomNum title">Phòng ${index + 1}</div>
                <div class="RoomTitle">${room.title}</div>
                <input type="hidden" name="room${index}" value='${JSON.stringify(room)}'>
                <div class="RoomPrice">${room.priceFormatted} VND</div>
                <div class="RoomFix_btn">
                    <a href="#" class="mini_btn" onclick="removeRoom(${index})">Chỉnh sửa</a>
                </div>
            `;
            roomContainer.appendChild(roomMini);
        });
    }

    function updateTotalPrice() {
        const totalPrice = selectedRooms.reduce((sum, room) => sum + room.price, 0);
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
        if (start_date != "" && end_date != "") {
            if (change == 1) {
                 form.action = 'index.php?page=Payment&start_date=' + start_date + '&end_date=' + end_date + '&go=1';
            } else {
                alert('Bạn phải đăng nhập để sử dụng chức năng này!');
                return;
            }
        } else{
               var start_date = $('input[name="timeStart"]').val();
               var end_date = $('input[name="timeEnd"]').val();
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
});


     </script>
</body>
