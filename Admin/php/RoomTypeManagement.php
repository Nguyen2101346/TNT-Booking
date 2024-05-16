<!-- <!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Style-Type" content="text/css">
     <title>Room Manegement</title>
     <link rel="shortcut icon" href="../img/LogoTNT.png" type="image/x-icon">
     <link rel="stylesheet" href="../css/Admin_main.css">
     <link rel="stylesheet" href="../css/Admin_Room.css">
     <link rel="stylesheet" href="../css/Slider.css">
      Sử dụng fontawsome 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
      Sử dụng swiper đơn giản 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head> 
-->
<body>
     <?php 
          include "../php_func/conn.php"
     ?>
     <div class="Container Admin_Room">
          <!-- Phần body -->
          <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
          <div class="body">
               <div class="" id="roomContent"></div>
               <!-- Thành phần chính -->
               <div class="Room_container" id="Admin_Room__content">
                    <!-- Thanh chọn loại phòng -->
                    <div class="TypeBar">
                         <div class="TypeCheck medium_btn">
                              Chọn loại phòng
                              <span class="fas fa-caret-down"></span>
                         <ul>
                              <?php 
                                   $sql = "SELECT * FROM loaiphong";
                                   $re = mysqli_query($conn,$sql);
                                   while($r = mysqli_fetch_array($re)){
                              ?>
                                   <li><a href="#"> <?= $r['IDLoaiPhong']?>. <?= $r['Tenloaiphong']?></a></li>
                              <?php
                                   }
                              ?>
                         </ul>
                         </div>
                         <div class="CreType">
                              <a href="#" class="medium_btn"> Loại phòng mới </a>
                         </div>
                    </div>
                    <form action="" class="CreRoom_form" id="CreRoom">
                         <div class="CreRoom_container">
                              <div class="CreRoom Left">
                                   <div class="ImgRoom">
                                        <img src="./img/phòng1.jpg" alt="">
                                        <div class="getImgRoom">
                                             <label for="ImgRoom" class="title">Chỉnh sửa ảnh</label>
                                             <input type="file" name="" id="ImgRoom">
                                        </div>
                                   </div>
                                   <div class="CreRoombot description">
                                        <label class="title">Mô tả</label>
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                   </div>
                              </div>
                              <div class="CreRoom Right">
                                   <div class="CreRoomCom name">
                                        <label for="RoomName" class="title">Tên loại phòng</label>
                                        <input type="text" name="RoomName" id="">
                                   </div>
                                   <div class="CreRoomCom Small">
                                        <div class="CreRoomCom Number">
                                             <label for="RoomNum" class="title">Số phòng</label>
                                             <input type="text" name="RoomNum" value="">
                                        </div>
                                        <div class="CreRoomCom Area">
                                             <label for="RoomArea" class="title">Diện tích</label>
                                             <input type="text" name="RoomArea" value="">
                                        </div>
                                   </div>
                                   <div class="CreRoomCom CreDay">
                                        <label for="RoomDay" class="title">Ngày tạo</label>
                                        <input type="date" name="RoomDay" id="">
                                   </div>
                                   <div class="CreRoombot convenience">
                                        <label for="RoomConvenience" class="ConvienceCheck title" id = "">Tiện ích</label>
                                        <textarea name="RoomConvenience" id="RoomConvenienceTextarea" cols="30" rows="10"></textarea>
                                   </div>
                              </div>
                         </div>
                         <div class="ImgRoom_detail">
                              <div class="title">
                                   <lable>Ảnh xem trước</lable>
                                        <div class="getImg_detail">
                                             <label for="ImgDetail" class="title">Chọn ảnh</label>
                                             <input type="file" name="" id="ImgDetail">
                                        </div>
                              </div>
                              <div class="ImgRoom_Slider">
                                   <!-- Swiper -->
                                   <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                             <div class="swiper-slide"><img src="./img/phòng1.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng1.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng1.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng2.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng2.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng1.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng2.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng2.jpg" alt=""></div>
                                             <div class="swiper-slide"><img src="./img/phòng1.jpg" alt=""></div>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                   </div>
                              </div>     
                         </div>
                         <div class="Confirm">
                              <div class="cancel_btn">
                                   <input type="submit" name="cancel" id="" value="Huỷ bỏ" class="btn"> 
                              </div>
                              <div class="confirm_btn">
                                   <input type="submit" name="confirm" id="" value="Xác nhận" class="btn"> 
                              </div>
                         </div>
                         <input type="hidden" name="idRoom" value="">
                    </form>
               </div>
          </div>
          <!-- Form tạo thêm loại -->
          <div class="CreType MiniContainer">
               <form class="CreType MiniForm" action="../Admin/php_func/CreTypeFrom.php" method="POST" id="CreType-form">
                    <h2>Thêm loại phòng mới</h2>
                    <div class="Type Num">
                         <label for="">Thứ tự</label>
                         <input type="text" name="" id="">
                    </div>
                    <div class="Type Name">
                         <label for="">Tên loại phòng</label>
                         <input type="text" name="CreType_Tenloaiphong" id="" required>
                    </div>
                    <div class="Type Day">
                         <label for="">Ngày tạo</label>
                         <input type="date" name="CreType_Ngaytao" id="" value="<?= getdate()['year'] . '-' . getdate()['mon'] . '-' . getdate()['mday'] ?>" required >
                    </div>
                    <div class="Type Alert">
                         <div class="er-text"></div>
                         <div class="cor-text"></div>
                    </div>
                    <div class="TypeConfirm">
                         <div class="Cancel_btn">
                              <a href="#" class="btn">Huỷ bỏ</a>
                         </div>
                         <div class="Confirm_btn">
                              <input type="submit" name="confirm" id="" value="Xác nhận" class="btn"> 
                         </div>
                    </div>
               </form>
               <script>
                    document.addEventListener('DOMContentLoaded', function() {
    const CreTypeForm = document.getElementById('CreType-form');

    CreTypeForm.addEventListener('submit', function(event) {
         event.preventDefault(); // Ngăn chặn hành vi mặc định của form

         // Lấy dữ liệu từ form
         const formData = new FormData(CreTypeForm);
         // Gửi dữ liệu form bằng AJAX
         fetch(CreTypeForm.action, {
              method: 'POST',
              body: formData
         })
         .then(response => response.json()) // Chuyển đổi kết quả nhận được thành JSON
         .then(data => {
              // Xử lý kết quả nhận được
              if (data.success) {
                   // Nếu thành công, hiển thị thông báo thành công và xóa dữ liệu trong form
                   const message = data.message;
                   document.querySelector('.cor-text').textContent = "Tạo phòng thành công !";
                   window.location.href = "Mananegement.php"
                   // window.location.href = 'login_remake.php'; 
              } else if (data.type === 'error') {
                   // Xử lý các loại lỗi khác nhau
                   const errorMessage = data.message;
                   if (errorMessage === 'TypeRoomname_exists') {
                        document.querySelector('.er-text').textContent = "Loại phòng này đã có rồi !";
                   } else if (errorMessage === 'Date_not_today') {
                        document.querySelector('.er-text').textContent = "Ngày tạo phải là hôm nay !";
                   } else {
                        document.querySelector('.er-text').textContent = "Có một vài lỗi nhỏ: " + errorMessage;
                   }
              }
         })
         .catch(error => {
              console.error('Error:', error);
         });
    });
    });
               </script>
          </div>
          <div class="MiniConvience MiniContainer">
               <form action="" class="MiniConvience MiniForm">
                    <h2> Chọn tiện ích </h2>
                    <div class="ConvienceShow" id="ConvienceCheckboxes">
                         <?php 
                              include '../php_func/conn.php';
                              $sql = "SELECT * FROM tienich";
                              $re = mysqli_query($conn,$sql);
                              while($r = mysqli_fetch_array($re)){
                         ?>
                              <div class="Convience_item">
                                   <input type="checkbox" id="<?= $r['IDTienich']?>" name="IDTienich[]" value="<?= $r['IDTienich']?>">
                                   <label for="<?= $r['IDTienich']?>"><?= $r['Tienich']?></label>
                              </div>
                         <?php          
                              }
                         ?>
                    </div>
                    <div class="MiniConvience_footer">
                         <a href="#" class="ConFinish">Xong</a>
                    </div>
               </form>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <script src="./js/slider_swiper.js"></script>
     <script src="./js/Admin.js"></script>
     <script>
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
     </script>
</body>
<!-- </html> -->