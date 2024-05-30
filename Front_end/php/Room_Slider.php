
  <div class="container">
    <div class="slider_wrapper">
      <button id="prev-slide" class="slide-button material-symbols-rounded">
        chevron_left
      </button>
      <div class="img_list">
        <?php
          $check_img=check_images($conn, $idroomtype);
          if(mysqli_num_rows($check_img) > 0){
            while($r = mysqli_fetch_array($check_img)){
        ?>
        <div class="img_item"><img src="../Admin/img/detail/<?=$r['Hinh']?>" alt="img-1"> 
        </div>
        <?php
            }
          }else{
            echo "Chưa có hình";
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