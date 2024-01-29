const initFonction = function () {
  const closeMobileMenuBtn = document.querySelector(".close_btn");
  const mobileMenu = document.querySelector("#mobile-menu");
  const open_btn = document.querySelector(".open_btn");

  console.log(" : " + closeMobileMenuBtn, mobileMenu);

  if (closeMobileMenuBtn) {
    closeMobileMenuBtn.addEventListener("click", function (event) {
      mobileMenu?.classList?.add("mobile-menu-close");
    });
  }

  if (open_btn) {
    open_btn.addEventListener("click", function (event) {
      mobileMenu?.classList?.remove("mobile-menu-close");
    });
  }

  if (window.innerWidth <= 700) {
    mobileMenu.classList.remove("mobile-menu-close");
  }
};

document.addEventListener("DOMContentLoaded", initFonction);

