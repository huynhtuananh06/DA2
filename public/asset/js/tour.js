const itemliderbar = document.querySelectorAll(".tour-left-li");
itemliderbar.forEach(function (menu, index) {
  menu.addEventListener("click", function () {
    menu.classList.toggle("block");
  });
});
