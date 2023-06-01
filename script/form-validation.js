// Get form inputs
const mainForm = document.getElementById("main-form");
const formName = document.getElementById("form-name");
const formSurname = document.getElementById("form-surname");
const formAge = document.getElementById("form-age");
const formEmail = document.getElementById("form-email");
const formPassword = document.getElementById("form-password");
const formRepeatPassword = document.getElementById("form-repeat-password");
const formPhone = document.getElementById("form-phone");
const formContact = document.getElementById("form-contact");
const formTerms = document.getElementById("form-terms");
const formSubmit = document.getElementById("form-submit");


// Create object that holds error messages, regExp validation etc.
const form = {
  name: {
    inputElement: formName,
    validation: /^[a-zA-Z\-\'\s]{2,64}$/,
    errorMessage: 'Name must be 2-64 letters and do not contains numbers.'
  },
  surname: {
    inputElement: formSurname,
    validation: /^[a-zA-Z\-\'\s]{2,64}$/,
    errorMessage: 'Surname must be 2-64 letters.'
  },
  age: {
    inputElement: formAge,
    validation: /^[1-9]{1,2}$/,
    errorMessage: 'You must be 16-99 years old.'
  },
  email: {
    inputElement: formEmail,
    validation: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,
    errorMessage: 'Your email address is incorect.'
  },
  password: {
    inputElement: formPassword,
    validation: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
    errorMessage: 'Your password is not strong enough. \nPasword must be at least 8 characters long. \nPassword needs at least one big letter, one number and one of the following special characters: ! £ $ & ? @ . : ; _ -.'
  },
  repeatPassword: {
    inputElement: formRepeatPassword,
    validation: formPassword.value === formRepeatPassword.value,
    errorMessage: 'Password does not match previous one.'
  },
  phone: {
    inputElement: formPhone,
    validation: /^[0-9]{9,13}$/,
    errorMessage: 'Invalid phone number. Please eneter your mobile phone number WITHOUT the prefix.'
  },
  contact: {
    inputElement: formContact,
    validation: formContact && formContact.value,
    errorMessage: 'Please choose preferred contact method.'
  },
  terms: {
    inputElement: formTerms,
    validation: formTerms.checked,
    errorMessage: 'You must agree to the terms and conditions.'
  }
};


// Validation.
const validateInput = (valid, element, err, name) => {
  let result;

  if (valid instanceof RegExp) {
    result = valid.test(element.value);
  } else {
    result = valid;
  }

  // Alert id name.
  const idName = `js-val-${name}`;
  const alertElement = document.getElementById(idName);

  if (result) {
    if (alertElement) {
      alertElement.remove();
    }
  } else if (!alertElement) {
    // Create alert element.
    const phrase = document.createElement('p');
    const errorMessage = document.createTextNode(err);
    phrase.appendChild(errorMessage);
    phrase.setAttribute('class', 'input-alert');
    phrase.setAttribute('id', idName);

    // Get element parent.
    const parentElement = element.parentElement;

    // Add alert element to the DOM.
    parentElement.parentNode.insertBefore(phrase, parentElement.nextSibling);
  }
} 


// Handle checkbox.
formTerms.addEventListener('click', () => {
  const isChecked = formTerms.checked;
  if (isChecked) {
    form.terms.validation = true;
  } else {
    form.terms.validation = false;
  }
});

// Handle select with options.
formContact.addEventListener('click', () => {
  const hasValue = formContact.value;
  if (hasValue) {
    form.contact.validation = true;
  } else {
    form.contact.validation = false;
  }
});


// Function that checks if inputs are valid.
const validateAll = (obj) => {
  for (const item in obj ) {
    validateInput(obj[item].validation, obj[item].inputElement, obj[item].errorMessage, item);
  }
};


// Look for errors.
const formHasErrors = () => {
  // Get collection of all elements with class 'input-alert'.
  const currentErrors = document.querySelectorAll('.input-alert');

  // If collection has at least one element with alert, return true.
  if (currentErrors.length) {
    return true;
  }

  // Return false if no alerts occur.
  return false;
};


// Main alert show/hidden.
const handleMainAlert = () => {
  const mainAlerts = document.querySelectorAll('.js-alert');

  if (formHasErrors()) {
    mainAlerts.forEach((el) => {
      el.classList.remove('display-none');
    });
  } else {
    mainAlerts.forEach((el) => {
      el.classList.add('display-none');
    });
  }
}


// Handle onSubmit.
mainForm.addEventListener('submit', (event) => {
  // Prevent from posting form to PHP.
  event.preventDefault();
  // Handle user input values and error messages.
  validateAll(form);
  handleMainAlert();
  // If no error messages found...
  if (!formHasErrors()) {
    // Submit form and post data to PHP for a second validation.
    mainForm.submit();
  }
});

formSubmit.addEventListener('click', () => {
  console.log('click')
})
