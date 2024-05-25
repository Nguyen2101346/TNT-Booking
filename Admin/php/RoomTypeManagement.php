<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../php_func/conn.php";
?>
<div class="Room_container" id="Admin_Room__content">
    <div class="TypeBar">
        <div class="TypeCheck medium_btn">
            Chọn loại phòng
            <span class="fas fa-caret-down"></span>
            <ul>
                <?php 
                $Sothutu = 1;
                $sql = "SELECT * FROM loaiphong";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($r = $result->fetch_assoc()) {
                ?>
                    <li><a href="#" class="type_items" data-id="<?= htmlspecialchars($r['IDLoaiphong']) ?>"> <?= htmlspecialchars($Sothutu) ?> . <?= htmlspecialchars($r['Tenloaiphong']) ?></a></li>
                <?php
                    $Sothutu++;
                }
                ?>
            </ul>
        </div>
        <div class="CreType">
            <a href="#" class="medium_btn" id="openCreTypeForm"> Loại phòng mới </a>
        </div>
    </div>
    
    <?php 
    if (isset($_GET['idroom'])) {
        $idroom = (int)$_GET['idroom'];
        $sql = "SELECT loaiphong.*, GROUP_CONCAT(DISTINCT hinhphong.Hinh) as Hinh, GROUP_CONCAT(DISTINCT tienich.Tienich) as Tienich 
                FROM loaiphong
                LEFT JOIN hinhphong ON loaiphong.IDLoaiphong = hinhphong.IDLoaiphong
                LEFT JOIN nhantienich ON loaiphong.IDLoaiphong = nhantienich.IDLoaiphong
                LEFT JOIN tienich ON nhantienich.IDTienich = tienich.IDTienich
                WHERE loaiphong.IDLoaiphong = ?
                GROUP BY loaiphong.IDLoaiphong";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $idroom);
        $stmt->execute();
        $result = $stmt->get_result();
        $r = $result->fetch_assoc();
    }
    ?>
    
    <form action="index.php?page=Management&idroom=<?= isset($r['IDLoaiphong']) ? htmlspecialchars($r['IDLoaiphong']) : '' ?>&go=1" class="CreRoom_form" id="updateRoomForm" method="post" enctype="multipart/form-data">
        <div class="CreRoom_container">
            <div class="CreRoom Left">
                <div class="ImgRoom">
                    <img src="./img/Deluxe_2dbed.jpg" alt="" id="AnhDD">
                    <div class="getImgRoom">
                        <label for="ImgRoom" class="title">Chỉnh sửa ảnh</label>
                        <input type="file" name="ImgRoom" id="ImgRoom">
                    </div>
                </div>
                <div class="CreRoombot description">
                    <label class="title" for="RoomDes">Mô tả</label>
                    <textarea name="RoomDes" id="RoomDes" cols="30" rows="10"><?= isset($r['Mota']) ? htmlspecialchars($r['Mota']) : '' ?></textarea>
                </div>
            </div>
            <div class="CreRoom Right">
                <div class="CreRoomCom name">
                    <label for="RoomName" class="title">Tên loại phòng</label>
                    <input type="text" name="RoomName" id="RoomName" value="<?= isset($r['Tenloaiphong']) ? htmlspecialchars($r['Tenloaiphong']) : '' ?>">
                </div>
                <div class="CreRoomCom Small">
                    <div class="CreRoomCom Adult">
                        <label for="RoomAdult" class="title">Số người</label>
                        <input type="text" name="RoomAdult" id="RoomAdult" value="<?= isset($r['Songuoi']) ? htmlspecialchars($r['Songuoi']) : '' ?>">
                    </div>
                    <div class="CreRoomCom Area">
                        <label for="RoomArea" class="title">Diện tích</label>
                        <input type="text" name="RoomArea" id="RoomArea" value="<?= isset($r['DienTich']) ? htmlspecialchars($r['DienTich']) : '' ?>">
                    </div>
                </div>
                <div class="CreRoomCom Small">
                    <div class="CreRoomCom Roomnum">
                        <label for="RoomNum" class="title">Số phòng</label>
                        <input type="text" name="RoomNum" id="RoomNum" value="<?= isset($r['SoPhong']) ? htmlspecialchars($r['SoPhong']) : '' ?>">
                    </div>
                    <div class="CreRoomCom Price">
                        <label for="RoomPrice" class="title">Giá</label>
                        <input type="text" name="RoomPrice" id="RoomPrice" value="<?= isset($r['Gia']) ? htmlspecialchars($r['Gia']) : '' ?>">
                    </div>  
                </div>
                <div class="CreRoombot convenience">
                    <label for="RoomConvenience" class="ConvenienceCheck title">Tiện ích</label>
                    <textarea name="RoomConvenience" id="RoomConvenienceTextarea" cols="30" rows="10" readonly><?= isset($r['Tienich']) ? htmlspecialchars($r['Tienich']) : '' ?></textarea>
                </div>
            </div>
        </div>
        <div class="ImgRoom_detail">
            <div class="title">
                <label>Ảnh xem trước</label>
                <div class="getImg_detail">
                    <label for="ImgDetail" class="title">Chọn ảnh</label>
                    <input type="file" name="ImgDetail[]" id="ImgDetail" multiple="multiple">
                </div>
            </div>
            <div class="ImgRoom_Slider">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $sql1 = "SELECT * FROM hinhphong WHERE IDLoaiphong = ?";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->bind_param('i', $idroom);
                        $stmt1->execute();
                        $result1 = $stmt1->get_result();
                        $r1 = $result1->fetch_assoc();
                        if (isset($r1['Hinh'])) {
                            $images = explode(',', $r1['Hinh']);    
                            foreach ($images as $img) {
                                echo '<div class="swiper-slide"><img src="./img/detail/' . htmlspecialchars($img) . '" alt=""></div>';
                            }
                        } else {
                            echo '<div class="swiper-slide"><img src="./img/Deluxe2bed-sea.jpg" alt=""></div>';
                            echo '<div class="swiper-slide"><img src="./img/Deluxe2bed-sea.jpg" alt=""></div>';
                            echo '<div class="swiper-slide"><img src="./img/Deluxe2bed-sea.jpg" alt=""></div>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>     
            <input type="hidden" name="idRoom" value="<?= isset($r['IDLoaiphong']) ? htmlspecialchars($r['IDLoaiphong']) : '' ?>">
        </div>
        <div class="Confirm">
            <div class="cancel_btn">
                <input type="submit" name="cancel" value="Huỷ bỏ" class="btn"> 
            </div>
            <div class="confirm_btn">
                <input type="submit" name="confirm" value="Xác nhận" class="btn"> 
            </div>
        </div>
    </form>
</div>                    

<div class="CreType MiniContainer" id="CreTypeFormContainer">
    <form class="CreType MiniForm" action="CreTypeForm_process.php" method="POST" id="CreType_form">
        <h2>Thêm loại phòng mới</h2>
        <div class="Type Num">
            <label for="Type-order">Thứ tự</label>
            <input type="text" name="Type-order" id="Type-order">
        </div>
        <div class="Type Name">
            <label for="Type-name">Tên loại phòng</label>
            <input type="text" name="CreType_Tenloaiphong" id="Type-name" required>
        </div>
        <div class="Type Day">
            <label for="Type-day">Ngày tạo</label>
            <input type="date" name="CreType_Ngaytao" id="Type-day" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div class="Type Alert">
            <div class="er-text"></div>
            <div class="cor-text"></div>
        </div>
        <div class="TypeConfirm">
            <div class="Cancel_btn">
                <a href="#" class="btn">Huỷ bỏ</a>
            </div>
            <div class="Confirm_btn">
                <input type="submit" name="confirm" value="Xác nhận" class="btn"> 
            </div>
        </div>
    </form>
</div>      
<div class="MiniConvenience MiniContainer" id="MiniConvenienceContainer">
    <form action="ConvenienceForm_process.php" method="POST" class="MiniConvenience MiniForm" id="ConvenienceForm" data-id="<?= isset($r['IDLoaiphong']) ? htmlspecialchars($r['IDLoaiphong']) : '' ?>">
        <h2>Chọn tiện ích</h2>
        <div class="ConvenienceShow" id="ConvenienceCheckboxes">
            <?php 
            $sql = "SELECT * FROM tienich";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($r = $result->fetch_assoc()) {
                echo '
                <div class="Convenience_item">
                    <input type="checkbox" class="convenience_items" name="convenience[]" value="' . htmlspecialchars($r['IDTienich']) . '" id="' . htmlspecialchars($r['IDTienich']) . '">
                    <label for="' . htmlspecialchars($r['IDTienich']) . '">' . htmlspecialchars($r['Tienich']) . '</label>
                </div>';
            }
            ?>
        </div>
        <input type="hidden" name="room_id" value="<?= isset($r['IDLoaiphong']) ? htmlspecialchars($r['IDLoaiphong']) : '' ?>">
        <div class="ConvienceConfirm">
            <div class="Cancel_btn">
                <a href="#" class="btn">Huỷ bỏ</a>
            </div>
            <div class="Confirm_btn">
                <input type="submit" name="confirm" value="Xác nhận" class="btn">
            </div>
        </div>
    </form>
</div>

    <script>
$(document).ready(function() {
    // Mở form tạo loại phòng mới
    $('#openCreTypeForm').on('click', function(event) {
        event.preventDefault();
        $('.CreType.MiniContainer').addClass('visible');
    });

    $('.CreType .Cancel_btn .btn').on('click', function(event) {
        event.preventDefault();
        $('.CreType.MiniContainer').removeClass('visible');
    });

    // Xử lý form tạo loại phòng mới
    $('#CreType_form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: './php/CreTypeForm_process.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                    if (response.success) {
                        alert('Loại phòng mới đã được thêm thành công!');
                        $('.CreType.MiniContainer').removeClass('visible');
                    } else if (response.type == 'error') {
                        const errormessage = response.message;
                        if (errormessage === 'TypeRoomname_exists') {
                        $('.er-text').text("Loại phòng này đã tồn tại!");
                        } else if (errormessage === 'Date-not-today') {
                        $('.er-text').text("Ngày tạo phải là hôm nay!");
                        }
                    }
            },
            error: function() {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại.');
            }
        });
    });

    var lastClickedId = null;
    // Lấy chi tiết loại phòng
    $('.type_items').on('click', function(event) {
        event.preventDefault();
        var id = this.getAttribute('data-id');
        var currentUrl = window.location.href.split('?')[0];
        window.location.href = currentUrl + '?page=Management&idroom=' + id;
        var id = $(this).data('id');
        console.log("ID của phòng:", id);
        lastClickedId = id;
        $('#ConvenienceForm').on('submit', function(event) {
        event.preventDefault();

        var formData = $(this).serializeArray();
        var IDroom = lastClickedId;
        if(IDroom){
            console.log('ID là', IDroom)
        }else{
            alert('Không thể lấy ID loại phòng.')
        }

        // Thêm room_id vào formData
        formData.push({ name: "room_id", value: IDroom });
        $.ajax({
            type: 'POST',
            url: './php/ConvenienceForm_process.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                    if (response.success) {
                    alert('Tiện ích đã được thêm thành công!');
                    $('.MiniConvenience.MiniContainer').removeClass('visible');
                } else if (response.type == 'error') {
                    const errorMessage = response.message;
                    if (errorMessage === 'TypeRoomname_exists') {
                        $('.er-text').text("Loại phòng này đã tồn tại!");
                    } else if (errorMessage === 'Date-not-today') {
                        $('.er-text').text("Ngày tạo phải là hôm nay!");
                    }
                }
            },
            error: function(error) {
                let errorMessage = 'Đã xảy ra lỗi. ';
                if (error.response) {
                    errorMessage += 'Máy chủ đã trả về mã lỗi ' + error.response.status + ': ' + error.response.statusText;
                } else if (error.request) {
                    errorMessage += 'Không thể gửi yêu cầu đến máy chủ. Vui lòng kiểm tra kết nối mạng của bạn.';
                } else {
                    errorMessage += 'Có sự cố xảy ra: ' + error.message;
                }
                alert(errorMessage);
            }
            });
        });
        $.ajax({
            url: './php/Get_room_details.php', // This is the PHP file that will return the room details.
            type: 'GET',
            data: { idroom: id },
            dataType: 'json',
            success: function(data) {
                    // Populate the form with the room details
                    $('#RoomName').val(data.Tenloaiphong);
                    $('#RoomDes').val(data.Mota);
                    $('#RoomAdult').val(data.Songuoi);
                    $('#RoomArea').val(data.Dientich);
                    $('#RoomNum').val(data.Sophong);
                    $('#RoomPrice').val(data.Gia);
                    if(data.AnhDD != null){
                        $('#AnhDD').attr('src', './img/'+ data.AnhDD);
                    }else{
                        $('#AnhDD').attr('src', './img/default.jpg');
                    }
                    $('#RoomConvenienceTextarea').val(data.Tienich);

                    // Update hidden input for idRoom
                    $('input[name="idRoom"]').val(data.IDLoaiphong);
                    $.ajax({
                    url: './php/Get_room_img.php',
                    type: 'GET',
                    data: { idroom: id },
                    dataType: 'json',
                    success: function(imageData) {
                        var imageContainer = $('.swiper-wrapper');
                        imageContainer.empty();
                        if (Array.isArray(imageData)) {
                            imageData.forEach(function(img) {
                                imageContainer.append('<div class="swiper-slide"><img src="./img/detail/' + img + '" alt=""></div>');
                            });
                        } else {
                            console.error("imageData is not an array");
                        }

                        initializeSwiper();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert('Failed to fetch room images. Please try again.');
                        }
                    });

                    //  Lấy chi tiết loại phòng
                     $.ajax({
                            url: './php/Get_room_conveniences.php',
                            type: 'GET',
                            data: { idroom: id },
                            dataType: 'json',
                            success: function(data) {
                            $('#ConvienceCheckboxes').empty();

                            // Lặp qua danh sách tiện ích nhận được từ AJAX request
                            data.forEach(function(convenience) {
                                // Tạo HTML cho mỗi tiện ích
                                var convenienceItem = '<div class="Convience_item">' +
                                                        '<input type="checkbox" id="' + convenience.IDTienich + '" name="IDTienich[]" value="' + convenience.IDTienich + '"' + (convenience.checked ? ' checked="checked"' : '') + '>' +
                                                        '<label for="' + convenience.IDTienich + '">' + convenience.Tienich + '</label>' +
                                                    '</div>';

                                // Thêm tiện ích vào giao diện
                                $('#ConvienceCheckboxes').append(convenienceItem);
                            });
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                                alert('Failed to fetch room conveniences. Please try again.');
                            }
                        });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Failed to fetch room details. Please try again.');
            }
        });
        
    });


    

    

    // Thêm Ảnh
    $('#ImgDetail').on('change', function(event) {
        var input = event.target;
        if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imgElement = $('<img>');
                        imgElement.attr('src','./img/detail/' + e.target.result);
                        $('.ImgRoom_Slider .swiper-wrapper').append('<div class="swiper-slide swiper-slide-next"></div>');
                        $('.ImgRoom_Slider .swiper-wrapper .swiper-slide:last-child').append(imgElement);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
                initializeSwiper();
        }
    });
    // Hiển thị Ảnh Đại diện
    const imgRoomInput = document.getElementById('ImgRoom');
    const imgRoomPreview = document.getElementById('AnhDD');
    if (imgRoomInput && imgRoomPreview) {
        imgRoomInput.addEventListener('change', function () {
            const file = imgRoomInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgRoomPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }

     // Cập nhật loại phòng
    document.getElementById('updateRoomForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        fetch('./php/RoomTypeManagement_Upd.php', {
        method: 'POST',
        body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
            let info = data.data;
            let message = `Room Information:\n
                ID Room: ${info.idRoom}\n
                Room Name: ${info.RoomName}\n
                Description: ${info.RoomDes}\n
                Adults: ${info.RoomAdult}\n
                Area: ${info.RoomArea}\n
                Number of Rooms: ${info.RoomNum}\n
                Price: ${info.RoomPrice}\n
                Convenience: ${info.RoomConvenience}\n
                AnhDD: ${info.ImgRoom}\n
                Convenience IDs: ${info.IDTienich.join(', ')}\n
                ImgDetail: ${info.ImgDetail.join(', ')}`;
                alert('Cập nhật phòng thành công!');
            alert(message);
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        });
    });

    function initializeSwiper(){
        var swiper = new Swiper('.swiper', {
            slidesPerView: 2,
            direction: getDirection(),
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
            on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            },
            },
        });
    
        function getDirection() {
            var windowWidth = window.innerWidth;
            var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
            return direction;
        }
    } 
    // Mở form chọn tiện ích
    // console.log("Document ready"); // Check if document ready is being triggered
    
    $('.ConvenienceCheck').on('click', function(event) {
        event.preventDefault();
        console.log("ConvenienceCheck clicked"); // Check if RoomConvenience click event is being triggered
        $('.MiniConvenience.MiniContainer').addClass('visible');
    });

    $('.Cancel_btn').on('click', function(event) {
        event.preventDefault();
        console.log("Cancel_btn clicked"); // Check if ConFinish click event is being triggered
        $('.MiniConvenience.MiniContainer').removeClass('visible');
        updateRoomConvenienceTextarea();
    });
    // Lắng nghe sự kiện thay đổi của các checkbox tiện ích
    $(document).on('change', 'input[name="IDTienich[]"]', function() {
        updateRoomConvenienceTextarea();
    });

    // Hàm để cập nhật RoomConvenienceTextarea dựa trên các tiện ích được chọn
    function updateRoomConvenienceTextarea() {
        var selectedConveniences = [];
        $('input[name="IDTienich[]"]:checked').each(function() {
            selectedConveniences.push($(this).next('label').text());
        });
        $('#RoomConvenienceTextarea').val(selectedConveniences.join(', '));
    }

    // // Khởi tạo danh sách tiện ích khi form được tải lần đầu
    // updateRoomConvenienceTextarea();

    $(document).ready(function() {
    //     $('#ConvenienceForm').on('submit', function(event) {
    //     event.preventDefault();
    //     var formData = $(this).serializeArray();
    //     var id = $(this).data('id');
        
    //     // Thêm id loại phòng vào form data
    //     formData.push({name: "room_id", value: id});

    //     $.ajax({
    //         type: 'POST',
    //         url: './php/ConvenienceForm_process.php',
    //         data: formData,
    //         dataType: 'json',
    //         success: function(response) {
    //             if (response.success) {
    //                 alert('Tiện ích đã được thêm thành công!');
    //                 $('.MiniConvenience.MiniContainer').removeClass('visible');
    //             } else if (response.type == 'error') {
    //                 const errormessage = response.message;
    //                 if (errormessage === 'TypeRoomname_exists') {
    //                     $('.er-text').text("Loại phòng này đã tồn tại!");
    //                 } else if (errormessage === 'Date-not-today') {
    //                     $('.er-text').text("Ngày tạo phải là hôm nay!");
    //                 }
    //             }
    //         },
    //         error: function(error) {
    //             let errorMessage = 'Đã xảy ra lỗi. ';
    //             if (error.response) {
    //                 errorMessage += 'Máy chủ đã trả về mã lỗi ' + error.response.status + ': ' + error.response.statusText;
    //             } else if (error.request) {
    //                 errorMessage += 'Không thể gửi yêu cầu đến máy chủ. Vui lòng kiểm tra kết nối mạng của bạn.';
    //             } else {
    //                 errorMessage += 'Có sự cố xảy ra: ' + error.message;
    //             }
    //             alert(errorMessage);
    //         }
    //     });
    // });

    // Hàm để cập nhật RoomConvenienceTextarea dựa trên các tiện ích được chọn
    function updateRoomConvenienceTextarea() {
        var selectedConveniences = [];
        $('input[name="RoomConvenience[]"]:checked').each(function() {
            selectedConveniences.push($(this).next('label').text());
        });
        $('#RoomConvenienceTextarea').val(selectedConveniences.join(', '));
    }

    // Lắng nghe sự kiện thay đổi của các checkbox tiện ích
    $(document).on('change', 'input[name="RoomConvenience[]"]', function() {
        updateRoomConvenienceTextarea();
    });

    // Khởi tạo danh sách tiện ích khi form được tải lần đầu
    updateRoomConvenienceTextarea();
    });
});
</script>
