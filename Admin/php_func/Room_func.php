<?php
   function add_TypeRoom($conn, $roomname, $DayCre){
    $sql = "INSERT INTO loaiphong(Tenloaiphong, Ngaytao) VALUES ('".$roomname."','".$DayCre."')";
    mysqli_query($conn, $sql);
    }
    function add_MiniRoom($conn, $IDLoaiphong, $roomname, $DayCre, $sotang){
        $sql = "INSERT INTO phong(IDLoaiphong,Tenphong, Ngaytao, Sotang) VALUES ('".$IDLoaiphong."','".$roomname."','".$DayCre."','".$sotang."')";
        mysqli_query($conn, $sql);
    }
?>

