<?php
include "../php_func/conn.php";
include "../php_func/Utilities_func.php";
?>
    <div class="Utilities_container">
        <div class="content">
            <button class="add-button title_20" id="addButton">Thêm tiện ích</button>
            <div class="items">
                <?php
                $result = fetchUtilities($conn);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="item" data-id="' . $row["IDTienich"] . '">';
                        echo '<span class="title_20">' . $row["Tienich"] . '</span>';
                        echo '<button class="remove-button">✖</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No utilities found</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="modal" id="modal">
        <div class="modal-content">
            <h2 class="title_20">Thêm tiện ích</h2>
            <form id="addForm" method="post" action="Utilities.php">
                <div class="input-group">
                    <label for="itemName" class="title_16">Tên tiện ích</label>
                    <input type="text" id="itemName" name="itemName" class="input-text">
                </div>
                <div class="modal-buttons">
                    <button type="button" class="cancel-button title_18" id="cancelButton">Hủy bỏ</button>
                    <button type="submit" class="confirm-button title_18">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#addButton').on('click', function() {
                $('#modal').removeClass('modal-hide').addClass('modal-show');
            });

            $('#cancelButton').on('click', function() {
                $('#modal').removeClass('modal-show').addClass('modal-hide');
            });

            // Thêm sự kiện click cho nút X cho các mục hiện có và mới được thêm
            $(document).on('click', '.remove-button', function() {

                var confirmation = confirm('Bạn chấp nhận hủy Tiện ích này không?');
                // Nếu người dùng đồng ý
                if (confirmation) {
                        // Lấy ID của phòng cần xóa
                        var itemId = $(this).parent().data('id');
                        var itemElement = $(this).parent();
                        console.log('id hủy:', itemId);
                        DeleteUtilites(itemId); // Gọi hàm xóa phòng với ID tương ứng
                }


                function DeleteUtilites(itemId) {
                    $.ajax({
                    type: 'POST',
                    url: './php/Utilities.php',
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
                }
            });

            // Thêm sự kiện submit form để thêm tiện ích
            $('#addForm').on('submit', function(event) {
                event.preventDefault();
                var itemName = $('#itemName').val();
                $.ajax({
                    type: 'POST',
                    url: './php/Utilities.php',
                    data: {
                        itemName: itemName,
                        action: 'add' // Thêm action vào dữ liệu gửi đi
                    },
                    success: function() {
                        // Sau khi thêm thành công, cập nhật lại danh sách tiện ích
                        updateUtilitiesList('update'); // Truyền tham số "action" và đặt giá trị là "update"
                        $('#itemName').val(''); // Reset input field
                        alert('Thêm tiện ích thành công');
                        $('#modal').removeClass('modal-show').addClass('modal-hide');
                    }
                });
            });

            // Hàm cập nhật danh sách tiện ích
            function updateUtilitiesList(action) {
                $.ajax({
                    type: 'GET',
                    url: './php_func/update_utilities_list.php',
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