function createMultiForm() {
  const formFragment = document.createDocumentFragment();
  formObj.forEach((form, i) => {
    const parent = document.createElement("div");
    parent.classList.add("single-form");
    parent.innerText = form.name;
    if (form.fields) {
      form.fields.forEach((input) => {
        const inputField = document.createElement("input");
        const inputGruop = document.createElement("div");

        for (let [key, value] of Object.entries(input)) {
          if (key !== "label") inputField.setAttribute(key, value);
          else {
            const label = document.createElement("label");
            label.innerHTML = value;
            inputGruop.appendChild(label);
          }
        }

        inputField.classList.add("input-field");
        inputGruop.classList.add("input-group");
        inputField.addEventListener("change", ({ target: { value } }) =>
          inputHandler(form.name, input.id, value)
        );
        inputGruop.appendChild(inputField);
        parent.appendChild(inputGruop);
      });
    }
    const btnContainer = document.createElement("div");
    btnContainer.classList.add("btn-container");
    if (i === 0) {
      const prevButton = createButton("Prev", ["btn", "prev"]);
      const nextButton = createButton("Next", ["btn", "next"]);
      prevButton.style.visibility = "hidden";
      btnContainer.append(prevButton, nextButton);
      parent.appendChild(btnContainer);
    } else if (i === formObj.length - 1) {
      const prevButton = createButton("Prev", ["btn", "prev"]);
      const submitButton = createButton("Submit", ["btn", "submit"]);
      btnContainer.append(prevButton, submitButton);
      parent.append(btnContainer);
    } else {
      const prevButton = createButton("Prev", ["btn", "prev"]);
      const nextButton = createButton("Next", ["btn", "next"]);
      btnContainer.append(prevButton, nextButton);
      parent.append(btnContainer);
    }
    formFragment.append(parent);
  });
  userForm.append(formFragment);
  toggleForm();
}
