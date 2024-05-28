
     <div class="Payment_Container">
          <!-- Phần tìm kiếm  -->
          <?php
            include "./php/Searchbar.php" 
          ?>
          <!-- Phần body -->
          <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
          <div class="body">
               <div class="body_container">
                    <!-- <div class="body_more"></div> -->
                    <div class="Main_content">
                         <div class="Main title">
                              <h2>Thanh toán</h2>
                         </div>
                         <div class="Main_component">
                              <div class="Component_left">
                                   <div class="Main_item">
                                        <div class="Payment_Container">
                                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" id="paymentForm">
                                             <div class="Person-info">
                                                  <div class="navbar">
                                                       <h3 class="content"> Thông tin người đặt phòng</h3>
                                                       <!-- <h3 class="content">Đã chọn <span id="Numroom">0</span>/<span id="limit_room">1</span></h3> -->
                                                  </div>
                                                       <div class="gender">
                                                            <label for="" class="title"> Danh Xưng</label>
                                                            <div class="radio male">
                                                                 <input type="radio" id="male" name="gender" value="0" checked = "checked">
                                                                 <label for="male">Nam</label>
                                                            </div>
                                                            <div class="radio female">
                                                                 <input type="radio" id="female" name="gender" value="1">
                                                                 <label for="female">Nữ</label>
                                                            </div>
                                                            <div class="radio other">
                                                                 <input type="radio" id="other" name="gender" value="2">
                                                                 <label for="other">Khác</label>
                                                            </div>
                                                       </div>
                                                       <div class="name">
                                                            <label for="" class="title" >Họ và tên</label>
                                                            <input type="text" name="" id="fullname" placeholder="Vui lòng nhập đủ họ và tên" required="required">
                                                       </div>
                                                       <div class="info-more">
                                                            <div class="phoneNum">
                                                                 <label for="" class="title" >Điện thoại</label>
                                                                 <input type="text" name="" id="phone" placeholder="Vui lòng nhập số điện thoại" required="required">
                                                            </div>
                                                            <div class="Email">
                                                                 <label for="" class="title" >Email</label>
                                                                 <input type="email" name="" id="email" placeholder="Vui lòng nhập Email " required="required">
                                                            </div>
                                                       </div>
                                                       <!-- <div class="idcheck">
                                                            <input type="checkbox" name="is_staying" id="idcheck">
                                                            <label for="idcheck">Tôi là người lưu trú</label>
                                                       </div> -->
                                             </div>
                                             <div class="Payment_methob">
                                                  <div class="navbar">
                                                       <h3 class="content"> Phương thức thanh toán</h3>
                                                       <!-- <h3 class="content">Đã chọn <span id="Numroom">0</span>/<span id="limit_room">1</span></h3> -->
                                                  </div>
                                                       <div class="pay direct">
                                                            <input type="radio" name="Payment" id="direct" value="0">
                                                            <label for="direct" class="title">Thanh toán trực tiếp</label>
                                                       </div>
                                                       <div class="pay bank">
                                                            <input type="radio" name="Payment" id="bank" value="1">
                                                            <label for="bank" class="title">Thanh toán qua ngân hàng <i><img src="./img/Vietcombank.png" alt=""></i></label> 
                                                       </div>
                                                       <p>
                                                            Khi nhấp vào "Thanh toán", bạn đồng ý cung cấp các thông tin trên và đồng ý với các điều khoản, điều kiện và chính sách quyền riêng tư của TNT Booking.
                                                       </p>
                                                       <div class="Pay_btn">
                                                            <input type="submit" class="medium_btn" value="Thanh toán" id="payButton"> 
                                                       </div>
                                             </div>
                                        </div>
                                        </form>
                                        <?php 
                                             if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                  $gender = $_POST['gender'];
                                                  $fullname = $_POST['fullname'];
                                                  $phone = $_POST['phone'];
                                                  $email = $_POST['email'];
                                                  $payment = $_POST['Payment'];
                                                  $start_date = $_POST['start_date'];
                                                  $end_date = $_POST['end_date'];
                                                  $idroom = $_POST['idroom'];
                                                  $RoomPrice = $_POST['RoomPrice'];

                                                  $sql = "INSERT INTO `datphong`(`IDLoaiphong`, `Ngaynhap`, `Ngaytra`, `Tinhtrang`, `Tienphong`, `Tienphong`) 
                                                  VALUES ('$idroom','$start_date','$end_date','0','$RoomPrice','$RoomPrice')";
                                                  $result = mysqli_query($conn, $sql);
                                                  if($result){
                                                       echo "<script>alert('Thành công');</script>";
                                                  }else{
                                                       echo "<script>alert('Thất bại');</script>";
                                                  }
                                             }
                                        ?>
                                   </div>
                              </div>
                              <div class="Component_right">
                              <form class="SummaryBill" action="" method="">
                                   <div class="navbar">
                                        <h3 class="content bill">Chuyến đi</h3>
                                   </div>
                                   <div class="Main_item Short">
                                        <div class="Checktime">
                                             <div class="title">Thời gian</div>
                                             <div class="timeShow_Start note">Ngày bắt đầu: <?php echo $_GET['start_date']; ?></div>
                                             <div class="timeShow_End note">Ngày kết thúc: <?php echo $_GET['end_date']; ?></div>
                                        </div>
                                        <div class="room_container">
                                        <?php
                                            // Hiển thị thông tin các phòng đã chọn
                                            $numroom = 1;
                                            foreach ($_POST as $key => $value) {
                                                if (strpos($key, 'room') === 0) {
                                                    $roomData = json_decode($value, true);
                                                    echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
                                                    echo '<input type="hidden" name="idroom" value="'.$roomData['id'].'">';
                                                    echo '<div class="roomMini">';
                                                    echo '<div class="RoomNum title">Phòng '.$numroom.'</div>';
                                                    echo '<div class="RoomTitle">'.$roomData['title'].'</div>';
                                                  //   echo '<div class="RoomDiscount">Ưu đãi: '.$roomData['title'].'</div>';
                                                    echo '<div class="RoomPrice" name="RoomPrice">Giá: '.$roomData['priceFormatted'].'</div>';
                                                    echo '<div class="RoomFix_btn">
                                                            <a href="#" class="mini_btn" onclick="removeRoom('.$numroom.')">Chỉnh sửa</a>
                                                            </div> ';
                                                    echo '</div>';
                                                    $numroom ++;
                                                }
                                            }
                                        ?>
                                        <script>
                                        </script>
                                        </div>
                                        <div class="TotalBill">
                                        <?php
                                             $idroom = $roomData['id'];
                                             // Tính tổng giá của các phòng đã chọn
                                             $totalPrice = 0;
                                             foreach ($_POST as $key => $value) {
                                                  if (strpos($key, 'room') === 0) {
                                                       $roomData = json_decode($value, true);
                                                       $totalPrice += $roomData['price'];
                                                  }
                                             }
                                             $formattedTotalPrice = number_format($totalPrice, 0, ',', '.');
                                             echo '<div class="title">Tổng giá: </div>';
                                             echo '<div id="TotalPrice">'.$formattedTotalPrice.' VND</div>';
                                             ?>
                                        </div>
                                   </div>
                              </form>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- Script phần body -->
               <script src="./js/Main.js"></script>
          </div>
          <!-- Phần footer -->
     </div>
     
     <script>
          document.getElementById('continueButton').style.display = 'none';
     </script>
