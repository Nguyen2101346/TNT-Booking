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
                        Tất cả
                        <span><i class="fas fa-caret-down fa-beat"></i></span>
                    <ul>
                        <li><a href="#">Tất cả</a></li>
                        <li><a href="#">Hội họp</a></li>
                        <li><a href="#">Tiệc cưới</a></li>
                        <li><a href="#">Sự kiện Cộng đồng</a></li>
                    </ul>
                </div>
                <!-- <div class="MemberSearch">
                <input type="search" name="" id="" placeholder="Để trống để tìm theo thứ tự">
                <input type="submit" value="">
                <span class="fa-solid fa-magnifying-glass"></span>
                </div> -->
        </div>
        <div class="Event_Request_Container" id="Request_Event">
                <div class="Request_Component">
                    <?php
                    $sql = "SELECT * FROM datsk,sukien,taikhoan
                    WHERE sukien.IDSukien = datsk.IDSukien
                    AND datsk.IDTaiKhoan = taikhoan.IDTaiKhoan
                    GROUP BY datsk.IDDatsk";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['Trangthai'] == 0){
                            $status = "Đang chờ";
                        }else if($row['Trangthai'] == 1){
                            $status = "Đã xác nhận";
                        }else if($row['Trangthai'] == 2){
                            $status = "Đã Hủy bỏ";
                        }
                    ?>
                    <div class="Request" data-id="<?= $row['IDDatsk']?>"> 
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
                                <div class="request Agree_btn" data-id="<?= $row['IDDatsk']?>">
                                    <a href="#" class="btn">Đồng ý</a>
                                    </div>
                                    <div class="request Detail_btn"data-id="<?= $row['IDDatsk']?>">
                                        <a href="#" class="btn">Chi tiết</a>
                                    </div>
                                    <div class="request Delet_btn" data-id="<?= $row['IDDatsk']?>">
                                        <a href="#" class="btn">Hủy bỏ</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php
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
                    <div class="checkEvent Company">
                        <label for="Company">Công ty</label>
                        <input type="text" name="Company" id="Company">
                    </div>
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
    $(document).ready(function(){
        $(document).on("click",".Detail_btn",function(){
            $(".CheckEvent.MiniContainer").addClass("visible");
            event.preventDefault();
            var IDDatsk = $(this).attr("data-id");
            console.log('IDDatsk:',IDDatsk);

            $.ajax({
                url: "./php/Get_RequestEvent_info.php",
                method: "GET",
                data: {idsk: IDDatsk},
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $("#Company").val(data.Congty);
                    $("#Name").val(data.TenKH);
                    $("#Email").val(data.Email);
                    $("#Phone").val(data.Sodt);
                    $("#Note").val(data.Ghichu);
                },error: function(xhr, status, error){
                    console.log(xhr, status, error);
                }
            })

        })
        $(document).on("click",".checkEvent_confirm_btn",function(){
            $(".CheckEvent.MiniContainer").removeClass("visible");
        })
    })
</script>

