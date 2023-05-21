// IT21260988 - Randeniya R. A. D. S. E

const password = document.querySelector(".newPassword");
const confirmPassword = document.querySelector(".confirmPassword");

function validate() {
  //checking whether confirmPassword and password are equal before submitting
  if (password.value == confirmPassword.value) {
    //if equal change the border color of confirm password and password fields to green
    confirmPassword.style.border = "3px solid #72cc50";
    password.style.border = "3px solid #72cc50";
  } else {
    //if different change the border color of confirm password and password fields to red
    confirmPassword.style.border = "3px solid #b6142c";
    password.style.border = "3px solid #b6142c";
  }
}

//add event listener to the confirm password field
confirmPassword.addEventListener("keyup", validate);
