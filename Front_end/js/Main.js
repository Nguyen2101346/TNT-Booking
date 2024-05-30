
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
         $('.sale').html(rating + '.0' + ' /5.0');
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
// Hàm để lấy thông tin từ thanh tìm kiếm và hiển thị nó trong các phần tử .timeShow_Start và .timeShow_End
function displaySearchTime() {
     // Lấy thông tin từ thanh tìm kiếm
     var startDate = $('#start_date').val();
     var endDate = $('#end_date').val();
 
     // Hiển thị thông tin trong các phần tử .timeShow_Start và .timeShow_End
     if (startDate) {
          displayStartDayOfWeek(startDate, '.timeShow_Start');
      }
  
      if (endDate) {
          displayEndDayOfWeek(endDate, '.timeShow_End');
      }
 }
 // Gọi hàm này khi trang được tải xong để hiển thị thời gian từ thanh tìm kiếm
 $(document).ready(function() {
     displaySearchTime();
 });
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
     
          $(targetElement).val(displayString);
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
     
          $(targetElement).val(displayString);
          } else {
          console.log('Không tìm thấy ngày hợp lệ.');
          }
     }
