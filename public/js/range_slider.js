var selectF =document.querySelector('.categorie');
console.log(selectF);
const rangeSliderOptions = {
  values: [5, 100],
  min: 5,
  max: 100,
  step: 1,
  railHeight: 3,
  trackHeight: 3,
  pointRadius: 10,
};

const rangeSliderOptionsPrice = {
  values: [3000, 100000],
  min: 3000,
  max: 100000,
  step: 100,
  railHeight: 3,
  trackHeight: 3,
  pointRadius: 10,
};
export let search_choices = [];

export const sliderPrice = new RangeSlider("#price", rangeSliderOptionsPrice);
export const sliderQte = new RangeSlider("#qte", rangeSliderOptions);
const qte_value = document.querySelector(".qte_value");
const price_value = document.querySelector(".price_value");
let selectElement = document.getElementById('');

/*let selectedOption = selectF.options[selectElement.selectedIndex];
var selectElmt = document.getElementById("ComboPays");
var valeurselectionne= selectElmt.options[selectElmt.selectedIndex].value;
var textselectionne = selectElmt.options[selectElmt.selectedIndex].text;*/
selectF.addEventListener('change',(e)=>{
  console.log("on va labas")
  console.log(selectF.options[selectF.selectedIndex].text);
  search_choices["nom"]=selectF.options[selectF.selectedIndex].text;
  
})
selectF.addEventListener("change", e => {
  //console.log(elt.id);
  //const value = elt.value
 // console.log(e);
 /* if (!Boolean(elt.value)) return;
  createDivEletItem(elt.value)*/
  /*console.log(elt);

  // call of the deleteop function
  resetDeleteOptions()

  search_choices[elt.id] =elt.value
  console.log(search_choices);
  //console.log(objLength(search_choices));*/

})

console.log(selectF);
// charger d'abord le Slider pour le prix
sliderPrice.onChange((values) => {
  console.log("first value: ", values);
  if (!price_value) return;

  price_value.textContent = `Prix : ${values[0]}XAF - ${values[1]}XAF`;
  search_choices["prix_min"] = values[0];
	search_choices["prix_max"] = values[1];
});

// charger d'abord le Slider pour le prix
sliderQte.onChange((values) => {
  console.log("first qte: ", values);
  if (!qte_value) return;

  qte_value.textContent = `Quantité en Go : ${values[0]}Go - ${values[1]}Go `;
  search_choices["go_min"] = values[0];
	search_choices["go_max"] = values[1];
});
export function objLength(obj){
  var i=0;
  for(var props in obj){
      i++;
  }
  return i;
}
