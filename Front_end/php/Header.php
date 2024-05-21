<?php 
if ($change == 1 && session_status() == PHP_SESSION_NONE){
     session_start();
}
?>

<div class="header">
    <div class="head_container desktop">
         <div class="head_left">
              <ul>
                   <li><a href="index.php?page=Home<?php if($change == 1) echo '&go=1'?>" class="title">Trang chủ</a></li>
                   <li><a href="index.php?page=Sale<?php if($change == 1) echo '&go=1'?>" class="title">Đặt phòng</a></li>
                   <li><a href="index.php?page=Event<?php if($change == 1) echo '&go=1'?>" class="title">Hội họp</a></li>
              </ul>
         </div>
         <div class="head_mid">
              <div class="head_logo"><a href="index.php?page=Home<?php if($change == 1) echo '&go=1'?>"><img src="./img/LogoTNT.png" alt="" width="100px" height="100px"></a></div>
         </div>
         <div class="head_right">
              <ul>
                   <li><a href="#" class="title">Ưu đãi khuyến mãi</a></li>
                   <?php 
                    if (!isset($_SESSION['userID'])){
                    ?>
                    <li><a href="Login.php" class="title">Đăng nhập</a><span>
                    /</span><a href="Login.php?from=signup" class="title">Đăng ký</a>
                    </li>
                    <?php
                    }else{
                         $sql = "SELECT Tendangnhap,Avatar
                              FROM taikhoan
                              WHERE IDTaikhoan = ".$_SESSION['userID']." ";
                         $re = mysqli_query($conn,$sql);
                         $r = mysqli_fetch_array($re);
                    ?>
                    <!-- Phần sau khi đăng nhập -->
                         <li class="Member-id">
                              <a href = "#" class="user-id title">Hi, 
                              <?php
                              if(isset($r['Hoten'])){
                                   echo $r['Hoten'];
                               } else {
                                   echo $_SESSION['username'];
                               }
                              ?></a>
                              <span class="img-id"><img src="<?php if(isset($r['Avatar']) && $r['Avatar']!=""){echo './img_members/'.$r['Avatar'].'';}else{echo './img/person.png';}?>" alt=""></span> 
                              <ul class="miniMember-menu">
                                   <li><a href="index.php?page=Information<?php if($change == 1) echo '&go=1'?>" class="title">Thông tin</a></li>
                                   <li class="Anounce"><a href="index.php?page=History<?php if($change == 1) echo '&go=1'?>" class="title">Đơn hàng <span class = "red_mark"></span></a></li>
                                   <li><a href="./php_function/logout.php" class="title">Đăng xuất</a></li>
                              </ul>
                         </li>
                    <?php
                    }
                    ?> 
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
                             <li><a href="#">Trang chủ</a></li>
                             <li><a href="#">Đặt phòng</a></li>
                             <li><a href="#">Hội họp</a></li>
                             <li><a href="#">Ưu đãi khuyến mãi</a></li>
                             <li>
                                  <a href="#">Đăng nhập</a>
                             </li>
                             <li>
                                  <a href="#">Đăng ký</a>
                             </li>

                             <!-- Phần sau khi đăng nhập -->
                             <!-- <li class="admin-id">
                                <a href = "#">Admin001</a>
                                <span class="img-id"><img src="" alt=""></span> 
                                <ul class="miniAdmin-menu">
                                     <li><a href="#">Thông tin</a></li>
                                     <li><a href="#">Đăng xuất</a></li>
                                </ul>
                            </li> -->
                        </ul>
                   </div>
              </div>
         </div>
         <div class="head_mid">
              <div class="head_logo"><a href="#"><img src="./img/LogoTNT.png" alt="" width="100px" height="100px"></a></div>
         </div>
         <div class="head_right">
         </div>
    </div>
    <!-- Phần script cho header -->
    <script type="module" src="./js/ultils.js"></script>
</div>