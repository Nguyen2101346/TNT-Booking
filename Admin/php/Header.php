<?php 
     if($change ==1 && isset($_GET['go']) && $_GET['go'] == 1){
          session_start();
     }
     if(isset($_SESSION['role']) && $_SESSION['role'] !== 1){
     }else{
          header('location:../Front_end/Login.php');
          exit;
     }
     
?>
<div class="header">
     <div class="head_container desktop">
          <div class="head_left">
               <ul>
                    <li><a href="index.php?page=Management<?php if($change == 1) echo '&go=1'?>" class="title">Quản lý</a></li>
                    <li><a href="index.php?page=Request<?php if($change == 1) echo '&go=1'?>" class="title">Yêu cầu</a></li>
                    <li><a href="index.php?page=Member<?php if($change == 1) echo '&go=1'?>" class="title">Thành viên</a></li>
               </ul>
          </div>
          <div class="head_mid">
               <div class="head_logo"><a href="#"><img src="./img/LogoTNT.png" alt=""></a></div>
          </div>
          <div class="head_right">
               <?php 
               if(isset($_GET['go']) && $_GET['go'] == 1){
                    $id = $_SESSION['userID'];
                    $sql = "SELECT * FROM taikhoan WHERE IDTaikhoan = $id";
                    $re = mysqli_query($conn,$sql);
                    $r = mysqli_fetch_array($re);
               }
               ?>
               <ul>
                    <li><a href="#" class="title">Thống kê </a></li>
                    <li><a href="index.php?page=Other<?php if($change == 1) echo '&go=1'?>" class="title"> Khác </a></li>
                    <li class="admin-id">
                         <a href = "#" class="title"><?= $r['Tendangnhap'] ?></a>
                         <span class="img-id"><img src="
                         <?php 
                         if (!isset($r['Avatar'])){
                              echo "./img/person.png";
                         }else{
                              echo "./img/" + $r['Avatar'];
                         }
                         ?>
                         " alt=""></span> 
                         <ul class="miniAdmin-menu">
                              <li class="mini-more"><a href="#">Thông tin</a></li>
                              <li class="mini-more"><a href="../Front_end/php_function/logout.php">Đăng xuất</a></li>
                         </ul>
                    </li>
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
                              <li><a href="#">Quản lý</a></li>
                              <li><a href="#">Yêu cầu</a></li>
                              <li><a href="#">Thành viên</a></li>
                              <li><a href="#">Thống kê số liệu</a></li>
                              <li>
                                   <a href="#">Đăng nhập</a>
                              </li>
                              <li>
                                   <a href="#">Đăng ký</a>
                              </li>
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
     <script>
     </script>
</div>