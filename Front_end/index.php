<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="./img/LogoTNT.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/banner.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/eat.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/search.css">
    <!-- Sử dụng fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="./js/slider.js" defer></script>
    <script src="./js/eat.js" defer></script>
</head>

<body>
    <div class="Container">
        <!-- Phần header -->
        <!-- Được chia ra làm 3 phần bên trái, giữa và phải -->
        <!-- Phần trái, gồm các mục ở 2 bên -->
        <!-- Phần mid được sử dụng để làm logo-->
        <?php
                include "./conn.php";
                include "./php/Header.php";
          ?>
        <?php 
             if(isset($_GET['page'])){
                $page = $_GET['page'];
                include ''. $page .'.php';
            }else{
                include 'Home.php';
            }
        ?>
        <!-- Phần footer -->
        <?php
            include "./php/Footer.php"
        ?>
    </div>
    <script src="./js/Main.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/eat.js"></script>
    <script src="./js/ultils.js"></script>
    <script src="./js/Searchbar.js"></script>
    <script src="./js/searchbar_test.js"></script>
</body>

</html>