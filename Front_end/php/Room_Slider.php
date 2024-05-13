<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/slider.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
  <script src="../js/slider.js" defer></script>
</head>
<body>
  <div class="container">
    <div class="slider_wrapper">
      <button id="prev-slide" class="slide-button material-symbols-rounded">
        chevron_left
      </button>
      <div class="img_list">
        <div class="img_item"><img src="./img/anh1.jpg" alt="img-1"> 
        </div>
        <div class="img_item"><img src="./img/anh2.jpg" alt="img-1"> 
        </div>
        <div class="img_item"><img src="./img/anh3.jpg" alt="img-1"> 
        </div>
        <div class="img_item"><img src="./img/anh4.jpg" alt="img-1">
        </div>
        <div class="img_item"><img src="./img/anh5.jpg" alt="img-1">
        </div>
        <div class="img_item"><img src="./img/anh6.jpg" alt="img-1"> 
        </div>
        <div class="img_item"><img src="./img/anh7.jpg" alt="img-1">
         
        </div>
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

</body>

</html>