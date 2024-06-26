
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
    <link rel="stylesheet" href="./css/info.css">
    <link rel="stylesheet" href="./css/Payment.css">
    <link rel="stylesheet" href="./css/Room.css">
    <link rel="stylesheet" href="./css/ratings.css">
    <link rel="stylesheet" href="./css/history.css">
    <!-- Sử dụng fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
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
            $change = 0;
            if(isset($_GET['go']) == 1){
                $change = 1;
            }
            include "./conn.php";
            include "./func.php";
            include "./php/Header.php";
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
    <!-- <script src="./js/slider.js"></script>
    <script src="./js/eat.js"></script> -->
    <script src="./js/ultils.js"></script>
    <script src="./js/Searchbar.js"></script>
    <script src="./js/searchbar_get.js"></script>
    <script src="./js/Ratings.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>
    <!-- <script src="./js/MiniBill.js"></script> -->
    <script>

        // flatpickr("#myID", {
        //     minDate: "today",
        //     dateFormat: "d/m/Y",
        //     locale: "vn"
        // });
        // Khởi tạo thành phần thứ nhất
        flatpickr("#startDate", {
            dateFormat: "d/m/Y",
            locale: "vn",
            onChange: function(selectedDates, dateStr, instance) {
                // Lấy ngày đã chọn trên thành phần thứ nhất
                var selectedDate = selectedDates[0];

                // Cập nhật giá trị minDate của thành phần thứ hai
                flatpickr("#endDate", {
                    minDate: selectedDate,
                    dateFormat: "d/m/Y",
                    locale: "vn"
                    
                });
            }
        });

        // Khởi tạo thành phần thứ hai
        flatpickr("#endDate", {
            dateFormat: "d/m/Y",
            locale: "vn"
        });
        // flatpickr(myElement, {
        //     "locale": "vn"  // locale for this instance only
        // });
        const change = <?= $change ?>;
        const searchButton = document.querySelector('#searchButton');

    if (searchButton) {
        searchButton.addEventListener("click", function(event) {
            if (searchButton.classList.contains('disabled')) {
                event.preventDefault();
                return;
            }

            const startDate = document.getElementById("start").textContent.trim();
            const endDate = document.getElementById("end").textContent.trim();
            const roomNum = document.getElementById("room_num").textContent.trim();
            const adultsNum = document.getElementById("adults_num").textContent.trim();
            const discountCode = document.querySelector('#discountSelect').value;
            const minAdults = document.querySelector('label[data-min-num]').dataset.minNum;

            console.log(minAdults);
            
            let url = `index.php?page=sale&start_date=${encodeURIComponent(startDate)}&end_date=${encodeURIComponent(endDate)}&rooms=${encodeURIComponent(roomNum)}&qua-adults=${encodeURIComponent(adultsNum)}&min_adults=${encodeURIComponent(minAdults)}&discount_code=${encodeURIComponent(discountCode)}`;
            
            if (change == 1) {
                url += '&go=1';
            }

            window.location.href = url;
        });
    } else {
        console.log('Phần tử không tồn tại, này bên index.php nên khỏi lo');
    }
    </script>
</body>

</html>