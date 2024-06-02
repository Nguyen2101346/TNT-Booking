
<div class="Container">
        <div class="Content_container">
                <div class="Info_Container">
                    <div class="Info_list">
                        <div class="info_avt">
                            <div class="info-img">
                                <?php
                                    $sql = "SELECT Tendangnhap,Avatar
                                            FROM taikhoan
                                            WHERE IDTaikhoan = ".$_SESSION['userID']."";
                                    $re = mysqli_query($conn, $sql);
                                    $r = mysqli_fetch_array($re);
                                ?>
                                <img id="avatarPreview" src="<?php if(isset($r['Avatar']) && $r['Avatar']!=""){echo './img_members/'.$r['Avatar'].'';}else{echo './img/person.png';}?>"alt="">
                                <!-- <div class="changeAvt">
                                    <label for="Avtchange">
                                        <img src="./img/changeAvt.png" alt="">
                                    </label>
                                    <input type="file" name="changeAvt" id="Avtchange" accept="image/*">       
                                </div> -->
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const avatarInput = document.getElementById('Avtchange');
                                    const avatarPreview = document.getElementById('avatarPreview');

                                    avatarInput.addEventListener('change', function(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                avatarPreview.src = e.target.result;
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                });
                            </script>
                            <?php
                                
                            ?>
                            <div class="content"><?php if(isset($r['Tendangnhap']) && $r['Tendangnhap']!=""){echo $r['Tendangnhap'];}?></div>
                        </div>
                        <?php
                            $sql = "SELECT SUM(Tonggia) AS Tichluy FROM datphong Where IDTaikhoan=".$_SESSION['userID']." AND Trangthai=2";
                            $re = mysqli_query($conn, $sql);
                            $r = mysqli_fetch_array($re);
                        ?>
                        <div class="info_coin">
                            <div class="content">Giá trị tích lũy:</div>
                            <span class="content"><?php if(isset($r['Tichluy']) && $r['Tichluy']!=0){ echo $r['Tichluy']." VNĐ";}else{echo "0 VNĐ";}?></span>
                            <a href="index.php?page=History<?php if($change == 1) echo '&go=1'?>" class="content">Lịch sử &gt</a>
                        </div>
                        <div class="info_detail">
                            <div class="item info ">
                                <div class="info-icon">
                                    <img src="./img/Account.png" alt="">
                                </div>
                                <a href="index.php?page=Information<?php if($change == 1) echo '&go=1'?>" class="content">Thông tin tài khoản</a>
                            </div>
                            <div class="item history active">
                                <div class="Bill-icon">
                                    <img src="./img/Bill-re.png" alt="">
                                </div>
                                <a href="index.php?page=History<?php if($change == 1) echo '&go=1'?>" class="content">Đơn hàng của tôi</a>
                            </div>
                            <div class="item logout">
                                <div class="logout-icon"> <img src="./img/logout.png" alt=""></div>
                                <a href="./php_function/logout.php" class="content">Đăng xuất</a>
                            </div>
                        </div>
                </div>
                <div class="Update_list">
                    <h1 class="title large">Đơn hàng của tôi</h1>
                    <?php
                        $bookingType = isset($_POST['bookingType']) ? $_POST['bookingType'] : 'room';
                        $dateStart = isset($_POST['dateStart']) ? $_POST['dateStart'] : '';
                        $dateEnd = isset($_POST['dateEnd']) ? $_POST['dateEnd'] : '';
                        $status = isset($_POST['status']) ? $_POST['status'] : 'all';
                    ?>
                    <form action="index.php?page=History<?php if($change == 1) echo '&go=1'?>" method="post" class="filter-container">
                        <div class="filter-item">
                            <select id="bookingType" name="bookingType" class="content">
                                <option value="room" class="content" <?php if($bookingType=="room"){echo "selected";}?>>Đặt phòng</option>
                                <option value="event" class="content" <?php if($bookingType=="event"){echo "selected";}?>>Đặt tiệc</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <input type="date" id="dateStart" name="dateStart" value="<?php if($dateStart!=""){echo $dateStart;}?>" class="content">
                            <input type="date" id="dateEnd" name="dateEnd" value="<?php if($dateEnd!=""){echo $dateEnd;}?>" class="content">
                        </div>
                        <div class="filter-item">
                            <select id="status" name="status" class="content">
                                <option value="all" class="content" <?php if($status=="all"){echo "selected";}?>>Tất cả</option>
                                <option value="1" class="content" <?php if($status=="1"){echo "selected";}?>>Đang chờ xử lý</option>
                                <option value="2" class="content" <?php if($status=="2"){echo "selected";}?>>Thành công</option>
                                <option value="0" class="content" <?php if($status=="0"){echo "selected";}?>>Không thành công</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <input type="submit" name="filter_btn" id="filterButton" class="content" value="Lọc">
                        </div>
                    </form>
                    <div class="order-list">
                    <?php
                        if (isset($_POST['filter_btn']) && ($_POST['filter_btn'])){
                            $bookingType = isset($_POST['bookingType']) ? $_POST['bookingType'] : 'room';
                            $dateStart = isset($_POST['dateStart']) ? $_POST['dateStart'] : '';
                            $dateEnd = isset($_POST['dateEnd']) ? $_POST['dateEnd'] : '';
                            $status = isset($_POST['status']) ? $_POST['status'] : 'all';

                            if($bookingType == "room"){
                                $re = filter_roombooked($conn, $dateStart, $dateEnd, $status, $_SESSION['userID']);
                                if(mysqli_num_rows($re)> 0){
                                    while($r = mysqli_fetch_array($re)){

                                        $daysOfWeek = array(
                                            'Sunday' => 'Chủ nhật',
                                            'Monday' => 'Thứ hai',
                                            'Tuesday' => 'Thứ ba',
                                            'Wednesday' => 'Thứ tư',
                                            'Thursday' => 'Thứ năm',
                                            'Friday' => 'Thứ sáu',
                                            'Saturday' => 'Thứ bảy'
                                            );
                   
                                            // Giả sử $row['NgayDat'] là chuỗi ngày tháng từ cơ sở dữ liệu
                                            $date = new DateTime($r['Ngaydat']);
                                            $date1 = new DateTime($r['Ngaybatdau']);
                                            $date2 = new DateTime($r['Ngayketthuc']);
                                            // Lấy tên thứ bằng tiếng Anh
                                            $dayOfWeek = $date->format('l');
                                            $dayOfWeek1 = $date1->format('l');
                                            $dayOfWeek2 = $date2->format('l');
                                            // Chuyển đổi sang tiếng Việt
                                            $dayOfWeekInVietnamese = $daysOfWeek[$dayOfWeek];
                                            $dayOfWeekInVietnamese1 = $daysOfWeek[$dayOfWeek1];
                                            $dayOfWeekInVietnamese2 = $daysOfWeek[$dayOfWeek2];
                                            // Định dạng ngày tháng năm
                                            $Ngaydat = $dayOfWeekInVietnamese . ', ' . $date->format('d/m/Y');
                                            $Ngaybatdau = $dayOfWeekInVietnamese1 . ', ' . $date1->format('d/m/Y');
                                            $Ngayketthuc = $dayOfWeekInVietnamese2 . ', ' . $date2->format('d/m/Y');
                            ?>
                                <div class="order-item">
                                    <div class="order-header">
                                        <?php
                                            $roomtypeInfo = mysqli_fetch_array(check_roomtypeinfo($conn,$r['IDPhong']));
                                        ?>
                                        <h3><a href="index.php?page=Room&id=<?= $roomtypeInfo['IDLoaiphong']?><?php if($change == 1) echo '&go=1'?>"><?= $roomtypeInfo['Tenloaiphong']?></a></h3>
                                        <?php
                                            if(isset($r['Trangthai']) && $r['Trangthai']=="1"){echo "<span class='order-status pending'>Đang chờ xử l</span>";}
                                            elseif($r['Trangthai']=="2"){echo "<span class='order-status success'>Thành công</span>";}
                                            elseif($r['Trangthai']== "0"){echo "<span class='order-status failed'>Không thành công</span>";}
                                        ?>
                                    </div>
                                    <div class="order-details">
                                        <div class="order-image">
                                            <img src="../Admin/img/<?= $roomtypeInfo['AnhDD']?>" alt="Room Image">
                                        </div>
                                        <div class="order-info">
                                            <p class="spraise">Đánh giá: ⭐⭐⭐⭐ 4.0/5.0</p>
                                            <p>Ngày giao dịch: <?=$Ngaydat?></p>
                                            <p>Ngày lưu trú: <?=$Ngaybatdau?> - <?=$Ngayketthuc?></p>
                                            <p>Số người: 2</p>
                                        </div>
                                    </div>
                                    <div class="order-total">Tổng tiền: <?=$r['Tonggia']?> VNĐ</div>
                                </div>
                            <?php
                                }
                            }else{
                                echo "Không tìm thấy kết quả phù hợp";
                            }
                        }elseif($bookingType == "event"){
                            $re = filter_eventbooked($conn, $dateStart, $dateEnd, $status, $_SESSION['userID']);
                            if(mysqli_num_rows($re)> 0){
                                while($r = mysqli_fetch_array($re)){
                                        $daysOfWeek = array(
                                            'Sunday' => 'Chủ nhật',
                                            'Monday' => 'Thứ hai',
                                            'Tuesday' => 'Thứ ba',
                                            'Wednesday' => 'Thứ tư',
                                            'Thursday' => 'Thứ năm',
                                            'Friday' => 'Thứ sáu',
                                            'Saturday' => 'Thứ bảy'
                                            );
                                            $date = new DateTime($r['Ngaydat']);
                   
                                            // Lấy tên thứ bằng tiếng Anh
                                            $dayOfWeek = $date->format('l');
                   
                                            // Chuyển đổi sang tiếng Việt
                                            $dayOfWeekInVietnamese = $daysOfWeek[$dayOfWeek];
                   
                                            // Định dạng ngày tháng năm
                                            $Ngaydat = $dayOfWeekInVietnamese . ', ' . $date->format('d/m/Y');
                    ?>
                        <div class="order-item">
                            <div class="order-header">
                                <?php
                                    $eventInfo = mysqli_fetch_array(check_eventinfo($conn,$r['IDSukien']));
                                ?>
                                <h3><?= $eventInfo['Tensukien']?></h3>
                                <?php
                                    if(isset($r['Trangthai']) && $r['Trangthai']=="1"){echo "<span class='order-status pending'>Đang chờ xử lý</span>";}
                                    elseif($r['Trangthai']=="2"){echo "<span class='order-status success'>Thành công</span>";}
                                    elseif($r['Trangthai']== "0"){echo "<span class='order-status failed'>Không thành công</span>";}
                                ?>
                            </div>
                            <div class="order-details">
                                <div class="order-image">
                                    <img src="./img/<?= $eventInfo['AnhDD']?>" alt="Room Image">
                                </div>
                                <div class="order-info">
                                    <!-- <p class="spraise">Đánh giá: ⭐⭐⭐⭐ 4.0/5.0</p> -->
                                    <p>Khách hàng: <?=$r['TenKH']?></p>
                                    <p>Ngày giao dịch: <?=$Ngaydat?></p>
                                    <p>Email: <?=$r['Email']?></p>
                                    <p>Số điện thoại: <?=$r['Sodt']?></p>
                                </div>
                            </div>
                            <!-- <div class="order-total">Tổng tiền:  VNĐ</div> -->
                        </div>
                    <?php
                                    }
                                }else{
                                    echo "Không tìm thấy kết quả phù hợp";
                                }
                            }
                        }else{
                            $bookingType = isset($_POST['bookingType']) ? $_POST['bookingType'] : 'room';
                            $dateStart = isset($_POST['dateStart']) ? $_POST['dateStart'] : '';
                            $dateEnd = isset($_POST['dateEnd']) ? $_POST['dateEnd'] : '';
                            $status = isset($_POST['status']) ? $_POST['status'] : 'all';
                            
                            $re = filter_roombooked($conn, $dateStart, $dateEnd, $status, $_SESSION['userID']);
                            if(mysqli_num_rows($re)> 0){
                                while($r = mysqli_fetch_array($re)){
                                    $daysOfWeek = array(
                                        'Sunday' => 'Chủ nhật',
                                        'Monday' => 'Thứ hai',
                                        'Tuesday' => 'Thứ ba',
                                        'Wednesday' => 'Thứ tư',
                                        'Thursday' => 'Thứ năm',
                                        'Friday' => 'Thứ sáu',
                                        'Saturday' => 'Thứ bảy'
                                        );
               
                                        // Giả sử $row['NgayDat'] là chuỗi ngày tháng từ cơ sở dữ liệu
                                        $date = new DateTime($r['Ngaydat']);
                                        $date1 = new DateTime($r['Ngaybatdau']);
                                        $date2 = new DateTime($r['Ngayketthuc']);
                                        // Lấy tên thứ bằng tiếng Anh
                                        $dayOfWeek = $date->format('l');
                                        $dayOfWeek1 = $date1->format('l');
                                        $dayOfWeek2 = $date2->format('l');
                                        // Chuyển đổi sang tiếng Việt
                                        $dayOfWeekInVietnamese = $daysOfWeek[$dayOfWeek];
                                        $dayOfWeekInVietnamese1 = $daysOfWeek[$dayOfWeek1];
                                        $dayOfWeekInVietnamese2 = $daysOfWeek[$dayOfWeek2];
                                        // Định dạng ngày tháng năm
                                        $Ngaydat = $dayOfWeekInVietnamese . ', ' . $date->format('d/m/Y');
                                        $Ngaybatdau = $dayOfWeekInVietnamese1 . ', ' . $date1->format('d/m/Y');
                                        $Ngayketthuc = $dayOfWeekInVietnamese2 . ', ' . $date2->format('d/m/Y');
                    ?>
                        <div class="order-item">
                            <div class="order-header">
                                <?php
                                    $roomtypeInfo = mysqli_fetch_array(check_roomtypeinfo($conn,$r['IDPhong']));
                                ?>
                                <h3><a href="index.php?page=Room&id=<?= $roomtypeInfo['IDLoaiphong']?><?php if($change == 1) echo '&go=1'?>"><?= $roomtypeInfo['Tenloaiphong']?></a></h3>
                                <?php
                                    if(isset($r['Trangthai']) && $r['Trangthai']=="1"){echo "<span class='order-status pending'>Đang chờ xử lý</span>";}
                                    elseif($r['Trangthai']=="2"){echo "<span class='order-status success'>Thành công</span>";}
                                    elseif($r['Trangthai']== "0"){echo "<span class='order-status failed'>Không thành công</span>";}
                                ?>
                            </div>
                            <div class="order-details">
                                <div class="order-image">
                                    <img src="../Admin/img/<?= $roomtypeInfo['AnhDD']?>" alt="Room Image">
                                </div>
                                <div class="order-info">
                                    <p class="spraise">Đánh giá: ⭐⭐⭐⭐ 4.0/5.0</p>
                                    <p>Ngày giao dịch: <?=$Ngaydat?></p>
                                    <p>Ngày lưu trú: <?=$Ngaybatdau?> - <?=$Ngayketthuc?></p>
                                    <p>Số người: 2</p>
                                </div>
                            </div>
                            <div class="order-total">Tổng tiền: <?=$r['Tonggia']?> VNĐ</div>
                        </div>
                    <?php
                                }
                            }
                        }
                    ?>
                        <!-- <div class="order-item">
                            <div class="order-header">
                                <h3>Deluxe 2 Giường Đơn</h3>
                                <span class="order-status pending">Đang chờ xử lý</span>
                            </div>
                            <div class="order-details">
                                <div class="order-image">
                                    <img src="./img/phòng1.jpg" alt="Room Image">
                                </div>
                                <div class="order-info">
                                    <p class="spraise">Đánh giá: ⭐⭐⭐⭐ 4.0/5.0</p>
                                    <p>Ngày giao dịch: 20/05/2024</p>
                                    <p>Ngày lưu trú: 21/05/2024 - 25/05/2024</p>
                                    <p>Số người: 2</p>
                                </div>
                            </div>
                            <div class="order-total">Tổng tiền: 3.339.000 VNĐ</div>
                        </div>

                        <div class="order-item">
                            <div class="order-header">
                                <h3>Deluxe 2 Giường Đơn</h3>
                                <span class="order-status success">Thành công</span>
                            </div>
                            <div class="order-details">
                                <div class="order-image">
                                    <img src="./img/phòng1.jpg" alt="Room Image">
                                </div>
                                <div class="order-info">
                                    <p>Đánh giá: ⭐⭐⭐⭐ 4.0/5.0</p>
                                    <p>Ngày giao dịch: 20/05/2024</p>
                                    <p>Ngày lưu trú: 21/05/2024 - 25/05/2024</p>
                                    <p>Số người: 2</p>
                                </div>
                            </div>
                            <div class="order-total">Tổng tiền: 3.339.000 VNĐ</div>
                        </div>
                        
                        <div class="order-item">
                            <div class="order-header">
                                <h3>Deluxe 2 Giường Đơn</h3>
                                <span class="order-status failed">Không thành công</span>
                            </div>
                            <div class="order-details">
                                <div class="order-image">
                                    <img src="./img/phòng1.jpg" alt="Room Image">
                                </div>
                                <div class="order-info">
                                    <p>Đánh giá: ⭐⭐⭐⭐ 4.0/5.0</p>
                                    <p>Ngày giao dịch: 20/05/2024</p>
                                    <p>Ngày lưu trú: 21/05/2024 - 25/05/2024</p>
                                    <p>Số người: 2</p>
                                </div>
                            </div>
                            <div class="order-total">Tổng tiền: 3.339.000 VNĐ</div>
                        </div> -->
                    </div>
                    <script>
                        document.getElementById('filterButton').addEventListener('click', function() {
                            var bookingType = document.getElementById('bookingType').value;
                            var dateRange = document.getElementById('dateRange').value;
                            var status = document.getElementById('status').value;

                            // Thực hiện hành động lọc ở đây, ví dụ: gửi yêu cầu AJAX hoặc cập nhật giao diện
                            console.log('Booking Type:', bookingType);
                            console.log('Date Range:', dateRange);
                            console.log('Status:', status);
                        });
                    </script>           
                </div>
            </div>
        </div>
    </div>