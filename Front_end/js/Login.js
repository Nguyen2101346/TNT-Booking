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
          function hashPassword(password) {
          return CryptoJS.SHA256(password).toString();
          }

          // Ví dụ sử dụng
          const password1 = 'bapbay12323';
          const hashedPassword = hashPassword(password1);
          console.log('Mật khẩu đã băm:', hashedPassword);  