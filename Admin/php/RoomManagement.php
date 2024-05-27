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
               <span class="fas fa-caret-down"></span>
               <ul>
                    <?php 
                    $Sothutu = 1;
                    $sql = "SELECT * FROM loaiphong";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($r = $result->fetch_assoc()) {
                    ?>
                         <li><a href="#" class="type_items" data-id="<?= htmlspecialchars($r['IDLoaiphong']) ?>"> <?= htmlspecialchars($Sothutu) ?> . <?= htmlspecialchars($r['Tenloaiphong']) ?></a></li>
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
          <div class="RoomList_Component">
               <?php
               $sql = "SELECT * FROM loaiphong,phong 
               WHERE loaiphong.IDLoaiphong = phong.IDLoaiphong";
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $result = $stmt->get_result();
               while ($r = $result->fetch_assoc()) {
                ?>
               <div class="MiniRoom">
                    <div class="Img_MiniRoom">
                         <img src="./img/<?= htmlspecialchars($r['AnhDD']) ?>">
                    </div>
                    <div class="MiniRoom_content">
                         <h3>Tên phòng : <?= htmlspecialchars($r['Tenphong']) ?></h3>
                         <h3>Tầng : <?= htmlspecialchars($r['Sotang']) ?></h3>
                         <h3>Ngày tạo : <?= htmlspecialchars($r['Ngaytao']) ?></h3>
                         <div class="BasicEdit">
                              <div class="Edit_btn" data-id="<?= htmlspecialchars($r['IDPhong']) ?>">
                                   <a href="#" class="btn">Chỉnh sửa</a>
                              </div>
                              <div class="Delet_btn">
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
     <!-- Form tạo thêm loại -->
     <div class="Creminiroom MiniContainer">
          <form class="Creminiroom MiniForm" data-id="" method="post" id="MiniRoomForm" action="./php/CreMiniRoom_process.php">
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
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- <script src="../js/slider_swiper.js"></script> -->
<!-- <script src="../js/Admin.js"></script> -->
<script>
     $(document).ready(function(){
          $('.AddRoom').click(function(){
               $('.Creminiroom.MiniContainer').addClass('visible');
          });
          $('.MiniRoom_Cancel_btn').click(function(){
               $('.Creminiroom.MiniContainer').removeClass('visible');
          });

          $('#MiniRoomForm').on('submit',function(e){
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
                              $('.CreType.MiniContainer').removeClass('visible');
                         } 
                         // else if (response.type == 'error') {
                         //      const errormessage = response.message;
                         // if (errormessage === 'TypeRoomname_exists') {
                         //      $('.er-text').text("Loại phòng này đã tồn tại!");
                         // } else if (errormessage === 'Date-not-today') {
                         //      $('.er-text').text("Ngày tạo phải là hôm nay!");
                         // } else if (errormessage === 'Sotang_not_1_to_5') {
                         //      $('.er-text').text("Khách sạn nhỏ lắm bớt chọn tầng cao !");
                         // }
                         else {
                         $('.er-text').text(response.message);
                         }
                    },
                    error: function() {
                         alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
               });
          });
     });
</script>

