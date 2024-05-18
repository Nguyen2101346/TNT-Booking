$(document).ready(function() {
    $('#roomContent').load('./php/RoomTypeManagement.php', function(){
        initializeSwiper();
    });
    $('#loadRoomTypes').click(function(e) {
        e.preventDefault();
        $('#roomContent').load('./php/RoomTypeManagement.php', function(){
            initializeSwiper();
        });
    });

    $('#loadRooms').click(function(e) {
        e.preventDefault();
        $('#roomContent').load('./php/RoomManagement.php');
    });
});

function initializeSwiper(){
    var swiper = new Swiper('.swiper', {
        slidesPerView: 2,
        direction: getDirection(),
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        on: {
          resize: function () {
            swiper.changeDirection(getDirection());
          },
        },
      });
      
      function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
        return direction;
      }
}