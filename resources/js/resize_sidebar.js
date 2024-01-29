document.addEventListener("DOMContentLoaded", function () {
  // here is and automatically invoke function
  window.addEventListener("resize", function () {

    console.log("it's called : ")
    const admin_wrapper = document.querySelector(".admin_wrapper");
    console.log("window resize : ", window.innerWidth, window.innerHeight);
    
    if (window.innerWidth < 600) {
      admin_wrapper.classList.add("hidden_sidebar");
    }

    if (window.innerWidth > 600) {
      admin_wrapper.classList.add("hidden_sidebar");
    }
  });
});
