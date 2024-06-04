



// // document.addEventListener("DOMContentLoaded", function() {
// //     const prevButton = document.getElementById('prev-slide');
// //     const nextButton = document.getElementById('next-slide');
// //     const imageList = document.querySelector('.img_list');
// //     const imageItems = document.querySelectorAll('.img_item');
// //     const imageWidth = imageItems[0].offsetWidth;
// //     let currentIndex = 0;

// //     prevButton.addEventListener('click', function() {
// //       currentIndex = (currentIndex === 0) ? imageItems.length - 1 : currentIndex - 1;
// //       scrollImages();
// //     });

// //     nextButton.addEventListener('click', function() {
// //       currentIndex = (currentIndex === imageItems.length - 1) ? 0 : currentIndex + 1;
// //       scrollImages();
// //     });

// //     function scrollImages() {
// //       const offset = currentIndex * imageWidth;
// //       imageList.style.transform = `translateX(-${offset}px)`;
// //     }
// //   });