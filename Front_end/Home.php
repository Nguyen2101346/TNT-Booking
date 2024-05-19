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