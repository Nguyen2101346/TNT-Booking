<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/banner.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/eat.css">
    <link rel="stylesheet" href="./css/footer.css">
    <!-- Sử dụng fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="./js/slider.js" defer></script>
    <script src="./js/eat.js" defer></script>
</head>

<body>
    <div class="Sale_Container">
        <!-- Phần header -->
        <!-- Được chia ra làm 3 phần bên trái, giữa và phải -->
        <!-- Phần trái, gồm các mục ở 2 bên -->
        <!-- Phần mid được sử dụng để làm logo-->
        <?php
               include "./php/Header.php";
          ?>
        <!-- Phần Banner -->
        <div class="Banner_Container Meeting">
            <img src="./img/banner2.jpg" alt="" class="">
            <div class="banner_Content">
                <h1>Chào mừng bạn đến với TNT Booking</h1>
                <p>Hãy cùng khám phá các lựa chọn tuyệt vời và trải nghiệm dịch vụ tốt nhất của chúng tôi</p>
            </div>
        </div>
        <!-- Phần tìm kiếm -->
        <?php
               include "./php/Searchbar.php";
          ?>
        <!-- Phần body -->
        <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
        <div class="body">
            <div class="body_container">
                <!-- <div class="body_more"></div> -->
                <!-- Phần tìm kiếm  -->
                <div class="Main_content">
                    <div class="Main title">
                        <h1 class="title large">Khám phá về chúng tôi</h1>
                    </div>
                </div>
            </div>
            <div class="content_container">
                <div class="SlideRoombook_container">
                    <div class="content_title">
                        <h1 class="title large">Các hạng phòng</h1>
                    </div>
                    <div class="room_book">
                        <!-- <script>
                                   fetch('./php/book.php')
                                   .then(response => response.text())
                                   .then(data => {
                                        document.querySelector('.content_container .room_book').innerHTML = data;
                                   })
                                   .catch(error => console.error('Error:', error));
                                   </script> -->
                                <?php 
                                   include "./php/book.php"
                                ?>
                    </div>
                </div>

                <div class="SlideRoomeat_container">
                    <div class="content_title">
                        <h1 class="title large">Nhà hàng và Quán bar</h1>
                    </div>
                    <div class="room_eat">
                        <script>
                        fetch('./php/eat.php')
                            .then(response => response.text())
                            .then(data => {
                                document.querySelector('.content_container  .room_eat').innerHTML = data;
                            })
                            .catch(error => console.error('Error:', error));
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phần footer -->
        <?php
            include "./php/Footer.php"
        ?>
    </div>
    <script src="./js/Main.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/eat.js"></script>
    <script src="./js/ultils.js"></script>
</body>

</html>