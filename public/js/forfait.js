import { App,Forfait,Caracteristique,Element } from '../js/class.js';
import { search_choices,objLength,sliderPrice,sliderQte } from '../js/range_slider.js';
var select_choix =document.querySelector('.categorie');
console.log(search_choices);
const form =document.getElementById('form-id');
var boundle =document.getElementById('bundle-forfait');
var carousel=document.getElementById('carousel-forfait');
var tab_filter=[];
tab_filter["nom"]="BLUE NOUS";
tab_filter['nb_go']=50;
console.log(form);
console.log("un monde de fou ici")
sliderQte.onChange((values) => {

  console.log(values);
  searchFetch("nb_go",values[0],values[1])
});
sliderPrice.onChange((values) => {

  //search_choices["prix_min"] = values[0];
  //search_choices["prix_max"] = values[1];

  //var d=app.Template(app.Filter(search_choices));
  searchFetch("prix",values[0],values[1])
  //boundle.innerHTML=d;
  //console.log(app.Filter(search_choices))
 // console.log(d)
});
select_choix.addEventListener("change",()=>{
  //console.log("un bon départ pour ici : "+select_choix.options[select_choix.selectedIndex].value+" et : "+select_choix.selectedIndex);
  console.log(search_choices);
  if(select_choix.options[select_choix.selectedIndex].value=="")
  {
    searchFetch("nom","all","")
  }else{
    searchFetch("nom",select_choix.options[select_choix.selectedIndex].value,"")
  }
})
function searchFetch(option,valueOne,valueTwo){
  var vurl ="../api/forfaits/"+option+"-"+valueOne+""+(option!="nom"?"-"+valueTwo:"");
  console.log(vurl)
  console.log(valueTwo)
  fetch(vurl,{
    method:"GET"
  }).then(res =>res.text())
  .then((data)=>{
    //console.log(data)
    boundle.innerHTML=data
  })
  .catch((e)=>{
    console.log(e)
  })
}
/*
fetch("../api/forfaits",{
    method:"GET"
    //body:new FormData(document.getElementById("form-id"))
}).then(res =>res.json())
.then((data)=>{
  console.log("cela ne marche pas")
    console.log(data);
    var b =data[1];
    //console.log(b);
    var app =new App(data);
    var slider =app.TemplateSlider();
    //boundle.innerHTML=app.Template(app.forfaits);
    //carousel.innerHTML=slider;
    //console.log(slider);
 
    sliderQte.onChange((values) => {

      var d=app.Template(app.Filter(search_choices));
      //boundle.innerHTML=d;
      //console.log("un autre ici")
      //console.log(d)
    });
    sliderPrice.onChange((values) => {

      //search_choices["prix_min"] = values[0];
      //search_choices["prix_max"] = values[1];

      var d=app.Template(app.Filter(search_choices));
      //boundle.innerHTML=d;
      //console.log(app.Filter(search_choices))
     // console.log(d)
    });
    select_choix.addEventListener("change",()=>{
      //console.log("un bon départ pour ici : "+select_choix.options[select_choix.selectedIndex].value+" et : "+select_choix.selectedIndex);
      console.log(search_choices);
      if(select_choix.options[select_choix.selectedIndex].value=="")
      {
        boundle.innerHTML=app.Template(app.forfaits);
      }else{
        var d=app.Template(app.Filter(search_choices));
      //boundle.innerHTML=d;
      //console.log(app.Filter(search_choices));
      }
      

    })

})*/