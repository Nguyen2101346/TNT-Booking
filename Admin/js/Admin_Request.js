$(document).ready(function() {
    // Tải trang quản lý loại phòng khi load lần đầu
    loadPage('RequestRoom.php');

    // Gán sự kiện click cho các nút EventChange
    $('#loadRoomRequest').on('click', function(e) {
        e.preventDefault();
        loadPage('RequestRoom.php');
    });

    $('#LoadEventRequest').on('click', function(e) {
        e.preventDefault();
        loadPage('RequestEvent.php');
    });

    // Hàm tải trang bằng AJAX
    function loadPage(page) {
        $.ajax({
            url: './php/' + page,
            method: 'GET',
            success: function(data) {
                $('#Request__content').html(data);
                
                // Khởi tạo lại Swiper nếu trang tải có slider
                if (page === 'RequestRoom.php') {
                    // initializeSwiper();
                    // AJAXSubmit();
                }else if(page === 'RequestEvent.php'){
                    CreRoom()
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi tải trang:', error);
            }
        });
    }
    // Khởi tạo func Swiper
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
    }
    function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
        return direction;
    }
    // Khởi tạo func CreType
    function CreTypeManage(){
        const CreType = document.querySelector('.CreType');
        const CancelButton = document.querySelector('.Cancel_btn')
        const CreTypeForm = document.querySelector('.CreType.MiniContainer');
        let TypeOpen = false;
        CreType.addEventListener('click',() => {
            CreTypeForm.classList.add('visible');
            TypeOpen = true;
        });
        CancelButton.addEventListener('click',() => {
            CreTypeForm.classList.remove('visible');
            TypeOpen = false;    
            }); 
    }
    // Khởi tạo func Tiện ích
    function ConvienceCheck(){
        const ConvienceBtn = document.querySelector('.ConvienceCheck');
        const ConFinish = document.querySelector('.ConFinish');
        const ConvienceForm = document.querySelector('.MiniConvience.MiniContainer');
        let ConvienceOpen = false;
        ConvienceBtn.addEventListener('click',() =>{
            ConvienceForm.classList.add('visible')
            ConvienceOpen = true;
        })
        ConFinish.addEventListener('click',() =>{
            ConvienceForm.classList.remove('visible')
            ConvienceOpen = false;
        })
    }
    // Đưa tiện ích ra textarea
    function ConToTextarea(){
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả các checkbox trong phần tiện ích
            var checkboxes = document.querySelectorAll('#ConvienceCheckboxes input[type="checkbox"]');
            // Lấy phần textarea tiện ích
            var textarea = document.getElementById('RoomConvenienceTextarea');
            
            // Thêm sự kiện change cho mỗi checkbox
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Tạo mảng để lưu trữ tiện ích được chọn
                    var selectedConveniences = [];
                    
                    // Duyệt qua tất cả các checkbox, thêm giá trị của những checkbox được chọn vào mảng
                    checkboxes.forEach(function(cb) {
                        if (cb.checked) {
                            selectedConveniences.push(cb.nextElementSibling.textContent);
                        }
                    });
                    
                    // Cập nhật nội dung của textarea với các tiện ích được chọn
                    textarea.value = selectedConveniences.join(', ');
                });
            });
        });
    }
});



// SUBMIT FORM QUA AJAX
    