<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <link rel="stylesheet" href="./css/Admin_main.css">
    <link rel="stylesheet" href="./css/Admin_Room.css">
    <link rel="stylesheet" href="./css/Slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
    <div class="Container Admin_Room">
    <?php 
        include './php_func/conn.php';
        if(isset($_GET['idroom'])){
            $idroom = $_GET['idroom'];
            echo  $_GET['idroom'];  
        }
    ?>
        <div class="body">
            <!-- Phần chuyển đổi chung -->
            <div class="container RoomManagement">
                <div class="Change">
                    <div class="EventChange Left " id="loadRoomTypes">
                        <a href="#" class="title click"><h2 class="title">Quản lý loại phòng</h2></a>
                    </div>
                    <div class="EventChange Right" id="loadRooms">
                        <a href="#" class="title"><h2 class="title">Quản lý phòng</h2></a>
                    </div>
                </div>
            </div>
            <div id="roomContent">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
            $(document).ready(function() {
            $('#roomContent').load('./php/RoomTypeManagement.php', function(){
                initializeSwiper();
            });
            $('#loadRoomTypes').click(function(e) {
                e.preventDefault();
                $('#roomContent').load('./php/RoomTypeManagement.php', function(){
                    initializeSwiper();
                });
            });

            $('#loadRooms').click(function(e) {
                e.preventDefault();
                $('#roomContent').load('./php/RoomManagement.php');
            });
        });

        function initializeSwiper(){
            var swiper = new Swiper('.swiper', {
                slidesPerView: 2,
                direction: getDirection(),
                navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
                },
                on: {
                resize: function () {
                    swiper.changeDirection(getDirection());
                },
                },
            });
            
            function getDirection() {
                var windowWidth = window.innerWidth;
                var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
                return direction;
            }
        }
    </script>
</body>
</html>