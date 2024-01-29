import { Caracteristique } from "../js/class.js";
import { launch_toast } from "../js/toast.js";

const openEls = document.querySelectorAll("[data-open]");

const isVisible = "is-visible";
var modal1 =document.querySelector("#modal1");
console.log(modal1);
var form_cache =document.getElementById("form-cache");

for (const el of openEls) {
  el.addEventListener("click", function () {
    const modalId = this.dataset.open;
    console.log(modalId.slice(0,8));
    let name =modalId.slice(0,8);
    var tFooter="";
    var namedesc='';
    if(name=="modalvue")
    {
      tFooter="";
      namedesc="Détails de la commande";
    }
    else{
      tFooter=`    <form 
      action="
    "
    >
      <div class="form_item" id="valider">
        <label for="" >Valider la commande</label>
        <!-- <div class="check-box">
          <input type="checkbox"  class="valider"/>
        </div> -->

        <div class="button button-2 green_btn" id="">
          <div class="slide"></div>
          <span class="text_btn" href="#">Valider la commande</span>
        </div>
      </div>

      <div class="form_item">
        <label for="">Cloturer la commande</label>
        <!-- <div class="check-box">
          <input type="checkbox" />
        </div> -->

        <div class="button button-2" id="cloturer">
          <div class="slide"></div>
          <span class="text_btn" href="#">Cloturer la commande</span>
        </div>
      </div>
    </form>`;
    }
    var id;
    if(name=="modalvue")
    {
      console.log("un monde fou")
       id =modalId.slice(8,modalId.length)
    }else{
      id =modalId.slice(10,modalId.length)
    }
      console.log(id);
      form_cache['query'].value="modalvue";
      form_cache['id'].value=id;
      form_cache['id_commande'].value=id;
      console.log(form_cache['id'].value);
      console.log(form_cache['chemin'].value);
      fetch(form_cache['chemin'].value+"../php/api.php",{
        method:"POST",
        body:new FormData(document.getElementById("form-cache"))
      }).then(res=>res.json())
      .then((data)=>{
        console.log("un monde de fous ")
        console.log(data);
        var desc =new Caracteristique(data.description);
        var modal=`
        <div class="modal-dialog">
          <header class="modal-header">
            <h2>${namedesc}</h2>
  
            <button class="close-modal" aria-label="close modal" data-close>
              ✕
            </button>
          </header>
          <section class="modal-content">
            <div class="details_bundles">
              <div>
                <img src="${form_cache['chemin'].value}../media/images/blue.png" alt="" />
              </div>
              <div>
                <p>Nom Du Client : <strong>${data.nom}</strong></p>
                <p>Nom De L'entreprise : <strong>${data.nom_entreprise}</strong></p>
                <p>email  : <strong>${data.email}</strong></p>
                <p>Numero payement : <strong>${data.numero_payement}</strong></p>
                <p>Numero bénéficiaire : <strong>${data.numero_benefice}</strong></p>
                <p>Operateur de payement : <strong>${data.operateur_payement}</strong></p>
                <p>Nom De L'entreprise : <strong>${data.nom_entreprise}</strong></p>
                <p>Numero whatsapp : <strong>${data.numero_whatsapp}</strong></p>
                <p> Numero de transaction : <strong>${data.numero_transaction}</strong></p>
                <p>Date de commande : <strong>${data.date_commande}</strong></p>
                <p>Date de cloture : <strong>${data.date_cloture}</strong></p>
                <p>Type de forfait : <strong>${data.type}</strong></p>
                <p>Nom du forfait : <strong>${data.nom_categorie}</strong></p>
                <p>Taille du forfait : <strong>${data.taille}</strong></p>
                ${desc.TemplateVue()}
                <p>Prix : <strong>${data.prix} </strong></p>
              </div>
            </div>
            ${tFooter}
          </section>
          <!-- <footer class="modal-footer">The footer of the first modal</footer> -->
        </div>
      `;
      //console.log(modal);
      modal1.innerHTML=modal;
      modal1.classList.add(isVisible);
      const closeEls = document.querySelectorAll("[data-close]");
      for (const el of closeEls) {
        el.addEventListener("click", function () {
          console.log(" on le fermer ici");
          this.parentElement.parentElement.parentElement.classList.remove(isVisible);
        });
      }
      if(name!="modalvue")
      {
        var valid =document.querySelector("#valider");
        var cloturer =document.querySelector("#cloturer");
        console.log(valid);
        
        valid.addEventListener("click",(e)=>{
          form_cache['query'].value="validercommande";
          form_cache['motif'].value="valider";
        form_cache['id_commande'].value=id;
          console.log(" avec l'id : "+data.id);
          fetch("../php/api.php",{
            method:"POST",
            body:new FormData(document.getElementById("form-cache"))
          }).then(res1=>res1.json())
          .then((data1)=>{
            console.log(data1);
            if(data1.etat==1)
            {
              launch_toast("la commande à été validé","success");
            }
          })
        });
        cloturer.addEventListener("click",(e)=>{
          console.log(" avec l'id : "+data.id);
          form_cache['query'].value="validercommande";
          form_cache['motif'].value="cloturer";
        form_cache['id_commande'].value=id;
          console.log(" avec l'id : "+data.id);
          fetch("../php/api.php",{
            method:"POST",
            body:new FormData(document.getElementById("form-cache"))
          }).then(res1=>res1.json())
          .then((data1)=>{
            console.log(data1);
            if(data1.etat==1)
            {
              launch_toast("la commande à été cloturer avec success","success");
            }
          })
        })
      }
      
      })
    
    
    console.log(this.dataset);
    //document.getElementById(modalId).classList.add(isVisible);
  });
}



document.addEventListener("click", (e) => {
  if (e.target == document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});

document.addEventListener("keyup", (e) => {
  // if we press the ESC
  if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});
