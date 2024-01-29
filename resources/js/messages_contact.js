var form =document.getElementById("form-cache");


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
    
    var id;
    if(name=="modalvue")
    {
      console.log("un monde fou")
       id =modalId.slice(8,modalId.length)
    }else{
      id =modalId.slice(10,modalId.length)
    }
      console.log(id);
      form_cache['query'].value="messagecontact";
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
        //var desc =new Caracteristique(data.description);
        var modal=`
        
        <div class="modal-dialog">
          <header class="modal-header">
            <h2>Détails du message</h2>
  
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
                <p>Date : <strong>${data.date}</strong></p>
                <p>Nom : <strong> ${data.nom}</strong></p>
                <p>Numero : <strong> ${data.numero}</strong></p>
                <p>Email : <strong>${data.email}</strong></p>
                <p>Message complet :</p>
                <div>
                ${data.content}
                </div>
              </div>
            </div>
          </section>
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
