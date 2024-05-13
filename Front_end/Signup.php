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
     <script>
     document.addEventListener('DOMContentLoaded', function() {
          const signupForm = document.getElementById('signup-form');

          signupForm.addEventListener('submit', function(event) {
               event.preventDefault(); // Ngăn chặn hành vi mặc định của form

               // Lấy dữ liệu từ form
               const formData = new FormData(signupForm);
               // Gửi dữ liệu form bằng AJAX
               fetch(signupForm.action, {
                    method: 'POST',
                    body: formData
               })
               .then(response => response.json()) // Chuyển đổi kết quả nhận được thành JSON
               .then(data => {
                    // Xử lý kết quả nhận được
                    if (data.success) {
                         // Nếu thành công, hiển thị thông báo thành công và xóa dữ liệu trong form
                         const message = data.message;
                         document.getElementById('success_correct').textContent = "Đăng ký thành công";
                         document.getElementById('user-error').textContent = "";
                         document.getElementById('pass-error').textContent = "";
                         document.getElementById('confirm-error  ').textContent = "";
                         window.location.href = "Login.php"
                         // window.location.href = 'login_remake.php'; 
                    } else if (data.type === 'error') {
                         // Xử lý các loại lỗi khác nhau
                         const errorMessage = data.message;
                         if (errorMessage === 'password_too_short') {
                              // Hiển thị thông báo lỗi dưới password
                              document.getElementById('pass-error').textContent = "Mật khẩu quá ngắn !";
                              document.getElementById('user-error').textContent = "";
                              document.getElementById('confirm-error  ').textContent = "";
                         } else if (errorMessage === 'password_mismatch') {
                              // Hiển thị thông báo lỗi dưới password confirm
                              document.getElementById('confirm-error').textContent = "Mật khẩu nhập lại không khớp !";
                              document.getElementById('user-error').textContent = "";
                              document.getElementById('pass-error').textContent = "";
                         } else if (errorMessage === 'username_exists') {
                              // Hiển thị thông báo lỗi dưới username
                              document.getElementById('user-error').textContent = "Tên đăng nhập đã tồn tại !";
                              document.getElementById('pass-error').textContent = "";
                              document.getElementById('confirm-error  ').textContent = "";
                         } else {
                              document.getElementById('signup-error').textContent = "Có một vài lỗi nhỏ: " + errorMessage;
                         }
                    }
               })
               .catch(error => {
                    console.error('Error:', error);
               });
          });
          });
     </script>
</div>