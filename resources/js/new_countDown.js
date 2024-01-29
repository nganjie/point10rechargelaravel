import { generateurPDF } from "../js/createPdf.js";
import { launch_toast } from "../js/toast.js";
//function decompteEn5Minutes() {
  const duree = 60000*5;
  let tempsRestant = duree;
  function mettreAJourDecompte() {
    const minutes = Math.floor(tempsRestant / 60000);
    const secondes = Math.floor((tempsRestant % 60000) / 1000);
    console.log("nombre de minutes : "+minutes)

    const tempsFormatte = `
    <h1 id="headline">Veillez patienter</h1>
    <div class="times">
    ${minutes.toString().padStart(2, "0")}:${secondes
      .toString()
      .padStart(2, "0")}
      </div>
      `;

    let tempsElement = document.getElementById("temps");
    if (tempsElement) {
      tempsElement.innerHTML = tempsFormatte;
    } else {
      const parent = document.querySelector("#temps-restant");

      parent.innerHTML = `<div id="temps"></div>`;
    }

    tempsRestant -= 1000;

    if (tempsRestant < 0) {
      clearInterval(intervalle);
      const tempsRestantElement = document.getElementById("temps-restant");
      if (tempsRestantElement) {
        tempsRestantElement.innerHTML = "Le décompte est terminé.";
      }

      // Ajouter une nouvelle balise span pour contenir le temps
      tempsElement.innerHTML = '<div id="temps"></div>';

      tempsRestant = duree;
      if (tempsRestantElement) {
        tempsRestantElement.innerHTML = "Le décompte recommence.";
      }
      intervalle = setInterval(mettreAJourDecompte, 1000);
    }
  }

 /* let intervalle = setInterval(mettreAJourDecompte, 1000);

  function arreterDecompte() {
    clearInterval(intervalle);
    const tempsRestantElement = document.getElementById("temps-restant");
    if (tempsRestantElement) {
      tempsRestantElement.innerHTML = "Le décompte est arrêté.";
    }
  }*/
//}
console.log(document.querySelector("#temps-restant"))

//decompteEn5Minutes();

const form_command=document.getElementById("valid-form");
const form_commande=document.getElementById("valid-form");
var fm=document.getElementById("userForm");
var header =document.querySelector(".header_wrapper");
var footer=document.querySelector(".footer_wrapper");
var min =document.getElementById('temps-restant');
var cm =document.getElementById("multi_step_section");
var prev =document.getElementById("preview");

var pdm=document.getElementById("pdfac");

cm.style.maxWidth="100%"
console.log(min)
form_command.addEventListener("submit",(e)=>{
  e.preventDefault();
 // decompteEn5Minutes();
 if(form_commande['name'].value&&form_commande['email'].value&&form_commande['phone_number'].value&&form_commande['pay_number'].value&&form_commande['transaction_number'].value&&form_commande['whatsap-number'].value)
 {
  
 function arreterDecompte() {
  clearInterval(intervalle);
  const tempsRestantElement = document.getElementById("temps-restant");
  if (tempsRestantElement) {
    tempsRestantElement.innerHTML = "Le décompte est arrêté.";
  }
}
 console.log("je suis à terre");
 var telecharger=document.getElementById("pdf");
 pdm.addEventListener("submit",(es)=>{
   es.preventDefault();
   var pd=document.querySelector(".wrapper");
    var str=pd.innerHTML
    pdm["facture"].value=str;
    pdm.submit();
   fm.style.display="none";
   fm.style.margin="auto";
   header.style.display="none";
   footer.style.display="none";
   cm.style.maxWidth="100%"
   cm.style.maxHeight="100%"
   cm.style.width="100%"
   cm.style.height="100%"
   prev.style.height="100%"
   prev.style.height="100%"
   prev.style.maxWidth="100%"
   prev.style.maxHeight="100%"
   //prev.style.width="";
   
   generateurPDF("#multi_step_section","fecture-forfait-point10recharge");
   setTimeout(()=>{
     fm.style.display="block";
     header.style.display="block";
   footer.style.display="block";
   },7000)
   
 })
 setTimeout(()=>{
   var intervalle = setInterval(mettreAJourDecompte, 1000);
  let confirm= setInterval(()=>{
     fetch("../php/api.php",{
       method:"POST",
       body:new FormData(document.getElementById("cache"))
     }).then(res=>res.text())
     .then((data)=>{
       console.log(data);
     /*  fm.style.display="none";
       generateurPDF("#multi_step_section","fecture-forfait-point10recharge");
       generateurPDF("#preview","fecture-forfait-point10recharge");*/
       

       
       if(Number(data)==2)
       {
         telecharger.style.visibility="visible"
         min.innerHTML+=`<p style="color:blue">votre forfait à été activé avec success</p>`;
       launch_toast("votre forfait à été activé avec success","success");
         console.log(" un nouveau monde souvre à moi");
         //div_error.innerHTML=data;
         clearInterval(intervalle);
         clearInterval(confirm);
         
         
         
       }else if(Number(data)==3)
       {
        min.innerHTML+=`<p style="color:red">votre forfait à été rejeté</p>`;
        launch_toast("votre forfait à été rejeté","error");
          console.log(" un nouveau monde souvre à moi");
          //div_error.innerHTML=data;
          clearInterval(intervalle);
          clearInterval(confirm);
       }else{
         console.log("rien ne va ici bas");
       }
       //clearInterval(confirm);
       //clearInterval(t);
     })
   },5000)
 },5000)
 }



});
