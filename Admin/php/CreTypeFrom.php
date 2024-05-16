<div class="CreType MiniContainer">
    <form class="CreType MiniForm" action="CreTypeFrom_process.php" method="POST" id="CreType_form">
        <h2>Thêm loại phòng mới</h2>
        <div class="Type Num">
                <label for="">Thứ tự</label>
                <input type="text" name="" id="">
        </div>
        <div class="Type Name">
                <label for="">Tên loại phòng</label>
                <input type="text" name="CreType_Tenloaiphong" id="" required>
        </div>
        <div class="Type Day">
                <label for="">Ngày tạo</label>
                <input type="date" name="CreType_Ngaytao" id="" value="<?= getdate()['year'] . '-' . getdate()['mon'] . '-' . getdate()['mday'] ?>" required >
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
                    <input type="submit" name="confirm" id="" value="Xác nhận" class="btn"> 
                </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const CreTypeForm = document.getElementById('CreType_form');
    
        CreTypeForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của form
    
            // Lấy dữ liệu từ form
            const formData = new FormData(CreTypeForm);
            // Gửi dữ liệu form bằng AJAX
            fetch(CreTypeForm.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Chuyển đổi kết quả nhận được thành JSON
            .then(data => {
                // Xử lý kết quả nhận được
                if (data.success) {
                    // Nếu thành công, hiển thị thông báo thành công và xóa dữ liệu trong form
                    const message = data.message;
                    document.querySelector('.cor-text').textContent = "Tạo phòng thành công !";
                    // window.location.href = "Mananegement.php"
                    // window.location.href = 'login_remake.php'; 
                } else if (data.type === 'error') {
                    // Xử lý các loại lỗi khác nhau
                    const errorMessage = data.message;
                    if (errorMessage === 'TypeRoomname_exists') {
                            document.querySelector('.er-text').textContent = "Loại phòng này đã có rồi !";
                    } else if (errorMessage === 'Date_not_today') {
                            document.querySelector('.er-text').textContent = "Ngày tạo phải là hôm nay !";
                    } else {
                            document.querySelector('.er-text').textContent = "Có một vài lỗi nhỏ: " + errorMessage;
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
        });
    </script>
    </div>