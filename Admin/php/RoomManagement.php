<!DOCTYPE html>
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
          <!-- Phần body -->
          <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
          <div class="body">
               <!-- Phần chuyển đổi chung -->
               
               <div class="" id="roomContent"></div>
               <!-- Thành phần chính -->
               <div class="Room_container" id="Admin_Room__content">
                    <!-- Thanh chọn loại phòng -->
                    <div class="TypeBar">
                         <div class="TypeCheck medium_btn">
                                   Chọn loại phòng
                                   <span class="fas fa-caret-down"></span>
                              <ul>
                                   <li><a href="#"> 1. Deluxe Hướng Biển 2 Giường Đơn</a></li>
                                   <li><a href="#"> 2. Deluxe Hướng Biển 2 Giường Đôi</a></li>
                                   <li><a href="#"> 3. Deluxe Hướng Biển Giường Đôi</a></li>
                              </ul>
                         </div>
                    </div>
                    <div class="Roomlist_Container" id="Room_List">
                         <div class="AddRoom">
                              <a href="#" class="btn"> Thêm phòng mới </a>
                         </div>
                         <div class="RoomList_Component">
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
                                                  <a href="#" class="btn">Hủy bỏ</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="MiniRoom">
                                   <div class="Img_MiniRoom">
                                        <img src="./img/phòng1.jpg">
                                   </div>
                                   <div class="MiniRoom_content">
                                        <h3>Tên phòng : M101</h3>
                                        <h3>Tầng : 1</h3>
                                        <h3>Ngày tạo : Thứ 4, 17/04/2024</h3>
                                        <div class="BasicEdit">
                                             <div class="Edit_btn">
                                                  <a href="#" class="btn">Chỉnh sửa</a>
                                             </div>
                                             <div class="Delet_btn">
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
          <div class="Creminiroom MiniContainer">
               <form class="Creminiroom MiniForm">
                    <h2>Thêm phòng mới</h2>
                    <a href="#" class="exit_btn"></a>
                    <div class="miniroom Name">
                         <label for="">Tên loại phòng</label>
                         <input type="text" name="" id="">
                    </div>
                    <div class="miniroom FloorNum">
                         <label for="">Số tầng</label>
                         <input type="number" name="" id="">
                    </div>
                    <div class="miniroom Day">
                         <label for="">Ngày tạo</label>
                         <input type="text" name="" id="">
                    </div>
                    <div class="MiniRoom_Confirm">
                         <div class="MiniRoom_Cancel_btn">
                              <a href="#" class="btn">Huỷ bỏ</a>
                         </div>
                         <div class="MiniRoom_confirm_btn">
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
    
     </script>
</body>
</html>