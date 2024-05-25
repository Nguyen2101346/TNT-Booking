<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../php_func/conn.php";
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
               <!-- <div class="MiniRoom">
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
               </div> -->
               
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
<!-- <script src="../js/slider_swiper.js"></script> -->
<!-- <script src="../js/Admin.js"></script> -->
<script>

</script>