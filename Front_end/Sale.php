<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale</title>
    <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
    <!-- Sử dụng fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="Sale_Container">
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
                                    <?php
                                                  $discount_code = isset($_GET['discount_code']) ? $_GET['discount_code'] : '';
                                                  if (!empty($discount_code)) {
                                                      echo '<h3 class="offersCheck content">Tìm kiếm theo ưu đãi</h3>';
                                                  }if (empty($discount_code)){
                                                       echo '<h3 class="offersCheck content"></h3>';
                                                  }
                                             ?>
                                    <h3 class="content">Đã chọn <span id="Numroom">0</span>/<span
                                            id="limit_room">1</span></h3>
                                </div>
                                <div class="Room_container">
                                    <?php
                                        if(isset($_GET['start_date']) || isset($_GET['start_date']) || isset($_GET['end_date']) 
                                        || isset($_GET['room_num']) || isset($_GET['qua-adults']) || isset($_GET['discount_code'])){
                                             $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                                             $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
                                             $room_num = isset($_GET['room_num']) ? $_GET['room_num'] : 1;
                                             $adults_num = isset($_GET['qua-adults']) ? $_GET['qua-adults'] : 1;
                                             $discount_code = isset($_GET['discount_code']) ? $_GET['discount_code'] : '';
                                             // if(!$adults_num){
                                             //      $adults_num = 
                                             // }
                                        }     
                                             $sql = "SELECT * FROM loaiphong WHERE Songuoi = '$adults_num'";
                                             $re = mysqli_query($conn,$sql);
                                             $row = mysqli_num_rows($re);
                                             if($row > 0){
                                                  while($r = mysqli_fetch_array($re)){
                                                       $gia = $r['Gia'];
                                                       $changenumber = number_format($gia, 0, ',', '.');
                                                       echo '     
                                                       <div class="room">
                                                            <div class="img">
                                                                 <div class="sale-icon">
                                                                      <img src="./img/sale_icon.png" alt="">
                                                                 </div>
                                                                 <img src="./img/'.$r["AnhDD"].'" alt="">
                                                            </div>
                                                            <div class="content">
                                                                 <div class="title"><a href="#">'. $r['Tenloaiphong'].'</a></div>
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
                                                                           '.$r['Songuoi'].' Người</div>
                                                                      <div class="content note"><span>
                                                                           <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                                      </span>'. $r['Dientich'].' m&sup2</div>
                                                                 </div>
                                                                 <div class="prices">
                                                                      <div class="prices_absolute">
                                                                           <div class="discountsale"></div>
                                                                           <div class="content">
                                                                                '.$changenumber.' VND
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="Choose_btn">
                                                                      <a href="#" class="medium_btn" onclick="chooseRoom(0)">Chọn</a>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  ';
                                                  }
                                             }else{
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