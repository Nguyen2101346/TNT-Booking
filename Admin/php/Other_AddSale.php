<div class="AddSale_container">
    <div class="content">   
        <button class="add-offer-btn title_20" onclick="openModal()">Thêm ưu đãi</button>
            <div class="offer-cards">
                <div class="offer-card">
                    <img src="../img/phòng1.jpg" alt="Room">
                    <div class="offer-details">
                        <h3>Giảm giá tháng hè</h3>
                        <p><b>Loại phòng:</b> Deluxe 2 Giường Đơn</p>
                        <p><b>Giảm:</b> <span class="discount">10%</span></p>
                        <p><b>Thời gian:</b> 20/05/2024 - 20/06/2024</p>
                    </div>
                    <div class="offer-actions">
                        <button onclick="openModal()">Chỉnh sửa</button>
                        <button class="cancel-btn">Hủy bỏ</button>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <div id="AddSale_modal" class="modal">
        <div class="modal-content">
            <h3>Ưu đãi</h3>
            <form>
                <div class="form-group half-width">
                    <label for="title">Tiêu đề</label>
                    <input type="text" id="title" value="Giảm giá tháng hè">
                </div>
                <div class="form-group half-width">
                    <label for="discount-type">Loại ưu đãi</label>
                    <select id="discount-type">
                        <option>Giảm giá (và Dịch vụ)</option>
                    </select>
                </div>
                <div class="form-group second-width two-item">
                    <div class="half">
                        <label for="discount-value">Giá trị nhận giảm</label>
                        <input type="text" id="discount-value" value="10">
                    </div>
                    <div class="half">
                        <label for="unit">Đơn vị</label>
                        <select id="unit">
                            <option>VND</option>
                        </select>
                    </div>
                </div>
                <div class="form-group second-width">
                    <label for="room-type">Loại phòng được ưu đãi</label>
                    <select id="room-type">
                        <option>Deluxe 2 Giường Đơn</option>
                    </select>
                </div>
                <div class="form-group half-width">
                    <label for="start-date">Ngày bắt đầu</label>
                    <input type="date" id="start-date" value="2024-05-20">
                </div>
                <div class="form-group half-width">
                    <label for="end-date">Ngày kết thúc</label>
                    <input type="date" id="end-date" value="2024-06-20">
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeModal()">Hủy bỏ</button>
                    <button type="submit" class="confirm-btn">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('AddSale_modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('AddSale_modal').style.display = 'none';
        }

        // Close the modal when clicking outside of the modal content
        window.onclick = function (event) {
            if (event.target === document.getElementById('modal')) {
                closeModal();
            }
        }

    </script>