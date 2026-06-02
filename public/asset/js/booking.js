
// Đợi cho tất cả nội dung HTML được tải xong
document.addEventListener("DOMContentLoaded", function () {
  // Lấy TẤT CẢ các nút bấm có class "tab-item"
  const tabButtons = document.querySelectorAll(".tab-item");

  // Lấy TẤT CẢ các nội dung có class "tab-content"
  const tabContents = document.querySelectorAll(".tab-content");

  // Lặp qua từng nút bấm
  tabButtons.forEach(function (button) {
    // Gắn sự kiện click cho từng nút
    button.addEventListener("click", function () {
      // Lấy ra giá trị của "data-tab" (ví dụ: "mota", "lichtrinh"...)
      const tabId = button.dataset.tab;

      // 1. ẨN TẤT CẢ các khối nội dung
      tabContents.forEach(function (content) {
        content.style.display = "none";
      });

      // 2. XÓA class "active" khỏi TẤT CẢ các nút
      tabButtons.forEach(function (btn) {
        btn.classList.remove("active");
      });

      // 3. HIỂN THỊ nội dung có id tương ứng
      const contentToShow = document.getElementById(tabId);
      if (contentToShow) {
        contentToShow.style.display = "block";
      }

      // 4. THÊM class "active" cho nút VỪA BẤM
      button.classList.add("active");
    });
  });
});

// ^v

const button = document.querySelector(".booking-content-left-bottom-top");
if (button) {
  button.addEventListener("click", function () {
    document
      .querySelector(".booking-content-left-bottom-content-big")
      .classList.toggle("activeB");
  });
}

//img

const img = document.querySelector(".booking-content-left-big-img img");
const smallImg = document.querySelectorAll(
  ".booking-content-left-small-img img"
);
// smallImg.addEventListener("click",function() {

// })
smallImg.forEach(function (imgItem, X) {
  imgItem.addEventListener("click", function () {
    img.src = imgItem.src;
  });
});

//total

// Đợi cho tất cả nội dung HTML được tải xong
document.addEventListener("DOMContentLoaded", function () {
  // 1. Lấy các phần tử (element) từ HTML
  const inputNguoiLon = document.getElementById("so-luong-nguoi-lon");
  const inputTreEm = document.getElementById("so-luong-tre-em");
  const displayTongTien = document.getElementById("tong-tien");

  // 2. Lấy giá vé từ thuộc tính 'data-price'
  // Dùng querySelector để tìm thẻ <p> chứa giá
  const pNguoiLon = document.querySelector(".ticket-nguoilon p");
  const pTreEm = document.querySelector(".ticket-treem p");


  const priceNguoiLon = parseFloat(pNguoiLon.dataset.price);
  const priceTreEm = parseFloat(pTreEm.dataset.price);

  // 3. Tạo một hàm để tính toán và cập nhật tổng tiền
  function updateTongTien() {
    // Lấy giá trị số lượng, nếu rỗng thì coi là 0
    const soLuongNL = parseInt(inputNguoiLon.value) || 0;
    const soLuongTE = parseInt(inputTreEm.value) || 0;

    // Tính tổng
    const total = soLuongNL * priceNguoiLon + soLuongTE * priceTreEm;

    // Định dạng tổng tiền sang kiểu Việt Nam (ví dụ: 1.500.000)
    const formattedTotal = total.toLocaleString("vi-VN");

    // 4. Cập nhật lại tổng tiền trên giao diện
    displayTongTien.innerHTML = `${formattedTotal} <sup>đ</sup>`;
  }

  // 5. Gắn sự kiện 'input' cho cả hai ô số lượng
  // Sự kiện 'input' sẽ kích hoạt ngay khi người dùng gõ hoặc bấm nút +/-
  inputNguoiLon.addEventListener("input", updateTongTien);
  inputTreEm.addEventListener("input", updateTongTien);

  // Tùy chọn: Tính tổng tiền một lần khi trang vừa tải xong (nếu có giá trị mặc định)
  updateTongTien();
});
