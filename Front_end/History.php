<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/Room.css">
    <link rel="stylesheet" href="./css/history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <div class="Container">
        <!-- Phần header -->
          <!-- Được chia ra làm 3 phần bên trái, giữa và phải -->
          <!-- Phần trái, gồm các mục ở 2 bên -->
          <!-- Phần mid được sử dụng để làm logo-->
          <?php 
                include "./php/Header.php"
          ?>
        <div class="History_Container">
            <div class="History content">
                <div class="History title">
                    <h2 class="title large">Lịch sử đặt phòng</h2>
                </div>
                <div class="History room_container">
                    <!-- <div class="History room">
                        <div class="History room_img img">
                            <div class="sale-icon">
                                            <img src="./img/sale_icon.png" alt="">
                            </div>
                            <img src="./img/anh1.jpg" alt="">
                        </div>
                        <div class="History room_content">
                            <div class="title"><a href="#" class="title">Deluxe 2 Giường Đơn</a></div>
                            <div class="appraise">
                                            <div class="title">
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
                            <div class="general_infor">
                                <div class="title">
                                        <span class="content">Số phòng: <span class="minicontent"> M101</span></span>
                                </div>
                                <div class="title">
                                        <span class="content">Từ: <span class="minicontent"> Thứ tư, 08/04/2024</span></span>
                                </div>
                                <div class="title">
                                        <span class="content">Đến: <span class="minicontent"> Thứ sáu, 10/04/2024</span></span>
                                </div>
                            </div>
                                <div class="absolute">
                                    <div class="prices">
                                            <div class="discountsale"></div>
                                            <div class="title">Giá: 3.130.000 VNĐ</div>
                                    </div>
                                </div>
                                    <div class="Detail_btn">
                                            <a href="#" class="medium_btn">Chi tiết</a>
                                    </div>
                        </div>
                    </div> -->
                </div>
                <div class="pagination"></div>
            </div>
        </div>
        <?php 
            include "./php/Footer.php"
        ?>
        <script src="./js/room.js"></script>
    </div>
</body>
</html>