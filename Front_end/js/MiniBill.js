
// document.addEventListener('DOMContentLoaded', function() {
//     let selectedRooms = [];
//     const limitRoom = parseInt(document.getElementById('limit_room').textContent);
//     const numRoomElement = document.getElementById('Numroom');
//     const totalPriceElement = document.getElementById('TotalPrice');
//     const continueButton = document.getElementById('continueButton');
//     const buttonContainer = document.getElementById('buttonContainer');

//     function chooseRoom(roomData) {
//         if (selectedRooms.length >= limitRoom) {
//             alert('Bạn đã chọn đủ số lượng phòng.');
//             return;
//         }

//         selectedRooms.push(roomData);
//         updateMiniBill();
//         updateNumRoom();
//         updateTotalPrice();
//     }

//     function updateMiniBill() {
//         const roomContainer = document.querySelector('.room_container');
//         roomContainer.innerHTML = ''; // Clear previous content

//         selectedRooms.forEach((room, index) => {
//             const roomMini = document.createElement('div');
//             roomMini.classList.add('roomMini');
//             roomMini.innerHTML = `
//                 <div class="RoomNum title">Phòng ${index + 1}</div>
//                 <div class="RoomTitle">${room.title}</div>
//                 <div class="RoomPrice">${room.priceFormatted} VND</div>
//                 <div class="RoomFix_btn">
//                     <a href="#" class="mini_btn" onclick="removeRoom(${index})">Chỉnh sửa</a>
//                 </div>
//             `;
//             roomContainer.appendChild(roomMini);
//         });
//     }

//     function updateNumRoom() {
//         numRoomElement.textContent = selectedRooms.length;
//     }

//     function updateTotalPrice() {
//         const totalPrice = selectedRooms.reduce((sum, room) => sum + room.price, 0);
//         totalPriceElement.textContent = 'Giá: ' + totalPrice.toLocaleString('vi-VN') + ' VND';
//     }

//     function removeRoom(index) {
//         selectedRooms.splice(index, 1);
//         updateMiniBill();
//         updateNumRoom();
//         updateTotalPrice();
//     }

//     document.querySelectorAll('.Choose_btn a').forEach(button => {
//         button.addEventListener('click', function(event) {
//             event.preventDefault();
//             const roomElement = this.closest('.room');
//             const roomData = {
//                 id: roomElement.getAttribute('data-id'),
//                 title: roomElement.querySelector('.title a').textContent,
//                 price: parseInt(roomElement.getAttribute('data-price')),
//                 priceFormatted: roomElement.querySelector('.prices_absolute .content').textContent
//             };
//             chooseRoom(roomData);
//         });
//     });

//     window.removeRoom = removeRoom;

//     continueButton.addEventListener('click', function(event) {
//         event.preventDefault();
//         if (selectedRooms.length === 0) {
//             alert("Bạn phải chọn ít nhất một phòng để tiếp tục.");
//             return;
//         }
//         // Chuyển sang trang Payment.php và ẩn nút "Tiếp tục"
//         const form = document.createElement('form');
//         form.method = 'POST';
//         form.action = 'index.php?page=Payment' + url;
//         if(change==1){
//             url += '&go=1';
//         }
//         selectedRooms.forEach((room, index) => {
//             const roomInput = document.createElement('input');
//             roomInput.type = 'hidden';
//             roomInput.name = `room${index}`;
//             roomInput.value = JSON.stringify(room);
//             form.appendChild(roomInput);
//         });
//         document.body.appendChild(form);
//         form.submit();
//     });
// });
