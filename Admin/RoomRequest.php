<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Style-Type" content="text/css">
     <title>Request Management</title>
     <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
     <link rel="stylesheet" href="../css/Admin_main.css">
     <link rel="stylesheet" href="../css/Admin_Room.css">
     <link rel="stylesheet" href="../css/Slider.css">
     <!-- Sử dụng fontawsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
     <!-- Sử dụng swiper đơn giản  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
     <div class="Container Admin_Room">
          <!-- Phần header -->
          <!-- Được chia ra làm 3 phần bên trái, giữa và phải -->
          <!-- Phần trái, gồm các mục ở 2 bên -->
          <!-- Phần mid được sử dụng để làm logo-->
          <div class="header">
               <div class="head_container desktop">
                    <div class="head_left">
                         <ul>
                              <li><a href="#">Quản lý</a></li>
                              <li><a href="#">Yêu cầu</a></li>
                              <li><a href="#">Thành viên</a></li>
                         </ul>
                    </div>
                    <div class="head_mid">
                         <div class="head_logo"><a href="#"><img src="../img/LogoTNT.png" alt="" width="70px" height="70px"></a></div>
                    </div>
                    <div class="head_right">
                         <ul>
                              <li><a href="#">Thống kê số liệu</a></li>
                              <li><a href="#">Đăng nhập</a><span>/</span><a href="#">Đăng ký</a></li>
                         </ul>
                    </div>
               </div>
               <!-- Phần chỉnh header theo định dạng iphone 14 Pro Max  -->
               <div class="head_container phone">
                    <div class="head_left">
                         <div class="MiniMenu">
                              <div class="MiniMenu_button">
                                   <div class="ham-btn__burger"><i class="fa-solid fa-bars"></i></div>
                              </div>
                              <div id="test">
                                   <ul class="mini_nav" >
                                        <div class="MiniMenu_button exit">
                                             <div class="ham-btn__burger"><i class="fa-solid fa-xmark"></i></div>
                                        </div>
                                        <li><a href="#">Quản lý</a></li>
                                        <li><a href="#">Yêu cầu</a></li>
                                        <li><a href="#">Thành viên</a></li>
                                        <li><a href="#">Thống kê số liệu</a></li>
                                        <li>
                                             <a href="#">Đăng nhập</a>
                                        </li>
                                        <li>
                                             <a href="#">Đăng ký</a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    <div class="head_mid">
                         <div class="head_logo"><a href="#"><img src="../img/LogoTNT.png" alt="" width="100px" height="100px"></a></div>
                    </div>
                    <div class="head_right">
                    </div>
               </div>
               <!-- Phần script cho header -->
               <script src="../js/ultils.js"></script>
          </div>
          <!-- Phần body -->
          <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
          <div class="body">
               <!-- Phần chuyển đổi chung -->
               <div class="container RequestManagement">
                    <div class="Change">
                         <div class="EventChange Left" id="loadRoom">
                              <a href="#" class="title"><h2>Yêu cầu đặt phòng</h2></a>
                         </div>
                         <div class="EventChange Right">
                              <a href="#" class="title"><h2>Yêu cầu sự kiện</h2></a>
                         </div>
                    </div>
               </div>
               <!-- Thành phần chính -->
               <div class="Main_container" id="Admin_Main__content">
                    <!-- Thanh chọn loại phòng -->
                    <div class="TypeBar">
                         <div class="TypeCheck medium_btn">
                                   Tất cả
                                   <span class="fas fa-caret-down"></span>
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
                              <div class="Request">
                                   <div class="Img_Request">
                                        <img src="../img/phòng1.jpg">
                                   </div>
                                   <div class="Request_content">
                                        <h3>Loại phòng : <span class="lighter"> Deluxe Hướng Biển 2 Giường Đơn</span> </h3>
                                        <h3>Tên khách hàng : <span class="lighter">Nguyễn Hoàng Minh Tính</span></h3>
                                        <h3>Ngày đặt : <span class="lighter">Thứ 5, 18/04/2024</span></h3>
                                        <h3>Thành tiền : <span class="lighter">3.130.000 VND</span></h3>
                                        <h3>Phương thức thanh toán : <span class="lighter">Trực tuyến</span></h3>
                                        <div class="request BasicEdit">
                                             <div class="request Detail_btn">
                                                  <a href="#" class="btn">Chi tiết</a>
                                             </div>
                                             <div class="request Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- Form tạo thêm loại -->
          <div class="CheckRoom MiniContainer">
               <form class="CheckRoom MiniForm">
                    <h2>Chi tiết yêu cầu</h2>
                    <div class="CheckRoom_Top">
                         <div class="checkRoom Type">
                              <label for="">Loại phòng</label>
                              <input type="text" name="" id="">
                         </div>
                         <div class="checkRoom Name">
                              <label for="">Tên khách hàng</label>
                              <input type="text" name="" id="">
                         </div>
                         <div class="checkRoom Email">
                              <label for="">Email</label>
                              <input type="email" name="" id="">
                         </div>
                         <div class="checkRoom Phone">
                              <label for="">Số điện thoại</label>
                              <input type="text" name="" id="">
                         </div>
                         <div class="checkRoom Bill">
                              <label for="">Thành tiền (VND)</label>
                              <input type="text" name="" id="">
                         </div>
                         <div class="checkRoom Payment">
                              <label for="">Phương thức thanh toán</label>
                              <input type="text" name="" id="">
                         </div>
                         <div class="checkRoom day">
                              <label for="">Ngày đặt</label>
                              <input type="text" name="" id="">
                         </div>
                         <div class="checkRoom RoomNum">
                              <label for="">Sắp xếp phòng cho khách hàng</label>
                              <div class="select">
                                   Chọn phòng
                                   <span class="fas fa-caret-down"></span>
                                   <ul class="">
                                        <li>M101</li>
                                        <li>M102</li>
                                        <li>M103</li>
                                        <li>M104</li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    <div class="CheckRoom_bottom">
                         <div class="checkRoom idcheck">
                              <input type="checkbox" name="" id="idcheck">
                              <label for="idcheck">Tôi là người lưu trú</label>
                         </div>
                    </div>
                    <div class="CheckRoom_Confirm">
                         <div class="checkRoom_Cancel_btn">
                              <a href="#" class="btn">Huỷ bỏ</a>
                         </div>
                         <div class="checkRoom_confirm_btn">
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
     const DetailButton = document.querySelector('.request.Detail_btn');
     const RoomCancelButton = document.querySelector('.checkRoom_Cancel_btn')
     const CheckRoomForm = document.querySelector('.CheckRoom.MiniContainer');
     let CheckRoomOpen = false;
     DetailButton.addEventListener('click',() => {
          CheckRoomForm.classList.add('visible');
          CheckRoomOpen = true;
     });
     RoomCancelButton.addEventListener('click',() => {
          CheckRoomForm.classList.remove('visible');
          CheckRoomOpen = false;    
          });
     </script>
</body>
</html>