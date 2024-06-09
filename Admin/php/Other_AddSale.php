<?php
include "../php_func/conn.php";
include "../php_func/Utilities_func.php";
?>

<div class="AddSale_container">
    <div class="content">
        <button class="add-offer-btn title_20">Thêm ưu đãi</button>
        <div class="offer-cards">
            <?php
            $sql = "SELECT uudai.*, loaiud.TenUD, loaiphong.TenLoaiPhong, loaiphong.AnhDD
                    FROM uudai
                    JOIN loaiud ON uudai.IDLoaiUD = loaiud.IDLoaiUD
                    JOIN loaiphong ON uudai.IDLoaiphong = loaiphong.IDLoaiphong
                    GROUP BY uudai.IDUudai";
            $result = mysqli_query($conn, $sql);
            while($r = mysqli_fetch_assoc($result)){
                $ngaybatdau = date('d/m/Y', strtotime($r['Ngaybatdau']));
                $ngayketthuc = date('d/m/Y', strtotime($r['Ngayketthuc']));

                $donvi = $r['Donvi'] == '1' ? '%' : 'VND';
                if($r['IDLoaiUD'] == '2'){
                    $loaiud = 'Ưu đãi';
                } else if($r['IDLoaiUD'] == '1'){
                    $loaiud = 'Giảm giá';
                }
                $disabled = '';
                if($r['Trangthai'] == '1'){
                    $disabled = '';
                } else {
                    $disabled = 'disabled';
                }
                if($r['Trangthai'] == '1'){
                    $status = 'Đang áp dụng';
                } else if($r['Trangthai'] == '0'){
                    $status = 'Không còn áp dụng';
                }
            ?>
            <div class="offer-card">
                <img src="./img/<?= $r['AnhDD'] ?>">
                <div class="offer-details">
                    <h3 class="title_20"><?= $r['Tieude'] ?></h3>
                    <p class="title_16"><b>Loại phòng:</b> <span class="lighter"><?= $r['TenLoaiPhong'] ?></span></p>
                    <p class="title_16"><b><?= $loaiud ?>:</b> <span class="discount lighter"><?= $r['Nhangiam'] ?><?= $donvi ?></span></p>
                    <p class="title_16"><b>Thời gian:</b> <span class="lighter"><?= $ngaybatdau ?></span> - <span class="lighter"><?= $ngayketthuc ?></span></p>
                </div>
                <div class="absolute_text status<?=$r['Trangthai']?>">
                    <?php  
                        if(isset($ngayketthuc)){
                            $sql = "UPDATE uudai SET Trangthai = 0 WHERE ngayketthuc <= CURDATE()";
    
                            // Thực thi câu lệnh SQL
                            if ($conn->query($sql) === TRUE) {
                                $alert = "Cập nhật trạng thái thành công";
                            } else {
                                $alert = "Lỗi khi cập nhật trạng thái: " . $conn->error;
                            }
                        }
                    ?>
                    <?= $status ?>
                </div>
                <div class="offer-actions">
                    <button class="edit-btn" data-id="<?= $r['IDUudai'] ?>">Chỉnh sửa</button>
                    <button class="cancel-btn" data-id="<?= $r['IDUudai'] ?>">Hủy bỏ</button>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div id="AddSaleModal" class="AddSale modal">
    <div class="modal-content">
        <h3>Ưu đãi</h3>
        <form id="AddSaleForm">
            <div class="form-group half-width">
                <label for="title">Tiêu đề</label>
                <input type="text" id="title" name="title" value="">
            </div>
            <div class="form-group half-width">
                <label for="discount-type">Loại ưu đãi</label>
                <select id="discount-type" name="discount-type">
                    <?php 
                        $sql = "SELECT * FROM loaiud";
                        $result = mysqli_query($conn, $sql);
                        while($r = mysqli_fetch_assoc($result)){
                            echo "<option value='{$r['IDLoaiUD']}'>{$r['TenUD']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group second-width two-item">
                <div class="half">
                    <label for="discount-value">Giá trị nhận giảm</label>
                    <input type="text" id="discount-value" name="discount-value" value="">
                </div>
                <div class="half">
                    <label for="unit">Đơn vị</label>
                    <select id="unit" name="unit">
                        <option value="1">%</option>
                        <option value="0">VND</option>
                        <option value="2">Xuất</option>
                        <option value="3">Buổi</option>
                    </select>
                </div>
            </div>
            <div class="form-group second-width">
                <label for="room-type">Loại phòng được ưu đãi</label>
                <select id="room-type" name="room-type">
                    <?php 
                    $sql = "SELECT * FROM loaiphong";
                    $result = mysqli_query($conn, $sql);
                    while($r = mysqli_fetch_assoc($result)){
                        echo "<option value='{$r['IDLoaiphong']}'>{$r['Tenloaiphong']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group half-width">
                <label for="start-date">Ngày bắt đầu</label>
                <input type="date" id="start-date" name="start-date" value="<?= date('Y-m-d')?>">
            </div>
            <div class="form-group half-width">
                <label for="end-date">Ngày kết thúc</label>
                <input type="date" id="end-date" name="end-date" value="<?= date('Y-m-d', strtotime('+7 days'))?>">
            </div>
            <div class="Type Alert">
                <div class="er-text"></div>
                <div class="cor-text"></div>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn title_18">Hủy bỏ</button>
                <button type="submit" class="confirm-btn title_18">Xác nhận</button>
            </div>
        </form>
    </div>
</div>

<div id="UpdSale_modal" class="AddSale modal">
    <div class="modal-content">
        <h3>Cập nhật Ưu đãi</h3>
        <form id="UpdSale_form">
            <div class="form-group half-width">
                <label for="title">Tiêu đề</label>
                <input type="text" id="UpdSale_title" value="Giảm giá tháng hè">
            </div>
            <div class="form-group half-width">
                <label for="discount-type">Loại ưu đãi</label>
                <select id="UpdSale_discount-type">
                    <?php 
                        $sql = "SELECT * FROM loaiud";
                        $result = mysqli_query($conn, $sql);
                        while($r = mysqli_fetch_assoc($result)){
                            echo "<option value='{$r['IDLoaiUD']}'>{$r['TenUD']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group second-width two-item">
                <div class="half">
                    <label for="discount-value">Giá trị nhận giảm</label>
                    <input type="text" id="UpdSale_discount-value" value="">
                </div>
                <div class="half">
                    <label for="unit">Đơn vị</label>
                    <select id="UpdSale_unit">
                        <option value="1">%</option>
                        <option value="0">VND</option>
                        <option value="2">Xuất</option>
                        <option value="3">Buổi</option>
                    </select>
                </div>
            </div>
            <div class="form-group second-width">
                <label for="room-type">Loại phòng được ưu đãi</label>
                <select id="UpdSale_room-type">
                    <?php 
                    $sql = "SELECT * FROM loaiphong";
                    $result = mysqli_query($conn, $sql);
                    while($r = mysqli_fetch_assoc($result)){
                        echo "<option value='{$r['IDLoaiphong']}'>{$r['Tenloaiphong']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group half-width">
                <label for="start-date">Ngày bắt đầu</label>
                <input type="date" id="UpdSale_start-date" value="<?= date('Y-m-d')?>">
            </div>
            <div class="form-group half-width">
                <label for="end-date">Ngày kết thúc</label>
                <input type="date" id="UpdSale_end-date" value="<?= date('Y-m-d', strtotime('+7 days'))?>">
            </div>
            <input type="hidden" name="IDUudai" id="UpdSale_IDUudai">
            <div class="Type Alert">
                <div class="er-text"></div>
                <div class="cor-text"></div>
            </div>
            <div class="form-actions">
                <button type="button" class="UpdSale cancel-btn title_18">Hủy bỏ</button>
                <button type="submit" class="UpdSale confirm-btn title_18">Xác nhận</button>
            </div>
        </form>
    </div>
</div>

<script>
   $(document).on('click', '.add-offer-btn', function(event) {
    event.preventDefault();
    $('#AddSaleModal').css('display', 'block');

    $('#AddSaleForm').on('submit', function(e) {
        e.preventDefault();

        let dataform = {
            'title': $('#title').val(),
            'discount-type': $('#discount-type').val(),
            'discount-value': $('#discount-value').val(),
            'unit': $('#unit').val(),
            'room-type': $('#room-type').val(),
            'start-date': $('#start-date').val(),
            'end-date': $('#end-date').val()
        };
        // console.log(dataform);
        $.ajax({
            url: './php_func/AddSale_Add.php',
            method: 'POST',
            data: dataform,
            dataType: 'json',
            success: function(data) {
                if (data.type === 'success') {
                    alert('Thêm ưu đãi thành công!');
                    console.log(data);
                    $('#AddSaleModal').css('display', 'none');
                    location.reload();
                } else if (data.type === 'error') {
                    const ermessage = data.message;
                    if (ermessage === 'Discount_exists') {
                        $('.Type.Alert .er-text').text('Ưu đãi đã tồn tại!');
                    } else {
                        $('.Type.Alert .er-text').text(ermessage);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    });

    $(document).on('click', '.edit-btn', function() {
       event.preventDefault();
       $('#UpdSale_modal').css('display', 'block');
       var IDUudai = $(this).data('id');
       console.log('IDUudai', IDUudai);
       
       $.ajax({
        url: './php_func/AddSale_Get.php',
        method: 'GET',
        data: {IDUudai: IDUudai},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#UpdSale_IDUudai').val(data.IDUudai);
            $('#UpdSale_title').val(data.Tieude);
            $('#UpdSale_discount-type').val(data.IDLoaiUD);
            $('#UpdSale_discount-value').val(data.Nhangiam);
            $('#UpdSale_unit').val(data.Donvi);
            $('#UpdSale_room-type').val(data.IDLoaiphong);
            $('#UpdSale_start-date').val(data.Ngaybatdau);
            $('#UpdSale_end-date').val(data.Ngayketthuc);
        },error: function(xhr, status, error) {
            console.log(error);
        }
       });

       $('#UpdSale_modal').on('submit', function(e) {
        e.preventDefault();
        let IDUudai = $('#UpdSale_IDUudai').val();

        let dataform = {
            'IDUudai': $('#UpdSale_IDUudai').val(),
            'title': $('#UpdSale_title').val(),
            'discount-type': $('#UpdSale_discount-type').val(),
            'discount-value': $('#UpdSale_discount-value').val(),
            'unit': $('#UpdSale_unit').val(),
            'room-type': $('#UpdSale_room-type').val(),
            'start-date': $('#UpdSale_start-date').val(),
            'end-date': $('#UpdSale_end-date').val()
        };
        console.log(dataform);
        $.ajax({
            url: './php_func/AddSale_Upd.php',
            method: 'POST',
            data: dataform,
            // dataType: 'json',
            success: function(data) {
                console.log(data);
                alert('Cập nhật ưu đãi thành công!');
                $('#UpdSale_modal').css('display', 'none');
                location.reload();    
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
       });
    });

    $(document).on('click', '.cancel-btn', function() {
        event.preventDefault();

        var confirmation = confirm('Bạn chấp nhận hủy yêu cầu này không?');
        // Nếu người dùng đồng ý
        if (confirmation) {
            // Lấy ID của phòng cần xóa
            var IDUudai = $(this).data('id');
            console.log('IDUudai', IDUudai);
            DeleteDiscount(IDUudai); // Gọi hàm xóa phòng với ID tương ứng
        }
        
        function DeleteDiscount(IDUudai) {
           $.ajax({
            url: './php_func/AddSale_Del.php',
            method: 'POST',
            data: {IDUudai: IDUudai},
            dataType: 'json',
            success: function(data) {
                console.log(data);
                alert('Hủy ưu đãi thành công!');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
           });
        }
    });

$(document).on('click', '.cancel-btn', function() {
    $('#AddSaleModal').css('display', 'none');
});
$(document).on('click', '.UpdSale.cancel-btn', function() {
    $('#UpdSale_modal').css('display', 'none');
});
</script>
