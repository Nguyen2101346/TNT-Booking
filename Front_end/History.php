
<div class="Container">
        <div class="Content_container">
            <form action="index.php?page=Information&go=1" method="post" enctype="multipart/form-data">
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
                                <div class="changeAvt">
                                    <label for="Avtchange">
                                        <img src="./img/changeAvt.png" alt="">
                                    </label>
                                    <input type="file" name="changeAvt" id="Avtchange" accept="image/*">       
                                </div>
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
                            $sql = "SELECT SUM(Tonggia) AS Tichluy FROM datphong Where IDTaikhoan=".$_SESSION['userID']."";
                            $re = mysqli_query($conn, $sql);
                            $r = mysqli_fetch_array($re);
                        ?>
                        <div class="info_coin">
                            <div class="content">Giá trị tích lũy:</div>
                            <span class="content"><?php if(isset($r['Tichluy']) && $r['Tichluy']!=0){ echo $r['Tichluy']." VNĐ";}?></span>
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
                    <div class="filter-container">
                        <div class="filter-item">
                            <select id="bookingType" name="bookingType" class="content">
                                <option value="room" class="content">Đặt phòng</option>
                                <option value="meeting" class="content">Đặt Hội họp</option>
                                <option value="wedding" class="content">Đặt Tiệc cưới</option>
                                <option value="community" class="content">Đặt Cộng đồng</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <input type="text" id="dateRange" name="dateRange" placeholder="20/05/2024 - 25/05/2024" class="content">
                        </div>
                        <div class="filter-item">
                            <select id="status" name="status" class="content">
                                <option value="all" class="content">Tất cả</option>
                                <option value="pending" class="content">Đang chờ xử lý</option>
                                <option value="success" class="content">Thành công</option>
                                <option value="failed" class="content">Không thành công</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <button id="filterButton" class="content" >Lọc</button>
                        </div>
                    </div>
                    
                    <div class="order-list">
                        <div class="order-item">
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
                                    <p>Số người: 2</p>
                                </div>
                            </div>
                            <div class="order-total">Tổng tiền: 3.339.000 VNĐ</div>
                        </div>
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