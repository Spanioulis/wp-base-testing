(function hamburgerEvents() {
  const hamburger = document.getElementById("hamburger");
  const menuPage = document.getElementById("main-menu");

  hamburger.addEventListener("click", function () {
    if (menuPage.classList.contains("expanded")) {
      menuPage.classList.remove("expanded");
      hamburger.classList.remove("expanded");
    } else {
      menuPage.classList.add("expanded");
      hamburger.classList.add("expanded");
    }
  });
})();
