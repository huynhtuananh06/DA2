document.querySelectorAll(".toggle-active").forEach((item) => {
  item.addEventListener("change", function () {
    const userID = this.dataset.user;
    const isActive = this.checked ? 1 : 0;

    fetch(`index.php?controller=admin&action=updateActive`, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `userID=${userID}&isActive=${isActive}`,
    })
      .then((res) => res.text())
      .then((data) => console.log(data));
  });
});
