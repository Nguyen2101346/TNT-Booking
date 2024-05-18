$(document).ready(function() {
    $('#roomContent').load('./php/RoomTypeManagement.php');
    $('#loadRoomTypes').click(function(e) {
        e.preventDefault();
        $('#roomContent').load('./php/RoomTypeManagement.php');
    });

    $('#loadRooms').click(function(e) {
        e.preventDefault();
        $('#roomContent').load('./php/RoomManagement.php');
    });
});