<?php
    include 'conn.php';
    include 'func.php';
    if(session_status()==PHP_SESSION_NONE){
     session_start();
     ob_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <title></title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="./css/main.css" rel="stylesheet">
          <link rel="stylesheet" href="./css/LogIn.css">
          <link rel="stylesheet" href="./css/main.css">
          <!-- Sử dụng fontawsome -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     </head>
     <body>
          <div class="Login_container">
               <div class="background">
                    <div class="Card">
                         <div class="card_head">
                              <div class="head_logo"><a href="#"><img src="./img/LogoTNT.png" alt="" width="70px" height="70px"></a></div>
                         </div>
                         <?php
                              $action = isset($_GET['action']) ? $_GET['action'] : '';
                                   $txt_err = "";
                                   $txt_cor = "";
                              if(isset($_POST["login"]) && $_POST["login"]){
                                   $u = $_POST["username"];
                                   $p = $_POST["password"];
                                   $re = check_account($conn, $u);
                                   if ($re) {
                                        if (mysqli_num_rows($re) > 0) {
                                             // Lấy thông tin của người dùng từ kết quả truy vấn
                                             $user = mysqli_fetch_assoc($re);
                                             // Xác thực mật khẩu
                                             if ($user["Matkhau"] == md5($p)) { 
                                                 // Mật khẩu hợp lệ, đăng nhập thành công
                                                 $txt_cor = "Đăng nhập thành công!";
                                                 $_SESSION["username"] = $user["Tendangnhap"];
                                                 $_SESSION["role"] = $user["Quyen"];
                                                 $_SESSION["userID"] = $user["IDTaikhoan"];
                                                 header("location:index.php?go=1"); // Chuyển hướng đến trang chính sau khi đăng nhập thành công
                                                 exit(); // Kết thúc script để ngăn việc tiếp tục thực thi sau khi đã chuyển hướng
                                             } else {
                                                 // Mật khẩu không hợp lệ
                                                 $txt_err = "Mật khẩu hoặc tài khoản không đúng!";
                                             }
                                        } else {
                                             // Người dùng không tồn tại
                                             $txt_err = "Mật khẩu hoặc tài khoản không đúng!";
                                        }
                                        mysqli_free_result($re);
                                   } else {
                                        // Xử lý trường hợp truy vấn không thành công
                                        echo "Error: " . mysqli_error($conn);
                                   }
                              }  
                         ?>
                         <div class="card_Login">
                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="visible" method="post">
                              <!-- <form action="login_remake.php?action=login" class="visible" method="post"> -->
                                   <h2>Đăng nhập</h2>
                                   <div class="username text">
                                        <input type="text" name="username" id="login-username" required="required">
                                        <span>Tên Đăng nhập</span>
                                   </div>
                                   <div class="pass text">
                                        <input type="password" name="password" id="login-pass" required="required" class="password">
                                        <span>Mật khẩu</span>
                                        <i class="fa-solid fa-eye passhow login"></i>
                                   </div>
                                   <div class="Login_btn">
                                        <input type="submit" name="login" class="medium_btn" value="Đăng nhập" id="login-btn" >
                                   </div>
                                   <div class="alert_box">
                                   <?php
                                        if(isset($txt_err) && ($txt_err == 'Mật khẩu hoặc tài khoản không đúng!')){
                                             echo "<div class='error-p'>
                                                       <div class='content'>".$txt_err."</div>
                                                  </div>";
                                        }
                                        if(isset($txt_cor) && ($txt_cor == 'Đăng nhập thành công!')){
                                             echo "<div class='correct-p'>
                                                       <div class='content'>Đăng nhập thành công</div>
                                                  </div>";
                                        }
                                   ?>
                                        <!-- <div class="error-p">
                                             <div class="content">Mật khẩu hoặc tài khoản không đúng!</div>
                                        </div> -->
                                        <!-- <div class="correct-p">
                                             <div class="content">Đăng nhập thành công</div>
                                        </div> -->
                                   </div>
                              </form>
                         </div>
                         <?php 
                              include "Signup.php"
                         ?>
                         <div class="card_footer">
                              <div class="content">
                                   Bằng việc đăng nhập, tôi đồng ý với Vinpearl về <br>
                                   <a href="#">Điều kiện điều khoản</a> và <a href="#">Chính sách bảo mật</a>
                              </div>
                              <div class="change">
                                   <div class="login-change">
                                        Chưa có tài khoản? <a href="#" id="SignUp-link"> Đăng ký ngay</a>
                                   </div>
                                   <div class="signup-change">
                                        Đã có tài khoản? <a href="#" id="Login-link"> Đăng nhập ngay</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <script src="https://apis.google.com/js/api.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
          <script src="./js/Login.js"></script>
          <script>
          document.addEventListener('DOMContentLoaded', function() {
          const urlParams = new URLSearchParams(window.location.search);
          const from = urlParams.get('from');

          if (from === 'signup') {
               // Thực hiện các thao tác JavaScript tương ứng khi chuyển từ trang Đăng ký
               const SignUpChange = document.querySelector('.signup-change');
               const LoginChange = document.querySelector('.login-change');
               const SignUpCard = document.querySelector('.card_SignUp');
               const LoginCard = document.querySelector('.card_Login');

               SignUpCard.classList.add('open');
               SignUpCard.querySelector('form').classList.add('visible');
               LoginCard.classList.add('close');
               LoginCard.querySelector('form').classList.remove('visible');
               SignUpChange.classList.add('show');
               LoginChange.classList.add('close');
          }
          });

          </script>
     </body>
</html>