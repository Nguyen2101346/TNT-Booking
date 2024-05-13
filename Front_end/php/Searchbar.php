<!-- <!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=\, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="./css/main.css">
</head>
<body> -->
<div class="SearchBar_container">
          <div class="SearchBar">
               <div class="Srch Day">
                    <div class="icon"><i class="fa-solid fa-calendar-days" ></i></div>
                    <div class="content" >
                         <div class="title">Ngày nhận - trả phòng</div>
                         <div class="content note" id="GetDate"><span id="start">21/02/2024</span> - <span id="end">23/02/2024</span></div>
                    </div>
                    <!-- Phần Lịch ẩn gồm 2 phần -->
                    <div class="Calander">
                         <label for="start_date">Từ ngày:</label>
                         <input type="text" id="start_date">
                    
                         <label for="end_date">Đến : </label>
                         <input type="text" id="end_date">
                    </div>
               </div>
               
               <div class="Srch Person">
                    <div class="icon"><i class="fa-solid fa-user"></i></div>
                    <div class="content">
                         <div class="title">Số phòng - Số người</div>
                         <div class="content note" id="booking"><span><span id="room_num">1</span> Phòng</span> - <span><span  id="adults_num">1</span> người</span></div>
                    </div>
                    <div id="booking-table">
                         <table>
                              <tr>
                                   <th>Số lượng phòng</th>
                              </tr>
                              <tr>
                                   <td class="quantity_contain">
                                   <button class="quantity-control" onclick="decrementRoom()">-</button>
                                   <span id="room-quantity">0</span>
                                   <button class="quantity-control" onclick="incrementRoom()">+</button>
                                   </td>
                              </tr>
                              </table>
                         <div id="booking-info"></div>
                         
                    </div>
               </div>
               <div class="Srch Preferential">
                    <div class="icon"><i class="fa-solid fa-ticket-simple"></i></div>
                    <div class="content">
                         <div class="title">Mã ưu đãi</div>
                         <div class="content note" id="Select">Chọn ưu đãi</div>
                         <Select id="discountSelect">
                              <option value="">Chọn ưu đãi</option>
                              <option value="discount1">Ưu đãi 1</option>
                              <option value="discount2">Ưu đãi 2</option>
                              <option value="discount3">Ưu đãi 3</option>
                         </Select>
                    </div>
               </div>
               <div class="Srch Search_Btn">
                    <a href="#" class="large_btn">Tìm kiếm</a>
               </div>
          </div> 
     </div>
<!-- </body>
</html> -->
