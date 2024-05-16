
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