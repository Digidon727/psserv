document
  .querySelectorAll('input[type="checkbox"]')
  .forEach(function (checkbox) {
    checkbox.addEventListener("change", function (event) {
      let checkboxLabel = document.querySelector(
        'label[for="' + checkbox.name + '"]'
      );
      if (checkboxvar.checked == false) {
        labelvar.innerHTML = "No";
      } else {
        labelvar.innerHTML = "Yes";
      }
    });
  });
