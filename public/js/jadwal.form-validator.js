const submitButton = document.getElementById("button-submit");
const tanggalInput = document.getElementById("tanggal");
choices.forEach((choice) => {
  choice.addEventListener("change", () => {
    validate(choice);
  });
  choice.addEventListener("blur", () => {
    validate(choice);
  });
});

tanggalInput.addEventListener("change", () => {
  validateInput(tanggalInput);
});
tanggalInput.addEventListener("blur", () => {
  validateInput(tanggalInput);
});

submitButton.addEventListener("click", (e) => {
  e.preventDefault();
  validateInput(tanggalInput);
  for (const choice of choices) validate(choice);
  if (isAllValid(choices) && inputIsValid(tanggalInput))
    submitButton.form.submit();
});

function isValid(choice) {
  const isRequired = choice.dataset.validate.includes("required");
  const options = choice.querySelectorAll("option");
  return !isRequired || options.length > 0;
}

function validate(choice) {
  const formGroup = choice.parentElement.parentElement.parentElement;
  if (!isValid(choice)) formGroup.classList.add("is-invalid");
  else formGroup.classList.remove("is-invalid");
}

function isAllValid(choices) {
  for (const choice of choices) if (!isValid(choice)) return false;
  return true;
}

function inputIsValid(input) {
  const isRequired = input.dataset.validate === "required";
  return !isRequired || input.value !== "";
}

function validateInput(input) {
  const formGroup = input.parentElement;
  if (!inputIsValid(input)) formGroup.classList.add("is-invalid");
  else formGroup.classList.remove("is-invalid");
}
