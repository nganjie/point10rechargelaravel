function toggleSidebar() {
  const admin_wrapper = document.querySelector(".admin_wrapper");

    admin_wrapper.classList.toggle("hidden_sidebar");
    console.log(
      "admin_wrapper",
      admin_wrapper.classList.contains("hidden_sidebar")
    );
  }

