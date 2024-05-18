<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Payment</title>
     <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
     <link rel="stylesheet" href="./css/main.css">
     <link rel="stylesheet" href="./css/search.css">
     <link rel="stylesheet" href="./css/Payment.css">
     <!-- Sử dụng fontawsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
</head>
<body onload="loadContent()">
     <div class="Payment_Container">
          <?php 
            include "./php/Header.php"
          ?>
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
                                        <div class="Info_Container">
                                             <form action="">
                                             <div class="Person-info">
                                                  <div class="navbar">
                                                       <h3 class="content"> Thông tin người đặt phòng</h3>
                                                       <!-- <h3 class="content">Đã chọn <span id="Numroom">0</span>/<span id="limit_room">1</span></h3> -->
                                                  </div>
                                                       <div class="gender">
                                                            <label for="" class="title"> Danh Xưng</label>
                                                            <div class="radio male">
                                                                 <input type="radio" id="male" name="gender" value="male" checked = "checked">
                                                                 <label for="male">Nam</label>
                                                            </div>
                                                            <div class="radio female">
                                                                 <input type="radio" id="female" name="gender" value="female">
                                                                 <label for="female">Nữ</label>
                                                            </div>
                                                            <div class="radio other">
                                                                 <input type="radio" id="other" name="gender" value="other">
                                                                 <label for="other">Khác</label>
                                                            </div>
                                                       </div>
                                                       <div class="name">
                                                            <label for="" class="title" >Họ và tên</label>
                                                            <input type="text" name="" id="" placeholder="Vui lòng nhập đủ họ và tên" required="required">
                                                       </div>
                                                       <div class="info-more">
                                                            <div class="phoneNum">
                                                                 <label for="" class="title" >Điện thoại</label>
                                                                 <input type="text" name="" id="" placeholder="Vui lòng nhập số điện thoại" required="required">
                                                            </div>
                                                            <div class="Email">
                                                                 <label for="" class="title" >Email</label>
                                                                 <input type="email" name="" id="" placeholder="Vui lòng nhập Email " required="required">
                                                            </div>
                                                       </div>
                                                       <div class="idcheck">
                                                            <input type="checkbox" name="" id="idcheck">
                                                            <label for="idcheck">Tôi là người lưu trú</label>
                                                       </div>
                                             </div>
                                             <div class="Payment_methob">
                                                  <div class="navbar">
                                                       <h3 class="content"> Phương thức thanh toán</h3>
                                                       <!-- <h3 class="content">Đã chọn <span id="Numroom">0</span>/<span id="limit_room">1</span></h3> -->
                                                  </div>
                                                       <div class="pay direct">
                                                            <input type="radio" name="Payment" id="direct" value="direct">
                                                            <label for="direct" class="title">Thanh toán trực tiếp</label>
                                                       </div>
                                                       <div class="pay bank">
                                                            <input type="radio" name="Payment" id="bank" value="bank">
                                                            <label for="bank" class="title">Thanh toán qua ngân hàng <i><img src="./img/Vietcombank.png" alt=""></i></label> 
                                                       </div>
                                                       <p>
                                                            Khi nhấp vào "Thanh toán", bạn đồng ý cung cấp các thông tin trên và đồng ý với các điều khoản, điều kiện và chính sách quyền riêng tư của TNT Booking.
                                                       </p>
                                                       <div class="Pay_btn">
                                                            <input type="submit" class="medium_btn" value="Thanh toán"> 
                                                       </div>
                                             </div>
                                        </div>
                                        </form>
                                   </div>
                              </div>
                              <div class="Component_right">
                                   <?php 
                                        include "./php/MiniBill.php"
                                   ?>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- Script phần body -->
               <script src="./js/Main.js"></script>
          </div>
          <!-- Phần footer -->
          <div class="footer">
               <div class="footer_container">
                    <div class="content"></div>
               </div>
          </div>
     </div>
     
     <script>
     </script>
</body>
</html>