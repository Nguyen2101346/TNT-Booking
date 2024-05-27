<?php
include "./php_func/conn.php";
include "./php_func/member.php";
// Handle the search query and search type
$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : 'all';

// Fetch members from the database, filtering by search query and search type if provided
$members = getMembers($search_query, $search_type);
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Style-Type" content="text/css">
     <title>Member Management</title>
     <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
     <link rel="stylesheet" href="./css/Admin_main.css">
     <link rel="stylesheet" href="./css/Admin_Room.css">
     <link rel="stylesheet" href="./css/Slider.css">
     <link rel="stylesheet" href="./css/Admin_Member.css">
     <!-- Sử dụng fontawsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
     <!-- Sử dụng swiper đơn giản  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
     <style>
          /* Ensure you have these fonts loaded */
          @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

          /* Apply the font family */
          body {
               font-family: 'Roboto', sans-serif;
          }

          /* Font family for text inside span */
          .TypeCheck span,
          .TypeCheck ul li a {
               font-family: 'Roboto', sans-serif;
               /* Use Roboto font for text */
               font-size: 16px;
               font-weight: 400;
               color: #000;
          }

          /* Ensure FontAwesome icon retains its style */
     </style>
</head>

<body>
     <div class="Container Admin_Room">
          <!-- Phần body -->
          <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
          <div class="body">
               <!-- Phần chuyển đổi chung -->
               <div class="container MemberManagement">
                    <div class="Change">
                         <div class="EventChange Left" id="loadRoom">
                              <a href="#" class="title click">
                                   <h2>Danh sách thành viên</h2>
                              </a>
                         </div>
                         <div class="EventChange Right">
                              <a href="#" class="title">
                                   <h2></h2>
                              </a>
                         </div>
                    </div>
               </div>
               <!-- Thành phần chính -->
               <div class="Main_container" id="Admin_Main__content">
                    <!-- Thanh chọn loại phòng -->
                    <div class="TypeBar">
                         <div class="TypeCheck medium_btn">
                              <div class="title_TypeCheck">Tất cả</div>
                              <span><i class="fa-solid fa-caret-down fa-beat-fade"></i></span>
                              <ul>
                                   <li><a href="#" data-search-type="all">Tất cả</a></li>
                                   <li><a href="#" data-search-type="name">Tên</a></li>
                                   <li><a href="#" data-search-type="phone">Số điện thoại</a></li>
                                   <li><a href="#" data-search-type="email">Email</a></li>
                                   <li><a href="#" data-search-type="created_at">Ngày tạo</a></li>
                              </ul>
                         </div>
                         <div class="MemberSearch">
                              <form id="searchForm">
                                   <input type="hidden" name="search_type" id="search_type" value="all">
                                   <input type="search" name="search_query" id="search_query" placeholder="Để trống để tìm theo thứ tự">
                                   <input type="submit" value="">
                                   <span class="fa-solid fa-magnifying-glass"></span>
                              </form>
                         </div>
                    </div>
                    <script>
                         $(document).ready(function() {
                              function bindDetailButtons() {
                                   $('.member.Detail_btn').on('click', function(event) {
                                        event.preventDefault();
                                        var memberData = $(this).data('member');
                                        $('#ID').val(memberData.ID);
                                        $('#name').val(memberData.name);
                                        $('#gender').val(memberData.gender);
                                        $('#birthday').val(memberData.birthday);
                                        $('#email').val(memberData.email);
                                        $('#phone').val(memberData.phone);
                                        $('#address').val(memberData.address);
                                        $('#member_id').val(memberData.id);
                                        $('.CheckMember.MiniContainer').addClass('visible');
                                   });
                              }

                              $('#searchForm').on('submit', function(event) {
                                   event.preventDefault();

                                   var searchType = $('#search_type').val();
                                   var searchQuery = $('#search_query').val();

                                   $.ajax({
                                        url: 'Member.php',
                                        type: 'GET',
                                        data: {
                                             search_type: searchType,
                                             search_query: searchQuery
                                        },
                                        success: function(response) {
                                             $('#Admin_Main__content').html($(response).find('#Admin_Main__content').html());
                                             bindDetailButtons(); // Re-bind the detail buttons after updating the content
                                        }
                                   });
                              });

                              $('.TypeCheck ul li a').on('click', function(event) {
                                   event.preventDefault();
                                   var searchType = $(this).data('search-type');
                                   $('#search_type').val(searchType);
                                   $('.TypeCheck .title_TypeCheck').text($(this).text());
                              });

                              bindDetailButtons(); // Initial binding
                         });
                    </script>
                    <div class="Member_Container" id="Member">
                         <div class='Member_Component'>
                              <!-- PHP code to fetch member data from the database -->
                              <?php
                              foreach ($members as $member) {
                                   $member_id = $member['id'];
                                   echo "
                                   <div class='Member' data-id='" . $member_id . "'>
                                        <div class='Img_Member'>
                                             <img src='../Front_end/img_members/" . $member['image'] . "'>
                                        </div>
                                        <div class='Member_content'>
                                             <h3>Tên Khách hàng : <span class='lighter'>" . $member['name'] . "</span> </h3>
                                             <h3>Số điện thoại : <span class='lighter'>" . $member['phone'] . "</span></h3>
                                             <h3>Email : <span class='lighter'>" . $member['email'] . "</span></h3>
                                             <h3>Ngày tạo : <span class='lighter'>" . $member['created_at'] . "</span></h3>
                                             <div class='member BasicEdit'>
                                                  <div class='member Detail_btn' data-member='" . json_encode($member) . "'>
                                                  <a href='#' class='btn'>Chi tiết</a>
                                                  </div>
                                                  <div class='member Delet_btn'>
                                                  <a href='#' class='btn'>Hủy bỏ</a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>";
                              }
                              ?>
                         </div>
                    </div>

               </div>
          </div>
          <?php $message = '';

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $company = $_POST['ID'];
               $name = $_POST['name'];
               $gender = $_POST['gender'];
               $birthday = $_POST['birthday'];
               $email = $_POST['email'];
               $phone = $_POST['phone'];
               $address = $_POST['address'];
               $ID = $_POST['member_id'];
               // Insert data into database
               $message = insertMember($conn, $company, $name, $gender, $birthday, $email, $phone, $address, $ID);
          } ?>
          <!-- Form tạo thêm loại -->
          <div class="CheckMember MiniContainer">
               <form class="CheckMember MiniForm" method="post" action="Member.php">
                    <h2>Chi tiết thành viên</h2>
                    <div class="miniMember_Top">
                         <div class="miniMember ID">
                              <label for="ID">Loại giấy tờ</label>
                              <input type="text" name="ID" id="ID" required>
                         </div>
                         <div class="miniMember Name">
                              <label for="name">Tên khách hàng</label>
                              <input type="text" name="name" id="name" required>
                         </div>
                         <div class="miniMember Gender">
                              <label for="gender">Giới tính</label>
                              <input type="text" name="gender" id="gender" required>
                         </div>
                         <div class="miniMember Birthday">
                              <label for="birthday">Ngày sinh</label>
                              <input type="date" name="birthday" id="birthday" required>
                         </div>
                         <div class="miniMember Email">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" required>
                         </div>
                         <div class="miniMember Phone">
                              <label for="phone">Số điện thoại</label>
                              <input type="text" name="phone" id="phone" required>
                         </div>
                         <input type="hidden" name="member_id" id="member_id">
                    </div>
                    <div class="miniMember_bottom">
                         <div class="miniMember Address">
                              <label for="address">Địa chỉ</label>
                              <input type="text" name="address" id="address" required>
                         </div>
                    </div>
                    <div class="CheckMember_Confirm">
                         <div class="Member_Cancel_btn">
                              <a href="#" class="btn">Huỷ bỏ</a>
                         </div>
                         <div class="Member_confirm_btn">
                              <input type="submit" name="confirm" value="Ok" class="btn">
                         </div>
                    </div>
               </form>
               <?php if ($message) : ?>
                    <p><?php echo $message; ?></p>
               <?php endif; ?>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <script src="../js/slider_swiper.js"></script>
     <script src="../js/Admin.js"></script>
     <script>
          $(document).ready(function() {
               function bindDetailButtons() {
                    $('.member.Detail_btn').on('click', function(event) {
                         event.preventDefault();
                         var memberData = $(this).data('member');
                         $('#ID').val(memberData.ID);
                         $('#name').val(memberData.name);
                         $('#gender').val(memberData.gender);
                         $('#birthday').val(memberData.birthday);
                         $('#email').val(memberData.email);
                         $('#phone').val(memberData.phone);
                         $('#address').val(memberData.address);
                         $('#member_id').val(memberData.id);
                         $('.CheckMember.MiniContainer').addClass('visible');
                    });
               }

               bindDetailButtons(); // Initial binding

               $('.Member_Cancel_btn').on('click', function(event) {
                    event.preventDefault();
                    $('.CheckMember.MiniContainer').removeClass('visible');
               });

               $('#searchForm').on('submit', function(event) {
                    event.preventDefault();

                    var searchType = $('#search_type').val();
                    var searchQuery = $('#search_query').val();

                    $.ajax({
                         url: 'Member.php',
                         type: 'GET',
                         data: {
                              search_type: searchType,
                              search_query: searchQuery
                         },
                         success: function(response) {
                              $('#Admin_Main__content').html($(response).find('#Admin_Main__content').html());
                              bindDetailButtons(); // Re-bind the detail buttons after updating the content
                         }
                    });
               });

               $('.TypeCheck ul li a').on('click', function(event) {
                    event.preventDefault();
                    var searchType = $(this).data('search-type');
                    $('#search_type').val(searchType);
                    $('.TypeCheck .title_TypeCheck').text($(this).text());
               });

               // Set default search type to "all" for "Tất cả"
               if ($('#search_type').val() === '') {
                    $('#search_type').val('all');
               }
          });
     </script>
</body>

</html>
