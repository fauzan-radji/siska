const choices = document.querySelectorAll(".choices");
for (let i = 0; i < choices.length; i++) {
  if (choices[i].classList.contains("multiple-remove")) {
    choices[i] = new Choices(choices[i], {
      delimiter: ",",
      editItems: true,
      maxItemCount: -1,
      removeItemButton: true,
    });
  } else {
    choices[i] = new Choices(choices[i]);
  }
}
