<style>
    .Checktime input{
        border: none;
        outline: none;
    }
</style>

<form class="SummaryBill" action="" method="">
     <div class="navbar">
          <h3 class="content bill">Chuyến đi</h3>
     </div>
     <div class="Main_item Short">
          <div class="Checktime">
               <div class="title">Thời gian</div>
               <input type="hidden" name="start_date" id="start_date" value="<?php echo $_GET['start_date']; ?>">
               <input type="hidden" name="end_date" id="end_date" value="<?php echo $_GET['end_date']; ?>">
               <input class="timeShow_Start note" id="myID" name="timeStart" value="Ngày đặt">
               <input class="timeShow_End note" id="myID" name="timeEnd" value="Ngày đi">
          </div>
          <div class="room_container">
               <!-- <div class="roomMini">
                    <div class="RoomNum title"></div>
                    <div class="RoomTitle"></div>
                    <div class="RoomPrice"></div>
                    <div class="Roomfix_btn">
                         <a href="#" class="mini_btn">Chỉnh sửa</a>
                    </div> 
               </div> -->
          </div>
          <div class="TotalBill">
               <div class="title">Tổng cộng: </div>
               <div id="TotalPrice"></div>
          </div>
     </div>
     <div class="Change_btn">
          <a href="#" class="medium_btn" id="continueButton">Tiếp tục</a>
     </div>
</form>
<script>


     document.getElementById("continueButton").addEventListener("click", function(event) {
    const roomContainer = document.getElementById("roomContainer");
    if (roomContainer.children.length === 0) {
        alert("Bạn phải chọn ít nhất một phòng để tiếp tục.");
        event.preventDefault();
        return;
    } 

    // Hiển thị nút submit và ẩn nút tiếp tục
    document.getElementById("continueButton").style.display = "none";
    document.getElementById("submitButton").style.display = "block";

    // Chuyển đổi các phòng đã chọn và thông tin sang trang Payment
    document.getElementById("summaryForm").submit();
});
     // document.addEventListener('scroll',() => {
     // const header = document.querySelector('.SummaryBill')

     // if(window.scrollY > 100){
     //      header.classList.add('scrolled');
     // }else{
     //      header.classList.remove('scrolled');
     // }
     // })
</script>