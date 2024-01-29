import { launch_toast } from "../js/toast.js";

const form_commande=document.getElementById("valid-form");
var name_client =document.getElementById('name-client');
var email_client=document.getElementById('email-client');
var number_client=document.getElementById('number-client');
var number_recharge=document.getElementById('number-recharge');
var reference=document.getElementById('reference');
var mode_paiemant=document.getElementById('mode-paiemant');
var div_error=document.getElementById("error");
var entreprise =document.getElementById("entreprise");


//console.log("avant le launch ");

console.log(form_commande["name"]);
form_commande["name"].addEventListener("change",(e)=>{
    console.log(form_commande["name"].value)
    name_client.innerHTML=form_commande["name"].value;
})
form_commande["email"].addEventListener("change",(e)=>{
    console.log(form_commande["email"].value)
    email_client.innerHTML=form_commande["email"].value;
})
form_commande["phone_number"].addEventListener("change",(e)=>{
    //console.log(form_commande["email"].value)
    number_recharge.innerHTML=form_commande["phone_number"].value;
})
form_commande["pay_number"].addEventListener("change",(e)=>{
    console.log(form_commande["pay_number"].value)
    number_client.innerHTML=form_commande["pay_number"].value;
})
form_commande["nom-entreprise"].addEventListener("change",(e)=>{
    console.log(form_commande["nom-entreprise"].value)
    entreprise.innerHTML=form_commande["nom-entreprise"].value;
})
console.log(form_commande["methode"]["methode"]);
form_commande["methode"].forEach(element => {
    //console.log(element)
    element.addEventListener("change",(e)=>{
        console.log(" on verifie bien ici : "+element.value);
        mode_paiemant.innerHTML=element.value;
    })
});
form_commande["transaction_number"].addEventListener("change",(e)=>{
    console.log(form_commande["transaction_number"].value)
    reference.innerHTML=form_commande["transaction_number"].value;
})


form_commande.addEventListener("submit",(e)=>{
    e.preventDefault();
    if(form_commande['name'].value&&form_commande['email'].value&&form_commande['phone_number'].value&&form_commande['pay_number'].value&&form_commande['transaction_number'].value&&form_commande['whatsap-number'].value)
    {
        fetch("../php/api.php",{
            method:"POST",
            body:new FormData(document.getElementById("valid-form"))
        }).then(res =>res.text())
        .then((data)=>{
            launch_toast("commande enregistrer avec success ","success");
            console.log("on regarde");
            console.log(data);
            //id_commande
            var form =document.getElementById("cache");
            form['id_commande'].value=Number(data);
            console.log("et on a : "+form['id_commande'].value)
            var body=`<p>Nom du client : <span style="color:#42da82">${form_commande['name'].value}</span></p>
            <p>Numero à Recharger :<span style="color:#42da82"> ${form_commande['phone_number'].value}<span></p>
            <p>Numero whatsapp :<span style="color:#42da82"> ${form_commande['whatsap-number'].value}</span></p>
            <p>Numero de payement :<span style="color:#42da82"> ${form_commande['pay_number'].value}</span></p>
            <p>email :<span style="color:#42da82"> ${form_commande['email'].value}</span></p>`
            Email.send({
                SecureToken :"59dd3b39-cd85-466b-9454-74da0693ecd9",
                To : 'point10recharge@gmail.com',
                From : "point10recharge@gmail.com",
                Subject : "Nouvelle commande",
                Body : body
              }).then(
              message => console.log(message)
              );
           // div_error.innerHTML=data;
        })
    }else{
        alert("sa ne marche pas");
        launch_toast("veillez renseignez tous les champs","error");
    }
    
})
