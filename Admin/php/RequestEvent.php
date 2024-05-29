<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../php_func/conn.php";
// include "../php_func/func.php";
?>

<div class="Main_container" id="Admin_Main__content">
    <!-- Thanh chọn loại phòng -->
        <div class="TypeBar">
                <div class="TypeCheck medium_btn">
                        <div class="TypeCheck_text">Tất cả</div>
                        <span><i class="fas fa-caret-down fa-beat"></i></span>
                    <ul>
                        <li class="search"><a href="#" data-search-type = "all">Tất cả</a></li>
                        <li class="search"><a href="#" data-search-type = "meeting">Hội họp</a></li>
                        <li class="search"><a href="#" data-search-type = "wedding">Tiệc cưới</a></li>
                        <li class="search"><a href="#" data-search-type = "community">Sự kiện Cộng đồng</a></li>
                        <li class="search"><a href="#" data-search-type = "waiting">Đang chờ xử lí</a></li>
                        <li class="search"><a href="#" data-search-type = "agree">Đã xác nhận</a></li>
                        <li class="search"><a href="#" data-search-type = "cancel">Đã hủy bỏ</a></li>
                    </ul>
                </div>
                <!-- <div class="MemberSearch">
                <input type="search" name="" id="" placeholder="Để trống để tìm theo thứ tự">
                <input type="submit" value="">
                <span class="fa-solid fa-magnifying-glass"></span>
                </div> -->
        </div>
        <div class="Event_Request_Container" id="Request_Event">
                <div class="Request_Component" id="Request_Component">
                    <?php
                    $sql = "SELECT datsk.*, sukien.AnhDD FROM datsk,sukien,taikhoan
                    WHERE sukien.IDSukien = datsk.IDSukien
                    AND datsk.IDTaiKhoan = taikhoan.IDTaiKhoan
                    GROUP BY datsk.IDDatsk 
                    ORDER BY (CASE datsk.Trangthai WHEN '1' THEN 1 
                    WHEN '2' THEN 2 
                    WHEN '0' THEN 3 
                    END )ASC, datsk.Trangthai DESC";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['Trangthai'] == '1'){
                            $status = "Đang chờ";
                        }else if($row['Trangthai'] == '2'){
                            $status = "Đã xác nhận";
                        }else if($row['Trangthai'] == '0'){
                            $status = "Đã Hủy bỏ";
                        }

                         // Set CSS classes based on status
                        $detailDisabled = '';
                        $disabledClass = '';
                        $agreeDisabled = '';
                        $deleteDisabled = '';
                        if ($status == "Đã xác nhận") {
                            $agreeDisabled = 'disabled';
                        } else if ($status == "Đã Hủy bỏ") {
                             $disabledClass = 'disabled';
                            $agreeDisabled = 'disabled';
                            $deleteDisabled = 'disabled';
                            $detailDisabled = '';
                        }
                    ?>
                    <div class="Request <?= $disabledClass?>" data-id="<?= $row['IDDatsk']?>"> 
                        <div class="Img_Request">
                            <img src="../Front_end/img/<?= $row['AnhDD']?>">
                        </div> 
                        <div class="Request_content">
                            <h3>Tên khách hàng: <span class="lighter"><?= $row['TenKH']?></span> </h3>
                            <h3>Số điện thoại: <span class="lighter"><?= $row['Sodt']?></span></h3>
                            <h3>Email: <span class="lighter"><?= $row['Email']?></span></h3>
                            <h3>Công ty: <span class="lighter"><?= $row['Congty']?></span></h3>
                            <h3>Tình trạng: <span class="lighter"><?= $status?></span></h3>
                            <div class="request BasicEdit">
                                <div class="request Agree_btn <?= $agreeDisabled?>" data-id="<?= $row['IDDatsk']?>">
                                    <a href="#" class="btn">Đồng ý</a>
                                    </div>
                                    <div class="request Detail_btn <?= $detailDisabled?>" style="z-index: 1999;" data-id="<?= $row['IDDatsk']?>">
                                        <a href="#" class="btn">Chi tiết</a>
                                    </div>
                                    <div class="request Delet_btn <?= $deleteDisabled?>" data-id="<?= $row['IDDatsk']?>">
                                        <a href="#" class="btn">Hủy bỏ</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }else{
                        echo "<h3>Không có yêu cầu nào :(</h3>";
                    }
                    ?>
                </div>
        </div>
    
        <!-- Form tạo thêm loại -->
        <div class="CheckEvent MiniContainer">
            <form class="CheckEvent MiniForm">
                <h2>Chi tiết yêu cầu</h2>
                <!-- <span><i class = "fa-solid fa-x fa-beat"></i></span> -->
                <div class="CheckEvent_Top">
                        <div class="checkEvent Name">
                            <label for="Name">Tên khách hàng</label>
                            <input type="text" name="Name" id="Name">
                        </div>
                        <div class="checkEvent Email">
                            <label for="Email">Email</label>
                            <input type="email" name="Email" id="Email">
                        </div>
                        <div class="checkEvent Phone">
                            <label for="Phone">Số điện thoại</label>
                            <input type="text" name="Phone" id="Phone">
                        </div>
                        <div class="checkEvent CreDay">
                            <label for="CreDay">Ngày đặt</label>
                            <input type="text" name="CreDay" id="CreDay">
                        </div>
                </div>
                <div class="CheckEvent_bottom">
                        <div class="checkEvent note">
                            <label for="Note">Ghi chú</label>
                            <textarea name="Note" id="Note" cols="30" rows="10" value="Nhập những thông tin thêm" >
                            </textarea>
                        </div>
                </div>
                <div class="CheckEvent_Confirm">
                        <div class="checkEvent_confirm_btn">
                            <a href="#" class="btn">Xác nhận</a>
                        </div>
                        <!-- <div class="checkEvent_confirm_btn">
                            <input type="submit" name="confirm" id="" value="Xác nhận" class="btn"> 
                        </div> -->
                </div>
            </form>
        </div>
</div>
<script>
   $(document).ready(function() {
    $(document).on("click", ".Detail_btn", function(event) {
        // Prevent default action for the click event
        event.preventDefault();

        // Make the event container visible
        $(".CheckEvent.MiniContainer").addClass("visible");

        // Get the ID from the clicked button
        var IDDatsk = $(this).attr("data-id");
        console.log('IDDatsk:', IDDatsk);

        // Perform the AJAX request
        $.ajax({
            url: "./php/Get_RequestEvent_info.php",
            method: "GET",
            data: { idsk: IDDatsk },
            dataType: "json",
            success: function(data) {
                // Log the received data
                console.log(data);

                // Populate form fields with the received data
                $("#CreDay").val(data.Ngaydat);
                $("#Name").val(data.TenKH);
                $("#Email").val(data.Email);
                $("#Phone").val(data.Sodt);
                $("#Note").val(data.Ghichu);
            },
            error: function(xhr, status, error) {
                // Log the error details
                console.log('XHR:', xhr);
                console.log('Status:', status);
                console.log('Error:', error);

                // Alert the user about the error
                alert("Lỗi: " + error);
            }
        });
    });

    $(document).on("click", ".checkEvent_confirm_btn", function() {
        // Make the event container invisible
        $(".CheckEvent.MiniContainer").removeClass("visible");
    });
    $(document).on("click", ".Agree_btn:not(.disabled)", function() {
            event.preventDefault();
               // Hiển thị hộp thoại xác nhận
               var confirmation = confirm('Bạn chấp nhận yêu cầu không?');
               // Nếu người dùng đồng ý
               if (confirmation) {
                    // Lấy ID của phòng cần xóa
                    var id = $(this).data('id');
                    console.log('id duyệt:', id);
                    AgreeEvent(id); // Gọi hàm xóa phòng với ID tương ứng
               }

            function AgreeEvent(id) {
            $.ajax({
                url: "../Admin/php_func/RequestEvent_Agree.php",
                method: "POST",
                data: { idsk: id },
                // dataType: "json",
                success: function(response) {
                        console.log(response);
                         // Xử l phản hồi từ máy chủ nếu cần
                         // Ví dụ: hiển thị thông báo thành công, làm mới trang, vv.
                         alert('Đơn đặt sự kiện đã được duyệt.');
                          location.reload(); // Làm mới trang sau khi xóa
                },
                error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.error("Error details:", xhr, status, error);
                        alert('Có lỗi xảy ra khi duyệt đơn: ' + xhr.status + ' ' + xhr.statusText + ' - ' + error);
                }
            });
        }   
    });

    $(document).on("click", ".Delet_btn:not(.disabled)", function() {
            event.preventDefault();
               // Hiển thị hộp thoại xác nhận
               var confirmation = confirm('Bạn chấp nhận hủy yêu cầu không?');
               // Nếu người dùng đồng ý
               if (confirmation) {
                    // Lấy ID của phòng cần xóa
                    var id = $(this).data('id');
                    console.log('id hủy:', id);
                    DeleteEvent(id); // Gọi hàm xóa phòng với ID tương ứng
               }

            function DeleteEvent(id) {
            $.ajax({
                url: "../Admin/php_func/RequestEvent_Delete.php",
                method: "POST",
                data: { idsk: id },
                // dataType: "json",
                success: function(response) {
                        console.log(response);
                         // Xử l phản hồi từ máy chủ nếu cần
                         // Ví dụ: hiển thị thông báo thành công, làm mới trang, vv.
                         alert('Đơn đặt sự kiện đã được hủy bỏ.');
                          location.reload(); // Làm mới trang sau khi xóa
                },
                error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.error("Error details:", xhr, status, error);
                        alert('Có lỗi xảy ra khi duyệt đơn: ' + xhr.status + ' ' + xhr.statusText + ' - ' + error);
                }
            });
        }   
    });

    // Xử lý sự kiện nhấp chuột vào các phần tử li
    $('.search a').on('click', function(event) {
        event.preventDefault();

        // Lấy giá trị của thuộc tính data-search-type
        var searchType = $(this).data('search-type');
        var searchText = $(this).text();

        // Đặt văn bản vào phần tử TypeCheck_text
        $('.TypeCheck_text').text(searchText);

        console.log('Search Type:', searchType);

        // Thực hiện AJAX request để lấy dữ liệu theo loại tìm kiếm
        $.ajax({
            url: './php_func/RequestEvent_Search.php', // Tạo một tệp PHP để xử l yêu cầu
            method: 'GET',
            data: { type: searchType },
            dataType: 'html', // Định dạng dữ liệu trả về có thể là JSON hoặc HTML
            success: function(response) {
                console.log(response);
                // Đặt nội dung trả về vào container
                $('#Request_Component').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr, status, error);
                alert('Có lỗi xảy ra khi tải dữ liệu: ' + error);
            }
        });
    });
});
</script>

