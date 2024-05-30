

document.addEventListener('DOMContentLoaded', function() {
    let selectedRooms = [];
    const limitRoom = parseInt(document.getElementById('limit_room').textContent);
    const numRoomElement = document.getElementById('Numroom');
    const totalPriceElement = document.getElementById('TotalPrice');
    const continueButton = document.getElementById('continueButton');

    function chooseRoom(event, roomId) {
        event.preventDefault();
        if (selectedRooms.length >= limitRoom) {
            alert('Bạn đã chọn đủ số lượng phòng.');
            return;
        }

        const roomElement = document.querySelector(`.room[data-id='${roomId}']`);
        const roomData = {
            id: roomElement.getAttribute('data-id'),
            title: roomElement.querySelector('.title a').textContent,
            price: parseInt(roomElement.getAttribute('data-price')),
            priceFormatted: roomElement.querySelector('.prices_absolute .content').textContent,
            idroom: roomElement.getAttribute('data-idroom')
        };

        selectedRooms.push(roomData);
        updateMiniBill();
        updateNumRoom();
        updateTotalPrice();
    }
    function updateNumRoom() {
        numRoomElement.textContent = selectedRooms.length;
        console.log(selectedRooms.length);
    }
    function updateMiniBill() {
        const roomContainer = document.querySelector('.room_container');
        roomContainer.innerHTML = ''; // Xóa nội dung trước đó

        selectedRooms.forEach((room, index) => {
            const roomMini = document.createElement('div');
            roomMini.classList.add('roomMini');
            roomMini.innerHTML = `
                <div class="RoomNum title">Phòng ${index + 1}</div>
                <div class="RoomTitle">${room.title}</div>
                <input type="hidden" name="room${index}" value='${JSON.stringify(room)}'>
                <div class="RoomPrice">${room.priceFormatted} VND</div>
                <div class="RoomFix_btn">
                    <a href="#" class="mini_btn" onclick="removeRoom(${index})">Chỉnh sửa</a>
                </div>
            `;
            roomContainer.appendChild(roomMini);
        });
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

    document.querySelectorAll('.Choose_btn a').forEach(button => {
        button.addEventListener('click', function(event) {
            const roomElement = this.closest('.room');
            const roomId = roomElement.getAttribute('data-id');
            chooseRoom(event, roomId);
        });
    });

    window.removeRoom = removeRoom;

    continueButton.addEventListener('click', function(event) {
        event.preventDefault();
        if (selectedRooms.length === 0) {
            alert("Bạn phải chọn ít nhất một phòng để tiếp tục.");
            return;
        }
        if (selectedRooms.length > limitRoom) {
            alert("Số phòng đã chọn vượt quá giới hạn cho phép.");
            return;
        }
        const form = document.createElement('form');
        form.method = 'POST';
        if (start_date != null && end_date != null) {
            if (change == 1) {
                form.action = 'index.php?page=Payment&start_date=' + start_date + '&end_date=' + end_date + '&go=1';
            } else {
                alert('Bạn phải đăng nhập để sử dụng chức năng này!');
                return;
            }
        } else {
            alert('Bạn phải chọn ngày đến và ngày đi');
            return;
        }
        selectedRooms.forEach((room, index) => {
            const roomInput = document.createElement('input');
            roomInput.type = 'hidden';
            roomInput.name = `room${index}`;
            roomInput.value = JSON.stringify(room);
            form.appendChild(roomInput);
        });
        document.body.appendChild(form);
        form.submit();
    });
});