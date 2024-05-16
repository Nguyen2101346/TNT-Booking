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
                                   <li><a href="#">Hội họp</a></li>
                                   <li><a href="#">Tiệc cưới</a></li>
                                   <li><a href="#">Sự kiện Cộng đồng</a></li>
                              </ul>
                         </div>
                         <!-- <div class="MemberSearch">
                            <input type="search" name="" id="" placeholder="Để trống để tìm theo thứ tự">
                            <input type="submit" value="">
                            <span class="fa-solid fa-magnifying-glass"></span>
                         </div> -->
                    </div>
                    <div class="Event_Request_Container" id="Request_Event">
                         <div class="Request_Component">
                              <div class="Request">
                                   <div class="Img_Request">
                                        <img src="../img/phòng1.jpg">
                                   </div> 
                                   <div class="Request_content">
                                        <h3>Tên khách hàng: <span class="lighter"> Đoàn Huy Thiện </span> </h3>
                                        <h3>Số điện thoại: <span class="lighter">10509</span></h3>
                                        <h3>Email: <span class="lighter">TNT@gmail.com</span></h3>
                                        <h3>Công ty: <span class="lighter">Không có</span></h3>
                                        <h3>Ngày đặt: <span class="lighter">Thứ năm, 18/04/2024</span></h3>
                                        <div class="request BasicEdit">
                                            <div class="request Agree_btn">
                                                <a href="#" class="btn">Đồng ý</a>
                                             </div>
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
          <div class="CheckEvent MiniContainer">
               <form class="CheckEvent MiniForm">
                    <h2>Chi tiết yêu cầu</h2>
                    <div class="CheckEvent_Top">
                        <div class="checkEvent Company">
                            <label for="">Công ty</label>
                            <input type="text" name="" id="">
                        </div>
                         <div class="checkEvent Name">
                              <label for="">Tên khách hàng</label>
                              <input type="text" name="" id="">
                         </div>
                         <div class="checkEvent Email">
                              <label for="">Email</label>
                              <input type="email" name="" id="">
                         </div>
                         <div class="checkEvent Phone">
                              <label for="">Số điện thoại</label>
                              <input type="text" name="" id="">
                         </div>
                    </div>
                    <div class="CheckEvent_bottom">
                         <div class="checkEvent note">
                              <label for="note">Ghi chú</label>
                              <textarea name="" id="" cols="30" rows="10" value="Nhập những thông tin thêm" >
                              </textarea>
                         </div>
                    </div>
                    <div class="CheckEvent_Confirm">
                         <div class="checkEvent_confirm_btn">
                              <a href="#" class="btn">Xác nhận</a>
                         </div>
                         <!-- <div class="checkEvent_confirm_btn">
                              <input type="submit" name="confirm" id="" value="Xác nhận" class="btn"> 
                         </div> -->
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
     const EventCancelButton = document.querySelector('.checkEvent_confirm_btn')
     const CheckEventForm = document.querySelector('.CheckEvent.MiniContainer');
     let CheckEventOpen = false;
     DetailButton.addEventListener('click',() => {
        CheckEventForm.classList.add('visible');
          CheckEventForm = true;
     });
     EventCancelButton.addEventListener('click',() => {
        CheckEventForm.classList.remove('visible');
          CheckEventForm = false;    
          });
     </script>
</body>
</html>