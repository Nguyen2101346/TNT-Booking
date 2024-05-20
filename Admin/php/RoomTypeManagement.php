     <?php 
          if(session_status() == PHP_SESSION_NONE){
               session_start();
          }
          $idroom = isset($_GET['idroom']) ? $_GET['idroom'] : null;
          if ($idroom) {
          echo "ID Room: " . htmlspecialchars($idroom);
          } else {
          echo "ID Room không tồn tại.";
          }
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
                                   $Sothutu = 1;
                                   $sql = "SELECT * FROM loaiphong";
                                   $re = mysqli_query($conn,$sql);
                                   while($r = mysqli_fetch_array($re)){
                              ?>
                                   <li><a href="index.php?page=Management&idroom=<?=$r['IDLoaiphong']?>&go=1" class="type_items" data-id="<?= $r['IDLoaiphong']?>"> <?= $Sothutu ?> . <?= $r['Tenloaiphong']?></a></li>
                              <?php
                                   $Sothutu++ ;}
                              ?>
                         </ul>
                         </div>
                         <div class="CreType">
                              <a href="#" class="medium_btn" id="openCreTypeForm"> Loại phòng mới </a>
                         </div>
                    </div>
                    <?php 
                         if(isset($_GET['idroom'])){
                              echo $_GET['idroom'];
                              $idroom = $_GET['idroom'];
                              $sql = "SELECT loaiphong.*, GROUP_CONCAT(DISTINCT hinhphong.Hinh) as Hinh, GROUP_CONCAT(DISTINCT tienich.Tienich) as Tienich 
                              FROM loaiphong
                              LEFT JOIN hinhphong ON loaiphong.IDLoaiphong = hinhphong.IDLoaiphong
                              LEFT JOIN nhantienich ON loaiphong.IDLoaiphong = nhantienich.IDLoaiphong
                              LEFT JOIN tienich ON nhantienich.IDTienich = tienich.IDTienich
                              WHERE loaiphong.IDLoaiphong = $idroom
                              GROUP BY loaiphong.IDLoaiphong";
                              $re = mysqli_query($conn, $sql);
                              $r = mysqli_fetch_array($re);
                         }
                         ?>
                         <form action="index.php?page=Management&idroom=<?=$r['IDLoaiphong']?>&go=1" class="CreRoom_form" id="CreRoom" method="post" enctype="multipart/form-data">
                              <div class="CreRoom_container">
                                   <div class="CreRoom Left">
                                        <div class="ImgRoom">
                                             <img src="./img/<?= $r['Hinh']?>" alt="">
                                             <div class="getImgRoom">
                                                  <label for="ImgRoom" class="title">Chỉnh sửa ảnh</label>
                                                  <input type="file" name="ImgRoom" id="ImgRoom">
                                             </div>
                                        </div>
                                        <div class="CreRoombot description">
                                             <label class="title">Mô tả</label>
                                             <textarea name="RoomDes" id="" cols="30" rows="10"><?= $r['Mota']?></textarea>
                                        </div>
                                   </div>
                                   <div class="CreRoom Right">
                                        <div class="CreRoomCom name">
                                             <label for="RoomName" class="title">Tên loại phòng</label>
                                             <input type="text" name="RoomName" id="" value="<?= $r['Tenloaiphong']?>">
                                        </div>
                                        <div class="CreRoomCom Small">
                                             <div class="CreRoomCom Adult">
                                                  <label for="RoomAdult" class="title">Số người</label>
                                                  <input type="text" name="RoomAdult" value="<?= $r['Songuoi']?>">
                                             </div>
                                             <div class="CreRoomCom Area">
                                                  <label for="RoomArea" class="title">Diện tích</label>
                                                  <input type="text" name="RoomArea" value="<?= $r['Dientich']?>">
                                             </div>
                                        </div>
                                        <div class="CreRoomCom Small">
                                             <div class="CreRoomCom Roomnum">
                                                  <label for="RoomNum" class="title">Số phòng</label>
                                                  <input type="text" name="RoomNum" value="<?= $r['Sophong']?>">
                                             </div>
                                             <div class="CreRoomCom Price">
                                                  <label for="RoomPrice" class="title">Giá</label>
                                                  <input type="text" name="RoomDay" id="roomPrice" value="<?= $r['Gia']?>">
                                             </div>  
                                        </div>
                                        <div class="CreRoombot convenience">
                                             <label for="RoomConvenience" class="ConvienceCheck title" id = "">Tiện ích</label>
                                             <textarea name="RoomConvenience" id="RoomConvenienceTextarea" cols="30" rows="10">
                                             </textarea>
                                        </div>
                                   </div>
                              </div>
                              <div class="ImgRoom_detail">
                                   <div class="title">
                                        <lable>Ảnh xem trước</lable>
                                             <div class="getImg_detail">
                                                  <label for="ImgDetail" class="title">Chọn ảnh</label>
                                                  <input type="file" name="ImgDetail[]" id="ImgDetail" multiple="multiple">
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
                              $sql = "SELECT * FROM tienich";
                              $re = mysqli_query($conn,$sql);
                              while($r = mysqli_fetch_array($re)){
                         ?>
                              
                         <?php          
                              }
                         ?>
                         <?php
                              $sql = "SELECT * FROM tienich";
                              $re = mysqli_query($conn,$sql);
                              while($r = mysqli_fetch_array($re)){
                                   $check = 0;
                                   $idConv = $r['IDTienich'];
                                   $sql1 = "SELECT * FROM nhantienich WHERE IDLoaiphong = $idroom";
                                   $re1 = mysqli_query($conn,$sql1);
                                   while($r1 = mysqli_fetch_array($re1)){
                                        $checked = $r1['IDTienich'];
                                        if($idConv == $checked){
                                             $check = 1;
                                             break;
                                        }
                                   }if($check == 1){
                                        echo '
                                        <div class="Convience_item">
                                             <input type="checkbox" id="'. $r['IDTienich'].'" name="IDTienich[]" value="'. $r['IDTienich'].'" checked>
                                             <label for="'. $r['IDTienich'].'">'. $r['Tienich'].'</label>
                                        </div>';
                                        continue;
                                   }else{
                                        echo '
                                        <div class="Convience_item">
                                             <input type="checkbox" id="'. $r['IDTienich'].'" name="IDTienich[]" value="'. $r['IDTienich'].'">
                                             <label for="'. $r['IDTienich'].'">'. $r['Tienich'].'</label>
                                        </div>';
                                        continue;
                                   }    
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
     <script src=""></script>
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
                    success: function(response){
                         if (response.success) {
                         alert('Loại phòng mới đã được thêm thành công!');
                         $('.CreType.MiniContainer').removeClass('visible');
                         } else if(response.type == 'error'){
                         const errormessage = response.message;
                         if(errormessage === 'TypeRoomname_exists' ){
                              document.querySelector('.er-text').textContent = "Loại phòng này đã tồn tại!";
                         }else if(errormessage === 'Date-not-today'){
                              document.querySelector('.er-text').textContent = "Ngày tạo phải là hôm nay!"
                         }
                         }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                });
            });
             // Xử lý khi chọn loại phòng
               // $('.type_items').on('click', function(event) {
               //      event.preventDefault();
               //      var idRoom = $(this).data('id');
               //      $.ajax({
               //           url: './php/Get_room_details.php',
               //           type: 'GET',
               //           data: { id: idRoom },
               //           dataType: 'json',
               //           success: function(response) {
               //                if (response.success) {
               //                     // Điền thông tin vào form
               //                     $('textarea[name="RoomDes"]').val(response.data.Mota);
               //                     $('input[name="RoomName"]').val(response.data.Tenloaiphong);
               //                     $('input[name="RoomNum"]').val(response.data.SoPhong);
               //                     $('input[name="RoomArea"]').val(response.data.DienTich);
               //                     $('input[name="RoomDay"]').val(response.data.NgayTao);
               //                     $('textarea[name="RoomConvenience"]').val(response.data.Tienich);
               //                     // Hiển thị ảnh đại diện và các ảnh khác nếu có
               //                     $('.ImgRoom img').attr('src', response.data.AnhDD);
               //                     // Tạo danh sách các ảnh khác
               //                     var imgSliderHtml = '';
               //                     response.data.ImgDetail.forEach(function(img) {
               //                     imgSliderHtml += '<div class="swiper-slide"><img src="'+img+'" alt=""></div>';
               //                     });
               //                     $('.swiper-wrapper').html(imgSliderHtml);
               //                     // Check các tiện ích
               //                     $('#ConvienceCheckboxes input[type="checkbox"]').each(function() {
               //                     if (response.data.TienichList.includes($(this).val())) {
               //                          $(this).prop('checked', true);
               //                     } else {
               //                          $(this).prop('checked', false);
               //                     }
               //                     });
               //                     $('input[name="idRoom"]').val(idRoom);
               //                } else {
               //                     alert(response.message);
               //                }
               //           },
               //           error: function(jqXHR, textStatus, errorThrown) {
               //                console.error('Error details:', textStatus, errorThrown);
               //                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
               //                     alert('Đã xảy ra lỗi: ' + jqXHR.responseJSON.message);
               //                } else if (textStatus === 'timeout') {
               //                     alert('Đã xảy ra lỗi: Yêu cầu đã bị quá thời gian.');
               //                } else if (textStatus === 'error') {
               //                     alert('Đã xảy ra lỗi: Không thể kết nối với máy chủ.');
               //                } else if (textStatus === 'abort') {
               //                     alert('Đã xảy ra lỗi: Yêu cầu đã bị hủy.');
               //                } else {
               //                     alert('Đã xảy ra lỗi không xác định: ' + textStatus);
               //                }
               //           }
               //      });
               // });

          // Xử lý khi submit form cập nhật loại phòng
          // $('#CreRoom').on('submit', function(event) {
          //      event.preventDefault();
          //      var formData = new FormData(this);
          //      $.ajax({
          //           url: 'update_room.php',
          //           type: 'POST',
          //           data: formData,
          //           contentType: false,
          //           processData: false,
          //           success: function(response) {
          //                if (response.success) {
          //                     alert('Cập nhật loại phòng thành công!');
          //                     // Reload or update the UI as necessary
          //                } else {
          //                     alert(response.message);
          //                }
          //           },
          //           error: function() {
          //                alert('Đã xảy ra lỗi. Vui lòng thử lại.');
          //           }
          //      });
          // });
        });
     </script>