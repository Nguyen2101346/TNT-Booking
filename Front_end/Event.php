
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Meeting</title>
     <link rel="stylesheet" href="./css/main.css">
     <link rel="stylesheet" href="./css/banner.css">
     <link rel="stylesheet" href="./css/Event.css">
     <link rel="stylesheet" href="./css/Main_Slider.css">
     <link rel="stylesheet" href="./css/footer.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
     <div class="Container">
          <!-- Phần Banner -->
          <div class="Banner_Container Meeting">
               <img src="./img/banner2.jpg" alt="" class="">
               <div class="banner_Content">
                    <h1>Hội họp và sự kiện</h1><br>
                    <!-- <p>Hãy cùng khám phá các lựa chọn tuyệt vời và trải nghiệm dịch vụ tốt nhất của chúng tôi</p> -->
               </div>
          </div>
          <!-- Phần nội dung -->
          <div class="Event_container">
               <div class="Event content">
                    <div class="Event_top">
                         <?php 
                              $sql = "SELECT * FROM sukien";
                              $re = mysqli_query($conn,$sql);
                              while($r = mysqli_fetch_array($re)){
                         ?>
                              <div class="EventCard meeting">
                                   <div class="Event_img">
                                        <img src="./img/anh(6).jpg" alt="">
                                   </div>
                                   <h2 class="title"> <?= $r['Tensukien']?> </h2>
                              </div>
                         <?php          
                              }
                         ?>
                         <!-- <div class="EventCard meeting click">
                                   <div class="Event_img">
                                        <img src="./img/anh(6).jpg" alt="">
                                   </div>
                                   <h2 class="title"> Hội họp & Hội nghị </h2>
                              </div>
                         <div class="EventCard Wedding" >
                              <div class="Event_img">
                                   <img src="./img/anh (1).jpg" alt="">
                              </div>
                              <h2 class="title"> Tiệc cưới </h2>
                         </div>
                         <div class="EventCard Community ">
                              <div class="Event_img">
                                   <img src="./img/anh (2).jpg" alt="">
                              </div>
                              <h2 class="title"> Sự kiện cộng đồng </h2>
                         </div> -->
                    </div>
                    <div class="Event_bottom" id="content">
                    </div>
               </div>
               <!-- Meeting -->
               <div class="EventSlide_container">
                    <div class="Event_Slide">
                         <div class="swiper" id="Request_Slide">
                         </div>
                    </div>
               </div>
               <div class="Request_container" id="Request_Form">
               </div>
          </div>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
     <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
     <script src="./js/Event.js"></script>
     <!-- <script src="./js/slider_swiper.js"></script> -->
     <script>
     </script>
</body>
</html>