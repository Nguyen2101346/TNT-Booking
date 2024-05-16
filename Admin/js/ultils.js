// Phần chuyển navbar scroll
document.addEventListener('scroll',() => {
     const header = document.querySelector('.header')

     if(window.scrollY > 100){
          header.classList.add('scrolled');
     }else{
          header.classList.remove('scrolled');
     }
})
// Phần chỉnh nút menu
const hamBtn = document.querySelector('.MiniMenu_button');
const exitBtn = document.querySelector('.MiniMenu_button.exit')
const mininav = document.querySelector('.mini_nav');
let hamOpen = false;
hamBtn.addEventListener('click',() => {
     mininav.classList.add('toggle');
     hamOpen = true;
});
exitBtn.addEventListener('click',() => {
     mininav.classList.remove('toggle');
     hamOpen = false;    
     }); 
// Phần chỉnh show thông tin admin
const userID = document.querySelector('.admin-id');
const AdminMenu = document.querySelector('.miniAdmin-menu')
let AdminOpen = false;
userID.addEventListener('click',() => {
     if(AdminOpen != true){
          AdminMenu.classList.add('active');
          AdminOpen = true;
     }else{
          AdminMenu.classList.remove('active');
          AdminOpen = false;
     }
});
