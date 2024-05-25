<?php
     include "func.php";
     if(isset($_GET['id'])){
          $idroomtype = $_GET['id'];
     }
     $sql = "SELECT * FROM Loaiphong WHERE IDLoaiphong = $idroomtype";
     $re = mysqli_query($conn,$sql);
     $r = mysqli_fetch_array($re);
     $gia = $r['Gia'];
     $changenumber = number_format($gia, 0, ',', '.');
?>
     <div class="Payment_Container">
          <div class="headRoom_container">
               <div class="RoomDetail_container">
                    <div class="room">
                         <div class="img">
                              <div class="sale-icon">
                                   <img src="./img/sale_icon.png" alt="">
                              </div>
                              <img src="./img/<?= $r['AnhDD']?>" alt="">
                         </div>
                         <div class="content">
                              <div class="title large"><a href="#"><?= $r['Tenloaiphong']?></a></div>
                              <div class="general_infor">
                                   <div class="appraise">
                                        <div class="title">
                                             <span>
                                                  <i class="fa-solid fa-thumbs-up"></i>
                                             </span>
                                             <span>Đánh giá :</span>
                                             <div class="rating">
                                                  <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span>
                                             </div>
                                             <p id="result" class="sale"></p>
                                        </div>
                                   </div>
                                   <div class="title">
                                        <span>
                                             <i class="fa-solid fa-house-signal"></i>
                                        </span>
                                        <?php
                                             $rooms = mysqli_num_rows(check_rooms($conn, $idroomtype));
                                        ?>
                                        <span>Tình trạng : còn <?php echo $rooms?> phòng</span>
                                   </div>
                                   <div class="title">
                                        <span>
                                             <i class="fa-solid fa-user"></i>
                                        </span>
                                        <span>Số người : <?= $r['Songuoi']?> người</span>
                                   </div>
                                   <div class="title">
                                        <span>
                                             <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </span>
                                        <span>Diện tích : <?=$r['Dientich']?> m&sup2</span>
                                   </div>
                              </div>
                              <div class="absolute">
                                   <div class="prices">
                                        <?php
                                             $discount = mysqli_fetch_array(check_discount($conn, $idroomtype));
                                        ?>
                                        <div class="discountsale"> <?php if(isset($discount['Nhangiam']) && $discount['Nhangiam']!=""){
                                             if(isset($discount['Donvi']) && $discount['Donvi']==0){echo "Giảm:".$discount['Nhangiam']."%";}else{echo "Giảm:".$discount['Nhangiam']."VNĐ";}
                                             }?> </div>
                                        <div class="title">Giá: <?= $changenumber?> VND</div>
                                   </div>
                                   <div class="Get_btn">
                                        <a href="#" class="medium_btn" onclick="chooseRoom(0)">Đặt ngay</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div> 
          <div class="bodyRoom_container">
               <div class="InfoRoom_container">
                    <div class="description content">
                         <h3 class="title">
                              <span><i></i></span>
                              Mô tả :
                         </h3>
                         <div class="description_content">
                              <p><?= $r['Mota']?></p>
                         </div>
                    </div>
                    <div class="Convenience content">
                         <div class="convenience title">
                              <h3>
                              <span>
                                   <img src="./img/leaf_convenience.jpg" alt="">
                              </span>
                              Tiện ích
                              </h3>
                         </div>
                         <div class="convenience_component">
                              <ul>
                                   <?php
                                        $check_uti=check_utilities($conn, $idroomtype);
                                        if(mysqli_num_rows($check_uti) > 0){
                                             while($r = mysqli_fetch_array($check_uti)){
                                   ?>
                                   <li><a href="#"><?= $r['Tienich']?></a></li>
                                   <?php
                                             }
                                        }else{
                                             echo "không có tiện ích";
                                        }
                                   ?>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
          <!-- Script phần body -->
          <!-- Phần slider -->
          <div class="RoomSlider_container">
               <?php 
                    include "./php/Room_slider.php"
               ?>
          </div>
          <?php 
               include "./php/comment.php"
          ?>
     </div>
     <script src="./js/Ratings.js"></script>
     <script>
          document.addEventListener("DOMContentLoaded", function() {
               var discounts = document.querySelectorAll('.discountsale');
               discounts.forEach(function(discount) {
               var imgWrapper = discount.closest('.room').querySelector('.img');
               var saleIcon = document.createElement('div');
               saleIcon.classList.add('sale-icon');
               if (discount.textContent.trim() !== '') {
                    imgWrapper.insertBefore(saleIcon, imgWrapper.firstChild);
               } else {
                    imgWrapper.removeChild(imgWrapper.querySelector('.sale-icon'));
               }
               });
          });
     </script>