<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Room</title>
     <link rel="shortcut icon" href="../img/LogoTNT.png" type="image/x-icon">
     <link rel="stylesheet" href="./css/main.css">
     <link rel="stylesheet" href="./css/Room.css">
     <link rel="stylesheet" href="./css/slider.css">
     <link rel="stylesheet" href="./css/ratings.css">
     <!-- Sử dụng fontawsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
</head>
<body>
     <div class="Payment_Container">
          <!-- Phần header -->
          <!-- Được chia ra làm 3 phần bên trái, giữa và phải -->
          <!-- Phần trái, gồm các mục ở 2 bên -->
          <!-- Phần mid được sử dụng để làm logo-->
          <?php 
               include "./php/Header.php"
          ?>
          <!-- Phần body -->
          <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
          <div class="body">
               <div class="headRoom_container">
                    <div class="RoomDetail_container">
                         <div class="room">
                              <div class="img">
                                   <div class="sale-icon">
                                        <img src="./img/sale_icon.png" alt="">
                                   </div>
                                   <img src="./img/phòng1.jpg" alt="">
                              </div>
                              <div class="content">
                                   <div class="title large"><a href="#">Deluxe 2 Giường Đơn</a></div>
                                   <div class="general_infor">
                                        <div class="appraise">
                                             <div class="title">
                                                  <span>
                                                       <i class="fa-solid fa-thumbs-up"></i>
                                                  </span>
                                                  <span>Đánh giá :</span>
                                                  <div class="rating">
                                                       <span class="star">&#9733;</span>
                                                       <span class="star">&#9733;</span>
                                                       <span class="star">&#9733;</span>
                                                       <span class="star">&#9733;</span>
                                                       <span class="star">&#9733;</span>
                                                  </div>
                                                  <p id="result" class="sale"></p>
                                             </div>
                                        </div>
                                        <div class="title">
                                             <span>
                                                  <i class="fa-solid fa-house-signal"></i>
                                             </span>
                                             <span>Tình trạng : còn 2 phòng</span>
                                        </div>
                                        <div class="title">
                                             <span>
                                                  <i class="fa-solid fa-user"></i>
                                             </span>
                                             <span>Số người : 4 người</span>
                                        </div>
                                        <div class="title">
                                             <span>
                                                  <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                             </span>
                                             <span>Diện tích : 45 m&sup2</span>
                                        </div>
                                   </div>
                                   <div class="absolute">
                                        <div class="prices">
                                             <div class="discountsale"></div>
                                             <div class="title">Giá: 3.130.000 VNĐ</div>
                                        </div>
                                        <div class="Get_btn">
                                             <a href="#" class="medium_btn" onclick="chooseRoom(0)">Đặt ngay</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div> 
               <div class="bodyRoom_container">
                    <div class="InfoRoom_container">
                         <div class="description content">
                              <h3 class="title">
                                   <span><i></i></span>
                                   Mô tả :
                              </h3>
                              <div class="description_content">
                                   <p>Với diện tích 45 m², Phòng Deluxe giường đơn là phòng khách sạn thiết kế theo phong cách hiện đại, tích hợp đầy đủ tiện nghi bao gồm 2 giường đơn sang trọng, tivi, wifi tốc độ cao, bồn tắm riêng... Sở hữu ban công và cửa sổ với tầm nhìn thoáng đãng, nơi đây là lựa chọn lý tưởng dành cho các gia đình nhỏ, bạn bè hoặc du khách đi công tác.</p>
                              </div>
                         </div>
                         <div class="Convenience content">
                              <div class="convenience title">
                                   <h3>
                                   <span>
                                        <img src="./img/leaf_convenience.jpg" alt="">
                                   </span>
                                   Tiện ích
                                   </h3>
                              </div>
                              <div class="convenience_component">
                                   <ul>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                        <li><a href="#">Trà và Coffee miễn phí</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- Script phần body -->
               <!-- Phần slider -->
               <div class="RoomSlider_container">
                    <?php 
                         include "./php/Room_slider.php"
                    ?>
               </div>
               <?php 
                    include "./php/comment.php"
               ?>
          </div>
          <!-- Phần footer -->
          <div class="footer">
               <div class="footer_container">
                    <div class="content"></div>
               </div>
          </div>
     </div>
     <script src="./js/Ratings.js"></script>
     <script>
          document.addEventListener("DOMContentLoaded", function() {
               var discounts = document.querySelectorAll('.discountsale');
               discounts.forEach(function(discount) {
               var imgWrapper = discount.closest('.room').querySelector('.img');
               var saleIcon = document.createElement('div');
               saleIcon.classList.add('sale-icon');
               if (discount.textContent.trim() !== '') {
                    imgWrapper.insertBefore(saleIcon, imgWrapper.firstChild);
               } else {
                    imgWrapper.removeChild(imgWrapper.querySelector('.sale-icon'));
               }
               });
          });
     </script>
</body>
</html>