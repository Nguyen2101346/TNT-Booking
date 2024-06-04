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
<!-- 
</body>

</html> -->