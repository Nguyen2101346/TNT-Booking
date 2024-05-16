<?php
   function add_TypeRoom($conn, $roomname, $DayCre){
    $sql = "INSERT INTO loaiphong(Tenloaiphong, Ngaytao) VALUES ('".$roomname."','".$DayCre."')";
    mysqli_query($conn, $sql);
}
?>