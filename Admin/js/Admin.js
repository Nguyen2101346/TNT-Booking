document.addEventListener('scroll',() => {
     const CreType_from = document.querySelector('.MiniContainer')

     if(window.scrollY > 80){
          CreType_from.classList.add('fixed');
     }else{
          CreType_from.classList.remove('fixed');
     }
})
// Phần xư lý thanh chuyển đổi web
const EventChangeLeft = document.querySelector('.EventChange.Left');
const EventChangeRight = document.querySelector('.EventChange.Right')
EventChangeLeft.addEventListener('click',() => {
     EventChangeLeft.classList.add('click');
     EventChangeRight.classList.remove('click');
}); 
EventChangeRight.addEventListener('click',() => {
     EventChangeRight.classList.add('click');
     EventChangeLeft.classList.remove('click');
});

// Phần xử lý thêm loại phòng
const CreType = document.querySelector('.CreType');
const CancelButton = document.querySelector('.Cancel_btn')
const CreTypeForm = document.querySelector('.CreType.MiniContainer');
let TypeOpen = false;
CreType.addEventListener('click',() => {
     CreTypeForm.classList.add('visible');
     TypeOpen = true;
});
CancelButton.addEventListener('click',() => {
     CreTypeForm.classList.remove('visible');
     TypeOpen = false;    
     }); 
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