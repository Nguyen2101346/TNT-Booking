<?php
    // if(session_status() == PHP_SESSION_NONE){
    //     session_start();
    // }
    
    // if(!isset($_SESSION['role']) && $_SESSION['role'] !== 1){
    //     header('location:../Front_end/Login.php');
    //     exit;
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Manegement</title>
    <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/Admin_main.css">
    <link rel="stylesheet" href="./css/Admin_Room.css">
    <link rel="stylesheet" href="./css/Admin_Member.css">
    <link rel="stylesheet" href="./css/Slider.css">
     <!-- Sử dụng fontawsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
     <!-- Sử dụng swiper đơn giản  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
     <!-- Sử dụng script -->
    
</head>
<body>
    <div class="Container">
    <?php 
        
        $change = 0;
        if(isset($_GET['go']) && $_GET['go'] = 1){
            $change = 1;   
        }
        include "./php_func/conn.php";
        include "./php/Header.php";
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            include ''. $page .'.php';
        }else{
            include 'Management.php';
        }
        
        include './php/Footer.php'
    ?>
    </div>
        <script src="./js/ultils.js" deper></script>
        <script src="./js/slider_swiper.js"></script>
        <script src="./js/Admin.js"></script>
        <script src="./js/Admin_Management.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>
        <script>
            flatpickr("#myID", {
            minDate: "today",
            dateFormat: "Y-m-d",
            locale: "vn"
        });
        </script>
        <!-- <script src="./js/Admin_Utilities.js"></script> -->
</body>
</html>

