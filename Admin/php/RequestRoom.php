<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../php_func/conn.php";
// include "../php_func/func.php";
?>
     <!-- Thành phần chính -->
     <div class="Main_container" id="Admin_Main__content">
          <!-- Thanh chọn loại phòng -->
          <div class="TypeBar">
               <div class="TypeCheck medium_btn">
                         <div class="TypeCheck_text">Tất cả</div>
                         <span><i class="fa-solid fa-caret-down fa-beat" style="color: white;"></i></span>
                    <ul>
                         <li><a href="#">Tất cả</a></li>
                         <li><a href="#">loại phòng</a></li>
                         <li><a href="#">Tên khách hàng</a></li>
                         <li><a href="#">Ngày đặt</a></li>
                         <li><a href="#">Phương thức thanh toán</a></li>
                    </ul>
               </div>
               <!-- <div class="MemberSearch">
                    <input type="search" name="" id="" placeholder="Để trống để tìm theo thứ tự">
                    <input type="submit" value="">
                    <span class="fa-solid fa-magnifying-glass"></span>
               </div> -->
          </div>
          <div class="room_Request_Container" id="Request_Room">
               <div class="Request_Component">
                    <?php
                         $sql = "SELECT datphong.*, loaiphong.AnhDD,loaiphong.TenloaiPhong,loaiphong.IDLoaiphong, taikhoan.Ho, taikhoan.Ten,taikhoan.Tendangnhap
                         FROM datphong, loaiphong, taikhoan, phong
                         WHERE datphong.IDPhong = phong.IDPhong
                         AND phong.IDLoaiPhong = loaiphong.IDLoaiPhong
                         AND datphong.IDTaiKhoan = taikhoan.IDTaiKhoan
                         GROUP BY datphong.IDDatPhong";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        // Đặt múi giờ
                         date_default_timezone_set('Asia/Ho_Chi_Minh');

                         // Mảng chứa các tên thứ trong tuần bằng tiếng Việt
                         $daysOfWeek = array(
                         'Sunday' => 'Chủ nhật',
                         'Monday' => 'Thứ hai',
                         'Tuesday' => 'Thứ ba',
                         'Wednesday' => 'Thứ tư',
                         'Thursday' => 'Thứ năm',
                         'Friday' => 'Thứ sáu',
                         'Saturday' => 'Thứ bảy'
                         );

                         // Giả sử $row['NgayDat'] là chuỗi ngày tháng từ cơ sở dữ liệu
                         $date = new DateTime($row['Ngaydat']);

                         // Lấy tên thứ bằng tiếng Anh
                         $dayOfWeek = $date->format('l');

                         // Chuyển đổi sang tiếng Việt
                         $dayOfWeekInVietnamese = $daysOfWeek[$dayOfWeek];

                         // Định dạng ngày tháng năm
                         $Ngaydat = $dayOfWeekInVietnamese . ', ' . $date->format('d/m/Y');
                         // $Ngaydat = date('d/m/Y', strtotime($row['NgayDat']));
                         $Tonggia = number_format($row['Tonggia'], 0, ',', '.');
                         if($row['PhuongthucTT'] == '0'){
                              $PhuongthucTT = 'Trực tiếp';
                         }else{
                              $PhuongthucTT = 'Trực tuyến';
                         }

                         if($row['Trangthai'] == '1'){
                              $status = "Đang chờ xử lí";
                          }else if($row['Trangthai'] == '2'){
                              $status = "Đã xác nhận";
                          }else if($row['Trangthai'] == '0'){
                              $status = "Đã Hủy bỏ";
                          }

                         $detailDisabled = '';
                         $disabledClass = '';
                         $agreeDisabled = '';
                         $deleteDisabled = '';
                         if ($status == "Đã xác nhận") {
                              $deleteDisabled = 'disabled';
                         } else if ($status == "Đã Hủy bỏ") {
                              $disabledClass = 'disabled';
                              $agreeDisabled = 'disabled';
                              $deleteDisabled = 'disabled';
                              $detailDisabled = '';
                         }
                    ?>
                    <div class="Request <?= $disabledClass?>" data-id="<?= $row['IDDatphong']?>" data-idtyperoom="<?= $row['IDLoaiphong']?>">
                         <div class="Img_Request">
                              <img src="./img/<?= $row['AnhDD']?>">
                         </div>
                         <div class="Request_content">
                              <h3>Loại phòng : <span class="lighter"><?= $row['TenloaiPhong']?></span> </h3>
                              <h3>Tên khách hàng : <span class="lighter"><?= $row['Ho'].' '.$row['Ten']?></span></h3>
                              <h3>Ngày đặt : <span class="lighter"><?= $Ngaydat?></span></h3>
                              <h3>Thành tiền : <span class="lighter"><?= $Tonggia?> VND</span></h3>
                              <h3>Phương thức thanh toán : <span class="lighter"><?= $PhuongthucTT?></span></h3>
                              <h3 class="absolute_text status<?= $row['Trangthai']?>"><span class="lighter"><?= $status?></span></h3>
                              <div class="request BasicEdit">
                                   <div class="request Detail_btn" data-id="<?= $row['IDDatphong']?>" data-idtyperoom="<?= $row['IDLoaiphong']?>">
                                        <a href="#" class="btn">Chi tiết</a>
                                   </div>
                                   <div class="request Delet_btn <?= $deleteDisabled?>" data-id="<?= $row['IDDatphong']?>">
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
<div class="CheckRoom MiniContainer"> 
     <form class="CheckRoom MiniForm" id="CheckRoom_Form" data-id="">
          <h2>Chi tiết yêu cầu</h2>
          <div class="CheckRoom_Top">
               <div class="checkRoom TypeRoom">
                    <label for="TypeRoom">Loại phòng</label>
                    <input type="text" name="" id="TypeRoom">
               </div>
               <div class="checkRoom Name">
                    <label for="UserName">Tên khách hàng</label>
                    <input type="text" name="" id="UserName">
               </div>
               <div class="checkRoom Email">
                    <label for="Email">Email</label>
                    <input type="email" name="" id="Email">
               </div>
               <div class="checkRoom Phone">
                    <label for="Phone">Số điện thoại</label>
                    <input type="text" name="" id="Phone">
               </div>
               <div class="checkRoom Bill">
                    <label for="Bill">Thành tiền (VND)</label>
                    <input type="text" name="" id="Bill">
               </div>
               <div class="checkRoom Payment">
                    <label for="Payment">Phương thức thanh toán</label>
                    <input type="text" name="" id="Payment">
               </div>
               <div class="checkRoom day">
                    <label for="Day">Ngày đặt</label>
                    <input type="text" name="" id="Day">
               </div>
               <div class="checkRoom RoomNum">
                    <label for="">Sắp xếp phòng cho khách hàng</label>
                    <div class="select" data-id>
                         Chọn phòng
                         <span class="fas fa-caret-down"></span>
                         <select class="RoomName_list">
                         <?php 
                         // $idLoaiPhong = $row['IDLoaiPhong'];
                         // $sql = "SELECT phong.Tenphong, loaiphong.TenloaiPhong 
                         // FROM phong,loaiphong WHERE phong.IDLoaiPhong = loaiphong.IDLoaiPhong 
                         // AND phong.Trangthai = 1 AND phong.IDLoaiPhong = $idLoaiPhong";
                         // $result = mysqli_query($conn, $sql);
                         // while($row = mysqli_fetch_assoc($result)){
                         //      echo '<li>'.$row['Tenphong'].'</li>';
                         // }
                         ?>
                         </select>
                    </div>
               </div>
               <input type="hidden" name="IDDatphong" id="IDDatphong" value="">
          </div>
          <div class="CheckRoom_bottom">
               <!-- <div class="checkRoom idcheck">
                    <input type="checkbox" name="" id="idcheck">
                    <label for="idcheck">Tôi là người lưu trú</label>
               </div> -->
          </div>
          <div class="CheckRoom_Confirm">
               <div class="checkRoom_Cancel_btn" >
                    <a href="#" class="btn">Huỷ bỏ</a>
               </div>
               <div class="checkRoom_confirm_btn" data-id="">
                    <input type="submit" name="confirm" id="" value="Xác nhận" class="btn"> 
               </div>
          </div>
     </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</div>

     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <script src="../js/slider_swiper.js"></script>
     <script src="../js/Admin.js"></script>
     <script>
     $(document).ready(function(){
          $('.request.Detail_btn').click(function(){
               $('.CheckRoom.MiniContainer').addClass('visible');
               event.preventDefault();


               var IDPhong = $(this).attr("data-id");
               var IDLoaiPhong = $(this).attr("data-idtyperoom");
               console.log('IDPhong:', IDPhong);
               console.log('IDLoaiPhong:', IDLoaiPhong);

               $.ajax({
                    url: "./php/Get_RequestRoom_info.php",
                    method: "GET",
                    data: { idPhong: IDPhong, idLoaiPhong: IDLoaiPhong },
                    dataType: "json",
                    success: function(data) {
                         // Log the received data
                         console.log(data);

                         // Populate form fields with the received data
                         $("#TypeRoom").val(data.TenloaiPhong);
                         $("#UserName").val(data.Ho + ' ' + data.Ten);
                         $("#Email").val(data.Email);
                         $("#Phone").val(data.Sodt);
                         $("#Bill").val(data.Tonggia);
                         $("#Payment").val(data.PhuongthucTT);
                         $("#Day").val(data.Ngaydat);
                         $("#IDDatphong").val(data.IDDatphong);
                         $.ajax({
                              url: "./php/Get_RequestRoom_miniroom.php",
                              method: "GET",
                              data: { idLoaiPhong: IDLoaiPhong },
                              dataType: "json",
                              success: function(data) {
                                   var RoomName_list =  $('.RoomName_list');
                                   RoomName_list.empty();
                                   if(Array.isArray(data)){
                                        data.forEach(element => {
                                             console.log(element);
                                             var html = '<option data-id="'+element.IDPhong+'">'+element.Tenphong+'</option>';
                                             RoomName_list.append(html);
                                        });
                                   }else{
                                        console.log(data);
                                        var html = '<option data-id="'+data.IDPhong+'">'+data.Tenphong+'</option>';
                                        RoomName_list.append(html);
                                   }
                              },error: function(xhr, status, error) {
                                   console.log(xhr, status, error);
                              }
                         });
                    },
                    error: function(xhr, status, error) {
                         // Log the error details
                         console.log('XHR:', xhr);
                         console.log('Status:', status);
                         console.log('Error:', error);

                         // Alert the user about the error
                         alert("Lỗi: " + error);
                    }
               });
          });
          $('.checkRoom_Cancel_btn').click(function(){
               $('.CheckRoom.MiniContainer').removeClass('visible');
          });
     });


     </script>
</body>
</html>