
// ------------------------------   CHỈNH PHẦN SCROLL    -----------------------------------------------------//
// document.addEventListener('scroll',() => {
//      const header = document.querySelector('.SearchBar_container')

//      if(window.scrollY > 80){
//           header.classList.add('scrolled');
//      }else{
//           header.classList.remove('scrolled');
//      }
// })

// ------------------------------   CHỈNH THÀNH PHẦN    ------------------------------------------------------//
// Nút mở calander trên phần tìm kiểm
const GetDate = document.querySelector('#GetDate');
const Calander = document.querySelector('.Calander');
let CalOpen = false;
GetDate.addEventListener('click',() => {
     if(!CalOpen == true){
          Calander.classList.add('toggle');
          CalOpen = true;
     }else{
          Calander.classList.remove('toggle');
          CalOpen = false;
     }
});

// Phần Calander
$(function() {
     $("#start_date").datepicker({
         dateFormat: 'dd/mm/yy',
         minDate: 0,
         onSelect: function(selectedDate) {
             $("#end_date").datepicker("option", "minDate", selectedDate);
             $("#start").text(selectedDate.replace(/-/g, '/'));
             displayStartDayOfWeek(selectedDate,'.timeShow_Start');
         }
     });

     
     $("#end_date").datepicker({
     dateFormat: 'dd/mm/yy',
     minDate:0,
     onSelect: function(selectedDate) {
          $("#start_date").datepicker("option", "maxDate", selectedDate);
          $("#end").text(selectedDate.replace(/-/g, '/'));
          displayEndDayOfWeek(selectedDate,'.timeShow_End');
     }
     });
});



// Phần Table số phòng và số người
var roomQuantity = 1;
var adultsQuantity = 1;

const Booking = document.querySelector('#booking')
const Table = document.querySelector('#booking-table')
let TabShow = false;
     Booking.addEventListener('click', () =>{
          if(!TabShow == true){
               Table.classList.add('open');
               TabShow = true;
          }else
          {
               Table.classList.remove('open');
               TabShow = false;
          }
     })

function incrementRoom() {
          roomQuantity++;
          updateRooms();
          document.getElementById("room_num").textContent = roomQuantity;
          updateAdults();
     }
     function decrementRoom() {
          if (roomQuantity > 1) {
               roomQuantity--;
               updateRooms();
               document.getElementById("room_num").textContent = roomQuantity;
               updateAdults();
          }
     }

     function incrementQuantity(element) {
          var quantityElement = element.previousElementSibling;
          var currentQuantity = parseInt(quantityElement.textContent);
          currentQuantity++;
          quantityElement.textContent = currentQuantity;
          updateAdults();
     }
     function decrementQuantity(element) {
          var quantityElement = element.nextElementSibling;
          var currentQuantity = parseInt(quantityElement.textContent);
          if (currentQuantity > 0) {
               currentQuantity--;
               quantityElement.textContent = currentQuantity;
               updateAdults();
          }
     }

     function updateRooms() {
          var bookingContainer = document.getElementById("booking-info");
          bookingContainer.innerHTML = '';
          for (var i = 1; i <= roomQuantity; i++) {
               var roomDiv = document.createElement("div");
               roomDiv.className = "room-container";
               roomDiv.innerHTML = '<h3>Phòng ' + i + '</h3>' +
                                   '<div class="content">' +
                                   '<label>Số lượng người:</label>' +
                                   '<div class="quantity_contain">' +
                                   '<button class="quantity-control" onclick="decrementQuantity(this)">-</button>' +
                                   '<span class="quantity adults" data-type="adults">1</span>' +
                                   '<button class="quantity-control" onclick="incrementQuantity(this)">+</button>' +
                                   '</div>' + '</div>';
               bookingContainer.appendChild(roomDiv);
               document.getElementById("room-quantity").textContent = roomQuantity;
               if(document.getElementById('limit_room')){
                    document.getElementById('limit_room').innerText = roomQuantity;
               }
          }
          updateAdults();
     }

     function updateAdults() {
          var totalAdults = 0;
          var quantityElements = document.querySelectorAll('.quantity[data-type="adults"]');
          quantityElements.forEach(function(element) {
               totalAdults += parseInt(element.textContent);
          });
          document.getElementById("adults_num").textContent = totalAdults;
     }

     // Khởi tạo phòng ban đầu
     updateRooms();   

     //  Phần Ưu đãi
     const Select = document.querySelector('#Select')
     const DiscountSelect = document.querySelector('#discountSelect')
     let DiscountShow = false;
     Select.addEventListener('click', () =>{
          if(!DiscountShow == true){
               DiscountSelect.classList.add('show');
               DiscountShow = true;
          }else
          {
               DiscountSelect.classList.remove('show');
               DiscountShow = false;
          }
     })
     //  Áp dụng js để hover select
     $(document).ready(function() {
          $('#discountSelect option').hover( 
               function() {
               $(this).addClass('hover');
               },
               function() {
               $(this).removeClass('hover');
               }
          );
          });

     // Đánh giá
     $(document).ready(function() {
          $('.star').hover(function() {
          $(this).addClass('hover').prevAll('.star').addClass('hover');
          $(this).nextAll('.star').removeClass('hover');
          }, function() {
          $(this).removeClass('hover').prevAll('.star').removeClass('hover');
          });

          $('.star').click(function() {
          $(this).addClass('clicked').prevAll('.star').addClass('clicked');
          $(this).nextAll('.star').removeClass('clicked');
          var rating = $('.clicked').length;
          $('.sale').html(  rating +'.0' + ' /5.0');
          // Ở đây bạn có thể thực hiện các hành động khác dựa trên giá trị đánh giá.
          });
          });

     // Sale
          document.addEventListener("DOMContentLoaded", function() {
               var discounts = document.querySelectorAll('.discountsale');
               discounts.forEach(function(discount) {
               var imgWrapper = discount.closest('.room').querySelector('.img');
               var saleIcon = document.createElement('div');
               saleIcon.classList.add('sale-icon');
               if (discount.textContent.trim() !== '') {
                    imgWrapper.insertBefore(saleIcon, imgWrapper.firstChild);
               } else {
                    imgWrapper.removeChild(imgWrapper.querySelector('.sale-icon'));
               }
               });
          });
// ====================== CHỈNH PHẦN BẢNG THANH TOÁN =========================================================//
//   Lấy nội dung của phần tử chứa ngày và tháng
     function displayStartDayOfWeek(dateString, targetElement) {
          var match = dateString.match(/\d{2}\/\d{2}\/\d{4}/);
          if (match !== null) {
          var parts = match[0].split('/');
          var day = parseInt(parts[0], 10);
          var month = parseInt(parts[1], 10);
          var year = parseInt(parts[2], 10);
     
          // Tạo một đối tượng Date từ ngày, tháng và năm
          var date = new Date(year, month - 1, day);
     
          // Mảng chứa các tên của các ngày trong tuần
          var daysOfWeek = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];
          var dayOfWeek = date.getDay(); // Lấy thứ của ngày
     
          // Chuỗi hiển thị sẽ bao gồm thông tin về thứ, ngày, tháng và năm
          var displayString =  'Từ ' + daysOfWeek[dayOfWeek] + ' - ' + day + ' / ' + month + ' / ' + year;
     
          $(targetElement).text(displayString);
          } else {
          console.log('Không tìm thấy ngày hợp lệ.');
          }
     }
     function displayEndDayOfWeek(dateString, targetElement) {
          var match = dateString.match(/\d{2}\/\d{2}\/\d{4}/);
          if (match !== null) {
          var parts = match[0].split('/');
          var day = parseInt(parts[0], 10);
          var month = parseInt(parts[1], 10);
          var year = parseInt(parts[2], 10);
     
          // Tạo một đối tượng Date từ ngày, tháng và năm
          var date = new Date(year, month - 1, day);
     
          // Mảng chứa các tên của các ngày trong tuần
          var daysOfWeek = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];
          var dayOfWeek = date.getDay(); // Lấy thứ của ngày
     
          // Chuỗi hiển thị sẽ bao gồm thông tin về thứ, ngày, tháng và năm
          var displayString = 'Đến ' + daysOfWeek[dayOfWeek] + ' - ' + day + ' / ' + month + ' / ' + year;
     
          $(targetElement).text(displayString);
          } else {
          console.log('Không tìm thấy ngày hợp lệ.');
          }
     }

// Phòng ROOM
     var selectedRooms = []; // Mảng lưu trữ thông tin của các phòng đã chọn

     function chooseRoom(roomIndex) {
     var limitRoom = parseInt(document.getElementById('limit_room').innerText);

     if (selectedRooms.length < limitRoom) {
          var selectedRoom = document.querySelectorAll(".Room_container .room")[roomIndex];
          var roomTitle = selectedRoom.querySelector(".content .title a").innerText;
          var roomPrice = selectedRoom.querySelector(".content .prices .content").innerText;
          var bedType = selectedRoom.dataset.bedType;

          // Lấy phần số từ chuỗi giá
          var price = parseInt(roomPrice.replace(/\D/g, '')); // Loại bỏ tất cả các ký tự không phải số

          selectedRooms.push({
               roomNum: selectedRooms.length + 1,
               roomTitle: roomTitle,
               roomPrice: roomPrice,
               price:price,
               bedType: bedType
          });

          updateSelectedRooms(); // Cập nhật hiển thị các phòng đã chọn
          updateTotalBill();
     } else {
          alert("Đã đạt đến giới hạn số phòng cho phép!");
     }
     }

     function updateSelectedRooms() {
     var roomMiniContainer = document.querySelector(".room_container");
     roomMiniContainer.innerHTML = ""; // Xóa nội dung hiện tại để cập nhật lại

     selectedRooms.forEach(function(room, index) {
          var roomMini = document.createElement("div");
          roomMini.className = "roomMini";
          roomMini.innerHTML = `
               <div class="RoomNum title">Phòng ${room.roomNum}</div>
               <div class="RoomTitle">${room.roomTitle}</div>
               <div class="RoomPrice">${room.roomPrice}</div>
               <div class="RoomFix_btn">
                    <a href="#" class="mini_btn" onclick="editRoom(${index})">Chỉnh sửa</a>
               </div>
          `;
          roomMiniContainer.appendChild(roomMini);
     });

     var roomNum = document.getElementById("Numroom");
     roomNum.textContent = selectedRooms.length; // Cập nhật số phòng đã chọn
     }

     function editRoom(roomIndex) {
     // Loại bỏ phòng đã chọn khỏi mảng selectedRooms
     selectedRooms.splice(roomIndex, 1);
     
     // Cập nhật lại hiển thị các phòng đã chọn
     updateSelectedRooms();
     updateTotalBill()
     }

     function calculateTotalBill() {
          var totalPrice = 0;
          selectedRooms.forEach(function(room) {
          totalPrice += room.price
          });
          return totalPrice;
     }
     
     function updateTotalBill() {
     var totalPrice = calculateTotalBill();
     document.getElementById("TotalPrice").textContent = "Giá : " + formatCurrency(totalPrice) ;
     }
     
     function formatCurrency(amount) {
     return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " VND";
     }