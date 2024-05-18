document.addEventListener('DOMContentLoaded', function() {
    let selectedRooms = [];
    const limitRoom = parseInt(document.getElementById('limit_room').textContent);
    const numRoomElement = document.getElementById('Numroom');
    const totalPriceElement = document.getElementById('TotalPrice');

    function chooseRoom(roomData) {
        if (selectedRooms.length >= limitRoom) {
            alert('Bạn đã chọn đủ số lượng phòng.');
            return;
        }

        selectedRooms.push(roomData);
        updateMiniBill();
        updateNumRoom();
        updateTotalPrice();
    }

    function updateMiniBill() {
        const roomContainer = document.querySelector('.room_container');
        roomContainer.innerHTML = ''; // Clear previous content

        selectedRooms.forEach(room => {
            const roomMini = document.createElement('div');
            roomMini.classList.add('roomMini');
            roomMini.innerHTML = `
                <div class="RoomNum title">Phòng ${selectedRooms.indexOf(room) + 1}</div>
                <div class="RoomTitle">${room.title}</div>
                <div class="RoomPrice">${room.priceFormatted} VND</div>
                <div class="RoomFix_btn">
                    <a href="#" class="mini_btn" onclick="removeRoom(${selectedRooms.indexOf(room)})">Chỉnh sửa</a>
                </div>
            `;
            roomContainer.appendChild(roomMini);
        });
    }

    function updateNumRoom() {
        numRoomElement.textContent = selectedRooms.length;
    }

    function updateTotalPrice() {
        const totalPrice = selectedRooms.reduce((sum, room) => sum + room.price, 0);
        totalPriceElement.textContent = 'Giá: ' + totalPrice.toLocaleString('vi-VN') + ' VND';
    }

    function removeRoom(index) {
        selectedRooms.splice(index, 1);
        updateMiniBill();
        updateNumRoom();
        updateTotalPrice();
    }

    // Attach event listeners to Choose buttons
    document.querySelectorAll('.Choose_btn a').forEach((button, index) => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const roomElement = this.closest('.room');
            const roomData = {
                title: roomElement.querySelector('.title a').textContent,
                price: parseInt(roomElement.querySelector('.prices_absolute .content').textContent.replace(/[^0-9]/g, '')),
                priceFormatted: roomElement.querySelector('.prices_absolute .content').textContent
            };

            chooseRoom(roomData);
        });
    });

    // Make removeRoom function accessible from HTML
    window.removeRoom = removeRoom;
});