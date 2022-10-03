const fname = document.getElementById("fname-registration");

const lname = document.getElementById("lname-registration");

const email = document.getElementById("email-registration");

const password = document.getElementById("password-registration");
const passwordConfirm = document.getElementById(
  "password-confirm-registration"
);

const form = document.getElementById("registrationForm");

// verification functions

// function to check if field empty
const isRequired = (value) => (value === "" ? false : true);

// function to verify email
const isEmailValid = (email) => {
  const re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
};
// function to verify password
const isPasswordSecure = (password) => {
  const re = new RegExp(
    "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
  );

  return re.test(password);
};

// function to verify if name is text
const isText = (inputName) => {
  const re = new RegExp("^[A-Za-z]*");
  if (re.test(inputName)) {
    return true;
  } else {
    return false;
  }
};

// function to show error
const showError = (input, message) => {
  // get the form-field element
  const formField = input.parentElement;

  // show the error message
  const error = formField.querySelector("small");
  error.textContent = message;
};

// function to check if name is text
const checkName = (nameInput) => {
  let valid = false;
  const username = nameInput.value.trim();

  if (!isRequired(username)) {
    showError(nameInput, "Name cannot be blank.");
  } else if (isText(username) == false) {
    showError(nameInput, "Name must be only text.");
  } else {
    valid = true;
  }
  return valid;
};

// function to validate email
const checkEmail = () => {
  let valid = false;
  const emailTrimmed = email.value.trim();
  if (!isRequired(emailTrimmed)) {
    showError(email, "Email cannot be blank.");
  } else if (!isEmailValid(emailTrimmed)) {
    showError(email, "Email is not valid.");
  } else {
    valid = true;
  }
  return valid;
};

// function to validate password
const checkPassword = () => {
  let valid = false;

  const passwordTrimmed = password.value.trim();

  if (!isRequired(passwordTrimmed)) {
    showError(password, "Password cannot be blank.");
  } else if (!isPasswordSecure(passwordTrimmed)) {
    showError(
      password,
      "Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)"
    );
  } else {
    valid = true;
  }

  return valid;
};

// function to confirm password
const checkConfirmPassword = () => {
  let valid = false;
  // check confirm password
  const confirmPassword = passwordConfirm.value.trim();
  const passwordTrimmed = password.value.trim();

  if (!isRequired(confirmPassword)) {
    showError(passwordConfirm, "Please enter the password again");
  } else if (passwordTrimmed !== confirmPassword) {
    showError(passwordConfirm, "Confirm password does not match");
  } else {
    valid = true;
  }

  return valid;
};

form.addEventListener("submit", function (e) {
  // prevent the form from submitting
  e.preventDefault();

  // validate forms
  let isFirstnameValid = checkName(fname),
    isLastnameValid = checkName(lname),
    isEmailValid = checkEmail(),
    isPasswordValid = checkPassword(),
    isConfirmPasswordValid = checkConfirmPassword();

  let isFormValid =
    isFirstnameValid &&
    isLastnameValid &&
    isEmailValid &&
    isPasswordValid &&
    isConfirmPasswordValid;

  // submit to the server if the form is valid
  if (isFormValid) {
    const fnameValue = fname.value;

    const lnameValue = lname.value;

    const emailValue = email.value;

    const passwordValue = password.value;

    // console.log(fnameValue);
    // return;
    fetch("http://localhost/project/register/includes/register.inc.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
      },
      body: `fnameValue=${fnameValue}&lnameValue=${lnameValue}&emailValue=${emailValue}&passwordValue=${passwordValue}`,
    })
      .then((response) => response.text())
      .then((res) => {
        if (res == "index.php") {
          window.location = res;
        } else {
          alert(res);
        }
      });
  }
});
