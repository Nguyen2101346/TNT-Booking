
    <div class="Container">
        <div class="Content_container">
            <div class="Info_Container">
                <div class="Info_list">
                    <div class="info_avt">
                        <div class="info-img">
                            <img src="./img/person.png" alt="">
                            <div class="changeAvt">
                                <label for="Avtchange">
                                    <img src="./img/changeAvt.png" alt="">
                                </label>
                                <input type="file" name="" id="Avtchange">       
                            </div>
                        </div>
                        <div class="content">Member</div>
                    </div>
                    <div class="info_coin">
                        <div class="content">Giá trị tích lũy:</div>
                        <span class="content">0 VNĐ</span>
                        <a href="index.php?page=History<?php if($change == 1) echo '&go=1'?>" class="content">Lịch sử &gt</a>
                    </div>
                    <div class="info_detail">
                        <div class="item info active">
                            <div class="info-icon">
                                <img src="./img/Account.png" alt="">
                            </div>
                            <a href="information.php" class="content">Thông tin tài khoản</a>
                        </div>
                        <div class="item logout">
                            <div class="logout-icon"> <img src="./img/logout.png" alt=""></div>
                            <a href="./php_function/logout.php" class="content">Đăng xuất</a>
                        </div>
                    </div>
                </div>
                <div class="Update_list">
                    <h1 class="title large">Thông tin tài khoản</h1>
                    <form action="#">
                        <fieldset>
                            <legend class="content">Thông tin liên hệ</legend>
                            <div class="name">
                                <div class="name_item">
                                    <label for="lastName" class="content">Họ</label>
                                    <input type="text" id="lastName" name="lastName" required>
                                </div>
                                <div class="name_item">
                                    <label for="firstName" class="content"> Tên</label>
                                    <input type="text" id="firstName" name="firstName" required>
                                </div>
                            </div>
                            <div class="gender">
                                <legend>Giới tính</legend>
                                <div class="radio">
                                    <div class="gender_item">
                                        <input type="radio" id="male" name="gender" value="male" checked>
                                        <label for="male">Nam</label>
                                    </div>
                                    <div class="gender_item">
                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Nữ</label>
                                    </div>
                                    <div class="gender_item">
                                        <input type="radio" id="other" name="gender" value="other">
                                        <label for="other">Khác</label>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <div class="douContact">
                                    <div class="contact_item">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" required>
                                    </div>
                                    <div class="contact_item">
                                        <label for="phone">Số điện thoại:</label>
                                        <input type="tel" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="contact_item">
                                    <label for="address">Địa chỉ:</label>
                                    <input type="text" id="address" name="address" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="content">Thông Tin Giấy Tờ</legend>
                            <div class="identify">
                                <div class="identify_item">
                                    <label for="idType">Giấy tờ tùy thân:</label>
                                    <select id="idType" name="idType">
                                        <option value="cmnd">CMND</option>
                                        <option value="cccd">CCCD</option>
                                        <option value="passport">Hộ chiếu</option>
                                    </select>
                                </div>
                                <div class="identify_item">
                                    <label for="dob">Ngày sinh:</label>
                                    <input type="date" id="dob" name="dob" required>
                                </div>
                            </div>
                            <div class="identify">
                                <div class="identify_item">
                                    <label for="idNumber">Số CMND/CCCD:</label>
                                    <input type="text" id="idNumber" name="idNumber" required>
                                </div>
                                <div class="identify_item">
                                    <label for="nationality">Quốc tịch:</label>
                                    <input type="text" id="nationality" name="nationality" required>
                                </div>
                            </div>
                        </fieldset>
                        <div class="InforSave_btn">
                            <input type="submit" value="Lưu">
                        </div>
                    </form>
                </div>
            </div>
        </div>