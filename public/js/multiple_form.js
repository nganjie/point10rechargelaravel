import { launch_toast } from "../js/toast.js";

const METHODE = "methode";
const METHODE1 = "methode1";

document.addEventListener("DOMContentLoaded", function (e) {
  const methode = document.querySelector("#methode");
  const methode1 = document.querySelector("#methode1");

  methode.addEventListener("change", changeDescriptionInpuHandler);

  methode1.addEventListener("change", changeDescriptionInpuHandler);

  function changeDescriptionInpuHandler(e) {
    const value = e.target.checked;
    const id = e.target.id;
    const desc = document.querySelector(".input-description");
    if (Boolean(value) && id == METHODE) {
      console.log("on ici cvad");
      desc.innerHTML = `
      <h1>Guide de paiement Orange Money Cameroun</h1>
                <p>Composer le <h3 class="number_compose">

                  #150*14*272180*656968696*le_montant_ici#
                </h3> 
              </p>
      `;
    } else {
      console.log("on ici cvb");
      desc.innerHTML = `
      <h1>Guide de paiement MTN MOMO Cameroun</h1>
                <p>Composer le <h3 class="number_compose">

                *126*14*683577518*montant# 
                Réf:620
                </h3> 
              </p>

      `;
    }
    console.log("", value, id);
  }
  //====================== FORM MANAGER ==============

  const btnsPrev = [...document.querySelectorAll(".btn.prev")];
  const singleForms = [...document.querySelectorAll(".single-form")];
  const list = [...document.querySelectorAll(".list")];
  const btnsNext = [...document.querySelectorAll(".btn.next")];
  var confirmdiv=document.getElementById("confirm-div");
  var submitdiv=document.getElementById("submit-div");
  var infodiv=document.getElementById("info-div");
  var info_btn=document.getElementById("info-btn");
var submit_btn=document.getElementById("submit-btn");
var commandeForm=document.getElementById("valid-form");
info_btn.addEventListener("click",(e)=>{
  console.log("cela marche bien");
  console.log(commandeForm);
  console.log(infodiv);
  if(commandeForm['name'].value&&commandeForm['email'].value&&commandeForm['phone_number'].value&&commandeForm['whatsapp_number'].value)
  {
    infodiv.classList.add("hide");
      console.log(list)
      list[0].classList.add("inactive");
      list[0].classList.remove("active");
      submitdiv.classList.remove("hide")
      list[1].classList.remove("inactive");
      list[1].classList.add("active");
      
  }else{
    launch_toast("veillez renseignez tous les champs","error");
  }
})
submit_btn.addEventListener("click",(e)=>{
  //e.preventDefault();
  if(commandeForm['methode'].value&&commandeForm['pay_number'].value&&commandeForm['transaction_number'].value)
  {
    submitdiv.classList.add("hide");
      console.log(list)
      list[1].classList.add("inactive");
      list[1].classList.remove("active");
      confirmdiv.classList.remove("hide")
      list[2].classList.remove("inactive");
      list[2].classList.add("active");
      
  }else{
    launch_toast("veillez renseignez tous les champs","error");
  }
})
//if(commandeForm[''].value&&commandeForm[''].value&&commandeForm[''].value&&commandeForm[''].value)
/*
  console.log(singleForms, btnsPrev, btnsNext, list);

  btnsNext.forEach(function (elt, ind) {
    elt.addEventListener("click", function () {
      console.log("first click : "+ind+" et elt :"+elt.id);
      singleForms.forEach(function(div,idv){
        console.log(div)
        console.log(" et ")
        console.log(singleForms[idv+1])
        console.log(idv)
        if(ind==idv+1)
        {
          console.log("un bonjour")
         
      
      console.log(singleForms[idv+1].classList)
          singleForms[idv].classList.remove("hide");
          console.log(singleForms[idv+1].classList)
          list[idv].classList.remove("inactive");
      list[idv].classList.add("active");
        }else{
          console.log(div.classList)
      div.classList.add("hide");
      console.log(div.classList)
      list[2].classList.add("inactive");
      list[2].classList.remove("active");
        }
      })
      if(elt.id=="next-submit"){
        
      }else if(elt.id=="info-div"){
        infodiv.classList.remove("hide");
      list[0].classList.remove("inactive");
      list[0].classList.add("active");
      submitdiv.classList.add("hide");
      list[1].classList.add("inactive");
      list[1].classList.remove("active");
      console.log(singleForms[0])
      }

    });
  });

  btnsPrev.forEach(function (elt, ind) {
    console.log("fir²", elt);
    elt.addEventListener("click", function () {
      //console.log("first selected");
      singleForms.forEach(function (form, i) {
        //console.log("on a : "+i+" et aussi : "+(ind - 1))
        if (i == ind - 1) {
          form.classList.remove("hide");
          console.log(list[i])
          list[i].classList.remove("inactive");
          list[i].classList.add("active");
        } else {
          form.classList.add("hide");
          list[i].classList.add("inactive");
          list[i].classList.remove("active");
        }
      });
    });
  });*/
});

/*else{
        const BooliNP = [];
        singleForms.forEach(function (form, i) {
          const inputs = form.querySelectorAll(".input-field");
          //console.log(inputs)
          
          inputs.forEach(function (inp, a) {
           // console.log("input : ", inp.value, inp.checked);
            if (Boolean(inp.value)) {
              BooliNP.push(true);
              console.log(BooliNP)
            } else {
              BooliNP.push(false);
            }
           
          });
          const isValidform = BooliNP.every((prev) => Boolean(prev));
  
          // console.log("regardons un : "+isValidform)
   const inds = [];
   BooliNP.forEach((prev, ind) => {
     //console.log("prev : "+prev+" et ind +"+inds)
     !Boolean(prev) && inds.push(ind);
   });
   //console.log(inds)
   // if (!isValidform) {
   //   inputs.forEach(function (inp, a) {
   //     if (inds.includes(a)) inp.classList.add("invalid");
   //   });
   // } else
   console.log(inputs.length)
   if (i == ind+1) {
    console.log("un un")
    form.classList.remove("hide");
    list[i].classList.remove("inactive");
    list[i].classList.add("active");
  } else {
    console.log("deux deux")
    form.classList.add("hide");
    list[i].classList.add("inactive");
    list[i].classList.remove("active");
  }
   
  
    
        });
      }*/
// document.addEventListener("DOMContentLoaded", function (e) {
//   const methode = "methode";
//   const methode1 = "methode1";

//   const formObj = [
//     {
//       name: "Informations Personnelles",
//       isValid: false,
//       fields: [
//         {
//           type: "text",
//           class: "user-name",
//           value: "",
//           placeholder: "Votre nom : ",
//           name: "name",
//           id: "name",
//           label: "Nom :  ",
//         },
//         {
//           type: "email",
//           class: "user-email",
//           id: "email",

//           value: "",
//           placeholder: "Adresse email",
//           name: "email",
//           label: "Email : ",
//         },
//         {
//           id: "phone_number",

//           type: "text",
//           class: "user-phone",
//           value: "",
//           placeholder: "Téléphone du béneficiare",
//           name: "phone_number",
//           label: "Numeor de téléphone : ",
//         },
//         {
//           id: "whatsapp_number",
//           type: "text",
//           class: "user-date",
//           value: "",
//           label: "Numéro whatsapp : ",
//           placeholder: "Numéro whatsapp",
//           name: "date_string",
//         },
//       ],
//     },
//     {
//       name: "Détails du forfait",
//       isValid: false,
//       fields: [
//         {
//           id: "pay_number",
//           type: "text",
//           class: "user-fb",
//           value: "",
//           name: "pay_number",
//           placeholder: "Numéro qui paye",
//           label: "Numéro qui paye : ",
//         },
//         {
//           id: "transaction_number",
//           name: "transaction_number",
//           type: "text",
//           class: "user-nt",
//           value: "",
//           placeholder: "Numéro de transaction",
//           label: "Numéro de transaction : ",
//         },
//         {
//           id: methode,
//           type: "radio",
//           class: "user-radio",
//           name: "methode",
//           value: false,
//           checked: true,
//           label: "Orange Money",
//           img: "../media/methode_paiement_2.png",
//           description: `
//         <h1>Guide de paiement Orange Money Cameroun</h1>
//         <ol>
//          <li>Ouvrez l'application Orange Money sur votre téléphone.</li>
//          <li>Sélectionnez l'option de paiement ou de transfert d'argent.</li>
//          <li>Entrez le numéro de téléphone du destinataire dans le champ prévu à cet effet.</li>
//          <li>Saisissez le montant que vous souhaitez payer.</li>
//          <li>Vérifiez les détails de la transaction pour vous assurer qu'ils sont corrects.</li>
//          <li>Entrez votre code PIN Orange Money pour confirmer la transaction.</li>
//          <li>Attendez la confirmation de paiement sur votre téléphone.</li>
//          <li>Vérifiez également la confirmation de paiement sur le site ou l'application où vous effectuez le paiement.</li>
//         </ol>
//         <p>Assurez-vous de suivre attentivement chaque étape et de vérifier les détails avant de confirmer la transaction.</p>

//         `,
//         },
//         {
//           id: methode1,
//           type: "radio",
//           class: "user-radio",
//           name: "methode",
//           value: false,
//           placeholder: "Numéro de transaction",
//           label: "MTN Mobile money",
//           img: "../media/methode_paiement_1.jpeg",
//           description: `
//         <h1>Guide de paiement MTN MOMO Cameroun</h1>
//         <ol>
//          <li>Ouvrez l'application MTN MOMO sur votre téléphone.</li>
//          <li>Sélectionnez l'option de paiement ou de transfert d'argent.</li>
//          <li>Entrez le numéro de téléphone du destinataire dans le champ prévu à cet effet.</li>
//          <li>Saisissez le montant que vous souhaitez payer.</li>
//          <li>Vérifiez les détails de la transaction pour vous assurer qu'ils sont corrects.</li>
//          <li>Entrez votre code PIN MTN MOMO pour confirmer la transaction.</li>
//          <li>Attendez la confirmation de paiement sur votre téléphone.</li>
//          <li>Vérifiez également la confirmation de paiement sur le site ou l'application où vous effectuez le paiement.</li>
//         </ol>
//         <p>Assurez-vous de suivre attentivement chaque étape et de vérifier les détails avant de confirmer la transaction.</p>

//         `,
//         },
//       ],
//     },
//     {
//       name: "Confirmation de la commande",
//       isValid: false,
//       fields: [
//         {
//           id: this.name,
//           name: "",
//           type: "text",
//           class: "user-address",
//           value: "",
//           placeholder: "Address",
//         },
//         {
//           id: this.name,
//           type: "text",
//           class: "user-city",
//           value: "",
//           placeholder: "City",
//         },
//       ],
//     },
//   ];
//   const stepsContent = [
//     { name: "Informations Personnelles" },
//     { name: "Détails du forfait" },
//     { name: "Confirmation de la commande" },
//   ];

//   let active = 0;

//   const stepsContainer = document.querySelector("[data-steps]");
//   const userForm = document.querySelector("#userForm");

//   createSteps();
//   createMultiForm();

//   function createSteps() {
//     const fragment = document.createDocumentFragment();
//     for (let i = 0; i < stepsContent.length; i++) {
//       const step = document.createElement("li");
//       step.classList.add(...["list", i <= active ? "active" : "inactive"]);
//       step.innerText = stepsContent[i].name;
//       fragment.appendChild(step);
//     }
//     stepsContainer.appendChild(fragment);
//   }

//   function createMultiForm() {
//     const formFragment = document.createDocumentFragment();
//     formObj.forEach((form, i) => {
//       const parent = document.createElement("div");
//       parent.classList.add("single-form");
//       parent.innerText = form.name;

//       if (form.fields) {
//         form.fields.forEach((input) => {
//           const inputField = document.createElement("input");
//           const inputGruop = document.createElement("div");
//           const labelsG = document.createElement("div");
//           for (let [key, value] of Object.entries(input)) {
//             if (key === "description") {
//             }
//             if (key == "img") {
//               const div = document.createElement("div");
//               const img = document.createElement("img");
//               div.classList.add("input-img");
//               inputGruop.classList.add("input-line");

//               img.src = value;
//               console.log("first input : " + value);
//               img.alt = "méthode de paiement";
//               div.appendChild(img);
//               inputGruop.appendChild(div);
//             } else if (key == "label") {
//               const label = document.createElement("label");
//               label.innerHTML = value;
//               label.htmlFor = input["id"];
//               inputGruop.appendChild(label);
//             } else inputField.setAttribute(key, value);
//           }

//           inputField.classList.add("input-field");
//           inputGruop.classList.add("input-group");

//           inputField.addEventListener(
//             "change",
//             ({ target: { value, checked } }) => {
//               if (checked) inputHandler(form.name, input.id, checked);
//               else inputHandler(form.name, input.id, value);
//             }
//           );

//           inputGruop.appendChild(inputField);
//           parent.appendChild(inputGruop);
//         });
//       }
//       if (i == 1) {
//         const div =
//           document.querySelector(".input-description") ||
//           document.createElement("div");
//         div.classList.add("input-description");
//         const currentValidDescription = formObj[1].fields.filter(
//           (elt) =>
//             (elt.id === methode || elt.id === methode1) &&
//             typeof elt.value == "boolean" &&
//             (elt.value || elt.checked)
//         );
//         div.innerHTML = currentValidDescription
//           ? currentValidDescription.description
//           : "";
//         div.classList.add("input-description");
//         div.classList.add("only-description");
//         parent.appendChild(div);
//       }

//       // console.log("currentValidDescription : ", currentValidDescription, form);

//       const btnContainer = document.createElement("div");
//       btnContainer.classList.add("btn-container");
//       if (i === 0) {
//         const prevButton = createButton("Prev", ["btn", "prev"]);
//         const nextButton = createButton("Next", ["btn", "next"]);
//         prevButton.style.visibility = "hidden";
//         btnContainer.append(prevButton, nextButton);
//         parent.appendChild(btnContainer);
//       } else if (i === formObj.length - 1) {
//         const prevButton = createButton("Prev", ["btn", "prev"]);
//         const submitButton = createButton("Submit", ["btn", "submit"]);
//         btnContainer.append(prevButton, submitButton);
//         parent.append(btnContainer);
//       } else {
//         const prevButton = createButton("Prev", ["btn", "prev"]);
//         const nextButton = createButton("Next", ["btn", "next"]);
//         btnContainer.append(prevButton, nextButton);
//         parent.append(btnContainer);
//       }
//       formFragment.append(parent);
//     });
//     userForm.append(formFragment);
//     toggleForm();
//   }

//   document.querySelectorAll(".btn").forEach((btn) => {
//     btn.addEventListener("click", ({ target }) => {
//       if (target.className.includes("prev")) {
//         const fields = formObj[active].fields;
//         fields.forEach((field) => {
//           document.querySelector(`.${field.class}`).classList.remove("invalid");
//         });
//         if (active === 0) return;
//         active -= 1;
//       } else if (target.className.includes("next")) {
//         if (!currentFormValid()) return;
//         if (active === stepsContent.length - 1) return;
//         active += 1;
//       } else {
//         console.log("first step : ", formObj);
//         if (!currentFormValid()) return;
//         document.querySelector("#formData").innerText = JSON.stringify(formObj);
//       }
//       setActiveStep();
//     });
//   });

//   function setActiveStep() {
//     document.querySelectorAll(".list").forEach((list, i) => {
//       list.classList.toggle("active", i <= active);
//     });

//     toggleForm();
//   }

//   function toggleForm() {
//     document.querySelectorAll(".single-form").forEach((form, i) => {
//       form.classList.toggle("hide", i !== active);
//     });
//   }

//   function inputHandler(formName, id, value) {
//     const form = formObj.find((form) => form.name === formName);
//     const field = form.fields.find((f) => f.id === id);
//     field.value = value;
//     console.log(form, id, value);
//     if (id === methode || id === methode1) {
//     }
//     const div = document.querySelector(".input-description.only-description");
//     const newDiv = document.createElement("div");
//     newDiv.classList.add("input-description");

//     div.classList.add("input-description");
//     const currentValidDescription = formObj[active].fields.find(
//       (elt) =>
//         (elt.id === methode || elt.id === methode1) &&
//         typeof elt.value == "boolean" &&
//         elt.value
//     );
//     // TODO
//     if (currentValidDescription?.description)
//       newDiv.innerHTML = currentValidDescription.description;

//     console.log("d : ", newDiv, div.parentElement);
//     div.parentElement.appendChild(newDiv);
//     if (
//       (typeof field.value == "string" && field.value.trim().length > 0) ||
//       Boolean(field.value)
//     ) {
//       field.isValid = true;
//       document.querySelector(`.${field.class}`).classList.remove("invalid");
//       const div = document.querySelector(".input-description");
//       const currentValidDescription = formObj[1].fields.find(
//         (elt) =>
//           (elt.id === methode || elt.id === methode1) &&
//           typeof elt.value == "boolean" &&
//           (elt.value || elt.checked)
//       );
//       div.innerHTML = currentValidDescription
//         ? currentValidDescription.description
//         : "";
//       div.classList.add("input-description");
//     }
//   }

//   function currentFormValid() {
//     const fields = formObj[active].fields;
//     let isValid = true;
//     fields.forEach((field) => {
//       if (
//         (typeof field.value == "string" && field.value.trim().length === 0) ||
//         !Boolean(field.value)
//       ) {
//         if (field.id == methode || field.id == methode1) {
//           field.isValid = true;
//           document.querySelector(`.${field.class}`).classList.remove("invalid");
//         } else {
//           isValid = false;
//           document.querySelector(`.${field.class}`).classList.add("invalid");
//           console.log("field : ", field);
//         }
//       } else {
//         field.isValid = true;
//         document.querySelector(`.${field.class}`).classList.remove("invalid");
//       }
//     });
//     if (isValid) formObj[active].isValid = true;
//     return isValid;
//   }

//   function createButton(label, classes) {
//     const btn = document.createElement("button");
//     btn.classList.add(...classes);
//     btn.innerText = label;
//     btn.type = "button";
//     return btn;
//   }

//   function setCurrentDescriton(params) {
//     // const div = document.querySelector(".input-description.only-description");
//     // div.classList.add("input-description");
//     // console.log("d : ", div);
//     // const currentValidDescription = formObj[active].fields.find(
//     //   (elt) =>
//     //     (elt.id === methode || elt.id === methode1) &&
//     //     typeof elt.value == "boolean" &&
//     //     elt.value
//     // );
//     // div.innerHTML = currentValidDescription
//     //   ? currentValidDescription.description
//     //   : "";
//     console.log("currentValidDescription : ", currentValidDescription);
//     parent.appendChild(div);
//   }
// })
