<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Sale</title>
     <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
     <link rel="stylesheet" href="./css/main.css">
     <!-- Sử dụng fontawsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
</head>
<body>
     <div class="Sale_Container">
          <!-- Phần header -->
          <!-- Được chia ra làm 3 phần bên trái, giữa và phải -->
          <!-- Phần trái, gồm các mục ở 2 bên -->
          <!-- Phần mid được sử dụng để làm logo-->
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
                              <h2>Chọn phòng</h2>
                         </div>
                         <div class="Main_component">
                              <div class="Component_left">
                                   <div class="Main_item">
                                        <div class="navbar">
                                             <h3 class="content"> Tìm kiếm theo ưu đãi</h3>
                                             <h3 class="content">Đã chọn <span id="Numroom">0</span>/<span id="limit_room">1</span></h3>
                                        </div>
                                        <div class="Room_container">
                                             <div class="room" id="1">
                                                  <div class="img">
                                                       <div class="sale-icon">
                                                            <img src="./img/sale_icon.png" alt="">
                                                       </div>
                                                       <img src="./img/phòng1.jpg" alt="">
                                                  </div>
                                                  <div class="content">
                                                       <div class="title"><a href="#">Deluxe 2 Giường Đơn</a></div>
                                                       <div class="appraise">
                                                            <div class="content">
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
                                                       <div class="category">
                                                            <div class="content note">
                                                                 <span>
                                                                      <i class="fa-solid fa-user"></i>
                                                                 </span>
                                                                 4 Người</div>
                                                            <div class="content note"><span>
                                                                 <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                            </span>45 m&sup2</div>
                                                       </div>
                                                       <div class="prices">
                                                            <div class="prices_absolute">
                                                                 <div class="discountsale"></div>
                                                                 <div class="content">Giá: 3.130.000 VNĐ</div>
                                                            </div>
                                                       </div>
                                                       <div class="Choose_btn">
                                                            <a href="#" class="medium_btn" onclick="chooseRoom(0)">Chọn</a>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="room">
                                                  <div class="img">
                                                       <div class="sale-icon">
                                                            <img src="./img/sale_icon.png" alt="">
                                                       </div>
                                                       <img src="./img/phòng1.jpg" alt="">
                                                  </div>
                                                  <div class="content">
                                                       <div class="title"><a href="#" id="2">Deluxe 2 Giường Đôi</a></div>
                                                       <div class="appraise">
                                                            <div class="content">
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
                                                       <div class="category">
                                                            <div class="content note">
                                                                 <span>
                                                                      <i class="fa-solid fa-user"></i>
                                                                 </span>
                                                                 4 Người</div>
                                                            <div class="content note"><span>
                                                                 <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                            </span>45 m&sup2</div>
                                                       </div>
                                                       <div class="prices">
                                                            <div class="prices_absolute">
                                                                 <div class="discountsale">Giảm: 5%</div>
                                                                 <div class="content">Giá: 3.130.000 VNĐ</div>
                                                            </div>
                                                       </div>
                                                       <div class="Choose_btn">
                                                            <a href="#" class="medium_btn" onclick="chooseRoom(0)">Chọn</a>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="room" id="1">
                                                  <div class="img">
                                                       <div class="sale-icon">
                                                            <img src="./img/sale_icon.png" alt="">
                                                       </div>
                                                       <img src="./img/phòng1.jpg" alt="">
                                                  </div>
                                                  <div class="content">
                                                       <div class="title"><a href="#">Deluxe 2 Giường Đơn</a></div>
                                                       <div class="appraise">
                                                            <div class="content">
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
                                                       <div class="category">
                                                            <div class="content note">
                                                                 <span>
                                                                      <i class="fa-solid fa-user"></i>
                                                                 </span>
                                                                 4 Người</div>
                                                            <div class="content note"><span>
                                                                 <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                            </span>45 m&sup2</div>
                                                       </div>
                                                       <div class="prices">
                                                            <div class="prices_absolute">
                                                                 <div class="discountsale"></div>
                                                                 <div class="content">Giá: 3.130.000 VNĐ</div>
                                                            </div>
                                                       </div>
                                                       <div class="Choose_btn">
                                                            <a href="#" class="medium_btn" onclick="chooseRoom(0)">Chọn</a>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="room" id="1">
                                                  <div class="img">
                                                       <div class="sale-icon">
                                                            <img src="./img/sale_icon.png" alt="">
                                                       </div>
                                                       <img src="./img/phòng1.jpg" alt="">
                                                  </div>
                                                  <div class="content">
                                                       <div class="title"><a href="#">Deluxe 2 Giường Đơn</a></div>
                                                       <div class="appraise">
                                                            <div class="content">
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
                                                       <div class="category">
                                                            <div class="content note">
                                                                 <span>
                                                                      <i class="fa-solid fa-user"></i>
                                                                 </span>
                                                                 4 Người</div>
                                                            <div class="content note"><span>
                                                                 <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                            </span>45 m&sup2</div>
                                                       </div>
                                                       <div class="prices">
                                                            <div class="prices_absolute">
                                                                 <div class="discountsale"></div>
                                                                 <div class="content">Giá: 3.130.000 VNĐ</div>
                                                            </div>
                                                       </div>
                                                       <div class="Choose_btn">
                                                            <a href="#" class="medium_btn" onclick="chooseRoom(0)">Chọn</a>
                                                       </div>
                                                  </div>
                                             </div>
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