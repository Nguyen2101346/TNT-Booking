function loadContent(eventType) {
     $.ajax({
         url: './php/' + eventType + '.php',
         method: 'GET',
         success: function(data) {
             // Parse the returned HTML and find the required elements
             const parsedHTML = new DOMParser().parseFromString(data, 'text/html');
             const content = parsedHTML.querySelector('#hidden' + eventType + 'Content').innerHTML;
             const form = parsedHTML.querySelector('#hidden' + eventType + 'Form').innerHTML;
             const slide = parsedHTML.querySelector('#' + eventType + 'Slide').innerHTML;

             $('#content').html(content);
             $('#Request_Form').html(form);
             $('#Request_Slide').html(slide);
             
             setUpRequestFormHandlers();
             initializeSwiper();
         },
         error: function() {
             alert('Failed to load content.');
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

 $(document).ready(function() {
     setUpEventHandlers();
     loadContent('Meeting'); // Load initial content
 });