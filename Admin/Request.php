<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Style-Type" content="text/css">
     <title>Request Management</title>
     <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
     <link rel="stylesheet" href="./css/Admin_main.css">
     <link rel="stylesheet" href="./css/Admin_Request.css">
     <link rel="stylesheet" href="./css/Slider.css">
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
          <div class="body">
               <!-- Phần chuyển đổi chung -->
               <div class="container RequestManagement">
                    <div class="Change">
                         <div class="EventChange Left" id = "loadRoomRequest">
                              <a href="#" class="title"><h2>Yêu cầu đặt phòng</h2></a>
                         </div>
                         <div class="EventChange Right" id = "LoadEventRequest">
                              <a href="#" class="title"><h2>Yêu cầu sự kiện</h2></a>
                         </div>
                    </div>
               </div>
               <!-- Thành phần chính -->
               <div class="Main_container" id="Request__content">
               </div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <script src="../js/slider_swiper.js"></script>
     <script src="./js/Admin_Request.js"></script>
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