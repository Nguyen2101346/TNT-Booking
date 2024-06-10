document.addEventListener('DOMContentLoaded', function() {
    function loadContent(eventType) {
        $.ajax({
            url: './php/Event_' + eventType + '.php',
            method: 'GET',
            success: function(data) {
                const parsedHTML = new DOMParser().parseFromString(data, 'text/html');
                const contentElement = parsedHTML.querySelector('#hidden' + eventType + 'Content');
                const formElement = parsedHTML.querySelector('#hidden' + eventType + 'Form');
                const slideElement = parsedHTML.querySelector('#' + eventType + 'Slide');

                if (contentElement && formElement && slideElement) {
                    const content = contentElement.innerHTML;
                    const form = formElement.innerHTML;
                    const slide = slideElement.innerHTML;

                    $('#content').html(content);
                    $('#Request_Form').html(form);
                    $('#Request_Slide').html(slide);

                    setUpRequestFormHandlers();
                    initializeSwiper();
                    PostMeetingRequest();
                    PostWeddingRequest();
                    PostCommunityRequest();
                } else {
                    console.error('Một hoặc nhiều những cái thành phần bên trong bị thiếu khi load.');
                }
            },
            error: function() {
                alert('Không thể load nội dung.');
            }
        });
    }

    function setUpEventHandlers() {
        $('.EventCard').on('click', function() {
            const eventType = $(this).attr('class').split(' ')[1];
            $('.EventCard').removeClass('click');
            $(this).addClass('click');
            loadContent(eventType.charAt(0).toUpperCase() + eventType.slice(1));
        });
    }

    function setUpRequestFormHandlers() {
        const requestContainer = $('.Request_container');
        const requestBtn = $('.request_btn');
        const exitBtn = $('.exit_btn');
        let visible = false;

        requestBtn.on('click', function() {
            requestContainer.addClass('visible');
            visible = true;
        });

        exitBtn.on('click', function() {
            requestContainer.removeClass('visible');
            visible = false;
        });
    }

    function initializeSlider() {
        $('#Request_Slide').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1
        });
    }

    function initializeSwiper() {
        new Swiper('.swiper', {
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

    function PostMeetingRequest() {
        $(document).ready(function() {
            $('#meetingForm').submit(function(e) {
                e.preventDefault(); // Ngăn không cho form submit theo cách thông thường
        
                var formData = $(this).serialize(); // Lấy dữ liệu từ form
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: 'php/Event_Meeting_process.php', // Đảm bảo đường dẫn chính xác
                    data: formData,
                    success: function(response) {
                        // Hiển thị phản hồi từ server
                        $('#responseMessage').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Hiển thị lỗi chi tiết
                        $('#responseMessage').html('<p>Có lỗi xảy ra, vui lòng thử lại.</p><p>' + xhr.responseText + '</p>');
                    }
                });
            });
        });
    }
    function PostWeddingRequest() {
        $(document).ready(function() {
            $('#weddingForm').submit(function(e) {
                e.preventDefault(); // Ngăn không cho form submit theo cách thông thường
        
                var formData = $(this).serialize(); // Lấy dữ liệu từ form
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: 'php/Event_Wedding_process.php', // Đảm bảo đường dẫn chính xác
                    data: formData,
                    success: function(response) {
                        // Hiển thị phản hồi từ server
                        $('#responseMessage').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Hiển thị lỗi chi tiết
                        $('#responseMessage').html('<p>Có lỗi xảy ra, vui lòng thử lại.</p><p>' + xhr.responseText + '</p>');
                    }
                });
            });
        });
    }
    function PostCommunityRequest() {
        $(document).ready(function() {
            $('#communityForm').submit(function(e) {
                e.preventDefault(); // Ngăn không cho form submit theo cách thông thường
        
                var formData = $(this).serialize(); // Lấy dữ liệu từ form
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: 'php/Event_Community_process.php', // Đảm bảo đường dẫn chính xác
                    data: formData,
                    success: function(response) {
                        // Hiển thị phản hồi từ server
                        $('#responseMessage').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Hiển thị lỗi chi tiết
                        $('#responseMessage').html('<p>Có lỗi xảy ra, vui lòng thử lại.</p><p>' + xhr.responseText + '</p>');
                    }
                });
            });
        });
    }


    const urlParams = new URLSearchParams(window.location.search);
    const formType = urlParams.get('form');
    const eventType = formType ? formType.charAt(0).toUpperCase() + formType.slice(1) : 'Meeting';

    setUpEventHandlers();
    loadContent('Meeting'); // Load initial content
});