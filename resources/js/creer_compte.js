console.log("cela marche fort bien");
const form =document.getElementById("compte_form");
console.log(form);

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    if(form['name'].value&&form['number'].value&&form['ville'].value&&form['mail'].value&&form['password'].value)
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