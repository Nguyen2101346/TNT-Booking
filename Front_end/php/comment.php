
    <div class="comment_Rec">
      <?php
        if(isset($_SESSION['userID']) && $_SESSION['userID'] != ""){
      ?>
      <div class="comment">
        <?php
          $userInfo = mysqli_fetch_array(check_account2($conn, $_SESSION['userID']));
        ?>
        <div class="avatar"><img src="./img_members/<?=$userInfo['Avatar']?>" alt=""></div>
        <div class="cmt_content">
          <!-- đánh giá -->
          <div class="rating">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
            <span id="result" class="sale">0.0 /5.0</span>
          </div>
          <!--Tên và bình luận -->
          <form action="index.php?page=Room&id=<?= $idroomtype?><?php if($change == 1) echo '&go=1'?>" method="post">
            <input type="hidden" name="rating" id="rating" value="0">
            <!-- <div class="user_name">
              <textarea id="name" rows="1" style="resize: none;" placeholder="Tên hiển thị"></textarea>
            </div> -->
            <div class="two_col">
              <textarea name="review_text" id="comment" rows="4" style="resize: none;" placeholder="Viết đánh giá của bạn ở đây..."></textarea>
              <div class="send_btn">
                <input type="submit" name="review_btn" class="medium_btn" value="Gửi">
              </div>
            </div>
          </form>
          <?php
          if(isset($_POST['review_btn'])){
            $userID = $_SESSION['userID'];
            $rating = $_POST['rating'];
            $review_text = $_POST['review_text'];
            add_review($conn, $idroomtype, $userID, $rating, $review_text);
          }
          ?>
          <script src="./js/Ratings.js"></script>
        </div>
      </div>
      <?php
      }
      ?>
      <div class="comment_list">
    <?php
      $comments = get_comments($conn, $idroomtype); // Function to get comments from the database
      if($comments){
      if(mysqli_num_rows($comments) > 0){
          while($re = mysqli_fetch_array($comments)){
      ?>
      <div class="comment_items">
          <div class="avatar"><img src="./img_members/<?=$re['Avatar']?>" alt=""></div>
          <div class="cmt_content">
              <!-- Rating -->
              <div class="rating">
                  <?php
                  for ($i = 1; $i <= 5; $i++) {
                    $selected = $i <= $re['Sosao'] ? 'selected' : '';
                    echo '<span class="star-display ' . $selected . '">&#9733;</span>';
                  }
                  ?>
                  <span><?= $re['Sosao'] ?>.0 / 5.0</span>
              </div>
              <div class="user_name"><span><?= $re['Tendangnhap'] ?></span> - <?= $re['Ngaytao'] ?></div>
              <div class="rating_content"><?= $re['Binhluan'] ?></div>
          </div>
      </div>
      <?php
            }
        } else {
            echo "<p>Không có bình luận nào</p>";
        }
      } else {
        echo "<p>Đã xảy ra lỗi khi lấy bình luận</p>";
      }
      ?>
    </div>
    </div>
<!-- <div class="comment_items">
          <div class="avatar"><img src="./img/an1.jpg" alt=""></div>
          <div class="cmt_content">
            
            <div class="rating">
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
            <div class="user_name"><span>Nguyen Heo</span> - 10/04/2024</div>
            <div class="rating_content">Phòng này tạo cảm giác lạnh lẻo và sợ ma.
              Trang trí đẹp mắt và ánh sáng êm dịu. Tiện nghi đầy đủ không gian rộng rãi.
              Phòng này tạo cảm giác lạnh lẻo và sợ ma. Trang trí đẹp mắt và ánh sáng êm dịu. </div>
          </div>
        </div> -->