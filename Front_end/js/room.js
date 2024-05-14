

document.addEventListener("DOMContentLoaded", function () {
    const rooms = [
        {
            imgSrc: "./img/anh1.jpg",
            title: "Deluxe 2 Giường Đơn",
            rating: 5,
            roomNumber: "M101",
            fromDate: "Thứ tư, 08/04/2024",
            toDate: "Thứ sáu, 10/04/2024",
            price: "3.130.000 VNĐ",
        },
        {
            imgSrc: "./img/anh1.jpg",
            title: "Deluxe 2 Giường Đôi",
            rating: 5,
            roomNumber: "M101",
            fromDate: "Thứ tư, 08/04/2024",
            toDate: "Thứ sáu, 10/04/2024",
            price: "3.130.000 VNĐ",
        },
        {
            imgSrc: "./img/anh1.jpg",
            title: "Deluxe 2 Giường Đơn",
            rating: 5,
            roomNumber: "M101",
            fromDate: "Thứ tư, 08/04/2024",
            toDate: "Thứ sáu, 10/04/2024",
            price: "3.130.000 VNĐ",
        },
        {
            imgSrc: "./img/anh1.jpg",
            title: "Deluxe 2 Giường Đôi",
            rating: 5,
            roomNumber: "M101",
            fromDate: "Thứ tư, 08/04/2024",
            toDate: "Thứ sáu, 10/04/2024",
            price: "3.130.000 VNĐ",
        },
        {
            imgSrc: "./img/anh1.jpg",
            title: "Deluxe 2 Giường Đôi",
            rating: 5,
            roomNumber: "M101",
            fromDate: "Thứ tư, 08/04/2024",
            toDate: "Thứ sáu, 10/04/2024",
            price: "3.130.000 VNĐ",
        },
        {
            imgSrc: "./img/anh1.jpg",
            title: "Deluxe 2 Giường Đôi",
            rating: 5,
            roomNumber: "M101",
            fromDate: "Thứ tư, 08/04/2024",
            toDate: "Thứ sáu, 10/04/2024",
            price: "3.130.000 VNĐ",
        },
        {
            imgSrc: "./img/anh1.jpg",
            title: "Deluxe 2 Giường Đôi",
            rating: 5,
            roomNumber: "M101",
            fromDate: "Thứ tư, 08/04/2024",
            toDate: "Thứ sáu, 10/04/2024",
            price: "3.130.000 VNĐ",
        },
        // Add more rooms here
    ];

    const roomsPerPage = 2;
    let currentPage = 1;

    function renderRooms() {
        const startIndex = (currentPage - 1) * roomsPerPage;
        const endIndex = startIndex + roomsPerPage;
        const roomsToRender = rooms.slice(startIndex, endIndex);

        const roomContainer = document.querySelector(".History.room_container");
        roomContainer.innerHTML = "";

        roomsToRender.forEach(room => {
            roomContainer.innerHTML += `
                <div class="History room">
                    <div class="History room_img img">
                        <div class="sale-icon">
                            <img src="./img/sale_icon.png" alt="">
                        </div>
                        <img src="${room.imgSrc}" alt="">
                    </div>
                    <div class="History room_content">
                        <div class="title"><a href="#" class="title">${room.title}</a></div>
                        <div class="appraise">
                            <div class="title">
                                <div class="rating">${"&#9733;".repeat(room.rating)}</div>
                                <p id="result" class="sale"></p>
                            </div>
                        </div>
                        <div class="general_infor">
                            <div class="title">
                                <span class="content">Số phòng: <span class="minicontent"> ${room.roomNumber}</span></span>
                            </div>
                            <div class="title">
                                <span class="content">Từ: <span class="minicontent"> ${room.fromDate}</span></span>
                            </div>
                            <div class="title">
                                <span class="content">Đến: <span class="minicontent"> ${room.toDate}</span></span>
                            </div>
                        </div>
                        <div class="absolute">
                            <div class="prices">
                                <div class="discountsale"></div>
                                <div class="title">Giá: ${room.price}</div>
                            </div>
                        </div>
                        <div class="Detail_btn">
                            <a href="#" class="medium_btn">Chi tiết</a>
                        </div>
                    </div>
                </div>
            `;
        });

        renderPagination();
    }

    function renderPagination() {
        const pageCount = Math.ceil(rooms.length / roomsPerPage);
        const paginationContainer = document.querySelector(".pagination");
        paginationContainer.innerHTML = "";


        const prevButton = document.createElement("button");
        prevButton.innerHTML = "&lt;";
        prevButton.classList.add("prev-btn");
        if (currentPage === 1) prevButton.disabled = true;

        prevButton.addEventListener("click", function () {
            if (currentPage > 1) {
                currentPage--;
                renderRooms();
            }
        });

        paginationContainer.appendChild(prevButton);


        for (let i = 1; i <= pageCount; i++) {
            const pageButton = document.createElement("button");
            pageButton.textContent = i;
            pageButton.classList.add("page-btn");
            if (i === currentPage) pageButton.classList.add("active");

            pageButton.addEventListener("click", function () {
                currentPage = i;
                renderRooms();
            });

            paginationContainer.appendChild(pageButton);
        }

        const nextButton = document.createElement("button");
        nextButton.innerHTML = "&gt;";
        nextButton.classList.add("next-btn");
        if (currentPage === pageCount) nextButton.disabled = true;

        nextButton.addEventListener("click", function () {
            if (currentPage < pageCount) {
                currentPage++;
                renderRooms();
            }
        });

        paginationContainer.appendChild(nextButton);
    }

    renderRooms();
});

document.addEventListener("DOMContentLoaded", function() {
    var discounts = document.querySelectorAll('.discountsale');
    discounts.forEach(function(discount) {
    var imgWrapper = discount.closest('.room').querySelector('.img');
    var saleIcon = document.createElement('div');
    saleIcon.classList.add('sale-icon');
    if (discount.textContent.trim() !== '') {
         imgWrapper.insertBefore(saleIcon, imgWrapper.firstChild);
    } else {
         imgWrapper.removeChild(imgWrapper.querySelector('.sale-icon'));
    }
    });
});