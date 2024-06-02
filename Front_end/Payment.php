<div class="Payment_Container">
     <?php include "./php/Searchbar.php"; ?>
     <div class="body">
          <div class="body_container">
               <div class="Main_content">
                    <div class="Main title">
                         <h2>Thanh toán</h2>
                    </div>
                    <div class="Main_component">
                         <div class="Component_left">
                              <div class="Main_item">
                                   <div class="Payment_Container">
                                   <form action="" method="POST" id="paymentForm">
                                        <div class="Person-info">
                                             <div class="navbar">
                                                  <h3 class="content"> Thông tin người đặt phòng</h3>
                                             </div>
                                                  <div class="gender">
                                                       <label for="" class="title"> Danh Xưng</label>
                                                       <div class="radio male">
                                                            <input type="radio" id="male" name="gender" value="0" checked>
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
                                                       <label for="" class="title">Họ và tên</label>
                                                       <input type="text" name="fullname" id="fullname" placeholder="Vui lòng nhập đủ họ và tên" required>
                                                  </div>
                                                  <div class="info-more">
                                                       <div class="phoneNum">
                                                            <label for="" class="title">Điện thoại</label>
                                                            <input type="text" name="phone" id="phone" placeholder="Vui lòng nhập số điện thoại" required>
                                                       </div>
                                                       <div class="Email">
                                                            <label for="" class="title">Email</label>
                                                            <input type="email" name="email" id="email" placeholder="Vui lòng nhập Email" required>
                                                       </div>
                                                  </div>
                                        </div>
                                        <div class="Payment_methob">
                                             <div class="navbar">
                                                  <h3 class="content"> Phương thức thanh toán</h3>
                                             </div>
                                                  <div class="pay direct">
                                                       <input type="radio" name="payment_method" id="direct" value="0" checked>
                                                       <label for="direct" class="title">Thanh toán trực tiếp</label>
                                                  </div>
                                                  <div class="pay bank">
                                                       <input type="radio" name="payment_method" id="bank" value="1">
                                                       <label for="bank" class="title">Thanh toán qua ngân hàng <i><img src="./img/Vietcombank.png" alt=""></i></label> 
                                                  </div>
                                                  <p>
                                                       Khi nhấp vào "Thanh toán", bạn đồng ý cung cấp các thông tin trên và đồng ý với các điều khoản, điều kiện và chính sách quyền riêng tư của TNT Booking.
                                                  </p>
                                                  <input type="hidden" name="iduser" value="<?php echo $_SESSION['userID']; ?>">
                                                  <div class="Pay_btn">
                                                       <input type="submit" class="medium_btn" value="Thanh toán" id="payButton"> 
                                                  </div>
                                        </div>
                                   </form>
                                   </div>
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
                                             <div class="timeShow_Start note" id="start_date" data-start="<?php echo $start_date; ?>">Ngày bắt đầu: <?php echo $_GET['start_date']; ?></div>
                                             <div class="timeShow_End note" id="end_date" data-end="<?php echo $end_date; ?>">Ngày kết thúc: <?php echo $_GET['end_date']; ?></div>
                                        </div>
                                        <div class="room_container">
                                             <?php
                                             $numroom = 1;
                                             $totalPrice = 0;
                                             foreach ($_POST as $key => $value) {
                                                  if (strpos($key, 'room') === 0) {
                                                       $roomData = json_decode($value, true);
                                                       echo '<input type="hidden" name="idroom[]" value="'.$roomData['id'].'">';
                                                       echo '<input type="hidden" name="'.$key.'" value="'.$roomData['idroom'].'">';
                                                       echo '<div class="roomMini" data-id="'.$roomData['id'].'" data-idroom="'.$roomData['idroom'].'">';
                                                       echo '<div class="RoomNum title">Phòng '.$numroom.'</div>';
                                                       echo '<div class="RoomTitle">'.$roomData['title'].'</div>';
                                                       echo '<div class="RoomPrice" name="RoomPrice" data-price="'.$roomData['price'].'">Giá: '.$roomData['priceFormatted'].'</div>';
                                                       echo '<div class="RoomFix_btn"><a href="#" class="mini_btn" onclick="removeRoom('.$numroom.')">Chỉnh sửa</a></div>';
                                                       echo '</div>';
                                                       $totalPrice += $roomData['price'];
                                                       $numroom++;
                                                  }
                                             }
                                             $formattedTotalPrice = number_format($totalPrice, 0, ',', '.');
                                             ?>
                                        </div>
                                        <div class="TotalBill">
                                             <?php
                                             echo '<div class="title">Tổng giá: </div>';
                                             echo '<div id="TotalPrice" data-total="'.$totalPrice.'">'.$formattedTotalPrice.' VND</div>';
                                             ?>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          <script src="./js/Main.js"></script>
     </div>
</div>

<script>
     $(document).ready(function(){
          $('#paymentForm').submit(function(event){
               event.preventDefault();

               var idrooms = [];
               $('.roomMini').each(function(){
                    idrooms.push($(this).attr('data-idroom'));
               });
               var prices = [];
               $('.RoomPrice').each(function(){
                    prices.push($(this).attr('data-price'));
               });
               var start_date = $('#start_date').val();
               var end_date = $('#end_date').val();

               var iduser = $('input[name="iduser"]').val();
               var fullname = $('#fullname').val();
               var phone = $('#phone').val();
               var email = $('#email').val();
               var gender = $('input[name="gender"]:checked').val();
               var payment_method = $('input[name="payment_method"]:checked').val();

               console.log(idrooms);
               console.log(prices);
               console.log(start_date);
               console.log(end_date);
               console.log(fullname);
               console.log(phone);
               console.log(email);
               console.log(gender);
               console.log(payment_method);
               $.ajax({
                    url: './php_function/Payment_Order.php',
                    method: 'POST',
                    data: {
                         idrooms: idrooms,
                         iduser: iduser,
                         start_date: start_date,
                         end_date: end_date,
                         prices: prices,
                         fullname: fullname,
                         phone: phone,
                         email: email,
                         gender: gender,
                         payment_method: payment_method
                    },
                    dataType: 'json',
                    success: function(response){
                         if (response.success) {
                              alert('Đặt phòng Thành công');     
                         } else {
                              alert('Đã xảy ra lỗi: ' + response.message);
                         }
                    },
                    error: function(xhr, status, error){
                         console.log(error);
                    }
               });
          });
     });
</script>
