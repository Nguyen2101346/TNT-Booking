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
     <!-- Sử dụng script -->
    
</head>
<body>
    <div class="Container">
    <?php 
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
</body>
</html>