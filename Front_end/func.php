<?php
    function check_account($conn, $u){
        $sql = "select * from tb_taikhoan where TenDangNhap='$u'";
        return mysqli_query($conn, $sql);
    }

    function add_account($conn, $u, $p){
        $hashedP = md5($p);
        $sql = "INSERT INTO tb_taikhoan(TenDangnhap, MatKhau) VALUES ('".$u."','".$hashedP."')";
        mysqli_query($conn, $sql);
    }
?>