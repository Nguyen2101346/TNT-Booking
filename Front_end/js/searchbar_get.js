// Function to get query parameters from URL
function getQueryParams() {
    const params = new URLSearchParams(window.location.search);
    return {
        start_date: params.get('start_date'),
        end_date: params.get('end_date'),
        rooms: params.get('rooms'),
        adults: params.get('adults'),
        min_adults: params.get('min_adults'),
        discount_code: params.get('discount_code')
    };
}

// Function to set the values in the search bar
function setSearchValues(params) {
    if (params.start_date) {
        document.getElementById('start').textContent = params.start_date;
        document.getElementById('start_date').value = params.start_date;
        // console.log(params.start_date);
    }
    if (params.end_date) {
        document.getElementById('end').textContent = params.end_date;
        document.getElementById('end_date').value = params.end_date;
        // console.log(params.end_date);
    }
    if (params.rooms) {
        document.getElementById('room_num').textContent = params.rooms;
        document.getElementById('room-quantity').textContent = params.rooms;
        document.getElementById('limit_room').textContent = params.rooms; // Cập nhật limit_room
        roomQuantity = parseInt(params.rooms);
        updateRooms();
    }
    if (params.min_adults) {
        document.getElementById('adults_Minnum').textContent = params.min_adults;
    }
    if (params.adults) {
        document.getElementById('adults_num').textContent = params.adults;
        const quantityElements = document.querySelectorAll('.quantity[data-type="adults"]');
        quantityElements.forEach(function(element, index) {
            if (index < roomQuantity) {
                element.textContent = adultsValue;
            } else {
                element.textContent = 0;
            }
        });
        updateAdults();
    }
}
function incrementRoom() {
    roomQuantity++;
    updateRooms();
    document.getElementById("room_num").textContent = roomQuantity;
    updateAdults();
    // checkIfSearchEnabled();
}
function decrementRoom() {
    if (roomQuantity > 1) {
         roomQuantity--;
         updateRooms();
         document.getElementById("room_num").textContent = roomQuantity;
         updateAdults();
        //  checkIfSearchEnabled();
    }
}
// Function to update rooms and adults based on initial values
function updateRooms() {
    var bookingContainer = document.getElementById("booking-info");
    bookingContainer.innerHTML = '';
    for (var i = 1; i <= roomQuantity; i++) {
        var roomDiv = document.createElement("div");
        roomDiv.className = "room-container";
        roomDiv.innerHTML = '<h3>Phòng ' + i + '</h3>' +
                            '<div class="content">' +
                            '<label>Số lượng người:</label>' +
                            '<div class="quantity_contain">' +
                            '<button class="quantity-control" onclick="decrementQuantity(this)">-</button>' +
                            '<span class="quantity adults" data-type="adults">1</span>' +
                            '<button class="quantity-control" onclick="incrementQuantity(this)">+</button>' +
                            '</div>' + '</div>';
        bookingContainer.appendChild(roomDiv);
        document.getElementById("room-quantity").textContent = roomQuantity;    
    }
    // updateAdults();
}

// function updateAdults() {
//     var totalAdults = 0;
//     var quantityElements = document.querySelectorAll('.quantity[data-type="adults"]');
//     quantityElements.forEach(function(element) {
//         totalAdults += parseInt(element.textContent);
//     });
//     document.getElementById("adults_num").textContent = totalAdults;
// }
// Function to update Numroom based on selection
// let selectedRooms = 0;

// function chooseRoom(roomId) {
//     selectedRooms++;
//     document.getElementById('Numroom').textContent = selectedRooms;
// }
document.addEventListener('DOMContentLoaded', function() {
    const params = getQueryParams();
    setSearchValues(params);
    createRoomElements(params.rooms ? parseInt(params.rooms) : 1, params.adults ? parseInt(params.adults) : 1, params.min_adults ? parseInt(params.min_adults) : 1);
}); 

