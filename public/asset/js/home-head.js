document.addEventListener("DOMContentLoaded", function () {
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
    const imgContainer = document.querySelector(".aspect-ratio-169"); // Kiểm tra kỹ class này
    const dotItem = document.querySelectorAll(".dot");
    
    if (!imgContainer || imgPosition.length === 0) {
        
        return; // Dừng code nếu không tìm thấy để tránh lỗi 'null'
    }

    let imgNumber = imgPosition.length;
    let index = 0;

    imgPosition.forEach(function (image, i) {
        image.style.left = i * 100 + "%";
        if (dotItem[i]) {
            dotItem[i].addEventListener("click", function () {
                index = i;
                slider(index);
            });
        }
    });

    function slide() {
        index++;
        if (index >= imgNumber) {
            index = 0;
        }
        slider(index);
    }

    function slider(index) {
        // Sử dụng transform thay vì left để mượt hơn và tránh lỗi layout
        imgContainer.style.transform = "translateX(-" + index * 100 + "%)";
        
        // Sửa lỗi 'null' khi tìm .active
        const dotActive = document.querySelector(".dot.active");
        if (dotActive) {
            dotActive.classList.remove("active");
        }
        
        if (dotItem[index]) {
            dotItem[index].classList.add("active");
        }
    }

    setInterval(slide, 3000);
});