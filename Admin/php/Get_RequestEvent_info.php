<?php

include_once "../php_func/conn.php";

if(isset($_GET['IDDatsk'])){
    $IDDatsk = $_GET['IDDatsk'];
    $sql = "SELECT * FROM taikhoan,datsk 
    WHERE taikhoan.IDTaiKhoan = datsk.IDTaiKhoan 
    AND IDDatsk = $IDDatsk";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }else{
        echo "Không tìm thấy dữ liệu";
    }
}else{
    echo "Không lấy được dữ liệu";
}
?>

