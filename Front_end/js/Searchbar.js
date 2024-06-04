// Nút mở calander trên phần tìm kiếm
const element = document.querySelector('#GetDate');
if (element) {
    const GetDate = document.querySelector('#GetDate');
    const Calander = document.querySelector('.Calander');
    let CalOpen = false;
    GetDate.addEventListener('click', () => {
        if (!CalOpen) {
            Calander.classList.add('toggle');
            CalOpen = true;
        } else {
            Calander.classList.remove('toggle');
            CalOpen = false;
        }
    });
} else {
    console.log('Phần tử không tồn tại, này bên Searchbar.js nên khỏi lo');
}

// Phần Calander
$(function () {
    $("#start_date").datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0,
        onSelect: function (selectedDate) {
            $("#end_date").datepicker("option", "minDate", selectedDate);
            $("#start").text(selectedDate.replace(/-/g, '/'));
            displayStartDayOfWeek(selectedDate, '.timeShow_Start');
            checkIfSearchEnabled();
        }
    });

    $("#end_date").datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0,
        onSelect: function (selectedDate) {
            $("#start_date").datepicker("option", "maxDate", selectedDate);
            $("#end").text(selectedDate.replace(/-/g, '/'));
            displayEndDayOfWeek(selectedDate, '.timeShow_End');
            checkIfSearchEnabled();
        }
    });
});

// Phần Table số phòng và số người
let roomQuantity = 1;
let minAdults = Infinity;

const elementTable = document.querySelector('#booking');
if (elementTable) {
    const Booking = document.querySelector('#booking');
    const Table = document.querySelector('#booking-table');
    let TabShow = false;

    Booking.addEventListener('click', () => {
        if (!TabShow) {
            Table.classList.add('open');
            TabShow = true;
        } else {
            Table.classList.remove('open');
            TabShow = false;
        }
    });

    function incrementRoom() {
        roomQuantity++;
        updateRooms();
        document.getElementById("room_num").textContent = roomQuantity;
        updateAdults();
        checkIfSearchEnabled();
    }

    function decrementRoom() {
        if (roomQuantity > 1) {
            roomQuantity--;
            updateRooms();
            document.getElementById("room_num").textContent = roomQuantity;
            updateAdults();
            checkIfSearchEnabled();
        }
    }

    function incrementQuantity(element) {
        const quantityElement = element.previousElementSibling;
        let currentQuantity = parseInt(quantityElement.textContent);
        currentQuantity++;
        quantityElement.textContent = currentQuantity;
        updateAdults();
        checkIfSearchEnabled();
    }

    function decrementQuantity(element) {
        const quantityElement = element.nextElementSibling;
        let currentQuantity = parseInt(quantityElement.textContent);
        if (currentQuantity > 0) {
            currentQuantity--;
            quantityElement.textContent = currentQuantity;
            updateAdults();
            checkIfSearchEnabled();
        }
    }

    function updateRooms() {
        const bookingContainer = document.getElementById("booking-info");
        bookingContainer.innerHTML = '';
        for (let i = 1; i <= roomQuantity; i++) {
            const roomDiv = document.createElement("div");
            roomDiv.className = "room-container";
            roomDiv.innerHTML = `<h3>Phòng ${i}</h3>
                                 <div class="content">
                                 <label data-min-num="${minAdults}">Số lượng người:</label>
                                 <div class="quantity_contain">
                                 <button class="quantity-control" onclick="decrementQuantity(this)">-</button>
                                 <span class="quantity adults" data-type="adults">1</span>
                                 <button class="quantity-control" onclick="incrementQuantity(this)">+</button>
                                 </div>
                                 </div>`;
            bookingContainer.appendChild(roomDiv);
        }
        updateAdults();
    }

    function updateAdults() {
        let totalAdults = 0;
        const quantityElements = document.querySelectorAll('.quantity[data-type="adults"]');
        quantityElements.forEach(function (element) {
            totalAdults += parseInt(element.textContent);
        });
        document.getElementById("adults_num").textContent = totalAdults;

        // Tìm số lượng người lớn tối thiểu trong bất kỳ phòng nào
        minAdults = Infinity;
        quantityElements.forEach(element => {
            const currentQuantity = parseInt(element.textContent);
            if (currentQuantity < minAdults) {
                minAdults = currentQuantity;
            }
        });
        minAdults = minAdults === Infinity ? 0 : minAdults;

        console.log("Số người ít nhất",minAdults); // Để kiểm tra

        // Update all data-min-num attributes
        const labels = document.querySelectorAll('label[data-min-num]');
        labels.forEach(label => {
            label.setAttribute('data-min-num', minAdults);
        });

        checkIfSearchEnabled();
    }

    // Khởi tạo phòng ban đầu
    updateRooms();

    const Select = document.querySelector('#Select');
    const DiscountSelect = document.querySelector('#discountSelect');
    let DiscountShow = false;
    Select.addEventListener('click', () => {
        if (!DiscountShow) {
            DiscountSelect.classList.add('show');
            DiscountShow = true;
        } else {
            DiscountSelect.classList.remove('show');
            DiscountShow = false;
        }
    });
} else {
    console.log('Phần tử không tồn tại, này bên Searchbar.js nên khỏi lo');
}

$(document).ready(function () {
    $('#discountSelect option').hover(
        function () {
            $(this).addClass('hover');
        },
        function () {
            $(this).removeClass('hover');
        }
    );
});

function checkIfSearchEnabled() {
    const startDate = document.getElementById("start").textContent.trim();
    const endDate = document.getElementById("end").textContent.trim();
    const roomNum = parseInt(document.getElementById("room_num").textContent);
    const adultsNum = parseInt(document.getElementById("adults_num").textContent);
    const discountCode = document.querySelector('#discountSelect').value;
    const searchButton = document.getElementById("searchButton");

    const validDatePattern = /^(?!0\/0\/0000)\d{1,2}\/\d{1,2}\/\d{4}$/;

    if (validDatePattern.test(startDate) && validDatePattern.test(endDate) && roomNum > 0 && adultsNum > 0) {
        searchButton.classList.remove('disabled');
        searchButton.removeAttribute('style');
        searchButton.addEventListener('mouseover', () => {
            searchButton.classList.remove('disabled');
        });
    } else {
        searchButton.classList.add('disabled');
        searchButton.style.pointerEvents = 'none';
        searchButton.addEventListener('mouseover', () => {
            searchButton.classList.add('disabled');
        });
    }
}

const elementSearch = document.querySelector('#searchButton');
if (elementSearch) {
    document.getElementById("searchButton").addEventListener("click", function (event) {
        const searchButton = document.getElementById("searchButton");
        if (searchButton.classList.contains('disabled')) {
            event.preventDefault();
            return;
        }

        const startDate = document.getElementById("start").textContent.trim();
        const endDate = document.getElementById("end").textContent.trim();
        const roomNum = document.getElementById("room_num").textContent.trim();
        const adultsNum = document.getElementById("adults_num").textContent.trim();
        const discountCode = document.querySelector('#discountSelect').value;

        console.log(adultsNum);
        console.log(minAdults);
        const url = `index.php?page=sale&start_date=${encodeURIComponent(startDate)}&end_date=${encodeURIComponent(endDate)}&rooms=${encodeURIComponent(roomNum)}&qua-adults=${encodeURIComponent(adultsNum)}&min_adults=${encodeURIComponent(minAdults)}&discount_code=${encodeURIComponent(discountCode)}`;
        if (change == 1) {
            url += '&go=1';
        }
        window.location.href = url;
    });
//     document.getElementById("searchButton").addEventListener("click", function () {
//         const startDate = document.getElementById("start").textContent.trim();
//         const endDate = document.getElementById("end").textContent.trim();
//         const roomNum = parseInt(document.getElementById("room_num").textContent);
//         const adultsNum = parseInt(document.getElementById("adults_num").textContent);

//         const formData = new FormData();
//         formData.append("start_date", startDate);
//         formData.append("end_date", endDate);
//         formData.append("room_num", roomNum);
//         formData.append("adults_num", adultsNum);

//         const xhr = new XMLHttpRequest();
//         xhr.open("POST", "search_process.php", true);
//         xhr.onreadystatechange = function () {
//             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//                 console.log(xhr.responseText);
//             }
//         };
//         xhr.send(formData);
//     });
} else {
    console.log('Phần tử không tồn tại, này bên Searchbar.js nên khỏi lo');
}


