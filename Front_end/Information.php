
    <div class="Container">
        <div class="Content_container">
            <form action="index.php?page=Information&go=1" method="post" enctype="multipart/form-data">
                <div class="Info_Container">
                    <div class="Info_list">
                        <div class="info_avt">
                            <div class="info-img">
                                <?php
                                    $sql = "SELECT Tendangnhap,Avatar
                                            FROM taikhoan
                                            WHERE IDTaikhoan = ".$_SESSION['userID']."";
                                    $re = mysqli_query($conn, $sql);
                                    $r = mysqli_fetch_array($re);
                                ?>
                                <img id="avatarPreview" src="<?php if(isset($r['Avatar']) && $r['Avatar']!=""){echo './img_members/'.$r['Avatar'].'';}else{echo './img/person.png';}?>"alt="">
                                <div class="changeAvt">
                                    <label for="Avtchange">
                                        <img src="./img/changeAvt.png" alt="">
                                    </label>
                                    <input type="file" name="changeAvt" id="Avtchange" accept="image/*">       
                                </div>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const avatarInput = document.getElementById('Avtchange');
                                    const avatarPreview = document.getElementById('avatarPreview');

                                    avatarInput.addEventListener('change', function(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                avatarPreview.src = e.target.result;
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                });
                            </script>
                            <?php
                                
                            ?>
                            <div class="content"><?php if(isset($r['Tendangnhap']) && $r['Tendangnhap']!=""){echo $r['Tendangnhap'];}?></div>
                        </div>
                        <?php
                            $sql = "SELECT SUM(Tonggia) AS Tichluy FROM datphong Where IDTaikhoan=".$_SESSION['userID']."";
                            $re = mysqli_query($conn, $sql);
                            $r = mysqli_fetch_array($re);
                        ?>
                        <div class="info_coin">
                            <div class="content">Giá trị tích lũy:</div>
                            <span class="content"><?php if(isset($r['Tichluy']) && $r['Tichluy']!=0){ echo $r['Tichluy']." VNĐ";}?></span>
                            <a href="index.php?page=History<?php if($change == 1) echo '&go=1'?>" class="content">Lịch sử &gt</a>
                        </div>
                        <div class="info_detail">
                            <div class="item info active">
                                <div class="info-icon">
                                    <img src="./img/Account.png" alt="">
                                </div>
                                <a href="index.php?page=Information<?php if($change == 1) echo '&go=1'?>" class="content">Thông tin tài khoản</a>
                            </div>
                            <div class="item info">
                                <div class="info-icon">
                                    <img src="./img/Bill-re.png" alt="">
                                </div>
                                <a href="index.php?page=History<?php if($change == 1) echo '&go=1'?>" class="content">Đơn hàng của tôi</a>
                            </div>
                            <div class="item logout">
                                <div class="logout-icon"> <img src="./img/logout.png" alt=""></div>
                                <a href="./php_function/logout.php" class="content">Đăng xuất</a>
                            </div>
                        </div>
                </div>
                <div class="Update_list">
                    <h1 class="title large">Thông tin tài khoản</h1>
                    <?php
                        $sql = "SELECT *
                                FROM taikhoan
                                WHERE IDTaikhoan = ".$_SESSION['userID']."";
                        $re = mysqli_query($conn, $sql);
                        $r = mysqli_fetch_array($re);
                    ?>
                        <fieldset>
                            <legend class="content">Thông tin liên hệ</legend>
                            <div class="name">
                                <div class="name_item">
                                    <label for="lastName" class="content">Họ</label>
                                    <input type="text" id="lastName" name="lastName" value="<?php if(isset($r['Ho']) && $r['Ho']!=""){echo $r['Ho'];}?>" required>
                                </div>
                                <div class="name_item">
                                    <label for="firstName" class="content"> Tên</label>
                                    <input type="text" id="firstName" name="firstName" value="<?php if(isset($r['Ten']) && $r['Ten']!=""){echo $r['Ten'];}?>" required>
                                </div>
                            </div>
                            <div class="gender">
                                <legend>Giới tính</legend>
                                <div class="radio">
                                    <div class="gender_item">
                                        <input type="radio" id="male" name="gender" value="0" <?php if(isset($r['Gioitinh']) && $r['Gioitinh']=="0") {echo "checked";}?>>
                                        <label for="male">Nam</label>
                                    </div>
                                    <div class="gender_item">
                                        <input type="radio" id="female" name="gender" value="1" <?php if(isset($r['Gioitinh']) && $r['Gioitinh']=="1") {echo "checked";}?>>
                                        <label for="female">Nữ</label>
                                    </div>
                                    <div class="gender_item">
                                        <input type="radio" id="other" name="gender" value="2" <?php if(isset($r['Gioitinh']) && $r['Gioitinh']=="2") {echo "checked";}?>>
                                        <label for="other">Khác</label>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <div class="douContact">
                                    <div class="contact_item">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" value="<?php if(isset($r['Email']) && $r['Email']!=""){echo $r['Email'];}?>" required>
                                    </div>
                                    <div class="contact_item">
                                        <label for="phone">Số điện thoại:</label>
                                        <input type="tel" id="phone" name="phone" value="<?php if(isset($r['Sodt']) && $r['Sodt']!=""){echo $r['Sodt'];}?>" required>
                                    </div>
                                </div>
                                <div class="contact_item">
                                    <label for="address">Địa chỉ:</label>
                                    <input type="text" id="address" name="address" value="<?php if(isset($r['Diachi']) && $r['Diachi']!=""){echo $r['Diachi'];}?>" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="content">Thông Tin Giấy Tờ</legend>
                            <div class="identify">
                                <div class="identify_item">
                                    <label for="idType">Giấy tờ tùy thân:</label>
                                    <select id="idType" name="idType">
                                        <option value="CMND" <?php if(isset($r['Loaigiayto']) && $r['Loaigiayto']=="CMND") {echo "selected";}?>>CMND</option>
                                        <option value="CCCD" <?php if(isset($r['Loaigiayto']) && $r['Loaigiayto']=="CCCD") {echo "selected";}?>>CCCD</option>
                                        <option value="Passport" <?php if(isset($r['Loaigiayto']) && $r['Loaigiayto']=="Passport") {echo "selected";}?>>Hộ chiếu</option>
                                    </select>
                                </div>
                                <div class="identify_item">
                                    <label for="dob">Ngày sinh:</label>
                                    <input type="date" id="dob" name="dob" value="<?php if(isset($r['Ngaysinh']) && $r['Ngaysinh']!=""){echo $r['Ngaysinh'];}?>" required>
                                </div>
                            </div>
                            <div class="identify">
                                <div class="identify_item">
                                    <label for="idNumber">Số CMND/CCCD:</label>
                                    <input type="text" id="idNumber" name="idNumber" value="<?php if(isset($r['Magiayto']) && $r['Magiayto']!=""){echo $r['Magiayto'];}?>" required>
                                </div>
                                <div class="identify_item">
                                    <label for="nationality">Quốc tịch:</label>
                                    <input type="text" id="nationality" name="nationality" value="<?php if(isset($r['Quoctich']) && $r['Quoctich']!=""){echo $r['Quoctich'];}?>" required>
                                </div>
                            </div>
                        </fieldset>
                        <div class="InforSave_btn">
                            <input type="submit" value="Lưu" name="changeInfo">
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['changeInfo']) && ($_POST['changeInfo'])){
                            $lastName = $_POST["lastName"];
                            $firstName = $_POST["firstName"];
                            $gender = $_POST["gender"];
                            $email = $_POST["email"];
                            $phone = $_POST["phone"];
                            $address = $_POST["address"];
                            $idType = $_POST["idType"];
                            $dob = $_POST["dob"];
                            $idNum = $_POST["idNumber"];
                            $nationality = $_POST["nationality"];
                            
                            //Nếu có cập nhật ảnh đại diện
                            if(isset($_FILES["changeAvt"]) && $_FILES["changeAvt"]["error"] == 0) {
                                $imagepath = basename($_FILES["changeAvt"]["name"]);
                                // $target_dir = "img_members/";
                                // $target_file = $target_dir.$imagepath;
                                
                                $check = getimagesize($_FILES["changeAvt"]["tmp_name"]);

                                // Kiểm tra xem tệp đã tồn tại chưa
                                if (file_exists($imagepath)) {
                                    $sql = "UPDATE taikhoan SET Ho='$lastName',Ten='$firstName',Gioitinh='$gender',Email='$email',Sodt='$phone',Diachi='$address',Loaigiayto='$idType',Magiayto='$idNum',Quoctich='$nationality',Ngaysinh='$dob',Avatar='$imagepath' WHERE IDTaikhoan=".$_SESSION['userID']."";
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        echo "Thành công"; 
                                    }
                                    else{
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                }
                                //Kiểm tra tệp có phải hình ảnh không
                                elseif(!$check){
                                    echo "Avatar phải là hình ảnh";
                                }else {
                                    // Di chuyển tệp tin từ vị trí tạm thời đến vị trí lưu trữ
                                    move_uploaded_file($_FILES["changeAvt"]["tmp_name"],'./img_members/' .$imagepath);
                                    $sql = "UPDATE taikhoan SET Ho='$lastName',Ten='$firstName',Gioitinh='$gender',Email='$email',Sodt='$phone',Diachi='$address',Loaigiayto='$idType',Magiayto='$idNum',Quoctich='$nationality',Ngaysinh='$dob',Avatar='$imagepath' WHERE IDTaikhoan=".$_SESSION['userID']."";
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        echo "Thành công"; 
                                    }
                                    else{
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                }
                            //Nếu không cập nhật ảnh đại diện
                            }else {
                                $sql = "UPDATE taikhoan SET Ho='$lastName',Ten='$firstName',Gioitinh='$gender',Email='$email',Sodt='$phone',Diachi='$address',Loaigiayto='$idType',Magiayto='$idNum',Quoctich='$nationality',Ngaysinh='$dob' WHERE IDTaikhoan=".$_SESSION['userID']."";
                                $result = mysqli_query($conn,$sql);
                                if($result){
                                    echo "Thành công"; 
                                }
                                else{
                                    echo "Error: " . mysqli_error($conn);
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>