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

