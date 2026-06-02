document.querySelectorAll(".toggle-active").forEach((item) => {
  item.addEventListener("change", function () {
    const userID = this.dataset.user;
    const isActive = this.checked ? 1 : 0;

    fetch(`index.php?controller=admin&action=updateActiveAdmin`, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `adminID=${userID}&isActive=${isActive}`,
    })
      .then((res) => res.text())
      .then((data) => console.log(data));
  });
});

document.querySelectorAll(".toggle").forEach((item) => {
  item.addEventListener("change", function () {
    const userID = this.dataset.user;
    const isActive = this.checked ? 2 : 1;

    fetch(`index.php?controller=admin&action=updateroleAdmin`, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `adminID=${userID}&role=${isActive}`,
    })
      .then((res) => res.text())
      .then((data) => console.log(data));
  });
});
