
<body>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
          var paragraphs = document.querySelectorAll('.img_list p');
          var maxLength = 100; // Số ký tự tối đa bạn muốn hiển thị
    
          paragraphs.forEach(function(p) {
            var originalText = p.textContent.trim(); // Lấy văn bản gốc và loại bỏ khoảng trắng
    
            // Kiểm tra nếu văn bản vượt quá độ dài tối đa
            if (originalText.length > maxLength) {
              // Tạo văn bản rút gọn bằng cách cắt văn bản gốc và thêm dấu chấm lửng
              var truncatedText = originalText.slice(0, maxLength) + '...';
              p.textContent = truncatedText; // Đặt nội dung đoạn văn thành văn bản rút gọn
    
              // Thêm sự kiện click để chuyển đổi giữa văn bản rút gọn và gốc
              p.addEventListener('click', function() {
                // Chuyển đổi nội dung đoạn văn giữa văn bản rút gọn và gốc
                p.textContent = p.textContent === truncatedText ? originalText : truncatedText;
              });
            }
          });
        });
  </script>
  <div class="container">
    <div class="slider_wrapper">
      <button id="prev-slide" class="slide-button material-symbols-rounded">
        chevron_left
      </button>
      <div class="img_list">
        <?php 
        $sql = "SELECT * FROM Loaiphong";
        $re = mysqli_query($conn,$sql);
        while($r = mysqli_fetch_array($re)){
        ?>
          <div class="img_item">
            <img src="./img/<?= $r['AnhDD']?>" alt="img-1"> 
            <a href="index.php?page=Room&id=<?= $r['IDLoaiphong']?><?php if($change == 1) echo '&go=1'?>">
              <h1 class="title"><?= $r['Tenloaiphong']?></h1>
            </a>
              <p><?= $r['Mota']?></p>
            </div>
          <?php
        }
        ?>
      </div>
      <button id="next-slide" class="slide-button material-symbols-rounded">
        chevron_right
      </button>
    </div>

    <div class="slider_scrollbar">
      <div class="scrollbar_track">
        <div class="scrollbar_thumb"></div>
      </div>
    </div>
  </div>
<!-- 
</body>

</html> -->