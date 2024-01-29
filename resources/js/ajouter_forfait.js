console.log("cela marche fort bien");
const form =document.getElementById("register_form");
console.log(form);

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    if(form['categorie'].value&&form['description'].value&&form['taille'].value&&form['prix'].value&&form['nb_go'].value)
    {
        console.log("sa marche")
        form.submit();
    }else{
        alert("veillez remplir tous les champs");
    }
   /* for(var i=0;i<form.length;i++)
    {
        console.log(form[i].value);
    }*/
})