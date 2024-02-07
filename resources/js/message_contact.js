import './bootstrap.js';
/*console.log("cela marche fort bien");
const form =document.getElementById("message_form");
console.log(form);

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    if(form['name'].value&&form['number'].value&&form['email'].value&&form['message'].value)
    {
        console.log("sa marche")
        form.submit();
    }else{
        console.log("veillez remplir tous les champs");
    }

})*/

window.Echo.channel("commande")
 .listen(".commande-valider",(event)=>{
     console.log(event);
     console.log("un monde de merde ici bas")
 })