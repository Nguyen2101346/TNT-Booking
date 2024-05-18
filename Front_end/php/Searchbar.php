<?php
// sale.php
if(isset($_GET['start_date']) || isset($_GET['start_date']) || isset($_GET['end_date']) || isset($_GET['room_num']) || isset($_GET['qua_adults']) || isset($_GET['discount_code'])){
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
    $room_num = isset($_GET['room_num']) ? $_GET['room_num'] : '';
    $adults_num = isset($_GET['qua_adults']) ? $_GET['qua_adults'] : '';
    $discount_code = isset($_GET['discount_code']) ? $_GET['discount_code'] : '';
}else{
    $start_date = '0/0/0000';
    $end_date = '0/0/0000';
    $room_num = 1;
    $adults_num = 1;
    $discount_code ='';
}
?>
<div class="SearchBar_container">
          <div class="SearchBar">
               <div class="Srch Day">
                    <div class="icon"><i class="fa-solid fa-calendar-days" ></i></div>
                    <div class="content">
                    <div class="title">Ngày nhận - trả phòng</div>
                    <div class="content note" id="GetDate">
                        <span id="start"><?php echo htmlspecialchars($start_date); ?></span> - <span id="end"><?php echo htmlspecialchars($end_date); ?></span>
                    </div>
                    <div class="Calander">
                        <label for="start_date">Từ ngày:</label>
                        <input type="text" id="start_date" value="<?php echo htmlspecialchars($start_date); ?>">
                        <label for="end_date">Đến: </label>
                        <input type="text" id="end_date" value="<?php echo htmlspecialchars($end_date); ?>">
                    </div>
                </div>
            </div>
            <div class="Srch Person">
                <div class="icon"><i class="fa-solid fa-user"></i></div>
                <div class="content">
                    <div class="title">Số phòng - Số người</div>
                    <div class="content note" id="booking">
                        <span><span id="room_num"><?php echo htmlspecialchars($room_num); ?></span> Phòng</span> - <span><span id="adults_num"><?php echo htmlspecialchars($adults_num); ?></span> người</span>
                    </div>
                    <div id="booking-table">
                        <table>
                            <tr>
                                <th>Số lượng phòng</th>
                            </tr>
                            <tr>
                                <td class="quantity_contain">
                                    <button class="quantity-control" onclick="decrementRoom()">-</button>
                                    <span id="room-quantity"><?php echo htmlspecialchars($room_num); ?></span>
                                    <button class="quantity-control" onclick="incrementRoom()">+</button>
                                </td>
                            </tr>
                        </table>
                        <div id="booking-info"></div>
                    </div>
                </div>
            </div>
            <div class="Srch Preferential">
                <div class="icon"><i class="fa-solid fa-ticket-simple"></i></div>
                <div class="content">
                    <div class="title">Mã ưu đãi</div>
                    <div class="content note" id="Select">Chọn ưu đãi</div>
                    <select id="discountSelect">
                        <option value="">Chọn ưu đãi</option>
                        <option value="discount1" <?php if ($discount_code == 'discount1') echo 'selected'; ?>>Ưu đãi 1</option>
                        <option value="discount2" <?php if ($discount_code == 'discount2') echo 'selected'; ?>>Ưu đãi 2</option>
                        <option value="discount3" <?php if ($discount_code == 'discount3') echo 'selected'; ?>>Ưu đãi 3</option>
                    </select>
                    </div>
               </div>
               <div class="Srch Search_Btn">
                    <input type="submit" id="searchButton" class="large_btn disabled" value="Tìm kiếm">
               </div>
          </div> 
     </div>
