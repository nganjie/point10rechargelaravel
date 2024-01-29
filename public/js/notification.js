import { launch_toast } from "../js/toast.js";
var form_cache =document.getElementById("form-cache");
var notif =document.getElementById("notif");
console.log(form_cache);
form_cache["query"].value="notification";
console.log(form_cache["query"].value)
var nb_commande =Number(notif.innerHTML);
setInterval(()=>{
    form_cache["query"].value="notification";
    fetch(form_cache['chemin'].value+"../php/api.php",{
        method:"POST",
        body:new FormData(document.getElementById("form-cache"))
    }).then(res=>res.json())
    .then((data)=>{
        
        if(nb_commande!=Number(data.nb_commande))
        {
            if(data.nb_commande==0){
                notif.style.display="none"
            }else{
                notif.style.display="flex"
                notif.innerHTML=data.nb_commande
            }

            nb_commande=Number(data.nb_commande);
            launch_toast("Nouvelle commande enregistrer","success")
            console.log(data);
        }
        
    })
},2000)
