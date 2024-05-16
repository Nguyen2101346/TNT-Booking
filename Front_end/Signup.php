<div class="card_SignUp">
     <form action="signup_process.php" method="post" id="signup-form">
          <h2>Đăng ký</h2>
          <div class="username text">
               <input type="text" name="re_username" id="signup-username" placeholder="Tên đăng nhập" required="required">
               <div class='error-p'>
                         <p class='content' id="user-error"></p>
               </div>
               <!-- <div class="error-p">
                    <p class="content"> Tài khoản đã tồn tại ! </p>
               </div> -->
               <!-- <span>Tên Đăng nhập</span> -->
          </div>
          <div class="pass text"> 
               <input type="password" name="re_password" id="signup-pass" placeholder="Mật khẩu"required="required">
               <i class="fa-solid fa-eye passhow signup"></i>
               <div class='error-p'>
                         <p class='content' id="pass-error"></p>
               </div>
               <!-- <div class="error-p">
                    <p class="content"> Mật khẩu quá ngắn ! </p>
               </div> -->
               <!-- <span>Mật khẩu</span> -->
          </div>
          <div class="pass text">
               <input type="password" name="rre_password" id="signup-confirm" placeholder="Nhập lại mật khẩu" required="required">
               <i class="fa-solid fa-eye passhow confirm"></i>
               <!-- <span>Nhập lại mật khẩu</span> -->
               <div class='error-p'>
                         <p class='content' id="confirm-error"></p>
               </div>
               <!-- <div class="error-p">
                    <p class="content"> Hãy nhập lại cho đúng ! </p>
               </div> -->
          </div>
          <div class="SignUp_btn">
               <input type="submit" name="register" class="medium_btn" value="Đăng Ký" id="signup-btn">
          </div>
          <div class="alert_box">
               <?php
                    // if(isset($txt_cor) && ($txt_cor == 'Đăng ký thành công')){
                    //      echo "<div class='correct-p'>
                    //                <div class='content'>".$txt_cor."</div>
                    //           </div>";
                    // }
               ?>
               <div class="correct-p">
                    <div class="content" id="success_correct" ></div>
               </div>
               <div class='error-p'>
                         <p class='content' id="signup-error"></p>
               </div>
               <!-- <div class="correct-p">
                    <div class="content">Đăng ký thành công</div>
               </div> -->
          </div>
     </form>
     
     </script>
</div>