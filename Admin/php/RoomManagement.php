<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../php_func/conn.php";
// include "../php_func/func.php";
?>
<div class="Room_container" id="Admin_Room__content">
     <!-- Thanh chọn loại phòng -->
     <div class="TypeBar">
          <div class="TypeCheck medium_btn">
               Chọn loại phòng
               <span><i class="fas fa-caret-down fa-beat"></i></span>
               <ul>
                    <?php 
                    $Sothutu = 1;
                    $sql = "SELECT * FROM loaiphong";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($r = $result->fetch_assoc()) {
                    ?>
                         <li><a href="#" class="type_item" data-id="<?= htmlspecialchars($r['IDLoaiphong']) ?>"> <?= htmlspecialchars($Sothutu) ?> . <?= htmlspecialchars($r['Tenloaiphong']) ?></a></li>
                    <?php
                         $Sothutu++;
                    }
                    ?>
               </ul>
          </div>
     </div>
     <div class="Roomlist_Container" id="Room_List">
          <div class="AddRoom">
               <a href="#" class="btn"> Thêm phòng mới </a>
          </div>
          <div class="RoomList_Component" id="RoomList_Component">
               <?php
               $sql = "SELECT * FROM loaiphong,phong 
               WHERE loaiphong.IDLoaiphong = phong.IDLoaiphong";
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $result = $stmt->get_result();
               while ($r = $result->fetch_assoc()) {
                    if ($r['TrangThai'] == '0') {
                         $Tinhtrang = 'Còn trống';
                    } else if($r['TrangThai'] == '1') {
                         $Tinhtrang = 'Đang được sử dụng';
                    }else{
                         $Tinhtrang = 'Đã bị hủy';
                    }

                    $disabledClass = '';
                    $deleteDisabled = '';
                    if($Tinhtrang == 'Đã bị hủy'){
                         $disabledClass = 'disabled';
                         $deleteDisabled = 'disabled';
                    }

                    if ($r['Ngaytao'] !== '0') {
                         $Ngaytao = date('d/m/Y', strtotime($r['Ngaytao']));
                    }

                    
                ?>  
               <div class="MiniRoom <?= $disabledClass ?>" id="MiniRoom">
                    <div class="Img_MiniRoom">
                         <img src="./img/<?= htmlspecialchars($r['AnhDD']) ?>">
                    </div>
                    <div class="MiniRoom_content">
                         <h3>Tên phòng : <span id="MiniroomName"><?= htmlspecialchars($r['Tenphong']) ?></span></h3>
                         <h3>Tầng : <span id="MiniroomFloor"><?= htmlspecialchars($r['Sotang']) ?></span></h3>
                         <h3>Ngày tạo : <span id="MiniroomCreDate"><?= $Ngaytao ?></span></h3>
                         <h3>Tình trạng : <span id="MiniroomStatus"><?= $Tinhtrang ?></span></h3>
                         <div class="BasicEdit">
                              <div class="Edit_btn <?= $disabledClass ?>" id="Upd_btn" data-room-id="<?= htmlspecialchars($r['IDPhong']) ?>">
                                   <a href="#" class="btn" >Chỉnh sửa</a>
                              </div>
                              <div class="Delet_btn <?= $deleteDisabled ?>" data-room-id="<?= htmlspecialchars($r['IDPhong']) ?>">
                                   <a href="#" class="btn">Hủy bỏ</a>
                              </div>
                         </div>
                    </div>
               </div>
               <?php
               }
               ?>
          </div>
     </div>
          </div>
     <!-- Form tạo thêm phòng -->
     <div class="Creminiroom MiniContainer">
          <form class="Creminiroom MiniForm" data-id="" method="post" id="MiniRoomForm" action="">
               <h2>Thêm phòng mới</h2>
               <a href="#" class="exit_btn"></a>
               <div class="miniroom Name">
                    <label for="Tenphong">Tên loại phòng</label>
                    <input type="text" name="Tenphong" id="Tenphong" required>
               </div>
               <div class="miniroom FloorNum">
                    <label for="Sotang">Số tầng</label>
                    <input type="number" name="Sotang" id="Sotang" required>
               </div>
               <div class="miniroom Day">
                    <label for="Ngaytao">Ngày tạo</label>
                    <input type="date" name="Ngaytao" id="Ngaytao" value="<?= date('Y-m-d') ?>" required>
               </div>
               <input type="hidden" name="IDLoaiphong" id="IDLoaiphong" value="">
               <div class="Type Alert">
                    <div class="er-text"></div>
                    <div class="cor-text"></div>
               </div>
               <div class="MiniRoom_Confirm">
                    <div class="MiniRoom_Cancel_btn">
                         <a href="#" class="btn">Huỷ bỏ</a>
                    </div>
                    <div class="MiniRoom_confirm_btn">
                         <input type="submit" name="confirm" value="Xác nhận" class="btn">
                    </div>
               </div>
          </form>
     </div>
     <!-- Form cập nhật phòng -->
     <div class="Updminiroom MiniContainer">
          <form class="Updminiroom MiniForm" data-id="" method="post" id="MiniRoomForm_Upd" action="">
               <h2>Cập nhật phòng</h2>
               <a href="#" class="exit_btn"></a>
               <div class="miniroom Name">
                    <label for="Tenphong">Tên loại phòng</label>
                    <input type="text" name="Tenphong_Upd" id="Tenphong_Upd" required value="">
               </div>
               <div class="miniroom FloorNum">
                    <label for="Sotang">Số tầng</label>
                    <input type="number" name="Sotang_Upd" id="Sotang_Upd" required value="">
               </div>
               <div class="miniroom Day">
                    <label for="Ngaytao">Ngày tạo</label>
                    <input type="date" name="Ngaytao_Upd" id="Ngaytao_Upd" value="<?= date('Y-m-d') ?>" required>
               </div>
               <input type="hidden" name="IDLoaiphong_Upd" id="IDLoaiphong_Upd" value="">
               <input type="hidden" name="IDPhong_Upd" id="IDPhong_Upd" value="">
               <div class="Type Alert">
                    <div class="er-text"></div>
                    <div class="cor-text"></div>
               </div>
               <div class="MiniRoom_Confirm">
                    <div class="UpdMiniRoom_Cancel_btn">
                         <a href="#" class="btn">Huỷ bỏ</a>
                    </div>
                    <div class="MiniRoom_confirm_btn">
                         <input type="submit" name="confirm" value="Xác nhận" class="btn">
                    </div>
               </div>
          </form>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- <script src="../js/slider_swiper.js"></script> -->
<!-- <script src="../js/Admin.js"></script> -->
<script>
     $(document).ready(function(){
          $(document).on('click', '.Edit_btn', function(e){
               e.preventDefault();
               $('.Updminiroom.MiniContainer').addClass('visible');
               var room_id = $(this).data('room-id');
               document.getElementById('IDPhong_Upd').value = room_id;
               $.ajax({
                    url: './php/Get_Miniroom_Name.php',
                    method: 'GET',
                    data: {idroom: room_id},
                    success: function(data) {
                         console.log(data);
                         $('#Tenphong_Upd').val(data.Tenphong);
                         $('#Sotang_Upd').val(data.Sotang);
                         $('#Ngaytao_Upd').val(data.Ngaytao);
                         $('#IDLoaiphong_Upd').val(data.IDLoaiphong);
                         $('#IDPhong_Upd').val(data.IDPhong);
                    },
                    error: function(xhr, status, error) {
                         console.error("Error details:", xhr, status, error);
                         alert('Có lỗi xảy ra: ' + xhr.status + ' ' + xhr.statusText + ' - ' + error);
                    } 
               });
          });
          $(document).on('submit', '#MiniRoomForm_Upd', function(e){
               e.preventDefault();
               var formData = $(this).serialize();
               $.ajax({
                    url: './php/RoomManagement_Upd.php',
                    method: 'POST',
                    data: formData,
                    success: function(data) {
                         console.log(data);
                         alert('Cập nhật thành công');
                         $('.Updminiroom.MiniContainer').removeClass('visible');
                    },
                    error: function(xhr, status, error) {
                         alert('Có lỗi xảy ra: ' + xhr.status + ' ' + xhr.statusText + ' - ' + error);
                    }
               });
          });
          
          $(document).on('click', '.Delet_btn', function(e){
               e.preventDefault();
               // Hiển thị hộp thoại xác nhận
               var confirmation = confirm('Bạn có chắc chắn muốn hủy bỏ phòng này không?');
               // Nếu người dùng đồng ý
               if (confirmation) {
                    // Lấy ID của phòng cần xóa
                    var roomId = $(this).data('room-id');
                    deleteRoom(roomId); // Gọi hàm xóa phòng với ID tương ứng
               }
          });

          // Hàm để xóa phòng (cần thay đổi theo nhu cầu của bạn)
          function deleteRoom(roomId) {
               $.ajax({
                    url: './php/Delete_Miniroom.php',
                    method: 'POST',
                    data: { room_id: roomId },
                    success: function(response) {
                         // Xử lý phản hồi từ máy chủ nếu cần
                         // Ví dụ: hiển thị thông báo thành công, làm mới trang, vv.
                         alert('Phòng đã được xóa thành công.');
                         location.reload(); // Làm mới trang sau khi xóa
                    },
                    error: function(xhr, status, error) {
                         // Xử lý lỗi nếu có
                         console.error("Error details:", xhr, status, error);
                         alert('Có lỗi xảy ra khi xóa phòng: ' + xhr.status + ' ' + xhr.statusText + ' - ' + error);
                    }
               });
          }


          $('.MiniRoom_Cancel_btn').click(function(){
               $('.Creminiroom.MiniContainer').removeClass('visible');
          });
          $('.AddRoom').click(function(){
               $('.Creminiroom.MiniContainer').addClass('visible');
               // $('.Updminiroom.MiniContainer').addClass('visible');
          });
          $('.UpdMiniRoom_Cancel_btn').click(function(){
               $('.Updminiroom.MiniContainer').removeClass('visible');
          });
          $('.type_item').click(function(){
               event.preventDefault();
               var id = this.getAttribute('data-id');
               document.getElementById('IDLoaiphong').value = id;
               document.getElementById('IDLoaiphong_Upd').value = id;
               console.log(id);

               var id = $(this).data('id');
               console.log("ID của phòng:", id);
               lastClickedId = id;
               $.ajax({
                    url : './php/Get_Miniroom.php',
                    method : 'GET',
                    data : {idroom : id},
                    success : function(MiniRoomdata) {
                         var MiniRoom_Container = $('#RoomList_Component');
                         MiniRoom_Container.empty();
                         if(Array.isArray(MiniRoomdata)){
                            MiniRoomdata.forEach(function(MiniRoom) {
                                console.log(MiniRoom);
                                // Tạo HTML cho mỗi tiện ích
                                var MiniRoomItem = 
                                   '<div class="MiniRoom" id="MiniRoom">'
                                        +'<div class="Img_MiniRoom">'
                                             +'<img src="./img/'+MiniRoom.AnhDD+'">'
                                        +'</div>'
                                        +'<div class="MiniRoom_content">'
                                             +'<h3>Tên phòng : <span id="MiniroomName">'+MiniRoom.Tenphong+'</span></h3>'
                                             +'<h3>Tầng : <span id="MiniroomFloor">'+MiniRoom.Sotang+'</span></h3>'
                                             +'<h3>Ngày tạo : <span id="MiniroomCreDate">'+MiniRoom.Ngaytao+'</span></h3>'
                                             +'<h3>Tình trạng : <span id="MiniroomStatus">'+MiniRoom.TrangThai+'</span></h3>'
                                             +'<div class="BasicEdit">'
                                                  +'<div class="Edit_btn" id="Upd_btn" data-room-id="'+MiniRoom.IDPhong+'">'    
                                                       +'<a href="#" class="btn">Chỉnh sửa</a>'
                                                  +'</div>'
                                                  +'<div class="Delet_btn" data-room-id="'+MiniRoom.IDPhong+'">'
                                                       +'<a href="#" class="btn">Hủy bỏ</a>'
                                                  +'</div>'
                                             +'</div>'
                                        +'</div>'
                                   +'</div>'
                                // Thêm tiện ích vào giao diện
                                MiniRoom_Container.append(MiniRoomItem);
                         });
                              }else{
                                   console.error("MiniRoom is not an array");
                              }
                         },error: function(xhr, status, error) {
                         console.error(error);
                         alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
               });

               $(document).on('submit', '#MiniRoomForm', function(e){
                    e.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                         url : './php/CreMiniRoom_process.php',
                         method : 'POST',
                         data : formData,
                         dataType : 'json',
                         success :function(response) {
                              if (response.success) {
                                   alert('Loại phòng mới đã được thêm thành công!');
                                   $('.cor-text').text(response.message);
                                   $('.CreType.MiniContainer').removeClass('visible');
                                   location.reload();
                              } 
                              else {
                              $('.er-text').text(response.message);
                              }
                         },
                         error: function(xhr, status, error) {
                              console.error("Error details:", xhr, status, error);
                              alert('Có lỗi xảy ra: ' + xhr.status + ' ' + xhr.statusText + ' - ' + error);
                         }
                    });
               });

               
                   
               // });
          });
     });
</script>

