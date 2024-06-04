<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/eat.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
  <script src="../js/eat.js" defer></script>
</head>

<body> -->
  <div class="container_eat">
    <div class="eat_wrapper">
      <button id="prev-eat" class="eat-button material-symbols-rounded">
        chevron_left
      </button>
      <div class="img_list">
        <?php
          include "../conn.php";
          $sql = "SELECT * FROM sukien";
          $re = mysqli_query($conn,$sql);
          while($r = mysqli_fetch_array($re)){
        ?>
        <div class="img_item"><img src="./img/<?= $r['AnhDD']?>" alt="img-1"> 
          <a href="" > 
            <h1 class="title"><?= $r['Tensukien']?></h1>
          </a>
          <p><?= $r['Mota']?></p>
        </div>
        <?php
          }
        ?>
        <!-- <div class="img_item"><img src="./img/an2.jpg" alt="img-1"> 
          <a href="">
            <h1 class="title">Nhà hàng Oceania</h1>
          </a>
          <p>Nằm giữa khu vực biệt thự, hướng ra vịnh biển và không gian ấm cúng, nhà hàng Oceania là ...</p>
        </div>
        <div class="img_item"><img src="./img/an3.jpg" alt="img-1"> <a href="">
            <h1 class="title">dulex</h1>
          </a>
          <p>abcbsd</p>
        </div> -->
        
      </div>
      <button id="next-eat" class="eat-button material-symbols-rounded">
        chevron_right
      </button>
    </div>

    <div class="eat_scrollbar">
      <div class="scrollbar_track_eat">
        <div class="scrollbar_thumb_eat"></div>
      </div>
    </div>
  </div>
  <script>
    const initEat = () => {
    const imageList = document.querySelector(".eat_wrapper .img_list");
    const eatButtons = document.querySelectorAll(".eat_wrapper .eat-button");
    const eatScrollbar = document.querySelector(".container_eat .eat_scrollbar");
    const scrollbarThumb_eat = eatScrollbar.querySelector(".scrollbar_thumb_eat");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;


    scrollbarThumb_eat.addEventListener("mousedown",(e)=>{
        const startX= e.clientX;
        const thumbPosition= scrollbarThumb_eat.offsetLeft;

        // update position
        const handleMouseMove = (e)=>{
            const deltaX= e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = eatScrollbar.getBoundingClientRect().width -scrollbarThumb_eat.offsetWidth;

            const boundedPosition =Math.max(0,Math.min(maxThumbPosition,newThumbPosition))
            const scrollPosition=(boundedPosition/maxThumbPosition) * maxScrollLeft;
            scrollbarThumb_eat.style.left=`${boundedPosition}px`;
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

    eatButtons.forEach(button => {
        button.addEventListener("click", () => {
            console.log(button);
            const direction = button.id === "prev-eat" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction; // Change 'imageList' to 'imageList[0]'
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        })
    })

    const updateScrollThumPosition = () =>{
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition/ maxScrollLeft) * (eatScrollbar.clientWidth- scrollbarThumb_eat.offsetWidth);
        scrollbarThumb_eat.style.left= `${thumbPosition}px`;
    }
    imageList.addEventListener("scroll",()=>{
        updateScrollThumPosition();
    }
    )
}

window.addEventListener("load", initEat);
  </script>