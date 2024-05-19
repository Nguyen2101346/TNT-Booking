<?php
    session_start();
    if(isset($_SESSION)){
        session_destroy();
        echo 'đã xóa thành công';
        header('location:/TNT/Front_end/index.php');
    }
    else{
        echo 'chưa xóa';
    }
?>