<?php
    session_start();
    if(isset($_SESSION)){
        session_destroy();
        echo 'đã xóa thành công';
        header('location:./php/index.php');
    }
    else{
        echo 'chưa xóa';
    }
?>