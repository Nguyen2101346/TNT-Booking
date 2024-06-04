<?php
     if(isset($_GET['id'])){
          $idroomtype = $_GET['id'];
     }
     $sql = "SELECT * 
     FROM Loaiphong 
     LEFT JOIN
     uudai ON loaiphong.IDLoaiphong = uudai.IDLoaiphong
     WHERE loaiphong.IDLoaiphong = $idroomtype";
     $re = mysqli_query($conn,$sql);
     $r = mysqli_fetch_array($re);
     $gia = $r['Gia'];
     $changenumber = number_format($gia, 0, ',', '.');
     // $changeColor = '';
     if($r['Nhangiam'] > 0){
          if($r['Donvi'] == 1){
               //$changeColor = 'red';
               $originPrice = "<p class='originPrice' data-originPrice='".$gia."'>".$changenumber." VNĐ</p>";
               $discount = "<p data-discount='".$r['Nhangiam'].":%'>Giảm: ".$r['Nhangiam']." %</p>";
               $total = $gia - ($gia * $r['Nhangiam'] / 100);
               $Totalformat = number_format($total, 0, ',', '.');
               $TotalformatText = "<p class='content'> ".$Totalformat." </p>";
          }else{
               //$changColor = 'red';
               $originPrice = "<p class='originPrice' data-originPrice='".$gia."'>".$changenumber."</p>";
               $discount = "<p data-discount='".$r['Nhangiam'].":VNĐ'>Giảm: ".$r['Nhangiam']." VNĐ</p>";
               $total = $gia - $r['Nhangiam'];
               $Totalformat= number_format($total, 0, ',', '.');
               $TotalformatText = "<p class='content'> ".$Totalformat." </p>";
          }
     }else{
     $discount = $r['Tieude'];
     $total = $gia;
     $Totalformat = $changenumber;
     $TotalformatText = "<p class='content'> ".$Totalformat." </p>";
     }
?>
     <div class="Payment_Container">
          <div class="headRoom_container">
               <div class="RoomDetail_container">
                    <div class="room">
                         <div class="img">
                              <div class="sale-icon">
                                   <img src="./img/sale_icon.png" alt="">
                              </div>
                              <img src="../Admin/img/<?= $r['AnhDD']?>" alt="">
                         </div>
                         <div class="content">
                              <div class="title large"><?= $r['Tenloaiphong']?></div>
                              <div class="general_infor">
                                   <div class="appraise">
                                        <div class="title rating">
                                             <span>
                                                  <i class="fa-solid fa-thumbs-up"></i>
                                             </span>
                                             <span>Đánh giá :</span>
                                                  <?php
                                                       // $re1 = get_averages($conn, $idroomtype); // Hàm để lấy bình luận từ cơ sở dữ liệu
                                                       // if(mysqli_num_rows($re1) > 0){
                                                       //      $r1 = mysqli_fetch_array($re1);
                                                       //      $average_rating = number_format(floor($r1['Trungbinh']),1);
                                                       $sql = "SELECT ROUND(AVG(Sosao)) AS Sosao FORM danhgia WHERE IDLoaiphong = $idroomtype";
                                                       $result = mysqli_query($conn,$sql);
                                                       if(mysqli_num_rows($result) > 0){
                                                            $re = mysqli_fetch_array($result);
                                                            $average_rating = number_format(floor($re['Sosao'],1))
                                                  ?>
                                             <div class="rating">
                                             <?php
                                                  for ($i = 1; $i <= 5; $i++) {
                                                       $selected = $i <= $average_rating ? 'selected' : '';
                                                       echo '<span class="star_display ' . $selected . '">&#9733;</span>';
                                                  }
                                             ?>
                                                  <!-- <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span>
                                                  <span class="star">&#9733;</span> -->
                                             </div>
                                             <p class="sale-display"><?= $average_rating ?> / 5.0</p>
                                             <?php
                                                  }
                                             ?>
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
                                             <div class="discountsale"> 
                                                  <?php 
                                                       echo $discount;
                                                       if(isset($r['Nhangiam']  ) && $r['Nhangiam'] > 0){
                                                       echo $originPrice;
                                                       }
                                                  ?> </div>
                                             <div class="title">Giá: <?= $TotalformatText ?> VND</div>
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


          let initSlider = function() {
          const imageList = document.querySelector(".slider_wrapper .img_list");
          const sliderButtons = document.querySelectorAll(".slider_wrapper .slide-button");
          const sliderScrollbar = document.querySelector(".container .slider_scrollbar");
          const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar_thumb");
          const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;


          scrollbarThumb.addEventListener("mousedown",(e)=>{
               const startX= e.clientX;
               const thumbPosition= scrollbarThumb.offsetLeft;

               // update position
               const handleMouseMove = (e)=>{
                    const deltaX= e.clientX - startX;
                    const newThumbPosition = thumbPosition + deltaX;
                    const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width -scrollbarThumb.offsetWidth;

                    const boundedPosition =Math.max(0,Math.min(maxThumbPosition,newThumbPosition))
                    const scrollPosition=(boundedPosition/maxThumbPosition) * maxScrollLeft;
                    scrollbarThumb.style.left=`${boundedPosition}px`;
                    imageList.scrollLeft=scrollPosition;
               }
               //remove event
               const handleMouseup =()=>{
                    document.removeEventListener("mousemove", handleMouseMove);
                    document.removeEventListener("mouseup", handleMouseup);
               }
               document.addEventListener("mousemove", handleMouseMove);
               document.addEventListener("mouseup", handleMouseup);
          })
          if (imageList.length === 0) {
               console.error("No image list found");
               return;
          }

          sliderButtons.forEach(button => {
               button.addEventListener("click", () => {
                    console.log(button);
                    const direction = button.id === "prev-slide" ? -1 : 1;
                    const scrollAmount = imageList.clientWidth * direction; // Change 'imageList' to 'imageList[0]'
                    imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
               })
          })

          const updateScrollThumPosition = () =>{
               const scrollPosition = imageList.scrollLeft;
               const thumbPosition = (scrollPosition/ maxScrollLeft) * (sliderScrollbar.clientWidth- scrollbarThumb.offsetWidth);
               scrollbarThumb.style.left= `${thumbPosition}px`;
          }
          imageList.addEventListener("scroll",()=>{
               updateScrollThumPosition();
          }
          )
          }

          window.addEventListener("load", initSlider);
     </script>