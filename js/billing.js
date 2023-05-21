document.querySelector(".ticket-name").innerHTML = document.querySelector(
  ".customer-name-input"
).value;

document.querySelector(".customer-name-input").oninput = () => {
  document.querySelector(".ticket-name").innerHTML = document.querySelector(
    ".customer-name-input"
  ).value;
};

document.querySelector(".ticket-phone").innerHTML = document.querySelector(
  ".customer-mobile-input"
).value;

document.querySelector(".customer-mobile-input").oninput = () => {
  document.querySelector(".ticket-phone").innerHTML = document.querySelector(
    ".customer-mobile-input"
  ).value;
};

document.querySelector(".ticket-email").innerHTML = document.querySelector(
  ".customer-email-input"
).value;

document.querySelector(".customer-email-input").oninput = () => {
  document.querySelector(".ticket-email").innerHTML = document.querySelector(
    ".customer-email-input"
  ).value;
};
