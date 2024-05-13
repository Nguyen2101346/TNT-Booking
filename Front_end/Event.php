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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
     <div class="Container">
          <!-- Phần header -->
          <!-- Được chia ra làm 3 phần bên trái, giữa và phải -->
          <!-- Phần trái, gồm các mục ở 2 bên -->
          <!-- Phần mid được sử dụng để làm logo-->
          <?php 
               include "./php/Header.php"
          ?>
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
                         <div class="EventCard meeting" onclick="loadMeetingContent()">
                              <div class="Event_img">
                                   <img src="./img/anh (6).jpg" alt="">
                              </div>
                              <h2 class="title"> Hội họp & Hội nghị </h2>
                         </div>
                         <div class="EventCard wedding" onclick="loadWeddingContent()">
                              <div class="Event_img">
                                   <img src="./img/anh (1).jpg" alt="">
                              </div>
                              <h2 class="title"> Tiệc cưới </h2>
                         </div>
                         <div class="EventCard community " onclick="loadCommunityContent()">
                              <div class="Event_img">
                                   <img src="./img/anh (2).jpg" alt="">
                              </div>
                              <h2 class="title"> Sự kiện cộng đồng </h2>
                         </div>
                    </div>

                    <div class="Event_bottom" id="content">
                         <div class="Eventcontent">
                              <p class="Meeting">TNT Booking là thương hiệu dịch vụ du lịch nghỉ dưỡng lớn nhất Việt Nam, sở hữu chuỗi khách sạn, resort, spa cùng các trung tâm hội nghị, ẩm thực và sân Golf đẳng cấp 5 sao theo tiêu chuẩn quốc tế. Đặc biệt với 3 quần thể lớn gồm Nam Hội An, Nha Trang và Phú Quốc hội tụ các công trình vô tiền khoáng hậu từ nghỉ dưỡng, ẩm thực, vui chơi giải trí, mua sắm tới Hội họp & Hội nghị TNT Booking chuyên nghiệp hứa hẹn mang tới thế giới vạn trải nghiệm thỏa mãn mọi đối tượng khách hàng.</p>
                         </div>
                         <div class="request_btn">
                              <a href="#" class="large_btn">Gửi yêu cầu</a>
                         </div>
                    </div>
               </div>
               <!-- Meeting -->
               <div class="EventSlide_container" id="Request_Slide">
                    <div class="Event_Slide">
                         <div class="swiper mySwiper">
                              <div class="swiper-wrapper" id="0">
                                        <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                                        <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                              </div>    
                              <div class="swiper-button-next"></div>
                              <div class="swiper-button-prev"></div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="Request_container" id="Request_Form">
               <div class="RequestCard Meeting">
                    <h2> Khách hàng gửi yêu cầu </h2>
                    <span class="exit_btn"><i class="fa-solid fa-xmark"></i></span>
                    <form action="">
                         <div class="mainRequest">
                              <div class="company re">
                                   <label for="company">Công ty</label>
                                   <input type="text" name="company" id="" placeholder="Nhập tên công ty"> 
                              </div>
                              <div class="name re">
                                   <label for="">Tên khách hàng</label>
                                   <input type="text" name="name" placeholder="Nhập tên người yêu cầu (bắt buộc)" required = "required">
                              </div>
                              <div class="Email re">
                                   <label for="">Email</label>
                                   <input type="email" name="email" id="" placeholder="Nhập email người yêu cầu (bắt buộc)" required = "required">
                              </div>
                              <div class="phoneNum re">
                                   <label for="">Số điện thoại</label>
                                   <input type="text" name="phone" id="" placeholder="Nhập số điện thoại (bắt buộc)" required = "required">
                              </div>
                         </div>
                         <div class="note">
                              <label for="">Ghi chú</label>
                              <textarea name="" id="" cols="30" rows="10" value="Nhập những thông tin thêm" >
                              </textarea>
                              <p>(Địa điểm, mục đích, thời gian dự kiện và quy mô của sự kiện.)</p>
                         </div>
                         <div class="Submit_btn">
                              <a href="" class="large_btn">Gửi yêu cầu</a>
                         </div>
                    </form>
               </div>
          </div>
     </div>

































     <div id="hiddenMeetingContent" style="display:none;">
          <!-- Nội dung của trang Meeting -->
               <div class="Eventcontent">
                    <p class="Meeting">TNT Booking là thương hiệu dịch vụ du lịch nghỉ dưỡng lớn nhất Việt Nam, sở hữu chuỗi khách sạn, resort, spa cùng các trung tâm hội nghị, ẩm thực và sân Golf đẳng cấp 5 sao theo tiêu chuẩn quốc tế. Đặc biệt với 3 quần thể lớn gồm Nam Hội An, Nha Trang và Phú Quốc hội tụ các công trình vô tiền khoáng hậu từ nghỉ dưỡng, ẩm thực, vui chơi giải trí, mua sắm tới Hội họp & Hội nghị TNT Booking chuyên nghiệp hứa hẹn mang tới thế giới vạn trải nghiệm thỏa mãn mọi đối tượng khách hàng.</p>
               </div>
               <div class="request_btn">
                    <a href="#" class="large_btn" data-content="Meeting">Gửi yêu cầu</a>
               </div>
     </div>
     <div  id="hiddenMeetingForm" style="display:none;">
          <div class="RequestCard Meeting">
               <h2> Khách hàng gửi yêu cầu </h2>
               <span class="exit_btn"><i class="fa-solid fa-xmark"></i></span>
               <form action="">
                    <div class="mainRequest">
                         <div class="company re">
                              <label for="company">Công ty</label>
                              <input type="text" name="company" id="" placeholder="Nhập tên công ty"> 
                         </div>
                         <div class="name re">
                              <label for="">Tên khách hàng</label>
                              <input type="text" name="name" placeholder="Nhập tên người yêu cầu (bắt buộc)" required = "required">
                         </div>
                         <div class="Email re">
                              <label for="">Email</label>
                              <input type="email" name="email" id="" placeholder="Nhập email người yêu cầu (bắt buộc)" required = "required">
                         </div>
                         <div class="phoneNum re">
                              <label for="">Số điện thoại</label>
                              <input type="text" name="phone" id="" placeholder="Nhập số điện thoại (bắt buộc)" required = "required">
                         </div>
                    </div>
                    <div class="note">
                         <label for="">Ghi chú</label>
                         <textarea name="" id="" cols="30" rows="10" value="Nhập những thông tin thêm" >
                         </textarea>
                         <p>(Địa điểm, mục đích, thời gian dự kiện và quy mô của sự kiện.)</p>
                    </div>
                    <div class="Submit_btn">
                         <a href="" class="large_btn">Gửi yêu cầu</a>
                    </div>
               </form>
          </div>
     </div>
     <div id="MeetingSlide" style="display:none;"> 
          <!-- Slide Meeting -->
          <div class="Event_Slide">
               <div class="swiper mySwiper">
                    <div class="swiper-wrapper" id="1">
                              <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (8).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (9).jpg" alt=""></div>
                    </div>    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
               </div>
          </div>
     </div>

     <div id="hiddenWeddingContent" style="display:none;">
          <!-- Nội dung của trang Wedding -->
               <div class="Eventcontent">
                    <p class="Weeting">Hạnh phúc tròn đầy, bắt đầu từ tiệc cưới Vinpearl. Tiệc cưới Vinpearl luôn là sự lựa chọn hoàn hảo đồng hành cùng bạn trong những ngày trọng đại. Chúng tôi luôn hiểu rằng ngày chung đôi không chỉ là sự khởi đầu cho một hành trình hạnh phúc, mà còn là ngày ước mơ trở thành hiện thực, ngày mà mọi cô gái trên trái đất đều xứng đáng được hưởng.</p>
               </div>
               <div class="request_btn">
                    <a href="#" class="large_btn" data-content="Wedding">Gửi yêu cầu</a>
               </div>
     </div>
     <div  id="hiddenWeddingForm" style="display:none;">
          <div class="RequestCard Wedding">
               <h2> Khách hàng gửi yêu cầu </h2>
               <span class="exit_btn"><i class="fa-solid fa-xmark"></i></span>
               <form action="">
                    <div class="mainRequest">
                         <div class="company re">
                              <label for="company">Công ty</label>
                              <input type="text" name="company" id="" placeholder="Nhập tên công ty"> 
                         </div>
                         <div class="name re">
                              <label for="">Tên khách hàng</label>
                              <input type="text" name="name" placeholder="Nhập tên người yêu cầu (bắt buộc)" required = "required">
                         </div>
                         <div class="Email re">
                              <label for="">Email</label>
                              <input type="email" name="email" id="" placeholder="Nhập email người yêu cầu (bắt buộc)" required = "required">
                         </div>
                         <div class="phoneNum re">
                              <label for="">Số điện thoại</label>
                              <input type="text" name="phone" id="" placeholder="Nhập số điện thoại (bắt buộc)" required = "required">
                         </div>
                    </div>
                    <div class="note">
                         <label for="">Ghi chú</label>
                         <textarea name="" id="" cols="30" rows="10" value="Nhập những thông tin thêm" >
                         </textarea>
                         <p>(Địa điểm, mục đích, thời gian dự kiện và quy mô của sự kiện.)</p>
                    </div>
                    <div class="Submit_btn">
                         <a href="" class="large_btn">Gửi yêu cầu</a>
                    </div>
               </form>
          </div>
     </div>
     <div id="WeddingSlide" style="display:none;"> 
          <!-- Slide wedding -->
          <div class="Event_Slide">
               <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                              <div class="swiper-slide"><img src="./img/anh (12).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (12).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (12).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (12).jpg" alt=""></div>
                    </div>    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
               </div>
          </div>
     </div>


     <div id="hiddenCommunityContent" style="display:none;">
          <!-- Nội dung của trang Community -->
               <div class="Eventcontent">
                    <p class="Community">Vinpearl Convention Center là các trung tâm hội nghị có kiến trúc đương đại, trang thiết bị tối tân với không gian hội họp, sự kiện sang trọng đa chức năng, có sức chứa lên đến hàng nghìn người, có thể đáp ứng cả những yêu cầu khắt khe nhất.</p>
               </div>
               <div class="request_btn">
                    <a href="#" class="large_btn" data-content="Community">Gửi yêu cầu</a>
               </div>
     </div>
     <div  id="hiddenCommunityForm" style="display:none;">
          <div class="RequestCard Community">
               <h2> Khách hàng gửi yêu cầu </h2>
               <span class="exit_btn"><i class="fa-solid fa-xmark"></i></span>
               <form action="">
                    <div class="mainRequest">
                         <div class="company re">
                              <label for="company">Công ty</label>
                              <input type="text" name="company" id="" placeholder="Nhập tên công ty"> 
                         </div>
                         <div class="name re">
                              <label for="">Tên khách hàng</label>
                              <input type="text" name="name" placeholder="Nhập tên người yêu cầu (bắt buộc)" required = "required">
                         </div>
                         <div class="Email re">
                              <label for="">Email</label>
                              <input type="email" name="email" id="" placeholder="Nhập email người yêu cầu (bắt buộc)" required = "required">
                         </div>
                         <div class="phoneNum re">
                              <label for="">Số điện thoại</label>
                              <input type="text" name="phone" id="" placeholder="Nhập số điện thoại (bắt buộc)" required = "required">
                         </div>
                    </div>
                    <div class="note">
                         <label for="">Ghi chú</label>
                         <textarea name="" id="" cols="30" rows="10" value="Nhập những thông tin thêm" >
                         </textarea>
                         <p>(Địa điểm, mục đích, thời gian dự kiện và quy mô của sự kiện.)</p>
                    </div>
                    <div class="Submit_btn">
                         <a href="" class="large_btn">Gửi yêu cầu</a>
                    </div>
               </form>
          </div>
     </div>

     <div id="CommunitySlide" style="display:none;"> 
          <div class="Event_Slide">
               <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                              <div class="swiper-slide"><img src="./img/community.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (4).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/community.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (4).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (4).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/community.jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (4).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/anh (4).jpg" alt=""></div>
                              <div class="swiper-slide"><img src="./img/community.jpg" alt=""></div>
                    </div>    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
               </div>
          </div>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <script src="./js/Event.js"></script>
     <script src="./js/slider_swiper.js"></script>
</body>
</html>