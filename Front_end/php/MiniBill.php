<form class="SummaryBill" action="" method="">
     <div class="navbar">
          <h3 class="content bill">Chuyến đi</h3>
     </div>
     <div class="Main_item Short">
          <div class="Checktime">
               <div class="title">Thời gian</div>
               <div class="timeShow_Start note"></div>
               <div class="timeShow_End note"></div>
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
               <div class="title">Ưu đãi: </div>
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
     document.addEventListener('scroll',() => {
     const header = document.querySelector('.SummaryBill')

     if(window.scrollY > 100){
          header.classList.add('scrolled');
     }else{
          header.classList.remove('scrolled');
     }
     })
</script>