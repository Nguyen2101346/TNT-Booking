          const SignUpLink = document.querySelector('#SignUp-link');
          const LoginLink = document.querySelector('#Login-link')
          const SignUpChange = document.querySelector('.signup-change');
          const LoginChange = document.querySelector('.login-change');
          const SignUpCard = document.querySelector('.card_SignUp');
          const LoginCard = document.querySelector('.card_Login');
          let Signup = false;
          SignUpLink.addEventListener('click', () => {
               SignUpCard.classList.add('open');
               SignUpCard.querySelector('form').classList.add('visible');
               LoginCard.classList.add('close');
               LoginCard.querySelector('form').classList.remove('visible');
               SignUpChange.classList.add('show');
               LoginChange.classList.add('close');
               Signup = true;
               });

          LoginLink.addEventListener('click', () => {
               SignUpCard.classList.remove('open');
               SignUpCard.querySelector('form').classList.remove('visible');
               LoginCard.classList.remove('close');
               LoginCard.querySelector('form').classList.add('visible');
               SignUpChange.classList.remove('show');
               LoginChange.classList.remove('close');
               Signup = false;    
               });
          document.addEventListener('DOMContentLoaded', function() {
               const signUpCard = document.querySelector('.card_SignUp');
               if (signUpCard) {
                    if (signUpCard.classList.contains('open')) {
                         signUpCard.querySelector('input').blur(); // Loại bỏ focus khỏi trường nhập liệu
                    }
               }
               });



          const Login_eyechange = document.querySelector('.passhow.login');
          const password = document.querySelector('#login-pass');
          const Signup_eyechange = document.querySelector('.passhow.signup');
          const Signup_password = document.querySelector('#signup-pass');
          const Confirm_eyechange = document.querySelector('.passhow.confirm');
          const Confirm_password = document.querySelector('#signup-confirm');
          let passShow = false;
          Login_eyechange.addEventListener('click', () =>{
               if(passShow != true){
                    Login_eyechange.classList.remove('fa-eye');
                    Login_eyechange.classList.add('fa-eye-slash');
                    password.setAttribute( 'type', 'text' );
                    passShow = true;
               }else{
                    Login_eyechange.classList.remove('fa-eye-slash');
                    Login_eyechange.classList.add('fa-eye');
                    password.setAttribute( 'type', 'password' );
                    passShow = false;
               }
          })
          Signup_eyechange.addEventListener('click', () =>{
               if(passShow != true){
                    Signup_eyechange.classList.remove('fa-eye');
                    Signup_eyechange.classList.add('fa-eye-slash');
                    Signup_password.setAttribute( 'type', 'text' );
                    passShow = true;
               }else{
                    Signup_eyechange.classList.remove('fa-eye-slash');
                    Signup_eyechange.classList.add('fa-eye');
                    Signup_password.setAttribute( 'type', 'password' );
                    passShow = false;
               }
          })
          Confirm_eyechange.addEventListener('click', () =>{
               if(passShow != true){
                    Confirm_eyechange.classList.remove('fa-eye');
                    Confirm_eyechange.classList.add('fa-eye-slash');
                    Confirm_password.setAttribute( 'type', 'text' );
                    passShow = true;
               }else{
                    Confirm_eyechange.classList.remove('fa-eye-slash');
                    Confirm_eyechange.classList.add('fa-eye');
                    Confirm_password.setAttribute( 'type', 'password' );
                    passShow = false;
               }
          }) 


          // 
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
                              location.reload();
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
                                   document.getElementById('confirm-error').textContent = "";
                              } else if (errorMessage === 'username_too_long') {
                                   // Hiển thị thông báo lỗi dưới username
                                   document.getElementById('user-error').textContent = "Tên đăng nhập quá dài !";
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