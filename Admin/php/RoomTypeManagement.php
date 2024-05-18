     <?php 
          include "../php_func/conn.php"
     ?>
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
                                   <li><a href="#"> <?= $r['IDLoaiphong']?> . <?= $r['Tenloaiphong']?></a></li>
                              <?php
                                   }
                              ?>
                         </ul>
                         </div>
                         <div class="CreType">
                              <a href="#" class="medium_btn" id="openCreTypeForm"> Loại phòng mới </a>
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
          <!-- Form tạo thêm loại -->
          <div class="CreType MiniContainer" id="CreTypeFormContainer">
               <form class="CreType MiniForm" action="CreTypeForm_process.php" method="POST" id="CreType_form">
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
                              <input type="date" name="CreType_Ngaytao" id="" value="<?= date('Y-m-d') ?>" required >
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
     <script>
          $(document).ready(function() {
            $('#openCreTypeForm').on('click', function(event) {
                event.preventDefault();
                $('.CreType.MiniContainer').addClass('visible');
            });

            $('.CreType .Cancel_btn .btn').on('click', function(event) {
                event.preventDefault();
                $('.CreType.MiniContainer').removeClass('visible');
            });

            $('#CreType_form').on('submit', function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: './php/CreTypeForm_process.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                         if (response.success) {
                         alert('Loại phòng mới đã được thêm thành công!');
                         $('.CreType.MiniContainer').removeClass('visible');
                         } else if(data.type == error){
                         const errormessage = data.message;
                         if(errormessage === 'TypeRoomname_exists' ){
                              document.querySelector('.er-text').textContent = "Loại phòng này đã tồn tại!";
                         }else if(errormessage === 'Date-not-today'){
                              document.querySelector('.er-text').textContent = ""
                         }
                         
                         }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                });
            });
        });
     </script>