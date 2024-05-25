<div id="hiddenMeetingContent">
    <!-- Nội dung của trang Meeting -->
    <?php
          if (session_status() == PHP_SESSION_NONE){
               session_start();
            // $userID = $_SESSION['userID'];
          }
          include "../conn.php";
        //   $sql = "SELECT * FROM sukien WHERE IDSukien=1";
        //   $re = mysqli_query($conn, $sql);
        //   $r = mysqli_fetch_array($re);
        $stmt = $conn->prepare("SELECT * FROM sukien WHERE IDSukien = ?");
        $stmt->bind_param("i", $eventID); // 'i' là kiểu dữ liệu integer
        $eventID = 1;
        $stmt->execute();
        $result = $stmt->get_result();
        $r = $result->fetch_array();
    ?>
    <div class="Eventcontent">
        <p class="Meeting"><?php if(isset($r['Mota']) && $r['Mota']!="") { echo $r['Mota']; } ?></p>
    </div>
    <div class="request_btn">
        <a href="#" class="large_btn" data-content="Meeting">Gửi yêu cầu</a>
    </div>
</div>
<div id="hiddenMeetingForm">
    <div class="RequestCard Meeting">
        <h2> Khách hàng gửi yêu cầu </h2>
        <span class="exit_btn"><i class="fa-solid fa-xmark"></i></span>
        <form id="meetingForm" method="post">
            <div class="mainRequest">
                <div class="company re">
                    <label for="company">Công ty</label>
                    <input type="text" name="company" id="company" placeholder="Nhập tên công ty"> 
                </div>
                <div class="name re">
                    <label for="">Tên khách hàng</label>
                    <input type="text" name="name" id="" placeholder="Nhập tên người yêu cầu (bắt buộc)" required="required">
                </div>
                <div class="Email re">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" placeholder="Nhập email người yêu cầu (bắt buộc)" required="required">
                </div>
                <div class="phoneNum re">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại (bắt buộc)" required="required">
                </div>
            </div>
            <div class="note">
                <label for="">Ghi chú</label>
                <textarea name="note" id="note" cols="30" rows="10" value="Nhập những thông tin thêm"></textarea>
                <p>(Địa điểm, mục đích, thời gian dự kiện và quy mô của sự kiện.)</p>
            </div>
            <div class="Submit_btn">
                <input type="submit" value="Gửi yêu cầu" name="MeetingRequest" class="large_btn">
            </div>
            <div id="responseMessage"></div>
        </form>
    </div>
</div>
<div class="swiper" id="MeetingSlide">
    <div class="swiper-wrapper">
          <?php
               $sql = "SELECT * FROM hinhsk WHERE IDSukien=1";
               $re = mysqli_query($conn, $sql);
               while ($r = mysqli_fetch_array($re)) {
          ?>
          <div class="swiper-slide"><img src="../Front_end/img/<?= $r['Hinh']?>" alt=""></div>
        <!-- <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
        <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
        <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
        <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div> -->
          <?php
               }
          ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>