//let xd;
import { launch_toast } from "js/toast.js";
(function () {
  const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

  //I'm adding this section so I don't have to keep updating this pen every year :-)
  //remove this if you don't need it
  let today = new Date(),
    dd = String(today.getDate()).padStart(2, "0"),
    mm = String(today.getMonth() + 1).padStart(2, "0"),
    yyyy = today.getFullYear(),
    nextYear = yyyy + 1,
    dayMonth = "09/30/",
    birthday = dayMonth + yyyy;

  today = mm + "/" + dd + "/" + yyyy;
  if (today > birthday) {
    birthday = dayMonth + nextYear;
  }
  //end

  const countDown = new Date(birthday).getTime(),
    xd = setInterval(function () {
      const now = new Date().getTime(),
        distance = countDown - now;

      //   (document.getElementById("days").innerText = Math.floor(distance / day)),
      //   (document.getElementById("hours").innerText = Math.floor(
      //     (distance % day) / hour
      //   )),
      (document.getElementById("minutes").innerText = Math.floor(
        (distance % hour) / minute
      )),
        (document.getElementById("seconds").innerText =
          Math.floor((distance % minute) / second) >= 9
            ? Math.floor((distance % minute) / second)
            : "0" + Math.floor((distance % minute) / second));

      //do something later when date is reached
      if (distance < 0) {
        document.getElementById("headline").innerText = "It's my birthday!";
        document.getElementById("countdown").style.display = "none";
        document.getElementById("content").style.display = "block";
        clearInterval(xd);
      }
      //seconds
    }, 0);

    var div_error=document.getElementById("error");
var form =document.getElementById("cache");
var min =document.getElementById('countdown');
console.log(form);
const form_command=document.getElementById("valid-form");
form_command.addEventListener("submit",(e)=>{
  //e.preventDefault();
  console.log("je suis à terre");
  setTimeout(()=>{
   let confirm= setInterval(()=>{
      fetch("../php/api.php",{
        method:"POST",
        body:new FormData(document.getElementById("cache"))
      }).then(res=>res.text())
      .then((data)=>{
        console.log(data);
        if(Number(data)==2)
        {
          min.innerHTML+=`<p style="color:blue">votre forfait à été activé avec success</p>`;
        launch_toast("votre forfait à été activé avec success","success");
          console.log(" un nouveau monde souvre à moi");
          div_error.innerHTML=data;
          clearInterval(confirm);
          clearInterval(xd)
        }else{
          console.log("rien ne va ici bas");
        }
        //clearInterval(confirm);
      })
    },5000)
  },5000)

});
})();
