
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
            <img src="../Admin/img/<?= $r['AnhDD']?>" alt="img-1"> 
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
<script>
  let initSlider = function() {
    const imageList = document.querySelector(".slider_wrapper .img_list");
    const sliderButtons = document.querySelectorAll(".slider_wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider_scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar_thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;


    scrollbarThumb.addEventListener("mousedown",(e)=>{
        const startX= e.clientX;
        const thumbPosition= scrollbarThumb.offsetLeft;

        // update position
        const handleMouseMove = (e)=>{
            const deltaX= e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width -scrollbarThumb.offsetWidth;

            const boundedPosition =Math.max(0,Math.min(maxThumbPosition,newThumbPosition))
            const scrollPosition=(boundedPosition/maxThumbPosition) * maxScrollLeft;
            scrollbarThumb.style.left=`${boundedPosition}px`;
            imageList.scrollLeft=scrollPosition;
        }
        //remove event
        const handleMouseup =()=>{
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseup);
        }
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseup);
    })
    if (imageList.length === 0) {
        console.error("No image list found");
        return;
    }

    sliderButtons.forEach(button => {
        button.addEventListener("click", () => {
            console.log(button);
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction; // Change 'imageList' to 'imageList[0]'
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        })
    })

    const updateScrollThumPosition = () =>{
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition/ maxScrollLeft) * (sliderScrollbar.clientWidth- scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left= `${thumbPosition}px`;
    }
    imageList.addEventListener("scroll",()=>{
        updateScrollThumPosition();
    }
    )
}

window.addEventListener("load", initSlider);
</script>