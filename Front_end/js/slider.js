const initSlider = () => {
    const imageList = document.querySelector(".slider_wrapper .img_list");
    const sliderButtons = document.querySelectorAll(".slider_wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider_scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar_thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;


    scrollbarThumb.addEventListener("mousedown",(e)=>{
        const startX= e.clientX;
        const thumbPosition= scrollbarThumb.offsetLeft;

        // update position
        const handleMouseMove = (e)=>{
            const deltaX= e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width -scrollbarThumb.offsetWidth;

            const boundedPosition =Math.max(0,Math.min(maxThumbPosition,newThumbPosition))
            const scrollPosition=(boundedPosition/maxThumbPosition) * maxScrollLeft;
            scrollbarThumb.style.left=`${boundedPosition}px`;
            imageList.scrollLeft=scrollPosition;
        }
        //remove event
        const handleMouseup =()=>{
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseup);
        }
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseup);
    })
    if (imageList.length === 0) {
        console.error("No image list found");
        return;
    }

    sliderButtons.forEach(button => {
        button.addEventListener("click", () => {
            console.log(button);
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction; // Change 'imageList' to 'imageList[0]'
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        })
    })

    const updateScrollThumPosition = () =>{
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition/ maxScrollLeft) * (sliderScrollbar.clientWidth- scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left= `${thumbPosition}px`;
    }
    imageList.addEventListener("scroll",()=>{
        updateScrollThumPosition();
    }
    )
}

window.addEventListener("load", initSlider);



// document.addEventListener("DOMContentLoaded", function() {
//     const prevButton = document.getElementById('prev-slide');
//     const nextButton = document.getElementById('next-slide');
//     const imageList = document.querySelector('.img_list');
//     const imageItems = document.querySelectorAll('.img_item');
//     const imageWidth = imageItems[0].offsetWidth;
//     let currentIndex = 0;

//     prevButton.addEventListener('click', function() {
//       currentIndex = (currentIndex === 0) ? imageItems.length - 1 : currentIndex - 1;
//       scrollImages();
//     });

//     nextButton.addEventListener('click', function() {
//       currentIndex = (currentIndex === imageItems.length - 1) ? 0 : currentIndex + 1;
//       scrollImages();
//     });

//     function scrollImages() {
//       const offset = currentIndex * imageWidth;
//       imageList.style.transform = `translateX(-${offset}px)`;
//     }
//   });