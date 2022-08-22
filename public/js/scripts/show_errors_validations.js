function configValidator(form) {
  // Conecte los inputs para validar sobre la marcha
  var inputs = document.querySelectorAll("input, textarea, select")
  for (var i = 0; i < inputs.length; ++i) {
    inputs.item(i).addEventListener("change", function(ev) {
      var errors = validate(form, constraints) || {};
      showErrorsForInput(this, errors[this.name])
    });
  }
}

// Actualiza las entradas con los errores de validación
function showErrors(form, errors) {
  // Recorremos todas las entradas y mostramos los errores para esa entrada
  _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
    showErrorsForInput(input, errors && errors[input.name]);
  });
}

// Muestra los errores para una entrada específica
function showErrorsForInput(input, errors) {
  // Referenciamos al padre del elemento raiz form-group.
  var formGroup = closestParent(input.parentNode, "form-group")
    // Referenciamos al elemento message para insertar el mensaje de error
  var messages = formGroup.querySelector(".messages");
  // Primero eliminamos los mensajes antiguos y restablecemos las clases.
  resetFormGroup(formGroup);
  // si tenemos errores
  if (errors) {
    // primero marcamos que el grupo tiene errores
    formGroup.classList.add("has-error");
    // luego agregamos todos los errores
    _.each(errors, function(error) {
      addError(messages, error);
    });
  } else {
    // de lo contrario, simplemente lo marcamos como éxito.
    formGroup.classList.add("has-success");
  }
}

// Encuentra recursivamente el padre más cercano que tiene la clase especificada
function closestParent(child, className) {
  if (!child || child == document) {
    return null;
  }
  if (child.classList.contains(className)) {
    return child;
  } else {
    return closestParent(child.parentNode, className);
  }
}

function resetFormGroup(formGroup) {
  // Elimina las clases de éxito y error
  formGroup.classList.remove("has-error");
  formGroup.classList.remove("has-success");
  // y elimina los mensajes antiguos
  _.each(formGroup.querySelectorAll(".help-block.error"), function(el) {
    el.parentNode.removeChild(el);
  });
}

// Agrega el error especificado con la siguiente marca
// <p class="help-block error">[message]</p>
function addError(messages, error) {
  var block = document.createElement("p");
  block.classList.add("help-block");
  block.classList.add("error");
  block.setAttribute('style','color:red')
  block.innerText = '* ' + error;
  messages.appendChild(block);
}

function showSuccess() {
  // We made it \:D/
  alert("Success!");
}