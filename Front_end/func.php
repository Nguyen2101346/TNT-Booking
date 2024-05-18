<?php
    function check_account($conn, $u){
        $sql = "select * from taikhoan where Tendangnhap='$u'";
        return mysqli_query($conn, $sql);
    }

    function add_account($conn, $u, $p){
        $hashedP = md5($p);
        $sql = "INSERT INTO taikhoan(Tendangnhap, Matkhau) VALUES ('".$u."','".$hashedP."')";
        mysqli_query($conn, $sql);
    }
?>