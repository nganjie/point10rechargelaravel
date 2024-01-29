 export function launch_toast(message, toastStatus) {
  console.log("un autre ici bas")
  var x = document.getElementById("toast");
  x.style.display="flex";
  x.className = "show";

  const desc = document.querySelector("#desc");
  const img = document.querySelector("#img");
  desc.innerHTML = message;
  img.className = toastStatus || "success";

  if (toastStatus == "error") {
    img.innerHTML = `
    
    <i class="fa-regular fa-circle-xmark"></i>
    `;
  }
  setTimeout(function () {
    x.className = x.className.replace("show", "");
  }, 5000);
}
