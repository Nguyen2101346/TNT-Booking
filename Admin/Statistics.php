
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilities</title>
    <link rel="stylesheet" href="./css/Admin_Other.css">
    <!-- <link rel="stylesheet" href="./css/thongke.css">
    <link rel="stylesheet" href="./css/thanhke.css"> -->
    <link rel="stylesheet" href="./css/Admin_Statistics.css">
    <!-- <link rel="stylesheet" href="./css/Admin_main.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<div class="Container Admin_Room">
          <!-- Phần body -->
          <!-- Như phần header nhưng ta sẽ chia theo thành phần -->
<div class="body">
    <!-- Phần chuyển đổi chung -->
    <div class="container RequestManagement">
        <div class="Change">
                <div class="EventChange Left " id = "LoadRoomType">
                    <a href="#" class="title click"><h2>Loại phòng</h2></a>
                </div>
                <div class="EventChange Right" id = "LoadMember">
                    <a href="#" class="title"><h2>Thành viên</h2></a>
                </div>
        </div>
    </div>
    <!-- Thành phần chính -->
    <div class="Main_container" id="Request__content">
    </div>
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>
    <script>

        flatpickr("#myID", {
            minDate: "today",
            dateFormat: "Y-m-d",
            locale: "vn"
        });

        $(document).ready(function(){
            // Tải trang quản l loại phòng khi load lần đầu
            loadPage('Statistics_RoomType.php');

            // Gán sự kiện click cho các nt EventChange
            $('#LoadRoomType').on('click', function(e) {
                e.preventDefault();
                loadPage('Statistics_RoomType.php');
            });

            $('#LoadMember').on('click', function(e) {
                e.preventDefault();
                loadPage('Statistics_Member.php');
            });

            // Hàm tải trang bằng AJAX
            function loadPage(page) {
                $.ajax({
                    url: './php/' + page,
                    method: 'GET',
                    success: function(data) {
                        $('#Request__content').html(data);
                        
                        // Khởi tạo lại Swiper nếu trang tải có slider
                        if (page === 'Statistics_RoomType.php') {
                            // initializeSwiper();
                            // AJAXSubmit();
                        }else if(page === 'Statistics_Member.php'){
                            CreRoom()
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi khi tải trang:', error);
                    }
                });
            }
        });






        $(document).ready(function() {
            $('#addButton').on('click', function() {
                $('#modal').removeClass('modal-hide').addClass('modal-show');
            });

            $('#cancelButton').on('click', function() {
                $('#modal').removeClass('modal-show').addClass('modal-hide');
            });

            // Thêm sự kiện click cho nút X cho các mục hiện có và mới được thêm
            $(document).on('click', '.remove-button', function() {
                var itemId = $(this).parent().data('id');
                var itemElement = $(this).parent();
                $.ajax({
                    type: 'POST',
                    url: 'Utilities.php',
                    data: {
                        deleteItemId: itemId,
                        action: 'delete' // Thêm action vào dữ liệu gửi đi
                    },
                    success: function() {
                        itemElement.remove();
                        // Sau khi xóa, cập nhật lại danh sách tiện ích
                        updateUtilitiesList();
                    }
                });
            });

            // Thêm sự kiện submit form để thêm tiện ích
            $('#addForm').on('submit', function(event) {
                event.preventDefault();
                var itemName = $('#itemName').val();
                $.ajax({
                    type: 'POST',
                    url: 'Utilities.php',
                    data: {
                        itemName: itemName,
                        action: 'add' // Thêm action vào dữ liệu gửi đi
                    },
                    success: function() {
                        // Sau khi thêm thành công, cập nhật lại danh sách tiện ích
                        updateUtilitiesList('update'); // Truyền tham số "action" và đặt giá trị là "update"
                        $('#itemName').val(''); // Reset input field
                        $('#modal').removeClass('modal-show').addClass('modal-hide');
                    }
                });
            });

            // Hàm cập nhật danh sách tiện ích
            function updateUtilitiesList(action) {
                $.ajax({
                    type: 'GET',
                    url: 'update_utilities_list.php',
                    data: {
                        action: action // Truyền tham số "action" vào yêu cầu GET
                    },
                    success: function(response) {
                        $('.items').html(response);
                    }
                });
            }
        });
    </script>

  
</div>
</div>
</div>
