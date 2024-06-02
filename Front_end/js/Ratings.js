
// function clearText() {
//     var textarea = document.getElementById("comment");
//     textarea.value = "";
// }
document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện khi người dùng click vào một ngôi sao để chọn đánh giá
    document.querySelectorAll('.star').forEach(star => {
        star.addEventListener('click', function() {
            // Lấy giá trị đánh giá từ thuộc tính data-value của ngôi sao được click
            let rating = this.getAttribute('data-value');
            
            document.getElementById('rating').value = rating;
            // Cập nhật giá trị đánh giá vào phần tử span có id là 'result'
            document.getElementById('result').textContent = rating + " sao";

            // Tô màu các ngôi sao để phản ánh đánh giá của người dùng
            document.querySelectorAll('.star').forEach(s => {
                // Kiểm tra xem ngôi sao đang xét có cùng hoặc ít hơn giá trị đánh giá mới không
                if (s.getAttribute('data-value') <= rating) {
                    s.style.color = 'gold'; // Tô màu vàng cho các ngôi sao được chọn
                } else {
                    s.style.color = 'gray'; // Tô màu xám cho các ngôi sao không được chọn
                }
            });
        });
    });

    // Tô màu các ngôi sao hiển thị từ cơ sở dữ liệu khi trang được tải
    // document.querySelectorAll('.rating').forEach(ratingDiv => {
    //     let ratingSpan = ratingDiv.querySelector('.sale-display');
    //     if (ratingSpan) {
    //         let rating = parseFloat(ratingSpan.textContent.split(' /')[0]);
    //         ratingDiv.querySelectorAll('.star-display').forEach(star => {
    //             if (parseInt(star.getAttribute('data-value')) <= rating) {
    //                 star.style.color = 'gold';
    //             } else {
    //                 star.style.color = 'gray';
    //             }
    //         });
    //     }
    // });

    document.querySelectorAll('.rating').forEach(ratingDiv => {
        let ratingSpan = ratingDiv.querySelector('.sale-display');
        if (ratingSpan) {
            let rating = parseFloat(ratingSpan.textContent.split(' /')[0]);
            ratingDiv.querySelectorAll('.star_display').forEach(star => {
                if (star.classList.contains('selected')) {
                    star.style.color = 'gold';
                } else {
                    star.style.color = 'gray';
                }
            });
        }
    });
});

