<?php
   function add_TypeRoom($conn, $roomname){
    $sql = "INSERT INTO loaiphong(Tenloaiphong) VALUES ('".$roomname."')";
    mysqli_query($conn, $sql);
    }
    function add_MiniRoom($conn, $IDLoaiphong, $roomname, $sotang){
        $sql = "INSERT INTO phong(IDLoaiphong,Tenphong , Sotang) VALUES ('".$IDLoaiphong."','".$roomname."','".$sotang."')";
        mysqli_query($conn, $sql);
    }
?>

