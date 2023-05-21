//--------------------------------------------------------------------------------------------------------------------------------
const openMenu = document.querySelector(".header__top-menuopen");
const closeMenu = document.querySelector(".header__nav-closemenu");
const mainMenu = document.querySelector(".header__nav");

openMenu.addEventListener("click", () => {
  mainMenu.style.display = "flex";
  mainMenu.style.top = "0";
});

closeMenu.addEventListener("click", () => {
  mainMenu.style.top = "-100%";
  document.querySelector(".header__nav-closemenu i").style.display = "none";
});
//--------------------------------------------------------------------------------------------------------------------------------
