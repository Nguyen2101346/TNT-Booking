// document.addEventListener('scroll',() => {
//      const CreType_from = document.querySelector('.MiniContainer')

//      if(window.scrollY > 80){
//           CreType_from.classList.add('fixed');
//      }else{
//           CreType_from.classList.remove('fixed');
//      }
// })
// Phần xư lý thanh chuyển đổi web
const EventChangeLeft = document.querySelector('.EventChange.Left');
const EventChangeRight = document.querySelector('.EventChange.Right')
EventChangeLeft.addEventListener('click',() => {
     EventChangeLeft.querySelector('a').classList.add('click');
     EventChangeRight.querySelector('a').classList.remove('click');
}); 
EventChangeRight.addEventListener('click',() => {
     EventChangeRight.querySelector('a').classList.add('click');
     EventChangeLeft.querySelector('a').classList.remove('click');
});

// Phần xử lý thêm loại phòng
// Phần xử lý thêm phòng
// const CreRoom = document.querySelector('.AddRoom');
// const RoomCancelButton = document.querySelector('.MiniRoom_Cancel_btn')
// const CreRoomForm = document.querySelector('.MiniRoom.MiniContainer');
// let RoomOpen = false;
// CreRoom.addEventListener('click',() => {
//      CreRoomForm.classList.add('visible');
//      RoomOpen = true;
// });
// RoomCancelButton.addEventListener('click',() => {
//      CreRoomForm.classList.remove('visible');
//      RoomOpen = false;    
//      });